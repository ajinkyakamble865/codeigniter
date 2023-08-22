<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

    // this method will show articles listing page
    public function index($page=1)
    {

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1; // Get the current page segment from URL
        
        // Calculate offset and limit using $page
        $perpage = 5;
        $param['offset'] = ($page - 1) * $perpage;
        $param['limit'] = $perpage;
        $param['q'] = $this->input->get('q');

        //print_r($_GET);
        $this->load->model('Article_model');
        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/article/index');
        $config['total_rows'] = $this->Article_model->getArticlesCount($param);
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
        
        
        $articles = $this->Article_model->getArticles($param);
    
        $data['q'] = $this->input->get('q');
        $data['articles'] = $articles;
        $data['pagination_links'] = $pagination_links;
        $this->load->view('admin/article/list', $data);
    }
    

    // this method will show articles create page
    public function create()
    {
        $this->load->model('Category_model');
        $this->load->model('Article_model');
        $this->load->helper('common_helper');

        $categories = $this->Category_model->getCategories();
        $data['categories'] = $categories;

        // File Upload Settings
        $config['upload_path'] = './public/uploads/articles/';
        $config['allowed_types'] = 'gif|png|jpg';
        $config['encrypt_name'] = false;
        $this->load->library('upload',$config);


        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('category_id','Category','trim|required');
        $this->form_validation->set_rules('title','Title','trim|required|min_length[20]');
        $this->form_validation->set_rules('author','Author','trim|required');

        if ($this->form_validation->run() == true) {
            // form validated successfully and we can proceed

            if (!empty($_FILES['image']['name'])) {
                //here we will save images
                    if ($this->upload->do_upload('image')) {
                        // Image successfully uploaded here
                        $data = $this->upload->data();
                     
                        resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_front/'.$data['file_name'],1120,800);
                        resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_admin/'.$data['file_name'],300,250);

                        $formArray['image'] = $data['file_name'];
                        $formArray['title'] = $this->input->post('title');
                        $formArray['category'] = $this->input->post('category_id');
                        $formArray['description'] = $this->input->post('description');
                        $formArray['author'] = $this->input->post('author');
                        $formArray['status'] = $this->input->post('status');
                        $formArray['created_at'] = date('Y-m-d H:i:s');
                        $this->Article_model->addArticle($formArray);

                        $this->session->set_flashdata('success','Article added successfully');
                        redirect(base_url().'admin/article/index');

                    }   else {
                        // Image selected has some errors
                        $errors = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                        $data['imageError'] = $errors;
                        $this->load->view('admin/article/create',$data);
                    } 

            }   else {
                    //here we will save article without image
                    $formArray['title'] = $this->input->post('title');
                    $formArray['category'] = $this->input->post('category_id');
                    $formArray['description'] = $this->input->post('description');
                    $formArray['author'] = $this->input->post('author');
                    $formArray['status'] = $this->input->post('status');
                    $formArray['created_at'] = date('Y-m-d H:i:s');
                    $this->Article_model->addArticle($formArray);
                    $this->session->set_flashdata('success','Article added successfully');
                    redirect(base_url().'admin/article/index');
            }


        } else {
            // form not validated, you can show errors
            $this->load->view('admin/article/create',$data);
        }

    }

    // this method will show articles edit page
    public function edit()
    {
        
    }

    // this method will delete articles records
    public function delete()
    {
        
    }

}
?>