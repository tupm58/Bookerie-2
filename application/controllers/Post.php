<?php

/**
 * Created by IntelliJ IDEA.
 * User: MinhTu
 * Date: 9/11/2016
 * Time: 11:48 PM
 */
class Post extends MY_Controller
{
    function __construct()
    {
        $this->_module = trim(strtolower((__CLASS__)));
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->model('User_model');
        $this->load->model('Comment_model');
       // $this->load->controller('Comment_model');

        $this->load->helper(array('form', 'security'));
        $this->load->library('form_validation');
        //$this->_check_login();
    }

    private function _check_login()
    {
        $login = $this->_is_login();
        if (!$login) {
            redirect(site_url('user'));
        }
    }

    function index()
    {
        $header = array();
        $header['title'] = "Post";
        $this->_load_header($header);
        $this->_load_left();
        
        $user_id = $this->_session_uid();
        $this->User_model->find_user_by_id($user_id);
     //   $this->Comment_model->load_comment();
        $data = array();
        $data['post'] = $this->Post_model->load_all_posts();
        
        $this->load->view("post/index_view.php",$data);// load view
    }

    function add()
    {
        if ($this->input->post('createPost')) {
            //   $this->_check_login();
            $name = $this->input->post('name');
            $name = $this->security->xss_clean($name);

            $quality = $this->input->post('quality');
            $quality = $this->security->xss_clean($quality);

            $oprice = $this->input->post('oprice');
            $oprice = $this->security->xss_clean($oprice);

            $sprice = $this->input->post('sprice');
            $sprice = $this->security->xss_clean($sprice);

            $description = $this->input->post('description');
            $description = $this->security->xss_clean($description);

            //up anh
            $config['upload_path'] = './uploads/images/post';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors();
            } else {
                $check = $this->upload->data();
                $this->load->library("image_lib");
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/images/post/' . $check['file_name'];
            }
            $img_path = $config['source_image'];

            $user_id = $this->_session_uid();

            $data = array(
                'name' => $name,
                'quality' => $quality,
                'oprice' => $oprice,
                'sprice' => $sprice,
                'description' => $description,
                'time' => date('y-m-d'),
                'image' => $img_path,
                'user_id' => $user_id
            );
            $add = $this->Post_model->create_post($data);
            if ($add) {
                redirect(site_url('post'));

            } else {
                echo "not ok";

            }
        }
    }
    
    function post_detail($post_id)
    {
        $data = $this->Post_model->get_post_detail($post_id);
        var_dump($data);
        $this->load->view("post/post_detail_view.php",$data);// load view
    }
    
    function update($post_id)
    {
        
    }
    
    function delete($post_id)
    {
        
        $delete = $this->Post_model->delete_post($post_id);
        if ($delete){
            redirect(site_url('post/index'));
        }
    }
}