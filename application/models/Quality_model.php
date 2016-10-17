<?php

/**
 * Created by IntelliJ IDEA.
 * User: MinhTu
 * Date: 10/2/2016
 * Time: 10:50 AM
 */
class Quality_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_quality()
    {
        $this->db->select('*');
        $this->db->from('quality');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
}