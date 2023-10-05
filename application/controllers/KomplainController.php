<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KomplainController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }

        $this->load->model('KomplainModel', 'komplain');
    }

    public function index()
    {
        $data['title'] = 'Komplain - Kost';
        // $data['get_data'] = $this->kamar->get_data_kamar();
		$this->template->load('layouts/main', 'komplain/v_komplain', $data);
    }

    public function get_data_komplain()
    {
        $list = $this->komplain->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach($list as $field) {
            // $no++;
            
            $row[] = '<b>'.$field->nomor_penghuni.'</b>';
            $row[] = $field->nama_penghuni;
            $row[] = '<b>'.$field->nomor_kamar.'</b>';
            $row[] = $field->jenis_komplain;
            $row[] = $field->lama_keresahan;
            $row[] = $field->permasalahan;
            // $row[] = $field->status;
        
            $aksi = '
            <div class="d-flex justify-content-center items-align-center">
            <a class="btn btn-sm btn-success mx-1" href="javascript:void(0)" title="Cetak Komplain" onclick="cetak_komplain('."'".$field->id_komplain."'".')"><i class="fa fa-print"></i></a>
			</div>
            ';

            $row[] = $aksi;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->komplain->count_all(),
            "recordsFiltered" => $this->komplain->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function cetak_komplain($id_komplain)
    {
        $data = $this->komplain->get_by_id($id_komplain);
        echo json_encode($data);
    }
}