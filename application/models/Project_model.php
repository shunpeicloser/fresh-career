<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project_model extends CI_Model {
    public function getProjectData($project_id)
    {
        $project = $this->select('ptk.user_id, ptk.nama, project.*')
        ->from('project')
        ->join('ptk', 'project.user_id = ptk.user_id')
        ->where('project_id', $project_id)
        ->get()->result_array();

        $bidder = $this->select('project_bidder.*, mhs.user_id, mhs.nama')
        ->from('project_bidder')
        ->join('mhs', 'project_bidder.user_id = mhs.user_id')
        ->where('project_id', $project_id)
        ->get()->result_array();

        if($project != NULL){
            $ret = ['project' => $project[0], 'bidder' => $bidder];
            return $ret;
        } else {
            return NULL;
        }
    }
}