<?php 
    session_start();
?>
<!DOCTYPE html>
    <html lang="fr">
    <?php include 'includes/head.php'; ?>
    <body id="top-page" class="<?php echo $PAGE_name; ?>">
        <div id="wrapper">
            <header class="p-header inactive" id="head">
                <nav class="p-header_nav flex align-center justify-between" data-action="shrink">
                    <p class="flex justify-between p-header_nav_bar">
                        <a href="#head" class="scroll" data-action="close_nav">
                            <span class="icon-sigle p-header_logo jaune"></span>
                        </a>
                        <a href="" class="p-header_back">
                            &lt; Retour au site
                        </a>
                    </p>
                </nav>
                <div class="container p-header_title">
                    <div class="row">
                        <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                            <h1 class="u-title_h1">
                                Mentions légales <br>
                                <span class="u-title_h1--sub">
                                    & politique de confidentialité
                                </span>
                            </h1>
                        </div>
                    </div>
                </div>
                <p class="p-header_scroll center">
                    <a href="#equipe" class="scroll icon-mouse"></a>
                </p>

                <div class="p-header_scrollbar flex column justify-end hidden-xs">
                    <span class="u-vertical-text--right">Scroll</span>
                    <div class="p-header_scrollbar_progress" data-action="scroll_level"></div>
                </div>
            </header>