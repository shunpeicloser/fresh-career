<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
    {
        if( $this->session->tempdata() != NULL ){
            $this->_roleredirect($this->session->tempdata('role'));
        } else {
            $this->load->view('auth/login_view');
        }
    }

    private function _roleredirect($role)
    {
        redirect("$role", 'refresh');
    }

    private function _authCredential($username, $password)
    {
        $this->load->model('user_model', 'user');
        $id = $this->user->getUserId($username, $password); //note: masih raw
        if($id != NULL){
            return $this->user->getUserData($id);
        } else {
            return NULL;
        }
    }

    private function _createSession($userdata)
    {
        $data = array(
            'user_id' => $userdata['user_id'],
            'role' => $userdata['role']
        );
        $this->session->set_tempdata($data, NULL, 14400);
    }

    public function login()
    {
        $input = $this->input->post();
        $userdata = $this->_authCredential($input['username'], md5( $input['password']) );
        if( $userdata != NULL ){
            $this->_createSession($userdata);
        }
        redirect('auth','refresh');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth','refresh');
    }

}

/* End of file Controllername.php */
