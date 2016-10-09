<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: MinhTu
 * Date: 9/9/2016
 * Time: 11:02 PM
 */
class User extends MY_Controller
{
    function __construct()
    {
        $this->_module = trim(strtolower((__CLASS__)));
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper(array('security'));
        $this->load->library('form_validation');
    }
    private function _check_login()
    {
        $login = $this->_is_login();
        if (!$login) {
            redirect(site_url('user'));
        }
    }
    
    function index(){
        $this->load->view('user/index_view');
    }

    function register()
    {
        if($this->input->post('txtUsername')){
            $this->form_validation->set_rules('txtUsername','Username','required|min_length[3]|is_unique[user.username]');
            $this->form_validation->set_rules('txtPass','password','required|min_length[3]');
            $this->form_validation->set_rules('txtPassRetype', 'Nhập lại Mật khẩu',
                'required|min_length[3]|max_length[64]|matches[txtPass]');
            $this->form_validation->set_rules('txtEmail','Email','required|valid_email|is_unique[user.email]');
        }
        if ($this->form_validation->run() == false){
            echo "err";
        }else{

            $username = $this->input->post('txtUsername');
            $username = $this->security->xss_clean($username);
            $password = $this->input->post('txtPass');
            $password = $this->security->xss_clean($password);
            $email = $this->input->post('txtEmail');
            $email = $this->security->xss_clean($email);
            
            $data = array(
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'status'=> 1,
                    'level' => 3,
                    'create' => date('y-m-d')

            );
            $add = $this->User_model->insert_data($data);
            if ($add){
                redirect(site_url('user#login'));
            }else{
                redirect(site_url('user/index/?err=fail'));
            }
        }
    }

    function login()
    {
        if($this->input->post('lgUsername')){
            $this->form_validation->set_rules('lgUsername','Username','required|min_length[3]');
            $this->form_validation->set_rules('lgPassword','password','required|min_length[3]');
        }
        if ($this->form_validation->run() == false){
            echo "err";
        }else{
            $username = $this->input->post('lgUsername');
            $username = $this->security->xss_clean($username);
            $password = $this->input->post('lgPassword');
            $password = $this->security->xss_clean($password);
            $data = array(
                'username' => $username,
                'password' => $password
            );
            $find = $this->User_model->find_user($username,$password);
            if(!empty($find) && count($find) > 0){
                session_unset();
                session_regenerate_id();
                $this->session->set_userdata('userid',$find['user_id']);
                $this->session->set_userdata('username',$find['username']);
                $this->session->set_userdata('useremail',$find['email']);
                $this->session->set_userdata('userrole',$find['level']);
                redirect(site_url('post'));
            }else{
                redirect(site_url('User/index/?err=fail'));
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('user'));
    }

    function profile()
    {
        $this->_check_login();
        $header = array();
        $header['title'] = "Profile";
        $this->_load_header($header);
        $user_id = $this->_session_uid();
        $data = array();
        $data['user'] = $this->User_model->find_user_by_id($user_id);
        $this->load->view('user/profile_view',$data);
    }
    function update()
    {
        $id = $this->_session_uid();
        if ($this->input->post('editProfile'))
        {
            $address = $this->input->post('address');
            $address = $this->security->xss_clean($address);

            $phone = $this->input->post('phone');
            $phone = $this->security->xss_clean($phone);
            //up anh
            $config['upload_path'] = './uploads/images/avatar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors();
            } else {
                $check = $this->upload->data();
                $this->load->library("image_lib");
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/images/avatar/' . $check['file_name'];
            }
            $img_path = $config['source_image'];
            $data = array(
                'address' => $address,
                'phone' => $phone,
                'avatar' => $img_path
            );
            $edit = $this->User_model->update_user($id,$data);
            if ($edit) {
                redirect(site_url('user/profile'));
            } else {
                echo "not ok";
            }
        }
    }



    function get_user($id =0)
    {
        $this->_check_login();
        $header = array();
        $header['title'] = "Profile";
        $this->_load_header($header);
        $data = array();
        $data['user'] = $this->User_model->find_user_by_id($id);
        if ($id == $this->_session_uid()){
            $this->load->view('user/profile_view',$data);
        }else{
            $this->load->view('user/other_profile_view',$data);
        }

    }
  
}