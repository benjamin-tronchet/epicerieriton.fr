<?php 
    session_start();
?>
<!DOCTYPE html>
    <html lang="fr">
    <?php include 'includes/head.php'; ?>
    <body id="top-page" class="<?=$PAGE_name?> inactive">
        <div class="p-header_background">
            <div class="p-header_background_img parallax" data-css="opacity,transform" data-start="1,scale(1)" data-end="0,scale(1.1)" data-anchor="#head" off-end="85"></div>
        </div>
        <div id="main-content">
        <header class="p-header" id="head">
            <nav class="p-header_nav flex align-center justify-between" data-action="shrink">
                <p class="flex justify-between p-header_nav_bar">
                    <a href="#head" class="scroll" data-action="close_nav">
                        <span class="icon-sigle p-header_logo jaune"></span>
                    </a>
                    <button class="p-header_nav_burger visible-xs visible-sm" data-action="open_nav">
                        <span class="barre"></span>
                        <span class="barre"></span>
                        <span class="barre"></span>
                    </button>
                </p>
                <ul class="p-header_nav_menu flex justify-end column-md">
                    <?php
                        foreach($SECTIONS as $id => $section)
                        {
                    ?>
                    <li class="<?=$id?> p-header_nav_menu_item">
                        <a href="<?="#".$id?>" title="<?=$section->title?>" class="scroll" data-action="close_nav">
                            <?=$section->label?>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </nav>
            <div class="container p-header_title">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                        <h1 class="u-title_h1">
                            Le garage<br/>
                            Balonas Automobiles<br/>
                            <span class="u-title_h1--sub">
                                Agréé Renault
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