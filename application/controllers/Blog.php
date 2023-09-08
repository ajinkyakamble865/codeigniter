<?php
class Blog extends CI_Controller{

    //This method will show the blog page.
    public function index() {

        $this->load->model('Article_model');
        $this->load->helper('text');

        $articles = $this->Article_model->getArticlesFront();

        $data = [];
        $data['articles'] = $articles;

        $this->load->view('front/blog',$data);
    }

    function categories() {

        $this->load->model('Category_model');
        $categories = $this->Category_model->getCategoriesFront();
        $data = [];
        $data['categories'] = $categories;
        // print_r($categories);

        $this->load->view('front/categories',$data);
    }
}

?>