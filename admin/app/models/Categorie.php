<?php
class Categorie 
{
    // ========================================================
    // Définition des attributs de base
    // ========================================================
    
    private $_id_categorie;
    private $_name;
    private $_slug;
    
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
    
    public function id_categorie()
    {
        return $this->_id_categorie;
    }
    public function name()
    {
        return $this->_name;
    }
    public function slug()
    {
        return $this->_slug;
    }
    
    // ========================================================
    // Setters : mettent à jour les valeurs des attributs de l'élément
    // ========================================================
    
    public function setId_categorie($id_categorie)
    {
        $id_categorie = (int) $id_categorie;
        
        if ($id_categorie > 0)
        {
          $this->_id_categorie = $id_categorie;
        }
    }
    public function setName($name)
    {
        if (is_string($name))
        {
          $this->_name = $name;
        }
    }
    public function setSlug($slug)
    {
        if (is_string($slug))
        {
          $this->_slug = $slug;
        }
    }
}
?>