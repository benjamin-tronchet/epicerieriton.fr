<?php

$pagename = 'actualite';

// recupere le fichier json
$json = file_get_contents(realpath(__DIR__ . '/..') . '/database/actualite.json');
// decode pour que php puisse le traiter
$actualite = json_decode($json);

if($actualite) {
    $actualite_titre        = html_entity_decode($actualite->titre);
    $actualite_desc         = html_entity_decode($actualite->desc);
    $actualite_img          = html_entity_decode($actualite->img);
    $actualite_date         = html_entity_decode($actualite->actu_date);
}
else 
{
    header("location:index.php");
}
$msgIMG                 = false;


/*=========================================================
=============================
==============
DANS LE CAS D'UNE MODIFICATION DES INFORMATIONS PAR L'UTILISATEUR (CREATION OU MODIFICATION)
==============
=============================
=========================================================*/


if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['choix'] == 'modifier') {
    
    $date = date('d-m-Y');
    
    // RECUPERATION DES VALEURS POSTEES
    $titre = parse($_POST['titre']);
    $desc = parse($_POST['desc']);
    
    // ON VERIFIE QUE L'IMAGE A BIEN ETE POSTEE
    if (!empty($_FILES['img']) && $_FILES['img']['size'] != 0)
    {
        // ON VERIFIE QU'IL N'Y A PAS D'ERREUR
        if ($_FILES['img']['error'] > 0) 
        {
            $msgIMG = "Une erreur s'est produite : " . $_FILES['img']['error'];
        } 
        else 
        {   
            // INCLUSION DE LA CLASSE
            include_once (realpath(__DIR__ . '/..') . '/class/ImageManipulatorClass.php');

            // TABLEAU DES EXTENSIONS VALIDES
            $validExtensions = array('.jpg', '.JPG', '.jpeg', '.JPEG', '.png', '.PNG');

            // RECUPERATION DE L'EXTENSION DU FICHIER
            $fileExtension = strrchr($_FILES['img']['name'], ".");

            // VERIFICATION QUE L'EXTENSION DU FICHIER EST UNE EXTENSION AUTORISEE
            if (in_array($fileExtension, $validExtensions)) 
            {
                // DEFINITION DU REPERTOIRE D'UPLOAD
                $upload_folder = realpath(__DIR__ . '/..') .'/uploads'; 
                
                if(!is_dir($upload_folder))
                {
                    mkdir($upload_folder,0777);
                }

                // REDIMENSIONNEMENT DE L'IMAGE
                $finalWidth = '760';
                $finalHeight = '580';
                $manipulator = new ImageManipulator($_FILES['img']['tmp_name']);
                // resize
                $newImage = $manipulator->resample($finalWidth, $finalHeight, $constrainProportions = true);
                // suite
                $widthImg  = $manipulator->getWidth();
                $heightImg = $manipulator->getHeight();
                $centreX = round($widthImg / 2);
                $centreY = round($heightImg / 2);
                // our dimensions will be 200x130
                $x1 = $centreX - round($finalWidth/2); // 200 / 2
                $y1 = $centreY - round($finalHeight/2); // 130 / 2
                $x2 = $centreX + round($finalWidth/2); // 200 / 2
                $y2 = $centreY + round($finalHeight/2); // 130 / 2
                // center cropping
                $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
                $newImage = $manipulator->enlargeCanvas($finalWidth, $finalHeight,[255, 255, 255]);
                // Clean file name
                $file_name = 'actualite'.$fileExtension;
    
                // saving file to uploads folder
                $manipulator->save($upload_folder.'/'.$file_name);

                $actualite->img = 'uploads/'.$file_name;
                $msgIMG = false;
            } 
            else 
            {
                $actualite->img = false;
                $msgIMG = "Le format du fichier n'est pas pris en charge !";
            }
        }
    } elseif($_FILES['img']['size'] != 0) {
        $actualite->img = false;
        $msgIMG = "Une erreur s'est produite lors du téléchargement !";
    }
    
    // Assignation des nouvelles valeurs à l'objet actualite correspondant
    $actualite->titre = $titre;
    $actualite->desc = $desc;
    $actualite->actu_date = $date;
        
    if (
        isset($actualite->titre) &&
        isset($actualite->desc) &&
        isset($actualite->img) && 
        $msgIMG == false
    ) {
        // Stockage du chemin vers le fichier JSON
        $filePath = realpath(__DIR__ . '/..') . '/database/actualite.json';

        // Encodage au format JSON
        $json = json_encode($actualite);

        // Réécriture du fichier JSON
        file_put_contents($filePath, $json);
        
        // On renvoie à la page précédente
        header('location:index.php?page='.$pagename.'&msgsystem=success_modify-article');
    }
}


function parse($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlentities($data, ENT_QUOTES, "UTF-8");
    return $data;
}


// On affiche la vue
include (realpath(__DIR__ . '/..') . '/view/ActualiteView.php');

?>
