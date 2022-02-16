/**
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var CURRENT_URL = window.location.href.split('#')[0].split('_')[0].split('?msgsystem')[0].split('&msgsystem')[0].split('&id')[0].split('&action')[0];
    $BODY = $('body'),
    $MENU_TOGGLE = $('#menu_toggle'),
    $SIDEBAR_MENU = $('#sidebar-menu'),
    $SIDEBAR_FOOTER = $('.sidebar-footer'),
    $LEFT_COL = $('.left_col'),
    $RIGHT_COL = $('.right_col'),
    $NAV_MENU = $('.nav_menu'),
    $FOOTER = $('footer');

//******************************************************************************
// Sidebar
//******************************************************************************

$(document).ready(function() {
    // TODO: This is some kind of easy fix, maybe we can improve this
    var setContentHeight = function () {
        // reset height
        $RIGHT_COL.css('min-height', $(window).height());

        var bodyHeight = $BODY.outerHeight(),
            footerHeight = $BODY.hasClass('footer_fixed') ? -10 : $FOOTER.height(),
            leftColHeight = $LEFT_COL.eq(1).height() + $SIDEBAR_FOOTER.height(),
            contentHeight = bodyHeight < leftColHeight ? leftColHeight : bodyHeight;

        // normalize content
        contentHeight -= $NAV_MENU.height() + footerHeight + 26;

        $RIGHT_COL.css('min-height', contentHeight);
    };

    $SIDEBAR_MENU.find('a').on('click', function(ev) {
        var $li = $(this).parent();

        if ($li.is('.active')) {
            $li.removeClass('active active-sm');
            $('ul:first', $li).slideUp(function() {
                setContentHeight();
            });
        } else {
            // prevent closing menu if we are on child menu
            if (!$li.parent().is('.child_menu')) {
                $SIDEBAR_MENU.find('li').removeClass('active active-sm');
                $SIDEBAR_MENU.find('li ul').slideUp();
            }
            
            $li.addClass('active');

            $('ul:first', $li).slideDown(function() {
                setContentHeight();
            });
        }
    });

    // toggle small or large menu
    $MENU_TOGGLE.on('click', function() {
        if ($BODY.hasClass('nav-md')) {
            $SIDEBAR_MENU.find('li.active ul').hide();
            $SIDEBAR_MENU.find('li.active').addClass('active-sm').removeClass('active');
        } else {
            $SIDEBAR_MENU.find('li.active-sm ul').show();
            $SIDEBAR_MENU.find('li.active-sm').addClass('active').removeClass('active-sm');
        }

        $BODY.toggleClass('nav-md nav-sm');

        setContentHeight();
    });

    // check active menu
    $SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('current-page');

    $SIDEBAR_MENU.find('a').filter(function () {
        return this.href == CURRENT_URL;
    }).parent('li').addClass('current-page').parents('ul').slideDown(function() {
        setContentHeight();
    }).parent().addClass('active');

    // recompute content when resizing
    $(window).smartresize(function(){  
        setContentHeight();
    });

    setContentHeight();

    // fixed sidebar
    if ($.fn.mCustomScrollbar) {
        $('.menu_fixed').mCustomScrollbar({
            autoHideScrollbar: true,
            theme: 'minimal',
            mouseWheel:{ preventDefault: true }
        });
    }
});


//******************************************************************************
// Panel toolbox
//******************************************************************************

$(document).ready(function() {
    $('.collapse-link').on('click', function() {
        var $BOX_PANEL = $(this).closest('.x_panel'),
            $ICON = $(this).find('i'),
            $BOX_CONTENT = $BOX_PANEL.find('.x_content');
        
        // fix for some div with hardcoded fix class
        if ($BOX_PANEL.attr('style')) {
            $BOX_CONTENT.slideToggle(200, function(){
                $BOX_PANEL.removeAttr('style');
            });
        } else {
            $BOX_CONTENT.slideToggle(200); 
            $BOX_PANEL.css('height', 'auto');  
        }

        $ICON.toggleClass('fa-chevron-up fa-chevron-down');
    });

    $('.close-link').click(function () {
        var $BOX_PANEL = $(this).closest('.x_panel');

        $BOX_PANEL.remove();
    });
});


//******************************************************************************
// Tooltip
//******************************************************************************

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip({
        container: 'body'
    });
});


//******************************************************************************
// Progressbar
//******************************************************************************

if ($(".progress .progress-bar")[0]) {
    $('.progress .progress-bar').progressbar();
}


//******************************************************************************
// NProgress
//******************************************************************************

if (typeof NProgress != 'undefined') {
    $(document).ready(function () {
        NProgress.start();
    });

    $(window).load(function () {
        NProgress.done();
    });
}


//******************************************************************************
// Accordion
//******************************************************************************

$(document).ready(function() {
    $(".expand").on("click", function () {
        $(this).next().slideToggle(200);
        $expand = $(this).find(">:first-child");

        if ($expand.text() == "+") {
            $expand.text("-");
        } else {
            $expand.text("+");
        }
    });
});


//******************************************************************************
// PNotify customisation
//******************************************************************************

PNotify.prototype.options.styling = "bootstrap3";
PNotify.prototype.options.buttons.sticker = false;
PNotify.prototype.options.buttons.closer_hover = false;
PNotify.prototype.options.delay = 3000;
PNotify.prototype.options.animate.animate = true;
PNotify.prototype.options.animate.in_class = "bounceInRight";
PNotify.prototype.options.animate.out_class = "bounceOutRight";
PNotify.prototype.options.animate_speed = 1000;


//******************************************************************************
// tinymce
//******************************************************************************

// Prevent Bootstrap dialog from blocking focusin with tinymce
$(document).on('focusin', function(e) {
  if ($(e.target).closest(".mce-window").length) {
    e.stopImmediatePropagation();
  }
});
$(document).ready(function () {
    tinyMCE.baseURL ='js/tinymce/';
    tinymce.init({
        selector: 'textarea.wysiwig'
        , entity_encoding : "raw"
        , encoding: "UTF-8"
        , language: 'fr_FR'
        , language_url: 'js/tinymce/lang/fr_FR.js'
        , themes: "modern"
        , skin: "lightgray"
        , height: 300
        , resize: false
        , menubar: false
        , plugins: [
            'autolink link'
            , 'code'
            , 'paste'
          ]
        , link_class_list: [
            {title: 'Opacité', value: 'opacity'},
          ]
        , toolbar: 'undo redo | bold italic | link | save | code'
        , force_br_newlines: true
        , force_p_newlines: false
        , forced_root_block: ''
        , paste_as_text: true
    });
});

//******************************************************************************
// Actualite
//******************************************************************************

$(document).ready(function () {
    $('button.delete-post').click(function () {
       var id = $(this).attr( "id");
        $('.modal-footer input#id').val(id);
    });
});

//**************************************************************************
// FONCTIONS POUR AJOUTER DES ITEMS / SUPPR / DRAG AND DROP
//**************************************************************************

(function($) {
    $(function() {
        $(document).ready(function(){
            RemoveItem();
            RemoveImgGallery();
            AddItem();
            dragAndDrop();
            galeriePreview();
            autocomplete();
            formChecker();
            modalTags();
            sousCategorieChecked();
            
            /* APERCU D'UNE IMAGE UPLOADEE + SUPPRESSION DE L'ANCIENNE IMAGE (SI EXISTANTE) */
            $(document).on('change','.input-file', function(event) {
                var reader = new FileReader(),
                    container = $(this).closest('.form-group').find('.apercu-image'),
                    old_file = $(this).closest('.uploadfile').find('input[type=hidden]');
                if(old_file.length) {
                    old_file.remove();
                }
                var nomImage = $(this).closest('.form-group').find('.nom-fichier');
                nomImage.html($(this).val());
                var output = container.find('.img-responsive');
                reader.onload = function(){
                    output.attr('src', reader.result);
                    container.addClass('image-masked');
                    setTimeout(function() {
                        container.addClass('image-unmasked').removeClass('image-masked');
                    }, 600);
                };
                reader.readAsDataURL(event.target.files[0]);
            });
            
            /* AFFICHAGE DE LA SOUS CATEGORIE APRES AVOIR CHOISI LA CATEGORIE */
    
            $('#choixCategorie').on('change',function () {
                var valeur = $(this).val();
                if($('#choixSousCategorie').hasClass('masked')) {
                    $('#choixSousCategorie').removeClass('masked').addClass('unmasked');
                }
                $('#choixSousCategorie select').each(function(){
                    $(this).addClass('masked').removeClass('unmasked').prop('disabled', true);
                });
                $('#' + valeur).removeClass('masked').addClass('unmasked').prop('disabled', false);
            });

            /* AJOUTER DES TAGS A UN ARTICLE */

            $('.add-item').on('click', function(){
                var container = $(this).closest('.addable').find('.addable_container');
                var contenu = container.find('.addable_items').html();
                var classes = container.find('.addable_items').attr('class');
                container.append('<div class="'+classes+'">'+contenu+'<span class="fa fa-trash red delete-item"></span></div>');
                autocomplete();
            });
            
            $(document).on('click','.delete-item', function(){
                $(this).closest('.addable_items').remove();
            });
        });
        
        function galeriePreview() {
            var imagesPreview = function(input, placeToInsertImagePreview) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (var i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<p class="img-galerie"><span class="img-wrapper"><img src="'+event.target.result+'" alt="" class="img-galerie"></span></p>')).appendTo(placeToInsertImagePreview);
                            
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                    placeToInsertImagePreview.addClass('image-masked');
                    setTimeout(function() {
                        placeToInsertImagePreview.addClass('image-unmasked').removeClass('image-masked');
                    }, 600);
                }

            };
            $(document).on('change','.input-galerie', function() {
                var container = $(this).closest('.form-group').find('.apercu-image');
                imagesPreview(this, container);
            });
        }
        function modifData(container) {
            var i = 0;
            container.find('.article-item').each(function() {
                i++;
                var item = $(this).find('.content');
                item.each(function(){
                    var itemName = $(this).attr('name');
                    itemName = itemName.replace(/\[(\d+)?\]/,'['+i+']');
                    $(this).attr('name', itemName);
                });
            });
        }

        function RemoveItem() {
            $(document).on('click', '.article-item .bouton.delete', function(event) {
                var container = $(this).closest('.x_panel.row').find('.sortable');
                $(this).closest('.article-item').remove();
                modifData(container);
            });
        }

        function RemoveImgGallery() {
            $(document).on('click', '.delete-img-galerie', function(event) {
                var container = $(this).closest('.img-galerie');
                var label = container.find('label').attr('for');
                var image = container.find('img').attr('src');
                $('#'+label).val(image);
                container.addClass('deleted');
                setTimeout(function(){
                    container.remove(); 
                },800);
            });
        }

        function AddItem() {
            $('.articleAddItem').on('click', function() {
                var container = $('#articleBody');
                var target = "#"+$(this).data('target'),
                    contenu = $(target).html(),
                    classes = $(target).attr('class'),
                    classes = classes.replace('hidden',''),
                    type = $(this).data('type');
                
                switch(type) {
                    case "title":
                    case "link":
                    case "video":
                    case "html":
                        $(target).clone().removeAttr('id').removeClass('hidden').appendTo(container);
                        modifData(container);
                        break;
                    case "text":
                        $(target).clone().removeAttr('id').removeClass('hidden').appendTo(container).find('textarea').addClass('wysiwig');
                        modifData(container);
                        tinyMCE();
                        break;
                    case "image":
                    case "cta":
                    case "pdf":
                        var i = $('#articleBody .article-item').length+1000;
                        var label = "ImageToUpload"+i;
                        $(target).clone().removeAttr('id').removeClass('hidden').appendTo(container).find('.label-file').attr('for',label).closest('.form-group').find('.input-file').attr('id',label);
                        modifData(container);
                        break;
                    case "galerie":
                        var i = $('#articleBody .article-item').length+1000;
                        var label = "GalerieToUpload"+i;
                        $(target).clone().removeAttr('id').removeClass('hidden').appendTo(container).find('.label-file').attr('for',label).closest('.form-group').find('.input-galerie').attr('id',label);
                        modifData(container);
                        break;
                }
            });
        }

        function dragAndDrop() {
            $(".sortable").sortable({
                revert: true,
                opacity:.5,
                start: function (e, ui) {
                    $(ui.item).find('textarea').each(function () {
                     tinymce.execCommand('mceRemoveEditor', false, $(this).attr('id'));
                    });
                },
                stop: function (e, ui) {
                    $(ui.item).find('textarea').each(function () {
                     tinymce.execCommand('mceAddEditor', true, $(this).attr('id'));
                    });
                    var container = $(this).closest('.x_panel.row').find('.sortable');
                    modifData(container);
                }
            });
        }
        function tinyMCE() {
            tinyMCE.baseURL ='js/tinymce/';
            tinymce.init({
                selector: 'textarea.wysiwig'
                , entity_encoding : "raw"
                , encoding: "UTF-8"
                , language: 'fr_FR'
                , language_url: 'js/tinymce/lang/fr_FR.js'
                , themes: "modern"
                , skin: "lightgray"
                , height: 300
                , resize: false
                , menubar: false
                , plugins: [
                    'autolink link'
                    , 'code'
                    , 'paste'
                  ]
                , link_class_list: [
                    {title: 'Opacité', value: 'opacity'},
                  ]
                , toolbar: 'undo redo | bold italic | link | save | code'
                , force_br_newlines: true
                , force_p_newlines: false
                , forced_root_block: ''
                , paste_as_text: true
            });
        }
        // Définition des accents à remplacer
        var accentMap = {
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
        function autocomplete() {
            
            // Fonction de normalisation de la requête
            var normalize = function( term ) {
                var ret = "";
                for ( var i = 0; i < term.length; i++ ) {
                    ret += accentMap[ term.charAt(i) ] || term.charAt(i);
                }
                return ret;
            };
            $.ajax({
                url:'ajax/get_tags.php',
                type: "POST",
                dataType: "json",
                cache: false,
                data: {
                    types : 1
                },
                success : function(data) {
                    data = $.map(data, function(objet){
                        return objet;
                    });
                    $('.js-autocomplete').autocomplete({
                        source: function( request, response ) {
                            var term = $.ui.autocomplete.escapeRegex(normalize(request.term)),
                                startsWithMatcher = new RegExp("^" + term, "i"),
                                startsWith = $.grep( data, function(value) {
                                    value = value.label || value.value || value;
                                    return startsWithMatcher.test(normalize(value));
                                });
                                var containsMatcher = new RegExp(term, "i"),
                                contains = $.grep( data, function(value) {
                                    return $.inArray(value, startsWith) < 0 && containsMatcher.test(
                                    normalize(value.label));
                                });
                            response(startsWith.concat(contains).slice(0,10));
                        },
                        position:{
                            my:"left top+10"
                        },
                        select: function (event, ui) {
                            $(this).val(ui.item.label);
                        }
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
        
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
                            case 'alpha':
                            case 'alphanum':
                            case 'num':
                            case 'url':
                            case 'mail':
                            case 'phone':
                            case 'date':
                            case 'image_large':
                            case 'image_normal':
                            case 'pdf':
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
                            case 'alpha':
                            case 'alphanum':
                            case 'num':
                            case 'url':
                            case 'mail':
                            case 'phone':
                            case 'date':
                            case 'image_large':
                            case 'image_normal':
                            case 'image_small':
                            case 'image_galerie':
                            case 'pdf':
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

                    form.submit();
                   
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

            var value = element.val().toLowerCase(),
                parent = element.closest('.form-checker'),

                PATTERN_num             = /^[0-9 ]*$/,
                PATTERN_TITLE_num       = "Seul les chiffres et les espaces sont autorisés",

                PATTERN_alpha           = /^[A-Za-z'’ èéàùçâêûôîäüöïë,-.]*$/,
                PATTERN_TITLE_alpha     = "Seul les lettres et les espaces sont autorisés",

                PATTERN_alphanum        = /^[A-Za-z0-9'’ èéàùçâêûôîäüöïë,-.\/()!?:\";*+&]*$/,
                PATTERN_TITLE_alphanum  = "Seul les lettres, les chiffres et les espaces sont autorisés",

                PATTERN_phone           = /^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$/,
                PATTERN_TITLE_phone     = "Merci de renseigner un numéro de téléphone valide",

                PATTERN_email           = /^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$/,
                PATTERN_TITLE_email     = "L\'email doit être écrit au format contact@exemple.com",

                PATTERN_url             = /^http(s)?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=])*$/,
                PATTERN_TITLE_url       = "Votre url doit être au format http(s)://www.votre-url.com",

                PATTERN_TITLE_file      = "L'extension de votre fichier n'est pas supportée.",
            
                PATTERN_date = /^[\d]{4}\-[\d]{2}\-[\d]{2}$/,
                PATTERN_date_alt = /^[\d]{2}\/[\d]{2}\/[\d]{4}$/,
                PATTERN_TITLE_date      = "Veuillez renseigner une date au format JJ/MM/AAAA";

            if(value == "" || value == undefined)
            {
                parent.removeClass('error');
                return true;
            }

            switch (format) {
                case 'alpha':
                    if (!PATTERN_alpha.test(value)) 
                    {
                        parent.addClass('error').attr('data-message', PATTERN_TITLE_alpha);
                        return false;
                    }
                    else 
                    {
                        parent.removeClass('error');
                        return true;
                    }
                    break;
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
                case 'num':
                    if (!PATTERN_num.test(value)) 
                    {
                        parent.addClass('error').attr('data-message', PATTERN_TITLE_num);
                        return false;
                    }
                    else 
                    {
                        parent.removeClass('error');
                        return true;
                    }
                    break;
                case 'url':
                    if (!PATTERN_url.test(value))
                    {
                        parent.addClass('error').attr('data-message', PATTERN_TITLE_url);
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
                case 'phone':
                    if (!PATTERN_phone.test(value))
                    {
                        parent.addClass('error').attr('data-message', PATTERN_TITLE_phone);
                        return false;
                    }
                    else 
                    {
                        parent.removeClass('error');
                        return true;
                    }
                    break;
                case 'date':
                    if (!PATTERN_date.test(value) && !PATTERN_date_alt.test(value))
                    {
                        parent.addClass('error').attr('data-message', PATTERN_TITLE_date);
                        return false;
                    }
                    else 
                    {
                        if(PATTERN_date_alt.test(value)) 
                        {
                            var date_splitted = value.split('/');
                            var date_formatted = date_splitted[2]+'-'+date_splitted[1]+'-'+date_splitted[0];
                            element.val(date_formatted);
                        }
                        parent.removeClass('error').removeAttr('data-message');
                        return true;
                    }
                    break;
                case 'image_large':
                case 'image_normal':
                case 'image_galerie':
                case 'image_small':
                case 'pdf':
                    var extension = element.attr('accept');
                    var extensions_array = extension.split(',');
                    var split = value.split(".");
                    var ext = "."+split[split.length-1].toLowerCase();
                    if($.inArray(ext,extensions_array) !== -1) 
                    {
                        parent.removeClass('error');
                        return true;
                    } 
                    else 
                    {
                        parent.addClass('error').attr('data-message', PATTERN_TITLE_file);
                        return false;
                    }
                    break;
                default:
                    return true;
            }
        }
        
        // **************************************
        // Fonctions pour utilisation de la modal de choix des tags
        // **************************************
        
        function modalTags() 
        {
            if($(document).find('.modal_tags').length)
            {
                var modal = $('.modal_tags'),
                    tags_selection = modal.find('.modal_tags_selection'),
                    tags_list = modal.find('.modal_tags_list'),
                    tags_confirm = modal.find('.modal_tags_confirm'),
                    tags_origin = tags_list.html(),
                    slugs_selected = [];
                
                $(document).on('click','.modal_tags_item', function(){
                    var slug = $(this).data("slug");
                    if($(this).closest('.modal_tags_selection').length)
                    {
                        slugs_selected.splice(slugs_selected.indexOf(slug),1);
                        $(this).remove();
                        tags_list.find('.modal_tags_item[data-slug='+slug+']').removeClass('hidden');
                        return;
                    }
                    if($(this).closest('.modal_tags_list').length)
                    {
                        slugs_selected.push(slug); 
                        tags_selection.append($(this).clone());
                        $(this).addClass('hidden');
                        return;
                    }
                });
                
            
                tags_confirm.on('click', function(){
                    
                    var tags_selected = tags_selection.find('.modal_tags_item'),
                        article_tags = $('#article-tags'),
                        container = article_tags.find('.addable_container'),
                        contenu = article_tags.find('.addable_items').html(),
                        classes = article_tags.find('.addable_items').attr('class'),
                        items = article_tags.find('.addable_items'),
                        counter = 0,
                        counter_empty = 0;
                    
                    // On compte le nombre d'emplacements vides
                    items.each(function(){
                        if(!$(this).find('input').val())
                        {
                            counter_empty ++;
                        }
                    });
                    
                    // On supprime les doublons
                    tags_selected.each(function(index){
                        counter ++;
                        var item = $(this);
                        var value = item.data('name');
                        items.each(function(){
                            if($(this).find('input').val() == value)
                            {
                                tags_list.append(item);
                                counter --;
                            }
                        });
                    });
                    
                    
                    // On ajoute les inputs manquants
                    var items_to_add = counter - counter_empty;
                    for(var i=0;i<items_to_add;i++)
                    {
                        $('<div class="'+classes+'">'+contenu+'<span class="fa fa-trash red delete-item"></span></div>').appendTo(container).find('input').removeAttr('value');
                        autocomplete();
                    }
                    
                    // On récupère à nouveau les inputs et les tags à ajouter
                    items = article_tags.find('.addable_items').find('input').filter(function() {return !$(this).val();});
                    tags_selected = tags_selection.find('.modal_tags_item')
                    for(var i=0;i<items.length;i++)
                    {
                        $(items[i]).val($(tags_selected[i]).data('name'));
                        $(tags_selected[i]).remove();
                    }
                    
                    // On remet les tags comme à l'origine
                    tags_list.html(tags_origin);
                });
            }
            
            // ********************************
            // Champ pour filtrer pour les tags
            // *******************************
            
            
            // Fonction de normalisation de la requête
            var normalize = function( term ) {
                var ret = "";
                for ( var i = 0; i < term.length; i++ ) {
                    ret += accentMap[ term.charAt(i) ] || term.charAt(i);
                }
                return ret;
            };
            
            
            $('.js-search-tag').on('keyup',function(){
                var tags_all = tags_list.find('.js-tag');
                
                // Normalisation de la requête
                var request = normalize($(this).val().toString());
                request = request.replace(/[?/\!,.":%€$()\']/g,'');
                request = request.replace(/[\s]/g,'');
                request = request.toLowerCase();
                
                // Si la requête est vide, affichage de la liste d'origine
                if(!request.length) {
                    tags_list.html(tags_origin);
                    console.log(slugs_selected);
                    tags_list.find('.js-tag').each(function(){
                        if(slugs_selected.indexOf($(this).data('slug')) > -1)
                        {
                            $(this).addClass('hidden');
                        }
                    });
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
                    tags_list.html(tags_to_display);
                    if(!tags_to_display.length)
                    {
                        tags_list.html('Aucun tag ne correspond à votre recherche.');
                    }
                }
            });
        }

        function sousCategorieChecked() {
            var checkbox = document.querySelector("#js-sous-categorie-checkbox")
            var platsButton = document.querySelector("#js-ajout-sous-categorie")

            if (checkbox.checked) {
                console.log("Checkbox is checked..");
                platsButton.classList.add('hidden')
            } else {
                platsButton.classList.remove('hidden')
            }

            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    console.log("Checkbox is checked..");
                    platsButton.classList.add('hidden')
                } else {
                    platsButton.classList.remove('hidden')
                }
            })
        }
    });
})(jQuery);