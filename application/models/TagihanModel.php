<?php
class TagihanModel extends CI_Model{
 
    var $table = 'tbl_tagihan';
    // var $column_order = array(null, 'nomor_kamar', 'fasilitas', 'lantai', 'ukuran_kamar', 'harga', 'status');
    // var $column_search = array('nomor_kamar', 'ukuran_kamar');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_nama_penghuni($id_penghuni_tagihan)
    {
        $this->db->select('a.*, b.*');
        $this->db->from('tbl_penghuni a');
        $this->db->join('tbl_kamar b', 'a.id_penghuni = b.id_penghuni', 'left');
        $this->db->where('a.id_penghuni', $id_penghuni_tagihan);
        return $this->db->get()->row();
    }

    public function get_data_penghuni()
    {
        $this->db->select('*');
        $this->db->from('tbl_penghuni');
        return $this->db->get()->result_array();
    }

    public function createkode()
    {
        $query = $this->db->query("SELECT MAX(nomor_tagihan) as nomor_tagihan from tbl_tagihan");
        $hasil = $query->row();
        return $hasil->nomor_tagihan;
    }
}