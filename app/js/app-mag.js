(function ($) {
    $(function () {
        $(window).ready(function () {
            windowWidth = $(window).width();
            windowHeight = $(window).height();
            sliders_mag();
//            dropdown();
            searchTags();
            filter_articles();
            formChecker();
        });
        
        
        ///////////////////////////////////////////////////////
        /* INITIALISATION DES SLIDERS */
        ///////////////////////////////////////////////////////
        
        function sliders_mag() {
            var galerieImage = $('.c-actu__gallery'),
                settings = {
                  infinite: true,
                  arrows: true,
                  dots: false,
                  autoplay: true,
                  speed: 700,
                  fade: false
                };
            $(galerieImage).slick(settings);
        }
        
        ///////////////////////////////////////////////////////
        /* CREATION SELECT PERSONNALISE (DROPDOWN) */
        ///////////////////////////////////////////////////////
        
//        function dropdown() {
//            $(document).on('click', '[data-dropdown-button]', function(event){
//                event.preventDefault();
//                $('[data-dropdown]').removeClass('open');
//                $(this).closest('[data-dropdown]').toggleClass('open'); 
//            });
//            
//            $(document).on('click', function(event){
//                if(!$(event.target).closest('[data-dropdown]').length) {
//                    if($('[data-dropdown]').hasClass('open')) {
//                        $('[data-dropdown]').removeClass('open');
//                    }
//                }       
//            });
//            
//            $(document).on('click', '[data-dropdown-list-button]', function(event){
//                event.preventDefault();
//                var valeur = $(this).attr('data-value');
//                var texte = $(this).text();
//                $(this).closest('[data-dropdown]').find('input[type=hidden]').val(valeur);
//                $(this).closest('[data-dropdown]').toggleClass('open'); 
//                $(this).closest('[data-dropdown]').find('[data-dropdown-button]').find('span.txt').text(texte); 
//                $(this).closest('[data-dropdown]').find('[data-dropdown-button]').addClass('focus'); 
//                $(this).closest('[data-dropdown]').find('input[type=hidden]').trigger("change");
//            });
//        }
        
        ///////////////////////////////////////////////////////
        /* RECHERCHER UN TAG */
        ///////////////////////////////////////////////////////

        function searchTags() {
            var tags_origin = $('[data-tags-list]').html(),
                tags_all = $('[data-tags-list]').find('button[data-switch]'),
                accentMap = {
                  "é": "e",
                  "è": "e",
                  "ê": "e",
                  "ë": "e",
                  "ö": "o",
                  "ô": "o",
                  "à": "a",
                  "â": "a",
                  "ù": "u",
                  "û": "u",
                  "ü": "u",
                  "ç": "c",
                  "É": "E",
                  "È": "E",
                  "Ê": "E",
                  "Ë": "E",
                  "Ö": "O",
                  "Ô": "O",
                  "À": "A",
                  "Â": "A",
                  "Ù": "U",
                  "Û": "U",
                  "Ü": "U",
                  "Ç": "C"
                };
            
            // Fonction de normalisation de la requête
            var normalize = function( term ) {
                var ret = "";
                for ( var i = 0; i < term.length; i++ ) {
                    ret += accentMap[ term.charAt(i) ] || term.charAt(i);
                }
                return ret;
            };
            
            
            $('[data-filter-tags]').on('keyup',function(){
                
                // Normalisation de la requête
                var request = normalize($(this).val().toString());
                request = request.replace(/[?/\!,.":%€$()\']/g,'');
                request = request.replace(/[\s]/g,'');
                request = request.toLowerCase();
                
                // Si la requête est vide, affichage de la liste d'origine
                if(!request.length) {
                    $('[data-tags-list]').html(tags_origin);
                }
                // Sinon, application du filtre
                else
                {
                    var tags_to_display = [];
                    tags_all.each(function(){
                        var slug = $(this).data('slug').toString();
                        if(slug.indexOf(request) > -1)
                        {
                            tags_to_display.push($(this));
                        }
                    });
                    $('[data-tags-list]').html(tags_to_display);
                    if(!tags_to_display.length)
                    {
                        $('[data-tags-list]').html('<p class="c-form-sort_list_notags">Aucun tag ne correspond à votre recherche.</p>');
                    }
                }
            });
        }
        
        ///////////////////////////////////////////////////////
        /* FILTRER LES ARTICLES */
        ///////////////////////////////////////////////////////

        function filter_articles() {
            
            // On affiche que 9 items au start
            hideCards($('[data-article]'),9);

            // Bouton pour charger plus de cards
            $(document).on('click','[data-show-cards]', function () {
                showCards($('[data-article].inactive'),3);
            });
            
            // *** Ouverture des sous-menus
            
            var buttons_select = $('[data-target]'),
                submenus = $('[data-submenu]'),
                main_wrapper = $('#main_content');
            
            buttons_select.on('click',function(){
                var target = $(this).data('target'),
                    submenu = $('[data-submenu='+target+']'),
                    button = $(this);
                
                    submenus.removeClass('active');
                    buttons_select.removeClass('active');
                    submenu.addClass('active');
                    $(this).addClass('active');
                    main_wrapper.addClass('overlay');
            });
            
            // *** Fermer les selecteurs si clic en dehors de ceux-ci
            
            $(document).on('click',function(event){
                if(!$(event.target).closest('[data-submenu]').length && !$(event.target).closest('[data-target]').length) {
                    submenus.removeClass('active');
                    buttons_select.removeClass('active');
                    main_wrapper.removeClass('overlay');
                }
            });
            
            // *** Sélectionner un tag / une catégorie
            
            $(document).on('click', '[data-switch]', function(){
                var button = $(this),
                    type = button.data('type'),
                    slug = button.data('slug');
                
                // *** Suppression class active sur tous les boutons
                button.closest('[data-submenu]').find('[data-switch]').removeClass('active');
                
                // *** Ajout class active sur bouton cliqué
                button.addClass('active');
                
                // *** Suppression de l'overlay sur le wrapper
                main_wrapper.removeClass('overlay');
                
                // *** Attribution de la valeur
                var button_to_update = button.closest('[data-filter]').find('[data-target='+type+']'),
                    current_value = button_to_update.attr('data-value');
                
                // On ne charge les articles que s'il y a un changement de valeur
                if(current_value !== slug)
                {
                    button_to_update.attr('data-value',slug).find('[data-text]').html(button.html());
                    load_articles();
                }
                // Sinon, on referme les menus
                else 
                {
                    submenus.removeClass('active');
                    buttons_select.removeClass('active');
                }
            });
            
            // *** Réinitialisation des articles
            
            $('[data-reinit]').on('click',function(){
                var form = $('[data-filter]'),
                    categorie = form.find('[data-target=categories]'),
                    tag = form.find('[data-target=tags]');
                
                if(!categorie.attr('data-value') && !tag.attr('data-value'))
                {
                    return;
                }
                
                // *** Suppression class active sur tous les boutons
                categorie.attr('data-value','').find('[data-text]').html('Catégories');
                tag.attr('data-value','').find('[data-text]').html('Tags');
                
                $('[data-switch]').removeClass('active');
                
                load_articles();
            });
        }
        
        ///////////////////////////////////////////////////////
        /* CHARGER LES ARTICLES EN AJAX */
        ///////////////////////////////////////////////////////

        function load_articles() {
            
            // *** Masque le bouton "afficher plus"
            toggleButtonShowMore($('[data-article]'),true);
            
            // *** Récupération des données utiles
            var form = $('[data-filter]'),
                categorie = form.find('[data-target=categories]').attr('data-value'),
                tag = form.find('[data-target=tags]').attr('data-value'),
                wrapper = $('[data-articles-container]'),
                articles = wrapper.find('[data-article]'),
                newUrl = "mag/";
            
            // Création de la nouvelle URL
            if(categorie && tag) {
                newUrl += categorie+"/"+tag+"/";
            }
            else
            {
                if(categorie) {
                    newUrl += categorie+"/";
                }
                if(tag) {
                    newUrl += tag+"/";
                }
            }
            
            // On masque tous les articles
            articles.addClass('inactive');
            
            form.find('button[data-target]').removeClass('active');
            form.find('[data-submenu]').removeClass('active');
            
            // On lance une requête en AJAX pour récupérer la nouvelle liste des articles
            $.ajax({
                type: "POST",
                url: "ajax/get_articles.php",
                data: {
                    slug_categorie : categorie,
                    slug_tag : tag
                },
                success: function (data) {
                    setTimeout(function(){
                        wrapper.html(data);
                        window.history.replaceState({}, document.title, newUrl);
                        setTimeout(function(){
                            showCards($('[data-article].inactive'),9);
                        },100);
                    },250);
                    
                },
                error:function(data) {
                    console.log(data);
                }
            });
        }
        
        function hideCards(elements,max) {
            var countCards = 0;
            elements.each(function () {
                countCards++;
                var element = $(this);
                if (countCards > max) {
                    element.addClass('inactive');
                }
            });
            toggleButtonShowMore(elements);
        }
        
        function showCards(elements,max) {
            var countCards = 0;
            elements.each(function () {
                var element = $(this);
                if (countCards < max) {
                    element.removeClass('inactive').addClass('active');
                }
                else
                {
                    return;
                }
                countCards++;
            });
            toggleButtonShowMore(elements);
        }
        
        function toggleButtonShowMore(elements,hide) {
            hide = hide || false;
            if(hide)
            {
                $('[data-show-cards]').addClass('hidden');
                return;
            }
            if(!$('[data-article].inactive').length)
            {
                $('[data-show-cards]').addClass('hidden');
            }
            else
            {
               setTimeout(function(){
                   $('[data-show-cards]').removeClass('hidden');
               },500);
            }
        }
        
        
        ///////////////////////////////////////////////////////
        /* VERIFICATIONS DE FORMULAIRE */
        ///////////////////////////////////////////////////////
        
        function formChecker()
        {
            $("button[data-form-checker]").on('click', function(event) {
                
                var form = $(this).closest('form'),
                    formState = true;

                form.find('input,textarea,select').each(function(){
                    var elem_input = $(this),
                        name = elem_input.attr('name');
                        name = name.replace("][","--");
                        name = name.replace("]","--");
                        name = name.replace("[","--");
                    
                        var name_array = name.split('--');
                    if(name_array[0] !== undefined) {
                        switch (name_array[0]) {
                            case 'required':
                                var required_state = checkRequired(elem_input);
                                if(!required_state) {
                                    formState = false;
                                }
                                break;
                            case 'alphanum':
                            case 'mail':
                                var format_state = checkFormat(elem_input,name_array[0]);
                                if(!format_state) {
                                    formState = false;
                                }
                                break;
                            default:
                                break;
                        }
                    }

                    if(name_array[1] !== undefined && formState) {
                        switch (name_array[1]) {
                            case 'alphanum':
                            case 'mail':
                                var format_state = checkFormat(elem_input,name_array[1]);
                                if(!format_state) {
                                    formState = false;
                                }
                                break;
                            default:
                                break;
                        }
                    }
                });
                
                // Si toutes les conditions sont bien remplies on envoie le formulaire
                if (formState) {

                    // Affichage du loader lors du submit
                    function anim() {
                        setTimeout(function () {
                            $(form).closest('.c-form-comment').append("<div class='c-form-comment_overlay close'><div class='c-form-comment_overlay_text'></div></div>");
                            setTimeout(function () {
                                $('.c-form-comment_overlay').removeClass('close');
                            },100);
                        }, 200);
                    }

                    // Requete Ajax

                    $.ajax({
                        type: "POST",
                        url: $(form).attr("action"),
                        data: $(form).serialize(),
                        success: function () {
                            anim();
                            setTimeout(function () {
                                $('.c-form-comment_overlay_text').html("<p>Merci pour votre commentaire, celui-ci apparaitra après validation d'un modérateur.</p>").addClass('active');
                            }, 500);
                        },
                        error: function () {
                            anim();
                            setTimeout(function () {
                                $('.c-form-comment_overlay_text').html("<p>Une erreur est survenue,<br> merci de rafraichir la page</p>").addClass('active');
                            }, 500);
                        }
                    });
                   
                }
                return false;
            }); 
        }

        // Vérification des éléments requis
        function checkRequired(element) {
            var value = element.val(),
                message = element.data('required'),
                parent = element.closest('.form-checker');
            if(value == "") 
            {
                parent.addClass('error').attr('data-message', message);
                return false;
            }
            else if(element.attr('type') == "checkbox") 
            {
                if(!element.is(':checked'))
                {
                    parent.addClass('error').attr('data-message', message);
                    return false;
                }
                else
                {
                    parent.removeClass('error');
                    return true;
                }
            }
            else 
            {
                parent.removeClass('error');
                return true;
            }
        }

        // Vérification des formats de données
        function checkFormat(element,format) {

            var value = element.val(),
                parent = element.closest('.form-checker'),

                PATTERN_alphanum        = /^[A-Za-z0-9' èéàùçâêûôîäüöïë,-.\/()!?:\";*+]*$/,
                PATTERN_TITLE_alphanum  = "Seul les lettres, les chiffres et les espaces sont autorisés",

                PATTERN_email           = /^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$/,
                PATTERN_TITLE_email     = "L\'email doit être écrit au format contact@exemple.com";

            if(value == "" || value == undefined)
            {
                parent.removeClass('error');
                return true;
            }

            switch (format) {
                case 'alphanum':
                    if (!PATTERN_alphanum.test(value)) 
                    {
                        parent.addClass('error').attr('data-message', PATTERN_TITLE_alphanum);
                        return false;
                    }
                    else 
                    {
                        parent.removeClass('error');
                        return true;
                    }
                    break;
                case 'mail':
                    if (!PATTERN_email.test(value))
                    {
                        parent.addClass('error').attr('data-message', PATTERN_TITLE_email);
                        return false;
                    }
                    else 
                    {
                        parent.removeClass('error');
                        return true;
                    }
                    break;
                default:
                    return true;
            }
        }
        
    });
})(jQuery);