<?php
class KamarModel extends CI_Model{
 
    var $table = 'tbl_kamar';
    var $column_order = array(null, 'nomor_kamar', 'fasilitas', 'lantai', 'ukuran_kamar', 'harga', 'status');
    var $column_search = array('nomor_kamar', 'ukuran_kamar');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function _get_datatables_query()
    {
        $this->db->select('a.*, b.*');
        $this->db->from('tbl_kamar a');
        // $this->db->from($this->table);
        $this->db->join('tbl_penghuni b', 'a.id_penghuni = b.id_penghuni', 'left');

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
        // $this->db->select('a.*, b.*');
        $this->db->from($this->table);
        // $this->db->join('tbl_penghuni b', 'a.id_penghuni = b.id_penghuni', 'left');
        return $this->db->count_all_results();
    }

    public function createkode()
    {
        $query = $this->db->query("SELECT MAX(nomor_kamar) as nomor_kamar from tbl_kamar");
        $hasil = $query->row();
        return $hasil->nomor_kamar;
    }

    public function insert_kamar($data)
    {
        return $this->db->insert('tbl_kamar', $data);
    }
    
    public function get_by_id($id_kamar)
    {
        $this->db->select('a.*, b.*');
        $this->db->from('tbl_kamar a');
        // $this->db->from($this->table);
        $this->db->join('tbl_penghuni b', 'a.id_penghuni = b.id_penghuni', 'left');
        $this->db->where('a.id_kamar',$id_kamar);
        $query = $this->db->get();
 
        return $query->row();
    }

    public function update_kamar($id_update, $data)
    {
        return $this->db->where('id_kamar', $id_update)
                        ->update('tbl_kamar', $data);
    }

    public function delete_by_id($id_kamar)
    {
        $this->db->where('id_kamar', $id_kamar);
        return $this->db->delete($this->table);
    }
}