<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model{
    public function getUserId( $username, $hash )
    {
        $ret = $this->db->select('user_id')
                        ->from('user')
                        ->where('username', $username)
                        ->where('password', $hash)
                        ->get()->result_array();
        if ( $ret != NULL ) {
            return $ret[0]['user_id'];
        } else {
            return NULL;
        }
    }

    public function getUserData($id)
    {
        $ret = $this->db->select('user_id, username, role')
                        ->from('user')
                        ->where('user_id', $id)
                        ->get()->result_array();
        if ( $ret != NULL ) {
            return $ret[0];
        } else {
            return false;
        }
    }

    public function getRole( $id )
    {
        $ret = $this->db->select('role')
                        ->from('user')
                        ->where('user_id', $id)
                        ->get()->result_array();
        if ( $ret != NULL ) {
            return $ret[0]['role'];
        } else {
            return NULL;
        }
    }

    // public function getProfileData ( $id ) {
    //     $role = $this->getRole( $id );

    //     $ret = $this->db->select()
    //                     ->from($role)
    //                     ->where('id', $id)
    //                     ->get()->result_array();
    //     if ( $ret != NULL ) {
    //         return $ret;
    //     } else {
    //         return NULL;
    //     }                
    // }

}