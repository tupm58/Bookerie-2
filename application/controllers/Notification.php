<?php

/**
 * Created by IntelliJ IDEA.
 * User: MinhTu
 * Date: 10/14/2016
 * Time: 10:35 PM
 */
class Notification extends MY_Controller
{
    function __construct()
    {
        $this->_module = trim(strtolower((__CLASS__)));
        parent::__construct();
        $this->load->model('Notification_model');
        $this->load->helper(array('form', 'security'));
        $this->load->library('form_validation');
        //$this->_check_login();
    }
    function load_noti()
    {
        $user_id = $this->_session_uid();
        $data['notification'] = $this->Notification_model->load_notification($user_id);
        $view = $this->load->view("noti_ajax_view", $data, TRUE);
        echo $view;
    }
    function edit_noti($id)
    {
        $this->Notification_model->edit_noti($id);
    }
}