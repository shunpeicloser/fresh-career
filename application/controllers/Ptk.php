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

        //load page content
        $data['contents'] = APPPATH . "views/ptk/ptk_project_list.php";

        $this->load->view('ptk/home', ['data' => $data]);
    }

    public function profile($user_id)
    {
        if($user_id != $this->session->tempdata('user_id')){
            redirect('ptk','refresh');
        }

        $this->load->model('ptk_model', 'ptk');

        //load mhs profile data
        $data['profile'] = $this->ptk->getProfileData($this->session->tempdata('user_id'));

        //load mhs project list
        $data['project-list'] = $this->ptk->getProjectList($user_id);

        //load page content
        $data['contents'] = APPPATH . "views/ptk/ptk_profile.php";

        $this->load->view('ptk/home', ['data' => $data]);

    }

    public function projectdetail($project_id)
    {
        $this->load->model('project_model', 'project');
        $this->load->model('ptk_model', 'ptk');
        $data = $this->project->getProjectData($project_id, $this->session->tempdata('user_id'));

        //load mhs profile data
        $data['profile'] = $this->ptk->getProfileData($this->session->tempdata('user_id'));

        //load page content
        $data['contents'] = APPPATH . "views/ptk/project_detail.php";

        $this->load->view('ptk/home', ['data' => $data]);

    }

    public function savespec($project_id)
    {
        $this->load->model('project_model', 'project');
        $inputdata = $this->input->post();
        $inputdata['project_id'] = $project_id;
        $inputdata['user_id'] = $this->session->tempdata('user_id');
        $this->project->saveProjectSpecification($inputdata);
        $this->projectdetail($project_id);
    }

}