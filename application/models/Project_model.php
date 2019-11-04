<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project_model extends CI_Model {

    public function getProjectList()
    {
        $ret = $this->db->select('project.*, ptk.user_id, ptk.nama')
                        ->from('project')
                        ->join('ptk', 'project.user_id = ptk.user_id')
                        ->where('project_status', '0')
                        ->get()->result_array();
        return $ret;
    }

    public function getProjectData($project_id, $bidder_id=0)
    {
        $project = $this->db->select('ptk.user_id, ptk.nama, project.*')
        ->from('project')
        ->join('ptk', 'project.user_id = ptk.user_id')
        ->where('project_id', $project_id)
        ->get()->result_array();

        $choosen = $this->db->select('project_bidder.*, mhs.user_id, mhs.nama')
        ->from('project_bidder')
        ->join('mhs', 'project_bidder.user_id = mhs.user_id')
        ->where('project_id', $project_id)
        ->where('project_bidder.bid_status', '1')
        ->get()->result_array(); 

        $bidder = $this->db->select('project_bidder.*, mhs.user_id, mhs.nama')
        ->from('project_bidder')
        ->join('mhs', 'project_bidder.user_id = mhs.user_id')
        ->where('project_id', $project_id)
        ->where('project_bidder.user_id', $bidder_id)
        ->get()->result_array();

        $other = $this->db->select('project_bidder.*, mhs.user_id, mhs.nama')
        ->from('project_bidder')
        ->join('mhs', 'project_bidder.user_id = mhs.user_id')
        ->where('project_id', $project_id)
        ->where('bid_status', '0')
        ->where('project_bidder.user_id !=', $bidder_id)
        ->get()->result_array();

        if($project != NULL){
            $ret = ['project' => $project[0], 'other' => $other, 'choosen' => $choosen];
            if($bidder != NULL)
                $ret['bidder'] = $bidder[0];
            return $ret;
        } else {
            return NULL;
        }
    }

    public function addBid($data)
    {
        $flag = $this->db->select('user_id')
                        ->from('project_bidder')
                        ->where('user_id', $data['user_id'])
                        ->where('project_id', $data['project_id'])
                        ->get()->result_array();
        if($data['bid_value'] == '' && $data['comment'] == ''){
            $this->db->where('user_id', $data['user_id'])
                    ->where('project_id', $data['project_id'])
                    ->delete('project_bidder');
        } else if($flag == NULL){
            $this->db->insert('project_bidder', $data);
        } else {
            $this->db->where('user_id', $data['user_id'])
                    ->where('project_id', $data['project_id'])
                    ->update('project_bidder', $data);
        }
    }

    public function saveProjectSpecification($data)
    {
        $this->db->where('project_id', $data['project_id'])
                    ->update('project', $data);
    }

}