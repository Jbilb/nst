<?php
class UserManager extends Manager
{
    
    // ========================================================
    // Ajout d'un utilisateur
    // ========================================================
    
    public function create(User $user) 
    {
        // Préparation de la requête à executer pour ajouter un utilisateur.
        $q = $this->_db->prepare('INSERT INTO users(lastname, firstname, role, email, password) VALUES(:lastname, :firstname, :role, :email, :password)');
        
        // Assignation des différentes valeurs 
        $q->bindValue(':lastname', $user->lastname());
        $q->bindValue(':firstname', $user->firstname());
        $q->bindValue(':role', $user->role());
        $q->bindValue(':email', $user->email());
        $q->bindValue(':password', $user->password());
        
        // Execution de la requête
        $q->execute();
        
        // Renvoie le dernier ID inséré en base de données
        return $this->_db->lastInsertId();
    }
    
    // ========================================================
    // Modification d'un utilisateur
    // ========================================================
    
    public function update(User $user) 
    {
        // Préparation de la requête à executer pour modifier l'utilisateur.
        $q = $this->_db->prepare('UPDATE users SET lastname = :lastname, firstname = :firstname, role = :role, email = :email, password = :password WHERE id_user = :id_user');
        
        // Assignation des différentes valeurs.
        $q->bindValue(':lastname', $user->lastname());
        $q->bindValue(':firstname', $user->firstname());
        $q->bindValue(':role', $user->role());
        $q->bindValue(':email', $user->email());
        $q->bindValue(':password', $user->password());
        $q->bindValue(':id_user', $user->id_user());
        
        // Execution de la requête.
        $q->execute();
    }
    
    // ========================================================
    // Suppression d'un utilisateur
    // ========================================================
    
    public function delete($id) 
    {
        // Préparation de la requête à executer pour supprimer l'utilisateur.
        $q = $this->_db->prepare('DELETE FROM users WHERE id_user = '.$id);
        
        // Execution de la requête.
        $q->execute();
    }
    
    // ========================================================
    // Vérification qu'une adresse email existe en base de données
    // ========================================================
    
    public function matchMail($mail) 
    {
        // Préparation de la requête à executer (COUNT) pour vérifier que l'email renseigné est présent dans la base de données
        $q = $this->_db->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
        
        // Execution de la requête.
        $q->bindValue(':email', $mail);
        $q->execute();
        
        // Retourne true s'il a été trouvé, false s'il n'a pas été trouvé
        return (bool) $q->fetchColumn();
    }
    
    // ========================================================
    // Vérification que le mot de passe correspond à l'adresse email
    // Retourne true s'il correspond, et false s'il ne correspond pas
    // ========================================================
    
    public function matchPassword($mail, $password) 
    {
        // On vérifie que l'utilisateur mentionné a bien l'adresse mail et le mot de passe qui ont été entrés dans le formulaire
        $q = $this->_db->prepare('SELECT * FROM users WHERE email = :email');
        $q->bindValue(':email', $mail);
        $q->execute();
        
        // On retourne les valeurs trouvées dans la BDD
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        $user = new User($donnees);
        
        // Vérification du mot de passe
        if(password_verify($password, $user->password())) {
            
            // Vérification de la validité du hash : si non valide, on le réenregistre.
            if (password_needs_rehash($user->password(), PASSWORD_DEFAULT)) {
                $user->setPassword($user->hash());
                $this->update($user);
            }
            return true;
        } else {
            return false;
        }
    }
    
    // ========================================================
    // Récupération d'un utilisateur par son id
    // ========================================================
    
    public function get($id) 
    {
        // Préparation de la requête à executer pour obtenir les données de l'utilisateur.
        $q = $this->_db->prepare('SELECT * FROM users WHERE id_user = '.$id);
        
        // Execution de la requête.
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        // Retourne un objet de type User
        return new User($donnees);
    }
    
    // ========================================================
    // Vérification de l'existence d'un id
    // ========================================================
    
    public function exists($id) 
    {
        // Préparation de la requête à executer pour obtenir les données de l'utilisateur.
        $q = $this->_db->prepare('SELECT * FROM users WHERE id_user = :id_user');
        
        // Assignation des valeurs
        $q->bindValue(':id_user', $id);
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un booleen (True / False)
        return (bool) $q->fetchColumn();
    }
    
    // ========================================================
    // Récupération de l'utilisateur à l'aide de son mail
    // ========================================================
    
    public function getByMail($mail)
    {
        // Préparation de la requête à executer 
        $q = $this->_db->prepare('SELECT * FROM users WHERE email = :email');
        
        // Execution de la requête.
        $q->bindValue(':email', $mail);
        $q->execute();
        
        // Retourne l'id de l'utilisateur
        return new User($q->fetch(PDO::FETCH_ASSOC));
    }
    
    // ========================================================
    // Lister tous les utilisateurs
    // ========================================================
    
    public function lists() 
    {
        // Création du tableau qui contiendra nos utilisateurs
        $users = [];
        
        // Préparation de la requête à executer pour obtenir la liste des utilisateurs
        $q = $this->_db->prepare('SELECT * FROM users ORDER BY lastname');
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un tableau d'objets de type User
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $users[] = new User($donnees);
        }
        
        return $users;
    }
    
    // ========================================================
    // Fonction de login d'un utilisateur
    // Vérifie l'existence du mail dans la base de données
    // Vérifie le match email / password
    // Renvoie true si login réussi / false si login échoué
    // ========================================================
    
    public function logIn($mail,$password) 
    {
        if($this->matchMail($mail)) 
        {
            $connexion = $this->matchPassword($mail,$password);
            if($connexion) {
                $_SESSION['user'] = $this->getByMail($mail);
                
                // Tout est ok, renvoi vrai
                return true;
            }
            else {
                // Mot de passe incorrect, renvoi false
                return false;
            }
        } else {
            // Email incorrect, renvoi false
            return false;
        }
    }
    
    // ========================================================
    // Fonction de logout d'un utilisateur
    // ========================================================
    
    public function logOut() 
    {
        if(!empty($_SESSION['user'])) 
        {
            unset($_SESSION['user']);
            return true;
        } 
        else 
        {
            return false;
        }
    }
}
?>