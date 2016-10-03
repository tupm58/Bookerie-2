<?php

/**
 * Created by IntelliJ IDEA.
 * User: MinhTu
 * Date: 9/18/2016
 * Time: 9:16 AM
 */
class Post_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function create_post($data)
    {
        $check_flag = false;
        $insert = $this->db->insert('post',$data);
        if ($insert){
            $check_flag = TRUE;
        }
        return $check_flag;
    }

    function load_all_posts()
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->join('user','user.user_id = post.user_id');
//        $this->db->join('comment','comment.comment_id = post.comment_id');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
}