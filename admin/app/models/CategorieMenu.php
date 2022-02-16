<?php
class CategorieMenu
{
    // ========================================================
    // Définition des attributs de base
    // ========================================================
    
    private $_id_categorie_menu;
    private $_name;
    private $_plats;
    private $_sous_categories;
    private $_is_sous_categorie;
    
    
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
    
    public function id_categorie_menu()
    {
        return $this->_id_categorie_menu;
    }
    public function name()
    {
        return $this->_name;
    }
    public function plats()
    {
        return $this->_plats;
    }
    public function sous_categories()
    {
        return $this->_sous_categories;
    }
    public function is_sous_categorie()
    {
        return $this->_is_sous_categorie;
    }
    
    // ========================================================
    // Setters : mettent à jour les valeurs des attributs de l'élément
    // ========================================================
    
    public function setId_categorie_menu($id_categorie_menu)
    {
        $id_categorie_menu = (int) $id_categorie_menu;
        
        if ($id_categorie_menu > 0)
        {
          $this->_id_categorie_menu = $id_categorie_menu;
        }
    }
    public function setName($name)
    {
        if (is_string($name))
        {
          $this->_name = $name;
        }
    }
    public function setPlats($plats)
    {
        if (is_array($plats))
        {
          $this->_plats = $plats;
        }
        elseif (is_string($plats))
        {
          $this->_plats = unserialize($plats);
        }
    }
    public function setSous_categories($sous_categories)
    {
        if (is_array($sous_categories))
        {
          $this->_sous_categories = $sous_categories;
        }
        elseif (is_string($sous_categories))
        {
          $this->_sous_categories = unserialize($sous_categories);
        }
    }
    public function setIs_sous_categorie($is_sous_categorie)
    {
        $is_sous_categorie = (int) $is_sous_categorie;
        if ($is_sous_categorie == 0 || $is_sous_categorie == 1)
        {
          $this->_is_sous_categorie = $is_sous_categorie;
        }
    }
    public function create_categorie()
    {
        $categorie_body = [];
        
        if(!empty($this->_plats))
        {
            foreach($this->_plats as $key => $value)
            {
                $categorie_body[$key]['plats'] = $value;
            }
        }

        if(!empty($this->_sous_categories))
        {
            foreach($this->_sous_categories as $key => $value)
            {
                $categorie_body[$key]['sous_categories'] = $value;
            }
        }
        
        return $categorie_body;
    }
}
?>