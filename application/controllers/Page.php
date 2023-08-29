<?php
class Page extends CI_controller{

    function about() {
        $this->load->view('front/about');
    }

    function services() {
        $this->load->view('front/services');
    }
}

?>