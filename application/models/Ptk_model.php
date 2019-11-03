<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ptk_model extends CI_Model{

    public function getProfileData ( $id )
    {
        $ret = $this->db->select()
                        ->from('ptk')
                        ->where('user_id', $id)
                        ->get()->result_array();
        if ( $ret != NULL ) {
            return $ret[0];
        } else {
            return NULL;
        }
    }

    public function getProjectList ( $user_id )
    {
        $ret = $this->db->select('project.project_id, project.project_name, project.budget, project.project_name')
                        ->from('project')
                        ->where('project.user_id', $user_id)
                        ->get()->result_array();
        if ( $ret != NULL ) {
            return $ret;
        } else {
            return NULL;
        }
    }

}