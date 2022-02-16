<?php

$siteManager = new SiteManager($db);

//***********************************************
// Affichage de la liste des options 
//***********************************************

function settings_list() 
{
    // Chargement de la view
    include 'view/SettingsView.php';
}

//***********************************************
// Mise à jour et enregistrement des options
//***********************************************

function edit_settings(Tools $tools, FormTools $form_tools, SiteManager $manager) 
{
    // On vérifie que les données obligatoires sont bien présentes
    $form_data = $form_tools->check_form_fields($_POST,$_FILES); 
    if($form_data)
    {
        $options = new Site($form_data);
        $manager->update($options);
        $tools->redirect('settings/?msgsystem=success_update');
    }
    else
    {
        // Il manque des données obligatoires
        $tools->redirect('settings/?msgsystem=warning_error-format');
    }
}


?>
