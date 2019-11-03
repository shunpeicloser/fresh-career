<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ptk extends CI_Controller {
    public function index()
    {
        $id = $this->session->tempdata('user_id');
        redirect("ptk/home/$id",'refresh');
    }

    public function home($id)
    {
        if($id != $this->session->tempdata('user_id')){
            redirect('ptk','refresh');
        }

        $this->load->model('ptk_model', 'ptk');
        $data = NULL;

        //load mhs profile data
        $data['profile'] = $this->ptk->getProfileData($id);

        //load mhs project list
        $data['project-list'] = $this->ptk->getProjectList($id);

        $this->load->view('ptk/home', ['data' => $data]);
    }
}