(function ($) {
    $(function () {
        var windowWidth = $(window).width();
        var windowHeight = $(window).height();
        
        $(window).ready(function () {
            smoothScroll();
            Animation();
            menu();
            stickyElement();
            sliders();
            modal();
        });
        
        $(window).load(function () {
            parallax();
            progressBar();
        });
        
        ///////////////////////////////////////////////////////
        /* SMOOTHSCROLL */
        ///////////////////////////////////////////////////////
        
        function smoothScroll() {
            $(".scroll").on('click', function (event) {
                event.preventDefault();
                var hash = this.hash;
                var viewportWidth = parseInt($(document).width());
                if($(this).closest('#menu').length && viewportWidth < 1200) {
                    
                    $(this).closest('nav').removeClass('ouvert');
                    $(this).closest('html').removeClass('noscroll');
                    setTimeout(function(){
                        $('html, body').animate({
                            scrollTop: $(hash).offset().top
                        }, 900);
                    }, 900);
                }
                else {
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 900);
                }
            });
        };
        
        ///////////////////////////////////////////////////////
        /* FUNCTION PARALLAX */
        ///////////////////////////////////////////////////////
        
        const presets_parallax = {
            fromB : {
                'property'  : ['opacity','transform'],
                'start'     : ['0','translateY(100%)'],
                'end'       : ['1','translateY(0%)']
            },
            fromB50 : {
                'property'  : ['opacity','transform'],
                'start'     : ['0','translateY(50%)'],
                'end'       : ['1','translateY(0%)']
            },
            fromB25 : {
                'property'  : ['opacity','transform'],
                'start'     : ['0','translateY(25%)'],
                'end'       : ['1','translateY(0%)']
            },
            fromL : {
                'property'  : ['opacity','transform'],
                'start'     : ['0','translateX(-100%)'],
                'end'       : ['1','translateX(0%)']
            },
            fromL50 : {
                'property'  : ['opacity','transform'],
                'start'     : ['0','translateX(-50%)'],
                'end'       : ['1','translateX(0%)']
            },
            fromL25 : {
                'property'  : ['opacity','transform'],
                'start'     : ['0','translateX(-25%)'],
                'end'       : ['1','translateX(0%)']
            },
            fromR : {
                'property'  : ['opacity','transform'],
                'start'     : ['0','translateX(100%)'],
                'end'       : ['1','translateX(0%)']
            },
            fromR50 : {
                'property'  : ['opacity','transform'],
                'start'     : ['0','translateX(50%)'],
                'end'       : ['1','translateX(0%)']
            },
            fromR25 : {
                'property'  : ['opacity','transform'],
                'start'     : ['0','translateX(25%)'],
                'end'       : ['1','translateX(0%)']
            },
            fadeIn : {
                'property'  : ['opacity'],
                'start'     : ['0'],
                'end'       : ['1']
            },
            fadeOut : {
                'property'  : ['opacity'],
                'start'     : ['1'],
                'end'       : ['0']
            },
            zoomIn : {
                'property'  : ['opacity','transform'],
                'start'     : ['0','scale(0)'],
                'end'       : ['1','scale(1)']
            },
            zoomIn50 : {
                'property'  : ['opacity','transform'],
                'start'     : ['0','scale(0.5)'],
                'end'       : ['1','scale(1)']
            },
            zoomOut : {
                'property'  : ['opacity','transform'],
                'start'     : ['1','scale(1)'],
                'end'       : ['0','scale(2)']
            },
            zoomOut50 : {
                'property'  : ['opacity','transform'],
                'start'     : ['1','scale(1)'],
                'end'       : ['0','scale(1.5)']
            }
        };
        
        function parallax() {
            $('.parallax').each(function () {
                
                // Récupération des data utiles
                
                var elem = $(this),
                    elemTop = $(this).offset().top,
                    elemHeight = $(this).outerHeight(),
                    startOffset = 0,
                    endOffset = 100,
                    anchor = false;
                
                // Récupération des valeurs de l'animation dans le HTML ou du preset d'animation
                
                if (elem.data('preset') != undefined) {
                    
                    var preset = elem.data('preset'),
                        property = presets_parallax[preset].property,
                        startVal = presets_parallax[preset].start,
                        endVal = presets_parallax[preset].end;
                    
                } else {
                    var property = elem.data('css').toString().split(","),
                        startVal = elem.data('start').toString().split(","),
                        endVal = elem.data('end').toString().split(",");
                }
                
                // Récupération des propriétés CSS

                if (elem.attr('off-start') != undefined) {
                    startOffset = elem.attr('off-start');
                }
                
                // Offset de début

                if (elem.attr('off-start') != undefined) {
                    startOffset = elem.attr('off-start');
                }
                
                // Offset de fin
                
                if (elem.attr('off-end') != undefined) {
                    endOffset = elem.attr('off-end');
                }
                
                // Attribution d'un Anchor
                
                if (elem.data('anchor') != undefined) {
                    anchor = elem.data('anchor');
                    elemTop = $(anchor).offset().top;
                    elemHeight = $(anchor).outerHeight();
                }
                
                // Responsive utilities

                if (elem.data('stop') != undefined) {
                    var stopBpValue = elem.data('stop');
                }
                if (stopBpValue) {
                    if (window.matchMedia("(min-width:" + stopBpValue + "px)").matches) {
                        parallaxScroll(elem, elemHeight, elemTop, property, startVal, endVal, startOffset, endOffset, anchor);
                    }
                } else {
                    parallaxScroll(elem, elemHeight, elemTop, property, startVal, endVal, startOffset, endOffset, anchor);
                }
            });
        }

        function parallaxScroll(element, elementHeight, elementTop, cssProperty, startValues, endValues, offStart, offEnd, anchorElement) {
            var windowHeight = $(window).height(),
                valuesTab = new Array(),
                regex = /[+-]?\d+(\.\d+)?/g,
                i;
            for (i = 0; i < cssProperty.length; i++) {
                var property = cssProperty[i],
                    startFull = startValues[i],
                    endFull = endValues[i],
                    splitUnits = endFull.split(regex),
                    units = splitUnits[splitUnits.length - 1],
                    chaine_start = splitUnits[0],
                    startVal = startFull.match(regex).map(function (v) {
                        return parseFloat(v);
                    }),
                    endVal = endFull.match(regex).map(function (v) {
                        return parseFloat(v);
                    }),
                    anchor = anchorElement;
                var object = {
                    chaine0: chaine_start,
                    start: startVal[0],
                    end: endVal[0],
                    css: property,
                    units: units,
                    delta: (endVal - startVal) / (offEnd - offStart)
                };
                valuesTab.push(object);
            }
            if (elementTop < windowHeight) {
                var startScroll = offStart * elementHeight / 100;
                var endScroll = elementTop + offEnd * elementHeight / 100;
            } else {
                var init = elementTop - windowHeight;
                var end = elementTop + elementHeight;
                var startScroll = elementTop - windowHeight + offStart * (end - init) / 100;
                var endScroll = elementTop - windowHeight + offEnd * (end - init) / 100;
            }
            
            apply_parallax_values(element,elementTop,elementHeight,startScroll,offStart,endScroll,valuesTab)
            
            $(window).on('scroll', function () {
                apply_parallax_values(element,elementTop,elementHeight,startScroll,offStart,endScroll,valuesTab);
            });
        };
        
        function apply_parallax_values(element,elementTop,elementHeight,startScroll,offStart,endScroll,valuesTab) {
            var scrollPos = $(window).scrollTop(),
                i;
            if (elementTop < windowHeight) {
                var percent = (scrollPos) / (elementHeight) * 100;
            } else {
                var percent = (scrollPos - elementTop + windowHeight) / (elementHeight + windowHeight) * 100;
            }
            if (scrollPos > startScroll && scrollPos < endScroll) {
                for (i = 0; i < valuesTab.length; i++) {
                    element.css(
                        valuesTab[i].css, (valuesTab[i].chaine0 + (valuesTab[i].start + percent * valuesTab[i].delta - valuesTab[i].delta * offStart) + valuesTab[i].units)
                    )
                }
            }
            if (scrollPos < startScroll) {
                for (i = 0; i < valuesTab.length; i++) {
                    element.css(
                        valuesTab[i].css, (valuesTab[i].chaine0 + valuesTab[i].start + valuesTab[i].units)
                    )
                }
            }
            if (scrollPos > endScroll) {
                for (i = 0; i < valuesTab.length; i++) {
                    element.css(
                        valuesTab[i].css, (valuesTab[i].chaine0 + valuesTab[i].end + valuesTab[i].units)
                    )
                }
            }
        }
        
        ///////////////////////////////////////////////////////
        /* ANIMATION AU CHARGEMENT DU SITE */
        ///////////////////////////////////////////////////////
        
        function Animation() {
            setTimeout(function(){
                $('body').removeClass('inactive');
            }, 500);
        }
        
        
        ///////////////////////////////////////////////////////
        /* GESTION OUVERTURE / FERMETURE MENU + GESTION ITEM ACTIVE */
        ///////////////////////////////////////////////////////
        
        function menu() {
            $('[data-action=open_nav]').on('click', function() {
                $(this).closest('nav').toggleClass('open');
            });
            $('[data-action=close_nav]').on('click', function() {
                $(this).closest('nav').removeClass('open');
            });
            
            var offsetHeight = windowHeight / 4;
            
            $('[data-action=section]').each(function(index)
            {
                var element = $(this),
                    idItem = element.attr("id"),
                    idPrevItem = element.prev().attr("id");
                
                activeNavItem(element,offsetHeight,idItem,idPrevItem);
                
                $(window).on('scroll',function() {
                    activeNavItem(element,offsetHeight,idItem,idPrevItem);
                });
            });
        };
        
        function activeNavItem(element,offest_height,id_item,id_prev_item) {
            
            if($(window).scrollTop() + (windowHeight - offest_height) > element.offset().top) {
                $("." + id_item).addClass("active");
                $("." + id_prev_item).removeClass("active");
            } 
            else 
            {
                $("." + id_item).removeClass("active");
            }
        }
        
        ///////////////////////////////////////////////////////
        /* STICKY ELEMENT */
        ///////////////////////////////////////////////////////

        function stickyElement() {
            var element = $('[data-action=shrink]');
                
            stickyChecker(element);

            $(window).on('scroll',function() {
                stickyChecker(element);
            });
        }
        
        function stickyChecker(element) {
            var scrollLevel = $(window).scrollTop();
            
            if(scrollLevel >= 100)
            {
                element.addClass('sticky-active');
            }
            else
            {
                element.removeClass('sticky-active');
            }
        }
        
        ///////////////////////////////////////////////////////
        /* SCROLL PROGRESS BAR */
        ///////////////////////////////////////////////////////

        function progressBar() {
            var element = $('[data-action=scroll_level]'),
                domHeight = $(document).outerHeight(),
                scrollOffset = domHeight - windowHeight;
                
            progressBarChecker(element, scrollOffset);

            $(window).on('scroll',function() {
                progressBarChecker(element, scrollOffset);
            });
        }
        
        function progressBarChecker(element, scroll_offset) {
            
            var scrollLevel = $(window).scrollTop(),
                percent = 75 * (scrollLevel * 100 / scroll_offset) / 100;
            element.css('height', (75 - percent)+"%");
        }
        
        ///////////////////////////////////////////////////////
        /* INITIALISATION DES SLIDERS */
        ///////////////////////////////////////////////////////
        
        function sliders() {
            var slideshow = $('#slideshow'),
                settings = {
                    infinite: false,
                    arrows: true,
                    dots: false,
                    speed: 500,
                    fade: false,
                    slidesToShow: 2.52,
                    slidesToScroll: 1,
                    swipe: true,
                    draggable:false,
                    prevArrow: '#prev_button',
                    nextArrow: '#next_button',
                    responsive: [
                        {
                          breakpoint: 760,
                          settings: {
                            slidesToShow: 1,
                            edgeFriction:0.05,
                            speed:200
                          }
                        }
                    ]
                };
                slideshow.slick(settings);
        }
        
        ///////////////////////////////////////////////////////
        /* UTILITAIRES POUR LES MODALS */
        ///////////////////////////////////////////////////////

        function modal() {
            
            // Ouverture de la modal 
            $(document).on('click','[data-modal]', function(event){
                event.preventDefault();
                var target = $(this).data('modal');
                openModal(target,$(this));
            });

            // Fermeture de la modal
            $(document).on('click','.u-modal_close',function(){
                var modal = $('.u-modal.active .u-modal_box');
                closeModal(modal);
            });

            // Fermeture de la modal si un clic est réalisé en dehors de celle-ci (et qu'elle est active)
            $(document).on('click', function(event){
                var modal = $('.u-modal.active .u-modal_box');
                if(!$(event.target).closest('.u-modal_box').length) {
                    if($('.u-modal').hasClass('active')) {
                        closeModal(modal);
                    }
                }       
            });
        }

        // Fonction d'ouverture de la modal : on crée un conteneur, puis on y applique le contenu récupéré précédemment

        function openModal(modale,clickElement) {
            
            var video_id = clickElement.data('youtube-video');
            
            
            $('.u-modal').load('includes/modale.php', {video_id:video_id}, function(){
                setTimeout(function() {
                    $('.u-modal').addClass('active');
                }, 350);
            });
        }

        // Fonction de fermeture et suppression de la modale
        // Au passage : on réinclut dans le body le contenu de la modale pour pouvoir la réutiliser ultérieurement
        function closeModal(modale) {
            if($('.u-modal').find('[data-modal-video]').length)
            {
                $('.u-modal').find('[data-modal-video]').get(0).pause();
            }
            $('.u-modal').removeClass('active');
            setTimeout(function(){
                modale.remove();
            },1100);
        }
        
    });
})(jQuery);