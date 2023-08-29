<?php
class Home extends CI_Controller {

    public function index() {
        $this->load->model('Article_model');

        $param['offset'] = 0;  // Set the offset to 0 for the initial query
        $param['limit'] = 4;   // Set the limit to 4

        $articles = $this->Article_model->getArticlesFront($param);

        // echo "<pre>";
        // print_r($articles);
        // echo "</pre>";
        // exit;

        $data['articles'] = $articles;
        
        $this->load->view('front/home',$data);
    }
}
?>