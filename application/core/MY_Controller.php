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
        $this->load->view('header_view');
    }
    protected function _session_uname(){
        $uname = trim($this->session->userdata('username')); //lay session ra
        return $uname;
    }
    protected function _session_uid(){
        $user_id = trim($this->session->userdata('userid'));
        $user_id = isIdNumber($user_id) ? $user_id: 0;
        return $user_id;
    }
    
}