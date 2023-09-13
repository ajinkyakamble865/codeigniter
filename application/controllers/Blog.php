<?php
class Blog extends CI_Controller{

    //This method will show the blog page.
    public function index($page=1) {

        $this->load->model('Article_model');
        $this->load->helper('text');

        $this->load->library('pagination');

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1; // Get the current page segment from URL
        
        // Calculate offset and limit using $page
        $perpage = 5;
        $param['offset'] = ($page - 1) * $perpage;
        $param['limit'] = $perpage;

        //print_r($_GET);

        $config['base_url'] = base_url('blog/index');
        $config['total_rows'] = $this->Article_model->getArticlesCount();
        $config['per_page'] = $perpage;
        $config['use_page_numbers'] = true;

        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item disabled"><li class="active page-item"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        
        $this->pagination->initialize($config);
        $pagination_links = $this->pagination->create_links();

        $articles = $this->Article_model->getArticlesFront($param);

        $data = [];
        $data['articles'] = $articles;
        $data['pagination_links'] = $pagination_links;

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