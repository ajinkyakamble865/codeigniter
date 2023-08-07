<?php

class Article_model extends CI_model
{
    
    function getArticle() {
        
    }

    function getArticles() {
        
    }
    //This method will save article in DB
    function addArticle($formArray) {
        $this->db->insert('articles',$formArray);
        return $this->db->insert_id();
    }

    function updateArticle() {
        
    }

    function deleteArticle() {
        
    }

   




}

?>