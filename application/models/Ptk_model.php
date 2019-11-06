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
        $ret = $this->db->select('project.project_id, project.project_name, project.budget, project.project_name, project.project_status')
                        ->from('project')
                        ->where('project.user_id', $user_id)
                        ->get()->result_array();
        if ( $ret != NULL ) {
            return $ret;
        } else {
            return NULL;
        }
    }

    public function chooseBidder($project_id, $user_id)
    {
        $this->db->where('project_id', $project_id)
                ->where('user_id', $user_id)
                ->update('project_bidder', ['bid_status' => '1']);
    }

    public function deleteChoosen($project_id, $user_id)
    {
        $this->db->where('project_id', $project_id)
            ->where('user_id', $user_id)
            ->update('project_bidder', ['bid_status' => '0']);
    }

    public function addBalance($user_id, $balance)
    {
        $current_balance = $this->db->select('saldo')
                                    ->from('ptk')
                                    ->where('ptk.user_id', $balance)
                                    ->get()->result_array();
        $new_balance = strval(intval($current_balance) + $balance);

        $this->db->where('user_id', $user_id)
                ->update('ptk', ['saldo' => $new_balance]);
    }

}