<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model{
    public function auth ( $hash ) {
        $ret = $this->db->select('username')
                        ->from('user')
                        ->where('password', $hash)
                        ->get()->result_array();
        if ( $ret != NULL ) {
            return true;
        } else {
            return false;
        }
    }

    public function getRole ( $id ) {
        $ret = $this->db->select('role')
                        ->from('user')
                        ->where('id', $id)
                        ->get()->result_array();
        if ( $ret != NULL ) {
            return $ret['role'][0];
        } else {
            return NULL;
        }
    }

    public function getProfileData ( $id ) {
        $role = $this->getRole( $id );

        $ret = $this->db->select()
                        ->from($role)
                        ->where('id', $id)
                        ->get()->result_array();
        if ( $ret != NULL ) {
            return $ret;
        } else {
            return NULL;
        }                
    }

}