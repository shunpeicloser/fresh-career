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

        $this->load->model('mhs_model', 'mhs');
        $data = NULL;

        //load mhs profile data
        $data['profile'] = $this->mhs->getProfileData($id);

        //load mhs project list
        $data['project-list'] = $this->mhs->getProjectList($id);

        $this->load->view('mhs/home', ['data' => $data]);
    }

    public function projectdetail($project_id)
    {
        $this->load->model('project_model', 'project');
        $data = $this->project->getProjectData($project_id);

        $this->load->view('mhs/project_detail', ['data' => $data]);
    }

}