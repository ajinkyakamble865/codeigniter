<?php
class Blog extends CI_Controller{

    //This method will show the blog page.
    public function index($page = 1) {
        $this->load->model('Article_model');
        $this->load->helper('text');
        $this->load->library('pagination');
    
        // Calculate offset and limit using $page
        $perpage = 6;
        $offset = ($page - 1) * $perpage;
        $limit = $perpage;
    
        // Set up pagination configuration
        $config['base_url'] = base_url('blog/index'); // Use 'blog/index' as the base URL
        $config['total_rows'] = $this->Article_model->getArticlesCount();
        $config['per_page'] = $perpage;
        $config['use_page_numbers'] = true;
    
        // Pagination styling
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
    
        // Fetch articles for the current page
        $param['offset'] = $offset;
        $param['limit'] = $limit;
        $articles = $this->Article_model->getArticlesFront($param);
    
        $data = [
            'articles' => $articles,
            'pagination_links' => $pagination_links
        ];
    
        $this->load->view('front/blog', $data);
    }
    

    function categories() {

        $this->load->model('Category_model');
        $categories = $this->Category_model->getCategoriesFront();
        $data = [];
        $data['categories'] = $categories;
        // print_r($categories);

        $this->load->view('front/categories',$data);
    }

    function detail($id) {
        $this->load->model('Article_model');
        $article = $this->Article_model->getArticle($id);
        if(empty($article)){
            redirect(base_url('blog'));
        }

        $data = [];
        $data ['article'] = $article;
        // echo "<pre>";print_r ($article);echo "</pre>";

        $this->load->view('front/detail',$data);
    }

    function category($category_id,$page = 1) {
        $this->load->model('Category_model');
        $this->load->model('Article_model');
        $this->load->helper('text');
        $this->load->library('pagination');

        $category = $this->Category_model->getCategory($category_id);
        if(empty($category)){
            redirect(base_url('blog'));
        }
        // print_r($category);
        // Calculate offset and limit using $page
        $perpage = 6;
        $offset = ($page - 1) * $perpage;
        $limit = $perpage;
        $param['category_id'] = $category_id;
        // Set up pagination configuration
        $config['base_url'] = base_url('blog/category/'.$category_id); // Use 'blog/index' as the base URL
        $config['total_rows'] = $this->Article_model->getArticlesCount($param);
        $config['uri_segment'] = 4;
        $config['per_page'] = $perpage;
        $config['use_page_numbers'] = true;
    
        // Pagination styling
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
    
        // Fetch articles for the current page
        $param['offset'] = $offset;
        $param['limit'] = $limit;
        
        $articles = $this->Article_model->getArticlesFront($param);
    
        $data = [
            'articles' => $articles,
            'pagination_links' => $pagination_links,
            'category' => $category
        ];
    
        $this->load->view('front/category_articles', $data);
    }
    
}

?>