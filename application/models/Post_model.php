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
        $this->db->order_by('post.time','DESC');
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
        $this->db->join('user','user.user_id = post.user_id');
        $this->db->where('post_id',$post_id);
        $query = $this->db->get();
        $data = $query->row_array();
        $comments = $this->Comment_model->load_comment($post_id);
        $data['comments'] = $comments;
        return $data;
    }
    function delete_post($post_id)
    {
        $flag = FALSE;
        $this->db->where('post_id',$post_id);
        $flag = $this->db->delete('post');
        return $flag;
    }
//    order
    function post_order_by_name()
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->join('user','user.user_id = post.user_id');
        $this->db->order_by('post.name');
        $query = $this->db->get();
        $data = $query->result_array();
        for ($i =0 ; $i <count($data); $i++){
            $comments = $this->Comment_model->load_comment($data[$i]['post_id']);
            $data[$i]['comments'] = $comments;
        }
        return $data;
    }
    function post_order_by_name_desc()
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->join('user','user.user_id = post.user_id');
        $this->db->order_by('post.name','desc');
        $query = $this->db->get();
        $data = $query->result_array();
        for ($i =0 ; $i <count($data); $i++){
            $comments = $this->Comment_model->load_comment($data[$i]['post_id']);
            $data[$i]['comments'] = $comments;
        }
        return $data;
    }
    function post_order_by_price()
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->join('user','user.user_id = post.user_id');
        $this->db->order_by('post.sprice');
        $query = $this->db->get();
        $data = $query->result_array();
        for ($i =0 ; $i <count($data); $i++){
            $comments = $this->Comment_model->load_comment($data[$i]['post_id']);
            $data[$i]['comments'] = $comments;
        }
        return $data;
    }
    function post_order_by_price_desc()
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->join('user','user.user_id = post.user_id');
        $this->db->order_by('post.sprice','desc');
        $query = $this->db->get();
        $data = $query->result_array();
        for ($i =0 ; $i <count($data); $i++){
            $comments = $this->Comment_model->load_comment($data[$i]['post_id']);
            $data[$i]['comments'] = $comments;
        }
        return $data;
    }
//    search
    function search($name)
    {
        $this->db->select('*');
        $this->db->join('user','user.user_id = post.user_id');
        $this->db->like('post.name', $name);
        $this->db->or_like('post.description', $name);
        $this->db->from('post');

        $query = $this->db->get();
        $data = $query->result_array();
        for ($i =0 ; $i <count($data); $i++){
            $comments = $this->Comment_model->load_comment($data[$i]['post_id']);
            $data[$i]['comments'] = $comments;
        }
        return $data;
    }
}