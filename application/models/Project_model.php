<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project_model extends CI_Model {
    public function getProjectList () {
        return $this->db->select('project_id, description, budget, tag')
                        ->from('project')
                        ->get()->result_array();
    }

    public function getProjectSpecification ($project_id) {
        return $this->db->select()
                        ->from('project')
                        ->where('project_id'. $project_id)
                        ->get()->result_array();
    }

    public function getProjectListByUser ( $id ) {
        $this->load->model('user');
        $role = $this->user->getRole( $id );
        if ( $role == 'mhs' ) {
            return $this->getMhsProjectList( $id );
        } else {
            return $this->getPtkProjectList( $id );
        }
    }

    public function getMhsProjectList ( $id ) {
        return $this->db->select()
                        ->from('project')
                        ->where('project_id', $id)
                        ->get()->result_array();
    }

    public function getPtkProjectList ( $id ) {
        return $this->db->select()
                        ->from('project')
                        ->where('project_id', $id)
                        ->get()->result_array();
    }

    public function getProjectBidder ( $project_id ) {
        return $this->db->select()
                        ->from('project_bidder')
                        ->where('project_id', $project_id)
                        ->get()->result_array();
    }


}