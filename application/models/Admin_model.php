<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

    public function getByUsername($username) {
        $this->db->where('username',$username);
        $admins = $this->db->get('admins')->row_array();
        //SELECT * FROM admins WHERE username = {}
        return $admins;
    }
}
?>