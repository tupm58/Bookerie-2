<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: MinhTu
 * Date: 9/10/2016
 * Time: 2:26 PM
 */
class MY_Controller extends CI_Controller
{
    protected $_module     = '';

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));

    }
    
    protected function _load_header()
    {
        $header = array();
        $header['title'] = isset($data['title']) ? $data['title'] : "";
        $header['meta'] = isset($data['meta']) ? $data['meta'] : "";
        $header['module'] = $this->_module;
        $header['username'] = $this->_session_uname();
        $header['userid'] = $this->_session_uid();
        $header['useravatar'] = $this->_session_uavatar();
        $this->load->view('header_view',$header);
    }
    protected function _load_left()
    {
        $this->load->view('left_view');
    }
    protected function _session_uname(){
        $uname = trim($this->session->userdata('username')); //lay session ra
        return $uname;
    }
    protected function _session_uid(){
        $user_id = trim($this->session->userdata('userid'));
//        $user_id = isIdNumber($user_id) ? $user_id: 0;
        return $user_id;
    }
    protected function _session_uavatar(){
        $user_ava = trim($this->session->userdata('useravatar'));
        return $user_ava;
    }

    protected function _is_login(){
        $user_id = $this->_session_uid();
        $uname = $this->_session_uname();
        return ($user_id > 0 && $uname != '') ? TRUE : FALSE;
    }
    
}