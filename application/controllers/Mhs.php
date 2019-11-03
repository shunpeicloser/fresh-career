<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs extends CI_Controller {
    public function index()
    {
        $id = $this->session->tempdata('user_id');
        redirect("mhs/home/$id",'refresh');
    }

    public function home($id)
    {
        if($id != $this->session->tempdata('user_id')){
            redirect('mhs','refresh');
        }
        $this->load->view('mhs/home');
    }
}