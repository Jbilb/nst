<?php
class FaqQuestionManager extends Manager
{

    // ========================================================
    // Ajout d'un faq_question
    // ========================================================
    
    public function create(FaqQuestion $faq_question) 
    {
        // Préparation de la requête à executer pour ajouter un faq_question.
        $q = $this->_db->prepare('INSERT INTO faq_questions(title, description, is_published) VALUES(:title, :description, :is_published)');
        
        // Assignation des différentes valeurs 
        $q->bindValue(':title', $faq_question->title());
        $q->bindValue(':description', $faq_question->description());
        $q->bindValue(':is_published', $faq_question->is_published());
        $q->bindValue(':id_faq_question', $faq_question->id_faq_question());
        
        // Execution de la requête
        $q->execute();
        
        // Renvoie le dernier ID inséré en base de données
        return $this->_db->lastInsertId();
    }
    
    // ========================================================
    // Modification d'un faq_question
    // ========================================================
    
    public function update(FaqQuestion $faq_question) 
    {  
        // Préparation de la requête à executer pour modifier la categorie
        $q = $this->_db->prepare('UPDATE faq_questions SET title = :title, description = :description, is_published = :is_published  WHERE id_faq_question = :id_faq_question');
        
        // Assignation des différentes valeurs 
        $q->bindValue(':title', $faq_question->title());
        $q->bindValue(':description', $faq_question->description());
        $q->bindValue(':is_published', $faq_question->is_published());
        
        // Execution de la requête.
        $q->execute();
    }
    
    // ========================================================
    // Suppression d'un faq_question
    // ========================================================
    
    public function delete($id) 
    {
        // Préparation de la requête à executer pour supprimer l'meta tag.
        $q = $this->_db->prepare('DELETE FROM faq_questions WHERE id_faq_question = :id_faq_question');
        
        // Assignation des valeurs
        $q->bindValue(':id_faq_question',$id);
        
        // Execution de la requête.
        $q->execute();
    }
    
    // ========================================================
    // Récupération d'un faq_question
    // ========================================================
    
    public function get($id_faq_question) 
    {
        // Préparation de la requête à executer pour obtenir les données du meta tag.
        $q = $this->_db->prepare('SELECT * FROM faq_questions WHERE id_faq_question = :id_faq_question');
        
         // Assignation des valeurs
        $q->bindValue(':id_faq_question', $id_faq_question);
        
        // Execution de la requête.
        $q->execute();
        
        // Stockage des données renvoyées dans une variable
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        if(!$donnees)
        {
            return false;
        }
        
        // Retourne un objet de type faq_question
        return new FaqQuestion($donnees);
    }
    
    // ========================================================
    // Lister tous les faq_questions
    // ========================================================
    
    public function lists() 
    {
        // Création du tableau qui contiendra nos meta plats
        $faq_questions = [];
        
        // Préparation de la requête à executer pour obtenir la liste des plats
        $q = $this->_db->prepare('SELECT * FROM faq_questions ORDER BY title');
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un tableau d'objets de type Plat
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $faq_questions[] = new FaqQuestion($donnees);
        }
        
        return $faq_questions;
    }
    
    // ========================================================
    // Vérifier qu'un faq_question n'existe pas déjà
    // ========================================================
    
    public function exists($id) 
    {
        // Préparation de la requête pour vérifier l'existence en base de données d'une intervention
        $q = $this->_db->prepare('SELECT COUNT(*) FROM faq_questions WHERE id_faq_question = :id_faq_question');
        
        // Assignation des valeurs
        $q->bindValue(':id_faq_question', $id);
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un booleen (True / False)
        return (bool) $q->fetchColumn();
    }
}
?>