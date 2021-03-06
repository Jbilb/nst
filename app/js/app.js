(function ($) {
    $(function () {

        var instance = $('body').overlayScrollbars({
            callbacks: {
                onScroll: function (eventArgs) {
                    var scroll = instance.scroll();
                    var scrollPosition = scroll.position.y;
                    navMasked(scrollPosition);
                    $(window).trigger('window-scroll', scrollPosition);
                },
            }
        }).overlayScrollbars();

        $(window).ready(function () {
            windowWidth = $(window).width();
            windowHeight = $(window).height();
            scrollPos = $(window).scrollTop();
            sliders();
            changeTextDoTS();
            dropdown();
            smoothScroll();
            menu();
            animation();
            modal();
            parallax();
            inputFile();
            navMasked();
            collapseBtn();
            if (window.matchMedia("(min-width:993px)").matches) {
                fixedElem();
            }
        });
        $(window).load(function () {
            add100Vh();
            woow();
            if (window.matchMedia("(min-width:993px)").matches) {
                scrollEtapeActive();
            }
        });

        $(window).resize(function () {
            windowWidth = $(window).width();
            windowHeight = $(window).height();
            add100Vh();
            sliders();
            changeTextDoTS();
        });

        ///////////////////////////////////////////////////////
        /* ETAPES */
        ///////////////////////////////////////////////////////


        function scrollEtapeActive() {
            var windowHeight = $(window).height();
            var windowHeightdiv2 = windowHeight / 2;

            $(".etape-part").each(function (index) {
                var elementPos = $(this).offset().top;
                var element = $(this);

                $(window).on('window-scroll', function (event, a) {
                    var scroll = a;

                    if (scroll + (windowHeight - windowHeightdiv2) > elementPos) {
                        var idCalcItem = $(element).data("part");
                        var elemenPrev = $(element).prev();
                        var img = $('.fixed-elem .img[data-part="' + idCalcItem + '"]');
                        img.addClass("active");
                        element.addClass("active");
                        elemenPrev.removeClass("active");
                        $(".fixed-elem").addClass(idCalcItem);
                        var idCalcItemPrev = $(element).prev().data("part");
                        $(".fixed-elem").removeClass(idCalcItemPrev);
                    } else if (scroll < windowHeight) {
                        var idCalcItem = $(element).data("part");
                        var img = $('.fixed-elem .img[data-part="' + idCalcItem + '"]');
                        element.removeClass("active");
                        img.removeClass("active");
                        $(".fixed-elem").removeClass(idCalcItem);
                    } else {
                        var idCalcItem = $(element).data("part");
                        var img = $('.fixed-elem .img[data-part="' + idCalcItem + '"]');
                        element.removeClass("active");
                        img.removeClass("active");
                        $(".fixed-elem").removeClass(idCalcItem);
                    }

                });

            })
        };

        ///////////////////////////////////////////////////////
        /* fixedElem */
        ///////////////////////////////////////////////////////

        function fixedElem() {
            var container = $(".fixed-elem-wrapper");
            if (container.length) {
                var elem = $(".fixed-elem");
                var elemHeight = $(elem).height();
                var addFixed = $(container).offset().top;
                var containerBottom = addFixed + $(container).outerHeight();
                var stopFixed = containerBottom - elemHeight;

                $(window).on('window-scroll', function (event, a) {
                    var scroll = a;
                    if (scroll > addFixed && scroll < stopFixed) {
                        elem.addClass("fixed");
                        elem.removeClass("absolute-end");
                    } else if (scroll > stopFixed) {
                        elem.addClass("absolute-end");
                    } else {
                        elem.removeClass("fixed");
                    }
                });
            }
        }

        ///////////////////////////////////////////////////////
        /* bouton collapse */
        ///////////////////////////////////////////////////////
        function collapseBtn() {

            $('.js-collapse-content').each(function () {
                $(this).css("display", "none");
            });

            $('.js-collapse').on('click', function () {
                var bouton = this;
                var wrapper = bouton.closest('.js-collapse-wrapper');
                var blocTextId = $('.js-collapse-content', wrapper);

                $(bouton).toggleClass('open');
                if ($(this).hasClass('js-collapse-hidden')) {
                    $(bouton).css("pointer-events", "none");
                    $(bouton).animate({
                        opacity: 0,
                        height: 0,
                    }, 300);
                }
                $(blocTextId).slideToggle(300, function () {});
                $(wrapper).toggleClass('open');
                $(blocTextId).toggleClass('open');
            });
        }

        ///////////////////////////////////////////////////////
        /* Real 100 vh */
        ///////////////////////////////////////////////////////

        // En css var(--heightJs) pour r??cup??rer la valeur
        function add100Vh() {
            var height = windowHeight + "px";
            $('.heightJs').each(function () {
                $(this).get(0).style.setProperty("--heightJs", height);
            });
        };


        ///////////////////////////////////////////////////////
        /* NAV */
        ///////////////////////////////////////////////////////
        function navMasked(scrollPosition) {
            var headerHeight = $('#header').height();
            var headerHeightBy2 = headerHeight - (headerHeight - 100);

            if (scrollPosition > headerHeightBy2) {
                $('.p-nav').removeClass('masked');
            } else {
                $('.p-nav').addClass('masked');
            }
        }

        ///////////////////////////////////////////////////////
        /* SMOOTHSCROLL */
        ///////////////////////////////////////////////////////

        function smoothScroll() {
            $(".scroll").on('click', function (event) {
                event.preventDefault();
                var hash = this.hash;
                instance.scroll($(hash), 800, undefined, function () {});
            });
        };

        ///////////////////////////////////////////////////////
        /* GESTION OUVERTURE / FERMETURE MENU */
        ///////////////////////////////////////////////////////

        function menu() {

            $('.js-modal').on('click', function (event) {
                event.stopPropagation();
                var elemNav = $('.p-nav');
                var elemMenu = $('.p-menu');
                var elemRestaurants = $('.c-restaurants');
                var elemReservez = $('.c-reservez');
                var elemHtml = $('html');
                var elemBarreScroll = $('.os-scrollbar-handle');
                var data = $(this).data("modal");

                if (elemMenu.hasClass('ouvert') || elemRestaurants.hasClass('ouvert') || elemReservez.hasClass('ouvert')) {
                    if (data === "js-restaurants") {
                        elemRestaurants.addClass('ouvert');
                        elemNav.addClass('ouvert');
                    } else if (data === "js-reservez") {
                        elemReservez.addClass('ouvert');
                        elemNav.addClass('ouvert');
                    } else {
                        if (elemMenu.hasClass('ouvert')) {
                            elemMenu.removeClass('ouvert');
                        }
                        if (elemRestaurants.hasClass('ouvert')) {
                            elemRestaurants.removeClass('ouvert');
                        }
                        if (elemReservez.hasClass('ouvert')) {
                            elemReservez.removeClass('ouvert');
                        }
                        elemNav.removeClass('ouvert');
                        $(this).removeClass('ouvert');
                        elemBarreScroll.removeClass('menuOpen');
                        elemHtml.removeClass('noscroll');
                    }
                } else {
                    elemBarreScroll.addClass('menuOpen');
                    elemHtml.addClass('noscroll');

                    if (data === "js-restaurants") {
                        elemRestaurants.addClass('ouvert');
                        elemNav.addClass('ouvert');
                    } else if (data === "js-reservez") {
                        elemReservez.addClass('ouvert');
                        elemNav.addClass('ouvert');
                    } else {
                        $(this).addClass('ouvert');
                        elemNav.addClass('ouvert');
                        elemMenu.addClass('ouvert');
                    }

                }
            });

        };

        ///////////////////////////////////////////////////////
        /* EFFET DE PARALLAXE */
        ///////////////////////////////////////////////////////

        function parallax() {
            $('.parallax').each(function () {
                var elem = $(this);
                var property = $(this).data('css').toString().split(",");
                var startVal = $(this).data('start').toString().split(",");
                var endVal = $(this).data('end').toString().split(",");
                var elemTop = $(this).offset().top;
                var elemHeight = $(this).outerHeight(),
                    startOffset = 0,
                    endOffset = 100,
                    anchor = false;

                if ($(this).attr('off-start') != undefined) {
                    startOffset = $(this).attr('off-start');
                }
                if ($(this).attr('off-end') != undefined) {
                    endOffset = $(this).attr('off-end');
                }
                if ($(this).data('anchor') != undefined) {
                    anchor = $(this).data('anchor');
                    elemTop = $(anchor).offset().top;
                    elemHeight = $(anchor).outerHeight();
                }

                if ($(this).data('stop') != undefined) {
                    var stopBpValue = $(this).data('stop');
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

            $(window).on('window-scroll', function (event, a) {
                var scrollPos = a;
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

            });
        };


        ///////////////////////////////////////////////////////
        /* FUNCTION WOW.JS MAISON */
        ///////////////////////////////////////////////////////

        function woow() {
            var woow = $('.woow');
            var scrollPosition = $(window).scrollTop();
            var vh = $(window).outerHeight();
            woow.each(function () {
                // Initialisation des Param??tres
                var paramToggle = false;
                var paramOffset = 80;
                var elPosition = $(this).offset().top;
                // Param??tre Offset
                if ($(this).data('woow-offset')) {
                    paramOffset = $(this).data('woow-offset');
                }

                paramOffset = ((vh * paramOffset) / 100);
                elPosition = elPosition - paramOffset;

                // Param??tre Toggle
                if ($(this).data('woow-toggle')) {
                    paramToggle = true;
                }
                // Scroll prevent reload or goback
                if (scrollPosition > elPosition) {
                    $(this).addClass("animated");
                } else if (paramToggle) {
                    if (scrollPosition < elPosition) {
                        $(this).removeClass("animated");
                    }
                }
                // Scroll event
                woowScroll($(this), elPosition, paramToggle);
            });
        };

        function woowScroll(element, elementPosition, paramToggle) {
            var verifScroll = false;

            $(window).on('window-scroll', function (event, a) {
                var scrollPosition = a;
                if (scrollPosition > 1 && verifScroll === false) {
                    verifScroll = true;
                    element.addClass("masked");
                }
                if (scrollPosition > elementPosition) {
                    element.removeClass("masked");
                } else if (paramToggle) {
                    if (scrollPosition < elementPosition) {
                        element.addClass("masked");
                    }
                }

            });
        };
        ///////////////////////////////////////////////////////
        /* MODAL APRES FORMULAIRE */
        ///////////////////////////////////////////////////////

        function modal() {
            $(document).on('click', '.c-formulaire_overlay', function () {
                $(this).addClass('close');
                location.reload();
                setTimeout(function () {
                    $('.c-formulaire_overlay').remove();
                }, 1000);
            });
        };

        ///////////////////////////////////////////////////////
        /* ANIMATION AU CHARGEMENT DU SITE */
        ///////////////////////////////////////////////////////

        function animation() {

            // ========================================
            // *****  CHARGEMENT DU SITE 
            // ========================================

            if ($(".c-transition.first").length) {
                $.post("animation.php", {
                    animation: "none"
                });
                setTimeout(function () {
                    $(".c-transition").addClass('anim');
                }, 200);
                setTimeout(function () {
                    $(".c-transition").addClass('remove');
                }, 1200);
                setTimeout(function () {
                    $("#wrapper").removeClass('first');
                    $(".c-transition").addClass('under');
                }, 2100);
                setTimeout(function () {
                    $(".c-transition").removeClass('first anim remove');
                }, 2500);
            }
            return false;
        }


        ///////////////////////////////////////////////////////
        /* INITIALISATION DES SLIDERS */
        ///////////////////////////////////////////////////////

        function sliders() {
            var slider = $('[slider-etapes]'),
                settings = {
                    infinite: false,
                    arrows: false,
                    dots: true,
                    autoplay: false,
                    speed: 300,
                    fade: true,
                    draggable: false,
                    swipeToSlide: true,
                    appendDots: '[dots-etapes]',
                };
            $(slider).slick(settings);

            if (window.matchMedia("(max-width:993px)").matches) {

                slider.on('afterChange', function (event, slick, currentSlide, nextSlide) {
                    var i = currentSlide + 1;
                    var container = $('[dots-etapes]');
                    var positionMobile = container.data("mobile");
                    var puces = $('[dots-etapes] ul li.slick-active');
                    var dataPosition = $(puces).data("position");
                    var translateValue = dataPosition * positionMobile;

                    $(container).css({
                        "transform": "translate3d(-" + translateValue + "px, 0px, 0px)"
                    });

                });
            }
        }


        ///////////////////////////////////////////////////////
        /* CHANGE TEXTE DOTS SLIDER */
        ///////////////////////////////////////////////////////

        function changeTextDoTS() {

            var count = -1;
            var container = $('[dots-etapes]');
            var data_etapes = $('[dots-etapes]').data("etapes");
            var positionMobile = container.data("mobile");

            if (typeof data_etapes !== 'undefined') {
                var array_etapes = data_etapes.split(',');
                var puces = $('[dots-etapes] ul li');


                $(puces).each(function () {
                    count++;
                    $(this).attr('data-position', count);
                });

                for (var i = 0; i < puces.length; i++) {
                    var item = puces[i];
                    $(item).html(array_etapes[i]);
                }

                if (window.matchMedia("(max-width:993px)").matches) {

                    console.log(puces);
                    $(puces).on('click', function (event) {
                        event.preventDefault();
                        var dataPosition = $(this).data("position");
                        var translateValue = dataPosition * positionMobile;
                        $(container).css({
                            "transform": "translate3d(-" + translateValue + "px, 0px, 0px)"
                        });
                    });
                }

            }


        };

        ///////////////////////////////////////////////////////
        /* CREATION SELECT PERSONNALISE (DROPDOWN) */
        ///////////////////////////////////////////////////////

        function dropdown() {
            $(document).on('click', '.dropdown-toggle-btn', function (event) {
                event.preventDefault();
                $('.dropdown-toggle').removeClass('open');
                $(this).closest('.dropdown-toggle').toggleClass('open');
                $(document).on('click', function (event) {
                    if (!$(event.target).closest('.dropdown-toggle').length) {
                        if ($('.dropdown-toggle').hasClass('open')) {
                            $('.dropdown-toggle').removeClass('open');
                        }
                    }
                });
            });

            $(document).on('click', 'ul.dropdown button', function (event) {
                event.preventDefault();
                var valeur = $(this).attr('data-value');
                var texte = $(this).text();
                $(this).closest('.dropdown-toggle').find('input').val(valeur);
                $(this).closest('.dropdown-toggle').toggleClass('open');
                $(this).closest('.dropdown-toggle').find('.dropdown-toggle-btn').find('span.txt').text(texte);
                $(this).closest('.dropdown-toggle').find('.dropdown-toggle-btn').addClass('focus');
                $(this).closest('.dropdown-toggle').find('input').trigger("change");
            });
        }

        ///////////////////////////////////////////////////////
        /* INPUT FILE PERSONNALISE */
        ///////////////////////////////////////////////////////

        function inputFile() {
            $('.c-formulaire_file').each(function () {
                var element = $(this),
                    fileName = element.find('label span'),
                    inputElement = element.find('input[type=file]');
                if (element.hasClass('multiple')) {
                    inputElement.on('change', function () {
                        var filesNumber = inputElement[0].files.length;
                        if (filesNumber > 1) {
                            fileName.html(filesNumber + ' ??l??ments s??lectionn??s.');
                        } else {
                            fileName.html(filesNumber + ' ??l??ment s??lectionn??.');
                        }
                    });
                } else {
                    inputElement.on('change', function () {
                        fileName.html(inputElement.get(0).files[0].name);
                    });
                }

            });
        }
    });
})(jQuery);