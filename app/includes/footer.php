    <footer class="p-footer">
        <div class="container">
            <div class="row grid">
                <div class="col-xs-12 grid_item1">
                    <p>
                        <span class="icon-sigle"></span>
                    </p>
                </div>
                <div class="col-xs-12 grid_item2">
                    <p>
                        <strong class="p-footer_tel">05 61 73 04 91</strong>
                    </p>
                </div>
                <div class="col-xs-12 grid_item3">
                    <p>
                        <strong>Horaires : </strong>
                        <br><br>
                        Du lundi au vendredi : <br>
                        08:30 - 12:00 / 13:30 - 19:00
                        <br><br>
                        Samedi : <br>
                        09:30 - 12:30  / fermé
                        <br><br>
                        Dimanche : fermé
                    </p>
                </div>
                <div class="col-xs-12 grid_item4">
                    <p>
                        <strong>Balonas Auto</strong>
                        <br><br>
                        1 Rue Edouard Branly, <br>
                        31520 Ramonville-Saint-Agne
                    </p>
                </div>
                <div class="col-xs-12 grid_item5">
                    <p class="u-small">
                        Copyright 2021 Balonas Automobile <br>
                        Tous droits réservés <br>
                        <a href="<?=$NAV_legals?>" title="<?=$NAV_TITLE_legals?>">Mentions légales</a> <br>
                        Site par <a href="<?=$LINK_mk?>" title="<?=$LINK_TITLE_mk?>" target="_blank">melting.K</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <div class="u-modal">
        
    </div>
    <div class="u-banner-cookies">
        <div class="u-banner-cookies_content">
            <p class="u-banner-cookies_text">
                Notre site internet utilise des cookies pour mesurer son audience. Vous pouvez les accepter, ou définir vous mêmes vos paramètres personnalisés.
            </p>
            <div class="u-banner-cookies_buttons">
                <button onclick="tarteaucitron.userInterface.openPanel();" class="u-banner-cookies_parametre" data-accept-cookies>Paramètres</button>
                <button onclick="tarteaucitron.userInterface.respondAll(true);" class="u-banner-cookies_close" data-accept-cookies><span>J'accepte</span></button>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="tarteaucitron/tarteaucitron.js"></script>

    <!-- build:js(app) js/script.min.js -->
    <script type="text/javascript" src="../node_modules/slick-carousel/slick/slick.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/form-mail-contact.js"></script>
    <script type="text/javascript" src="js/cookies.js"></script>
    <!-- endbuild -->
    </div>
  </body>
</html>
