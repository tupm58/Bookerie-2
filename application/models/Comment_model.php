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

}