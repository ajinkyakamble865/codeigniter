<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

    // this method will show articles listing page
    public function index()
    {
        $this->load->view('admin/article/list');
    }

    // this method will show articles create page
    public function create()
    {
        $this->load->model('Category_model');
        $categories = $this->Category_model->getCategories();
        $data['categories'] = $categories;

        // File Upload Settings
        $config['upload_path'] = './public/admin/article/';
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
                # code...
            }else {
                # code...
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