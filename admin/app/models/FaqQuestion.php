<?php
class FaqQuestion 
{
    // ========================================================
    // Définition des attributs de base
    // ========================================================
    
    private $_id_faq_question;
    private $_title;
    private $_description;
    private $_is_published;
    
    // ========================================================
    // Création du constructeur
    // ========================================================
    
    public function __construct(array $donnees) 
    {
        $this->hydrate($donnees);
    }
    
    // ========================================================
    // Création de la fonction d'hydratation de la classe
    // ========================================================
    
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }
    
    // ========================================================
    // Getters : récupèrent les valeurs des attributs de l'élément
    // ========================================================
    
    public function id_faq_question()
    {
        return $this->_id_faq_question;
    }
    public function title()
    {
        return $this->_title;
    }
    public function description()
    {
        return $this->_description;
    }
    public function is_published()
    {
        return $this->_is_published;
    }

    
    // ========================================================
    // Setters : mettent à jour les valeurs des attributs de l'élément
    // ========================================================
    
    public function setId_faq_question($id_faq_question)
    {
        $id_faq_question = (int) $id_faq_question;
        
        if ($id_faq_question > 0)
        {
          $this->_id_faq_question = $id_faq_question;
        }
    }
    
    public function setTitle($title)
    {
        if (is_string($title))
        {
          $this->_title = $title;
        }
    }

    public function setDescription($description)
    {
        if (is_string($description))
        {
          $this->_description = $description;
        }
    }

    public function setIs_published($is_published)
    {
        $is_published = (int) $is_published;
        if ($is_published == 0 || $is_published == 1)
        {
          $this->_is_published = $is_published;
        }
    }
}
?>