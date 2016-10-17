<?php

/**
 * Created by IntelliJ IDEA.
 * User: MinhTu
 * Date: 10/14/2016
 * Time: 4:07 PM
 */
class Notification_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function add_noti($notis)
    {
        $check_flag = false;
        $insert = $this->db->insert('notification',$notis);
        if ($insert){
            $check_flag = TRUE;
        }
        return $check_flag;
    }
    function load_notification($user_id)
    {
        $this->db->select('*');
        $this->db->join('user','user.user_id = sender_id');
        $this->db->join('post','post.post_id = notification.post_id');
        $this->db->from('notification');
        $this->db->where('receiver_id',$user_id);
        $this->db->where('seen',0);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function count_noti($user_id){
        $this->db->select('*');
        $this->db->join('user','user.user_id = sender_id');
        $this->db->join('post','post.post_id = notification.post_id');
        $this->db->from('notification');
        $this->db->where('receiver_id',$user_id);
        $this->db->where('seen',0);

        $count = $this->db->count_all_results();
        return $count;
    }
    function edit_noti($id)
    {
        $data = array(
            'seen'=>1
        );
        $this->db->where('id',$id);
        $this->db->update('notification',$data);
    }
}