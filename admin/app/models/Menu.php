<?php
class Menu
{
    // ========================================================
    // Définition des attributs de base
    // ========================================================
    
    private $_id_menu;
    private $_categories_menu;
    
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
    
    public function id_menu()
    {
        return $this->_id_menu;
    }
    public function categories_menu()
    {
        return $this->_categories_menu;
    }
    
    // ========================================================
    // Setters : mettent à jour les valeurs des attributs de l'élément
    // ========================================================
    
    public function setId_menu($id_menu)
    {
        $id_menu = (int) $id_menu;
        
        if ($id_menu > 0)
        {
          $this->_id_menu = $id_menu;
        }
    }
    
    public function setCategories_menu($categories_menu)
    {
        if (is_array($categories_menu))
        {
          $this->_categories_menu = $categories_menu;
        }
        elseif (is_string($categories_menu))
        {
          $this->_categories_menu = unserialize($categories_menu);
        }
    }

    public function create_menu()
    {
        $menu_body = [];
        
        if(!empty($this->_categories_menu))
        {
            foreach($this->_categories_menu as $key => $value)
            {
                $menu_body[$key]['categories_menu'] = $value;
            }
        }
        
        return $menu_body;
    }
}
?>