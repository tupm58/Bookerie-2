<?php

/**
 * Created by IntelliJ IDEA.
 * User: MinhTu
 * Date: 9/29/2016
 * Time: 11:12 PM
 */
class Comment_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function add_comment($data)
    {
        $check_flag = false;
        $insert = $this->db->insert('comment',$data);
        if ($insert){
            $check_flag = TRUE;
        }
        return $check_flag;
    }

    function load_comment($post_id)
    {
        $this->db->select('content , comment.time,comment.user_id , username, avatar');
        $this->db->from('comment');
        $this->db->where('comment.post_id',$post_id);
        $this->db->join('user','comment.user_id = user.user_id');
        $this->db->join('post','comment.post_id = post.post_id');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

}