<?php
class UserModel extends CI_Model{
 
    var $table = 'tbl_user';
    var $column_order = array(null, 'id_user', 'nama', 'username', 'level', 'no_hp');
    var $column_search = array('id_user', 'nama');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function _get_datatables_query()
    {
        $this->db->from($this->table);
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
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function insert_user($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_user($id_user, $data)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->update($this->table, $data);
    }

    public function get_by_id($id_user)
    {
        $this->db->from($this->table);
        $this->db->where('id_user', $id_user);
        return $this->db->get()->row();
    }

    public function delete_by_id($id_user)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->delete($this->table);
    }

    public function insert_komplain($data)
    {
        return $this->db->insert('tbl_komplain', $data);
    }

    public function get_data_penghuni_komplain()
    {
        $this->db->select('*');
        $this->db->from('tbl_penghuni');
        return $this->db->get()->result_array();
    }
}