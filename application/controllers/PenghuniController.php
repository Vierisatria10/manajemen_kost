<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenghuniController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }

        $this->load->model('PenghuniModel', 'penghuni');
    }

    public function index()
	{
        $data['title'] = 'Penghuni - Kost';
        $dariDB = $this->penghuni->createkode();
        $nourut = substr($dariDB, 3, 4);
        $nopenghunisekarang = $nourut + 1;
        $data['nomor_penghuni'] = $nopenghunisekarang;
        // $data['get_data'] = $this->kamar->get_data_kamar();
		$this->template->load('layouts/main', 'penghuni/v_penghuni', $data);
	}

    public function get_data_penghuni()
    {
        $list = $this->penghuni->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach($list as $field) {
            // $no++;
            $row[] = '<b>'.$field->nomor_penghuni.'</b>';
            $row[] = $field->nama_penghuni;
            $row[] = '<b>'.$field->nomor_kamar.'</b>';
            $row[] = isset($field->tgl_masuk) ? $field->tgl_masuk : '-';
            $row[] = isset($field->tgl_keluar) ? $field->tgl_keluar : '-';
            $row[] = $field->alamat_penghuni;
            $row[] = $field->no_telepon;
        
            $aksi = '
            <div class="d-flex justify-content-center items-align-center">
                <a class="btn btn-sm btn-info mx-1" href="javascript:void(0)" title="Edit" onclick="detail_penghuni('."'".$field->id_penghuni."'".')"><i class="fa fa-eye"></i></a>
			    <a class="btn btn-sm btn-warning mx-1" href="javascript:void(0)" title="Edit" onclick="edit_penghuni('."'".$field->id_penghuni."'".')"><i class="fa fa-edit"></i></a>
			    <a class="btn btn-danger btn-sm" href="javascript:void(0)" title="Hapus" onclick="delete_penghuni('."'".$field->id_penghuni."'".')" data-id='.$field->id_kamar.'><i class="fa fa-trash fa-lg"></i></a>
			</div>';

            $row[] = $aksi;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->penghuni->count_all(),
            "recordsFiltered" => $this->penghuni->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function get_kamar()
    {
        $get_kamar = $this->penghuni->get_kamar();
        $data['get_kamar'] = $get_kamar;
        echo json_encode($data);
    }

    public function add_penghuni()
    {
        $nomorpenghuni = $this->input->post('nomorpenghuni');
        $nama_penghuni = $this->input->post('nama_penghuni');
        $id_kamar = $this->input->post('id_kamar');
        $tgl_masuk = $this->input->post('tgl_masuk');
        $tgl_keluar = $this->input->post('tgl_keluar');
        $alamat_penghuni = $this->input->post('alamat_penghuni');
        $no_telepon = $this->input->post('no_telepon');

        $data = array(
            'nomor_penghuni' => $nomorpenghuni,
            'nama_penghuni' => $nama_penghuni,
            'id_kamar' => $id_kamar,
            'tgl_masuk' => $tgl_masuk,
            'tgl_keluar' => $tgl_keluar,
            'alamat_penghuni' => $alamat_penghuni,
            'no_telepon' => $no_telepon
        );

        $insert =  $this->penghuni->insert_penghuni($data);
        if ($insert) {
            $response = [
                'status' => 'success',
                'message' => 'Data Penghuni Berhasil di Simpan'
            ];
            echo json_encode($response);
        }else{
            $response = [
                'status' => 'error',
                'message' => 'Data Penghuni Gagal di Simpan'
            ];
            echo json_encode($response);
        }

    }

    public function edit_penghuni($id_penghuni)
    {
        $edit_penghuni = $this->penghuni->get_by_id($id_penghuni);
        $edit_select_kamar = $this->penghuni->get_kamar_edit()->result_array();
        $data['edit_select_kamar'] = $edit_select_kamar;
        $data['edit_penghuni'] = $edit_penghuni;
        echo json_encode($data);
    }

    public function update_penghuni()
    {
        $edit_nomorpenghuni = $this->input->post('edit_nomorpenghuni');
        $edit_nama_penghuni = $this->input->post('edit_nama_penghuni');
        $edit_id_kamar = $this->input->post('edit_id_kamar');
        $edit_tgl_masuk = $this->input->post('edit_tgl_masuk');
        $edit_tgl_keluar = $this->input->post('edit_tgl_keluar');
        $edit_no_telepon = $this->input->post('edit_no_telepon');
        $edit_alamat_penghuni = $this->input->post('edit_alamat_penghuni');
        $id_penghuni = $this->input->post('id_penghuni');

        $data = array(
            'nomor_penghuni' => $edit_nomorpenghuni,
            'nama_penghuni' => $edit_nama_penghuni,
            'id_kamar' => $edit_id_kamar,
            'tgl_masuk' => $edit_tgl_masuk,
            'tgl_keluar' => $edit_tgl_keluar,
            'no_telepon' => $edit_no_telepon,
            'alamat_penghuni' => $edit_alamat_penghuni
        );

        $update = $this->penghuni->update_penghuni($id_penghuni, $data);
        if ($update) {
            $response = [
                'status' => 'success',
                'message' => 'Data Penghuni Berhasil di Update'
            ];
            echo json_encode($response);
        }else{
            $response = [
                'status' => 'error',
                'message' => 'Data Penghuni Gagal di Update'
            ];
            echo json_encode($response);
        }
    }

    public function detail_penghuni($id_penghuni)
    {
        $data = $this->penghuni->get_detail_id($id_penghuni);
        echo json_encode($data);
    }

    public function delete_penghuni($id_penghuni)
    {
        $this->penghuni->delete_by_id($id_penghuni);
        echo json_encode(array("status" => TRUE));
    }
}