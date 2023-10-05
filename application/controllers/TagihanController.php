<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TagihanController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }

        $this->load->model('TagihanModel', 'tagihan');
    }

    public function index()
	{
        $data['title'] = 'Tagihan - Kost';
        $dariDB = $this->tagihan->createkode();
        $nourut = substr($dariDB, 3, 4);
        $notagihansekarang = $nourut + 1;
        $data['nomor_tagihan'] = $notagihansekarang;
		$this->template->load('layouts/main', 'tagihan/v_tagihan', $data);
	}

    public function get_data_penghuni()
    {
        $get_penghuni = $this->tagihan->get_data_penghuni();
        $data['get_penghuni'] = $get_penghuni;
        echo json_encode($data);
    }

    public function get_nama_penghuni()
    {
        $id_penghuni_tagihan = $this->input->get('id_penghuni_tagihan');
        $this->db->select('a.*, b.*');
        $this->db->from('tbl_penghuni a');
        $this->db->join('tbl_kamar b', 'a.id_penghuni = b.id_penghuni', 'left');
        // $this->db->join('m_pic_tagih', 'm_pic_tagih.user_id = user.user_id');
        $this->db->where('a.id_penghuni', $id_penghuni_tagihan);
        $data = $this->db->get()->row();
        // $data['get_nama'] = $get_nama_penghuni->row();
        echo json_encode($data);
    }
}