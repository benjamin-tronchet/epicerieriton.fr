<?php 
    session_start();
?>
<!DOCTYPE html>
    <html lang="fr">
    <?php include 'includes/head.php'; ?>
    <body id="top-page" class="<?php echo $PAGE_name; ?>">
        <div id="wrapper">
            <header class="p-header jaune-bg" id="head">
                <div class="container p-header_title">
                    <div class="row flex">
                        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-2">
                            <h1 class="u-title_h2 noir">
                                Erreur 404
                            </h1>
                            <p class="noir">
                                Il semble que la page que vous 
                                cherchez est introuvable.
                                <br><br><br>
                                <a href="" class="u-button--noir">
                                    Retour à l'accueil
                                </a>
                            </p>
                        </div>
                        <div class="col-md-4 col-md-offset-1 hidden-xs hidden-sm">
                            <img src="img/sigle-renault-blanc.png" alt="Sigle Renault" class="img-responsive">
                        </div>
                    </div>
                </div>
            </header>