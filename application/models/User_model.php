<?php

/**
 * Created by IntelliJ IDEA.
 * User: MinhTu
 * Date: 9/11/2016
 * Time: 11:20 PM
 */
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function insert_data($data_insert)
    {
        $check_flag = FALSE;
        $insert = $this->db->insert('user',$data_insert);
        if ($insert){
            $check_flag = TRUE;
        }
        return $check_flag;
    }

    function find_user($username,$password)
    {
        $data = array();
        $this->db->select('*');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $this->db->from('user');
        $query = $this->db->get();
        $data = $query->row_array();
        return $data;
    }

    function find_user_by_id($id)
    {
        $data = array();
        $this->db->select('*');
        $this->db->where('user_id',$id);
        $this->db->from('user');
        $query = $this->db->get();
        $data = $query->row_array();
        return $data;
    }
    function update_user($id,$data)
    {
        $flag = FALSE;
        $this->db->where('user_id',$id);
        $flag = $this->db->update('user',$data);
        return $flag;
    }
    
}