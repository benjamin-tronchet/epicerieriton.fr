<?php

//*******************************
// Balises Méta
//*******************************

$META_author = 'Chez Riton';

switch ($PAGE_name) {
    case 'accueil':
        $META_title = "Chez Riton - Épicerie fine & produits du terroir";
        $META_description = "Chez Riton, une épicerie fine située au coeur de Toulouse, vous proposant une sélection des meileurs produits du terroir : vins, fromages, charcuterie ...";
        break;
    case 'erreur404':
        $META_title = "Contenu introuvable, une erreur est survenue.";
        $META_description = "La page ou le contenu que vous recherchez n'existe plus ou a été déplacé. Utilisez notre plan de site pour retrouver les informations que vous recherchez";
        break;
    case 'legals':
        $META_title = "Mentions légales et politique de confidentialité | Chez Riton";
        $META_description = "Les mentions légales relatives à l'utilisation du site www.epicerieriton.fr, ainsi que notre politique de confidentialité à l'égard de vos données personnelles";
        break;
    default:
        $META_description = '';
        $META_title = '';
}

//*******************************
// Navigation du site
//*******************************

$NAV_accueil = '';
$NAV_TITLE_accueil = 'Chez Riton - Epicerie fine & Produits du terroir';

$NAV_legals = 'mentions-legales';
$NAV_TITLE_legals = 'Mentions légales - www.epicerieriton.fr';

//*******************************
// Sections de la page
//*******************************

$SECTIONS = (object) array(
    "presentation" => (object) array(
        "label" => "Riton",
        "title" => "Découvrez l'épicerie Chez Riton"
    ),
    "produits" => (object) array(
        "label" => "Produits du terroir",
        "title" => "Nos produits du terroir"
    ),
    "en-ce-moment" => (object) array(
        "label" => "En ce moment",
        "title" => "Les produits du moment"
    ),
    "contact" => (object) array(
        "label" => "Venir chez Riton",
        "title" => "Comment nous rendre visite ?"
    )
);



//*******************************
// Liens externes
//*******************************

$LINK_mk = 'https://www.melting-k.fr/';
$LINK_TITLE_mk = 'Site web réalisé par l\'agence melting.k';

$LINK_facebook = "https://www.facebook.com/RitonTlse/";
$LINK_TITLE_facebook ="Suivez Riton sur Facebook";

$LINK_instagram = "https://www.instagram.com/riton_toulouse/";
$LINK_TITLE_instagram ="Suivez @riton_toulouse sur Instagram";

?>