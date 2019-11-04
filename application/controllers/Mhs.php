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

        //load mhs profile data
        $data['profile'] = $this->mhs->getProfileData($id);

        //load mhs project list
        $data['project-list'] = $this->mhs->getProjectList($id);

        //load page content
        $data['contents'] = APPPATH . "views/mhs/mhs_project_list.php";

        $this->load->view('mhs/home', ['data' => $data]);
    }

    public function projectdetail($project_id)
    {
        $this->load->model('project_model', 'project');
        $this->load->model('mhs_model', 'mhs');
        $data = $this->project->getProjectData($project_id, $this->session->tempdata('user_id'));

        //load mhs profile data
        $data['profile'] = $this->mhs->getProfileData($this->session->tempdata('user_id'));

        //load page content
        $data['contents'] = APPPATH . "views/mhs/project_detail.php";

        $this->load->view('mhs/home', ['data' => $data]);
    }

    public function projectlist()
    {
        $this->load->model('project_model', 'project');
        $this->load->model('mhs_model', 'mhs');
        $data = $this->project->getProjectList();

        //load mhs profile data
        $data['profile'] = $this->mhs->getProfileData($this->session->tempdata('user_id'));

        //load mhs project list
        $data['project-list'] = $this->project->getProjectList();

        //load page content
        $data['contents'] = APPPATH . "views/mhs/project_list.php";

        $this->load->view('mhs/home', ['data' => $data]);
    }

    public function bid($project_id)
    {
        $this->load->model('project_model', 'project');
        $inputdata = $this->input->post();
        $inputdata['project_id'] = $project_id;
        $inputdata['user_id'] = $this->session->tempdata('user_id');
        $this->project->addBid($inputdata);
        $this->projectdetail($project_id);
    }

}