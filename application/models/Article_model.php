<?php

class Article_model extends CI_model
{
    
    function getArticle() {
        
    }

    function getArticles($param = array()) {
        if (isset($param['offset']) && isset($param['limit'])) {
            $this->db->limit($param['limit'], $param['offset']); // Corrected order of parameters
        }
    
        $query = $this->db->get('articles');
    
        //echo $this->db->last_query();
    
        $articles = $query->result_array();
        return $articles;
    }
    
    function getArticlesCount() {
        $count = $this->db->count_all_results('articles');
        return $count;
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