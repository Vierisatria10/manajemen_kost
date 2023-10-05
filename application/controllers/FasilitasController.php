<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FasilitasController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }

        $this->load->model('FasilitasModel', 'fasilitas');
    }

    public function index()
	{
        $data['title'] = 'Fasilitas - Kost';
		$this->template->load('layouts/main', 'fasilitas/v_fasilitas', $data);
	}

    public function get_data_fasilitas()
    {
        $list = $this->fasilitas->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach($list as $field) {
            $no++;
            $row[] = '<b>'.$field->fasilitas.'</b>';
        
            $aksi = '
            <div class="d-flex justify-content-center items-align-center">
                <a class="btn btn-sm btn-info mx-1" href="javascript:void(0)" title="Edit" onclick="detail_penghuni('."'".$field->id_fasilitas."'".')"><i class="fa fa-eye"></i></a>
			    <a class="btn btn-sm btn-warning mx-1" href="javascript:void(0)" title="Edit" onclick="edit_penghuni('."'".$field->id_fasilitas."'".')"><i class="fa fa-edit"></i></a>
			    <a class="btn btn-danger btn-sm" href="javascript:void(0)" title="Hapus" onclick="delete_penghuni('."'".$field->id_fasilitas."'".')" data-id='.$field->id_fasilitas.'><i class="fa fa-trash fa-lg"></i></a>
			</div>';

            $row[] = $aksi;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->fasilitas->count_all(),
            "recordsFiltered" => $this->fasilitas->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function add_fasilitas()
    {
        $fasilitas = $this->input->post('fasilitas');

        if (!empty($this->input->post('fasilitas'))) {
            foreach ($this->input->post('fasilitas') as $key => $value) {
                $this->db->insert('tbl_fasilitas', $value);
            }
            // if ($insert) {
            //     $response = [
            //         'status' => 'success',
            //         'message' => 'Berhasil Simpan Data Fasilitas'
            //     ];
            //     echo json_encode($response);
            // }else{
            //     $response = [
            //         'status' => 'error',
            //         'message' => 'Gagal Simpan Data Fasilitas'
            //     ];
            // }
        }
        // $data = array(
        //     'fasilitas' => $fasilitas
        // );
        
        
    }
}