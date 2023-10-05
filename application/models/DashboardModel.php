<?php
class DashboardModel extends CI_Model{
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function data_kamar()
    {
        return $this->db->get('tbl_kamar')->num_rows();
    }

    public function data_penghuni()
    {
        return $this->db->get('tbl_penghuni')->num_rows();
    }
}