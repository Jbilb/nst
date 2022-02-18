<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //***************************************************
    // INITIALISATION
    //***************************************************
    
    $form_state = true;
    $form_data = [];
    $form_files = [];
    
    //***************************************************
    // DETERMINER LA SOURCE
    //***************************************************

    if(isset($_POST['form']))
    {
        switch ($_POST['form'])
        {
            case 'contact':
                $email_subject = 'Don Camillo | Prise de contact';
                $email_address = "contact@doncamillo-restaurants.fr";
                $email_intro    = "Nouveau message reçu depuis votre site web :";
                $email_mentions  = "<strong>Données personnelles :</strong> Cette personne accepte que les informations saisies dans ce formulaire puissent être exploitées dans le cadre de sa prise de contact, et afin de lui apporter une réponse. Elles ne doivent en aucun cas être transmises à des organismes tiers.";
                $email_source  = "Ce message provient du <b>formulaire de contact</b> de votre site <b>www.doncamillo-restaurants.fr </b>";
                break;
        }
    }
    
    //***************************************************
    // TRAITEMENT DES CHAMPS POST
    //***************************************************
    
    foreach($_POST as $key => $value)
    {
        $keys_array = preg_split("/_/",$key);
        if(isset($keys_array[0])) 
        {
            switch ($keys_array[0]) {
                case 'required':
                    if(empty($value)) 
                    {
                        echo "Champ requis : $key<br/>";
                        $form_state = false;
                    }
                    break;
                case 'alpha':
                case 'alphanum':
                case 'url':
                case 'email':
                case 'phone':
                    if(!checkFormat($value,$keys_array[0])) 
                    {
                        $form_state = false;
                    }
                    break;
                default:
                    $form_data[$keys_array[0]] = $value;
                    break;
            }
        }
        if(isset($keys_array[1]) && $form_state) 
        {
            // Specific case : consentement
            if(!isset($_POST['required_consentement']))
            {
                $form_state = false;
                echo "Votre consentement est requis pour envoyer le formulaire";
            }
            switch ($keys_array[1]) {
                case 'alpha':
                case 'alphanum':
                case 'url':
                case 'email':
                case 'phone':
                case 'consentement':
                    if(!checkFormat($value,$keys_array[1])) 
                    {
                        $form_state = false;
                    }
                    break;
                default:
                    $form_data[$keys_array[1]] = $value;
                    break;
            }
        }
        if(isset($keys_array[2]) && $form_state) 
        {
            $form_data[$keys_array[2]] = test_input($value);
        }
    }
    
    //***************************************************
    // TRAITEMENT DES CHAMPS FILES
    //***************************************************
    
    foreach($_FILES as $key => $value)
    {
        $keys_array = preg_split("/_/",$key);
        if(isset($keys_array[0])) 
        {
            switch ($keys_array[0]) {
                case 'required':
                    if(empty($value['size']) && empty($value['name']) && empty($value['tmp_name'])) 
                    {
                        echo "Fichier requis : $key<br/>";
                        $form_state = false;
                    }
                    break;
                case 'file':
                    if(!checkFormat($value['name'],$keys_array[0])) 
                    {
                        echo "Erreur format fichier : $key <br/>";
                        $form_state = false;
                    }
                    break;
                default:
                    save_file($value,$keys_array[0],$form_files);
                    break;
            }
        }
        if(isset($keys_array[1]) && $form_state) 
        {
            switch ($keys_array[1]) {
                case 'file':
                    if(!checkFormat($value['name'],$keys_array[1])) 
                    {
                        echo "Erreur format fichier : $key <br/>";
                        $form_state = false;
                    }
                    break;
                default:
                    save_file($value,$keys_array[1],$form_files);
                    break;
            }
        }
        if(isset($keys_array[2]) && $form_state) 
        {
            save_file($value,$keys_array[2],$form_files);
        }
    }
    
    // ON VERIFIE SI TOUT EST OK (SI LES CHAMPS SONT TOUS VALIDES)
    if($form_state) 
    {
        // INITIALISATION DE PHP MAILER
        require 'phpmailer/PHPMailer.php';
        require 'phpmailer/Exception.php';
        
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->CharSet = 'UTF-8';
            $mail->setFrom('no-reply@doncamillo-restaurants.fr','Site web doncamillo-restaurants.fr');
            //$mail->addAddress('contact@example.com', 'Example Name'); Send mail to
            //$mail->AddCC('contact@example.com', 'Example Name'); Add copie to
            //$mail->AddBCC('contact@example.com', 'Example Name');  Add hiddden copie to
            //$mail->AddReplyTo('contact@example.com', 'Example Name'); Add reply to
            $mail->addAddress($email_address, 'Don Camillo');
            $mail->AddReplyTo($form_data['Email'], $form_data['Prénom'].' '.$form_data['Nom']);
            $mail->Subject = $email_subject;
            $mail->isHTML(true);
            $mailmsg  = "<h4>".$email_intro."</h4>";

            if(!empty($form_files))
            {
                $mailmsg  .= "<strong>Fichiers en pièce jointe</strong><br/><br/>";
                foreach($form_files as $file)
                {
                    $mail->addAttachment($file['file'],$file['name']);
                }
            }
            
            foreach($form_data as $key => $value)
            {
                if($key == "Message")
                {
                    $mailmsg  .= "<br/><strong>$key :</strong> $value<br/>";
                }
                elseif($key !== "form")
                {
                    $mailmsg  .= "<strong>$key :</strong> $value<br/>";
                }
            }
            
            $mailmsg .= "<br>".$email_mentions."<br>";
            $mailmsg .= "<hr><small><em>".$email_source."</em></small>";
            $mail->Body = $mailmsg;
            $mail->send();
            echo 'Message envoyé avec succès.';
        } catch (Exception $e) {
            header('HTTP/1.1 403 Forbidden');
            print 'Le message n\'a pas pu être envoyé. <br>';
            print 'Erreur : ' . $mail->ErrorInfo;
        }
    } else {
        header('HTTP/1.1 403 Forbidden');
        print "Erreur 403 - Accès non autorisé.";
    }

} else {
    header('HTTP/1.1 403 Forbidden');
    print "Erreur 403 - Accès non autorisé.";
} // end if method post

    
//***************************************************
// FONCTIONS UTILES
//***************************************************

function checkFormat($data,$format) {
    
    //***************************************************
    // PATTERNS
    //***************************************************
    
    // PATTERN NUM
    $PATTERN_num              = '^[0-9 ]*$';
    
    // PATTERN EMAIL
    $PATTERN_email            = '/^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$/';

    // PATTERN ALPHABETIQUE + ACCENTS
    $PATTERN_alpha            = "/^[A-Za-z' èéàùçâêûôîäüöïë,-.\/()!?:\";*+]*$/";

    // PATTERN ALPHABETIQUE + ACCENTS + CHIFFRES
    $PATTERN_alphanum         = "/^[A-Za-z0-9' èéàùçâêûôîäüöïë,-.°\/()!?:\";*+]*$/";

    // PATTERN DATE : JJ-MM-AAAA
    $PATTERN_date             = "/^[\d]{2}\-[\d]{2}\-[\d]{4}$/";

    // PATTERN PHONE
    $PATTERN_phone            = '/^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$/';
    
    //***************************************************
    // DATA TREATMENT
    //*************************************************** 
    
    $data = test_input($data);
    switch ($format) {
        case 'alpha':
            if (!preg_match($PATTERN_alpha,$data))
            {
                echo "Erreur format Alpha";
                return false;
            }
            else 
            {
                return true;
            }
            break;
        case 'alphanum':
            if (!preg_match($PATTERN_alphanum,$data)) 
            {
                echo "Erreur format Alphanum";
                return false;
            }
            else 
            {
                return true;
            }
            break;
        case 'url':
            if (!preg_match($PATTERN_alpha,$data) && filter_var($data,FILTER_VALIDATE_URL)) 
            {
                echo "Erreur format URL";
                return false;
            }
            else 
            {
                return true;
            }
            break;
        case 'email':
            if (!preg_match($PATTERN_email,$data) && filter_var($data,FILTER_VALIDATE_EMAIL)) 
            {
                echo "Erreur format Email";
                return false;
            }
            else 
            {
                return true;
            }
            break;
        case 'phone':
            if (!empty($data) && !preg_match($PATTERN_phone,$data)) 
            {
                echo "Erreur format Phone";
                return false;
            }
            else 
            {
                return true;
            }
            break;
        case 'file':
            if(empty($data)) { return true;}
            $ext_array = preg_split("/\./",$data); 
            $ext = strtolower($ext_array[count($ext_array)-1]);
            $ext_allow = array("pdf", "doc", "docx", "jpg", "jpeg", "png"); 
            if (in_array($ext,$ext_allow)) 
            {
                return true;
            }
            else 
            {
                return false;
            }
            break;
        default:
            return true;
    }
}

function save_file($value,$final_name) {
    
    global $form_files;
    // Récupération de l'extension de fichier
    $ext_array = preg_split("/\./",$value['name']); 
    $ext = strtolower($ext_array[count($ext_array)-1]);
    
    // Case : multiple files
    if(is_array($value['name'])) 
    {
        $nb_fichiers = count($value['name']);
        for($i=0; $i<$nb_fichiers; $i++) 
        {
            if($value['error'] == 0) {
                $fichier = array();
                $fichier['file'] = $value['tmp_name'];
                $fichier['name'] = $final_name.'.'.$ext;
                $form_files[] = $fichier;
            }
        }
    }
    // Case : single file
    else 
    {
        if($value['error'] == 0) {
            $fichier = array();
            $fichier['file'] = $value['tmp_name'];
            $fichier['name'] = $final_name.'.'.$ext;
            $form_files[] = $fichier;
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function test_message($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = nl2br($data);
    return $data;
}

function test_phone($data) {
    $data = preg_replace("/[\s\-.]+/", "", $data);
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}