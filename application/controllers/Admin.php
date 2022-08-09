<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
public function hello(){
    $this->load->view("admin/hello");
}
public function DeleteOrder($id){
    $this->db->from("order");
		$this->db->where("id",$id);
		$this->db->delete();

        redirect(base_url('welcome/adminOrder'));
    
}

}