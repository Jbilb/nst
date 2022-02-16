<?php
class User 
{
    // ========================================================
    // Définition des attributs de base
    // ========================================================
    private $_id_user;
    private $_lastname;
    private $_firstname;
    private $_role;
    private $_email;
    private $_password;
    
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
    
    public function id_user()
    {
        return $this->_id_user;
    }
    public function lastname()
    {
        return $this->_lastname;
    }
    public function firstname()
    {
        return $this->_firstname;
    }
    public function role()
    {
        return $this->_role;
    }
    public function email()
    {
        return $this->_email;
    }
    public function password()
    {
        return $this->_password;
    }
    
    // ========================================================
    // Setters : mettent à jour les valeurs des attributs de l'élément
    // ========================================================
    
    public function setId_user($id_user)
    {
        $id_user = (int) $id_user;
        
        if ($id_user > 0)
        {
            $this->_id_user = $id_user;
        }
    }
    public function setLastname($lastname)
    {
        if (is_string($lastname))
        {
            $this->_lastname = $lastname;
        }
    }
    public function setFirstname($firstname)
    {
        if (is_string($firstname))
        {
            $this->_firstname = $firstname;
        }
    }
    public function setRole($role)
    {
        $role = (int) $role;
        if ($role === 0 || $role === 1)
        {
            $this->_role = $role;
        }
    }
    public function setEmail($email)
    {
        if (is_string($email) && filter_var($email,FILTER_SANITIZE_EMAIL))
        {
            $this->_email = $email;
        }
    }
    public function setPassword($password)
    {
        if (is_string($password))
        {
            $this->_password = $password;
        }
    }
    
    // ========================================================
    // Fonctions utilitaires
    // ========================================================
    
    public function hash() {
        $this->setPassword(password_hash($this->_password,PASSWORD_DEFAULT));
    }
}
?>