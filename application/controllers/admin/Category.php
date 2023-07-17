<?php
defined('BASEPATH') OR exit('NO direct script access allowed');

class Category extends CI_Controller{

    // This method will show category list page

    public function index() 
    {

        $this->load->model('Category_model');
        $queryString = $this->input->get('q');
        $params['queryString'] = $queryString;

        $categories = $this->Category_model->getCategories($params);
        $data['categories'] = $categories;
        $data['queryString'] = $queryString;

        //echo "<pre>"; print_r($data); //exit;
        $this->load->view('admin/category/list',$data);
    }

    // This method will show category create page
    public function create() 
    {
        $this->load->helper('common_helper');
        $config['upload_path']         = './public/uploads/category/';
        $config['allowed_types']       = 'gif|jpg|png';
        $config['encrypt_name']        = false;
        

        $this->load->library('upload', $config);

        $this->load->model('Category_model');
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('name','Name','trim|required');

        if ($this->form_validation->run() == TRUE) {
            if (!empty($_FILES['image']['name'])) {
                
                if($this->upload->do_upload('image')) {
                    // File uploaded successfully
                    $data = $this->upload->data();

                    //Resizig part
                    resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb'.$data['file_name'],300,270);
                   
                    $formArray['image'] = $data['file_name'];
                    $formArray['name'] = $this->input->post('name');
                    $formArray['status'] = $this->input->post('status');
                    $this->Category_model->create($formArray);
    
                    $this->session->set_flashdata('success','Category added successfully.');
                    redirect(base_url().'admin/category/index');


                }else {
                   
                    // we got some errors
                    $error = $this->upload->display_errors("<p class='invalid-feedback>'","</p>");
                    $data['errorImageUpload'] = $error;
                    $this->load->view('admin/category/create',$data);
                }

            }else{

                $formArray['name'] = $this->input->post('name');
                $formArray['status'] = $this->input->post('status');
                $this->Category_model->create($formArray);

                $this->session->set_flashdata('success','Category added successfully.');
                redirect(base_url().'admin/category/index');
                //we will create category without image
            }
            //will save categoryin database
        } else {
            // will show errors
            $this->load->view('admin/category/create');
        }


    }

    // This method will show category eidt page
    public function edit($id)
    {
        //echo $id;
        $this->load->model('Category_model');
        $category = $this->Category_model->getCategory($id);
        

        if (empty($category)) {
            $this->session->set_flashdata('error','Category not found');
            redirect(base_url().'admin/category/index');   
        }

        $this->load->helper('common_helper');
        $config['upload_path']         = './public/uploads/category/';
        $config['allowed_types']       = 'gif|jpg|png';
        $config['encrypt_name']        = false;
        

        $this->load->library('upload', $config);

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('name','Name','trim|required');

        if ($this->form_validation->run() == TRUE) {

            if (!empty($_FILES['image']['name'])) {
                
                if($this->upload->do_upload('image')) {
                    // File uploaded successfully
                    $data = $this->upload->data();

                    //Resizig part
                    resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb'.$data['file_name'],300,270);
                   
                    $formArray['image'] = $data['file_name'];
                    $formArray['name'] = $this->input->post('name');
                    $formArray['status'] = $this->input->post('status');
                    $this->Category_model->update($id,$formArray);

                    if (file_exists('./public/uploads/'.$category['image'])) {
                        unlink('./public/uploads/'.$category['image']);
                    }

                    if (file_exists('./public/uploads/category/'.$category['image'])) {
                        unlink('./public/uploads/category/'.$category['image']);
                    }
    
                    $this->session->set_flashdata('success','Category updated successfully.');
                    redirect(base_url().'admin/category/index');


                }else {
                   
                    // we got some errors
                    $error = $this->upload->display_errors("<p class='invalid-feedback>'","</p>");
                    $data['errorImageUpload'] = $error;
                    $data['category'] = $category;
                    $this->load->view('admin/category/edit',$data);
                }

            }else{

                $formArray['name'] = $this->input->post('name');
                $formArray['status'] = $this->input->post('status');
                $this->Category_model->update($id,$formArray);

                $this->session->set_flashdata('success','Category updated successfully.');
                redirect(base_url().'admin/category/index');
                //we will create category without image
            }

        } else {
            $data['category'] = $category;
            $this->load->view('admin/category/edit',$data);
        }


    }

    // This method will delete a category
    public function delete($id) 
    {
        $this->load->model('Category_model');
        $category = $this->Category_model->getCategory($id);
        

        if (empty($category)) {
            $this->session->set_flashdata('error','Category not found');
            redirect(base_url().'admin/category/index');   
        }

        if (file_exists('./public/uploads/'.$category['image'])) {
            unlink('./public/uploads/'.$category['image']);
        }

        if (file_exists('./public/uploads/category/'.$category['image'])) {
            unlink('./public/uploads/category/'.$category['image']);
        }

        $this->Category_model->delete($id);

        $this->session->set_flashdata('success','Category deleted successfully');
        redirect(base_url().'admin/category/index');

    }
}
?>