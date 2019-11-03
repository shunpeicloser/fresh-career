<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mhs_model extends CI_Model{

    public function getProfileData ( $id ) {
        $ret = $this->db->select()
                        ->from('mhs')
                        ->where('user_id', $id)
                        ->get()->result_array();
        if ( $ret != NULL ) {
            return $ret[0];
        } else {
            return NULL;
        }
    }

    public function getProjectList ( $user_id ) {
        $ret = $this->db->select('project_bidder.*, project.budget, project.project_name, ptk.nama, ptk.user_id as ptk_id')
                        ->from('project_bidder')
                        ->join('project', 'project_bidder.project_id = project.project_id')
                        ->join('ptk', 'project.user_id = ptk.user_id')
                        ->where('project_bidder.user_id', $user_id)
                        ->get()->result_array();
        if ( $ret != NULL ) {
            return $ret;
        } else {
            return NULL;
        }
    }

}