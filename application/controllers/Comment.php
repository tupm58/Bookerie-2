<?php

/**
 * Created by IntelliJ IDEA.
 * User: MinhTu
 * Date: 9/29/2016
 * Time: 11:11 PM
 */
class Comment extends MY_Controller
{
    function __construct()
    {
        $this->_module = trim(strtolower((__CLASS__)));
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->model('User_model');
        $this->load->model('Comment_model');
        $this->load->model('Notification_model');

        $this->load->helper(array('form', 'security'));
        $this->load->library('form_validation');
        //$this->_check_login();
    }

    function index()
    {
//        $data = array();
//        $data['comment'] = $this->Comment_model->load_comment();
//        $this->load->view("post/index_view.php",$data);// load view
//        echo $data;
    }
    function add_comment()
    {
        if ($this->input->is_ajax_request()) {
            $content = $this->input->post('content');
            $user_id = $this->_session_uid();

            $post_id = $this->input->post('post_id');
            $receiver_id = $this->input->post('receiver_id');
            
            $data = array(
                "content" => $content,
                "user_id" => $user_id,
                "post_id" => $post_id,
                'time' => date('y-m-d')
            );
            $notis = array(
                "post_id" => $post_id,
                "receiver_id" => $receiver_id,
                "sender_id" => $user_id,
                "seen" => 0,
                'time' => date('y-m-d')
            );
            $add = $this->Comment_model->add_comment($data);
            if ($user_id != $receiver_id){
                $noti = $this->Notification_model->add_noti($notis);
            }
        }
    }
    function load_comment($post_id)
    {
        $data = array();
        $data['comment'] = $this->Comment_model->load_comment($post_id);
        return $data;
        $this->load->view("post/index_view.php",$data);// load view
    }
}