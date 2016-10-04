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
        $query = $this->db->get();
        $data = $query->result_array();
        for ($i =0 ; $i <count($data); $i++){
            $comments = $this->Comment_model->load_comment($data[$i]['post_id']);
            $data[$i]['comments'] = $comments;
        }
        return $data;
    }
    function get_post_detail($post_id)
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->where('post_id',$post_id);
        $query = $this->db->get();
        $data = $query->row_array();
        return $data;
    }
    function delete_post($post_id)
    {
        $flag = FALSE;
        $this->db->where('post_id',$post_id);
        $flag = $this->db->delete('post');
        return $flag;
    }
}