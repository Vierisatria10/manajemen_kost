<?php
class PenghuniModel extends CI_Model{
 
    var $table = 'tbl_penghuni';
    var $column_order = array(null, 'nomor_penghuni', 'nama_penghuni', 'id_kamar', 'ukuran_kamar', 'harga', 'status');
    var $column_search = array('nomor_penghuni', 'ukuran_kamar');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function _get_datatables_query()
    {
        $this->db->select('a.*, b.*');
        $this->db->from('tbl_penghuni a');
        $this->db->join('tbl_kamar b', 'a.id_kamar = b.id_kamar', 'left');
        $i = 0;

        foreach ($this->column_search as $item)
        {
            if ($_POST['search']['value']) 
            {

                if ($i === 0)
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->select('a.*, b.*');
        $this->db->from('tbl_penghuni a');
        $this->db->join('tbl_kamar b', 'a.id_kamar = b.id_kamar', 'left');
        return $this->db->count_all_results();
    }

    public function createkode()
    {
        $query = $this->db->query("SELECT MAX(nomor_penghuni) as nomor_penghuni from tbl_penghuni");
        $hasil = $query->row();
        return $hasil->nomor_penghuni;
    }

    public function get_kamar()
    {
        $this->db->select('*');
        $this->db->from('tbl_kamar');
        return $this->db->get()->result_array();
    }

    public function insert_penghuni($data)
    {
        return $this->db->insert('tbl_penghuni', $data);
    }

    public function update_penghuni($id_penghuni, $data)
    {
        return $this->db->where('id_penghuni', $id_penghuni)
                        ->update('tbl_penghuni', $data);
    }

    public function get_kamar_edit()
    {
        $this->db->select('*');
        $this->db->from('tbl_kamar');
        return $this->db->get();
    }

    public function get_by_id($id_penghuni)
    {
        $this->db->select('a.*, b.*');
        $this->db->from('tbl_penghuni a');
        $this->db->join('tbl_kamar b', 'a.id_kamar = b.id_kamar', 'left');
        $this->db->where('a.id_penghuni', $id_penghuni);
        $query = $this->db->get();
 
        return $query->row();
    }

    public function get_detail_id($id_penghuni)
    {
        $this->db->select('a.*, b.*');
        $this->db->from('tbl_penghuni a');
        $this->db->join('tbl_kamar b', 'a.id_kamar = b.id_kamar', 'left');
        $this->db->where('a.id_penghuni', $id_penghuni);
        $query = $this->db->get();
        return $query->row();
    }

    public function delete_by_id($id_penghuni)
    {
        $this->db->where('id_penghuni', $id_penghuni);
        return $this->db->delete($this->table);
    }
}