<?php

class Article_model extends CI_model
{
    
    function getArticle($id) {
        
        $this->db->where('id',$id);
        $query = $this->db->get('articles');
        $article = $query->row_array();
        //SELECT * FROM articles WHERE id={YourArticleId $id}
        return $article;
    }

    function getArticles($param = array()) {
        if (isset($param['offset']) && isset($param['limit'])) {
            $this->db->limit($param['limit'], $param['offset']); // Corrected order of parameters
        }

        if (isset($param['q'])) {
            $this->db->or_like('title',trim($param['q']));
            $this->db->or_like('author',trim($param['q']));
        }
    
        $query = $this->db->get('articles');
    
        //echo $this->db->last_query();
    
        $articles = $query->result_array();
        return $articles;
    }
    
    function getArticlesCount($param = array()) {
       
        if (isset($param['q'])) {
            $this->db->or_like('title',trim($param['q']));
            $this->db->or_like('author',trim($param['q']));
        }

        $count = $this->db->count_all_results('articles');
        return $count;
     }

    //This method will save article in DB
    function addArticle($formArray) {
        $this->db->insert('articles',$formArray);
        return $this->db->insert_id();
    }

    function updateArticle($id,$form_Array) {
        $this->db->where('id',$id);
        $this->db->update('articles',$form_Array);
        
    }

    function deleteArticle($id) {
        $this->db->where('id',$id);
        $this->db->delete('articles');
        
    }

   




}

?>