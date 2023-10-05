<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KamarController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }

        $this->load->model('KamarModel', 'kamar');
    }

    private $path_foto1 = './upload/foto/';
    private $path_foto2 = './upload/foto/';
    private $path_foto3 = './upload/foto/';


	public function index()
	{
        $data['title'] = 'Kamar - Kost';
        $dariDB = $this->kamar->createkode();
        $nourut = substr($dariDB, 3, 4);
        $nokamarsekarang = $nourut + 1;
        $data['nomor_kamar'] = $nokamarsekarang;
        // $data['get_data'] = $this->kamar->get_data_kamar();
		$this->template->load('layouts/main', 'kamar/v_kamar', $data);
	}

    public function get_data_kamar()
    {
        $list = $this->kamar->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach($list as $field) {
            // $no++;
            
            $row[] = $field->nomor_kamar;
            $row[] = $field->fasilitas;
            $row[] = $field->lantai;
            $row[] = $field->ukuran_kamar;
            $row[] = 'Rp.'. number_format($field->harga, 2, ',', '.');
            if ($field->id_penghuni == '1') {
                $row[] = '<div class="badge badge-success">Terisi</div>';
            }else{
                $row[] = '<div class="badge badge-danger">Kosong</div>';
            }
            // $row[] = $field->status;
        
            $aksi = '
            <div class="d-flex justify-content-center items-align-center">
            <a class="btn btn-sm btn-info mx-1" href="javascript:void(0)" title="Edit" onclick="detail_kamar('."'".$field->id_kamar."'".')"><i class="fa fa-eye"></i></a>
			<a class="btn btn-sm btn-warning mx-1" href="javascript:void(0)" title="Edit" onclick="edit_kamar('."'".$field->id_kamar."'".')"><i class="fa fa-edit"></i></a>
			<a class="btn btn-danger btn-sm" href="javascript:void(0)" title="Hapus" onclick="delete_kamar('."'".$field->id_kamar."'".')" data-id='.$field->id_kamar.'><i class="fa fa-trash fa-lg"></i></a>
			</div>
            ';

            $row[] = $aksi;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->kamar->count_all(),
            "recordsFiltered" => $this->kamar->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function add_kamar()
    {
        $foto1 = 'foto1';
        if ($_FILES[$foto1]['name']) {
            if ($this->fileupload($this->path_foto1, $foto1)) {
                $datafoto1 = $this->$foto1->data('file_name');
                $uploadfoto1 = $datafoto1; 
            }else{
                $this->session->set_flashdata('error', $this->$foto1->display_errors());
                redirect(site_url('kamar'));
            }
        }

        $foto2 = 'foto2';
        if ($_FILES[$foto2]['name']) {
            if ($this->fileupload($this->path_foto2, $foto2)) {
                $datafoto2 = $this->$foto2->data('file_name');
                $uploadfoto2 = $datafoto2;
            }else{
                $this->session->set_flashdata('error', $this->$foto2->display_errors());
                redirect(site_url('kamar'));
            }
        }

        $foto3 = 'foto3';
        if ($_FILES[$foto3]['name']) {
            if ($this->fileupload($this->path_foto3, $foto3)) {
                $datafoto3 = $this->$foto3->data('file_name');
                $uploadfoto3 = $datafoto3;
            }else{
                $this->session->set_flashdata('error', $this->$foto3->display_errors());
                redirect(site_url('kamar'));
            }
        }

        $nomorkamar = $this->input->post('nomorkamar');
        // $nomorkamar = $this->input->post('nomorkamar');
        $fasilitas =  $this->input->post('fasilitas');
        $lantai = $this->input->post('lantai');
        $ukuran_kamar = $this->input->post('ukuran_kamar');
        $harga = $this->input->post('harga');
        $status = $this->input->post('status');
        $tgl_kosong = $this->input->post('tgl_kosong');

        $data = array(
            'nomor_kamar' => $nomorkamar,
            'fasilitas' => $fasilitas,
            'lantai' => $lantai,
            'ukuran_kamar' => $ukuran_kamar,
            'harga'  => $harga,
            'foto1' => $uploadfoto1,
            'foto2' => $uploadfoto2,
            'foto3' => $uploadfoto3,
            'status' => $status,
            'id_penghuni' => 0,
            'tgl_kosong' => $tgl_kosong
        );

        $insert = $this->kamar->insert_kamar($data);
        if ($insert) {
           $response = [
                'status' => 'success',
                'message' => 'Data Kamar Berhasil di Simpan'
            ];
            echo json_encode($response);
        }else{
            $response = [
                'status' => 'error',
                'message' => 'Data Kamar Gagal di Simpan'
            ];
            echo json_encode($response);
        }
    }

    public function update_kamar()
    {
        $edit_nomorkamar = $this->input->post('edit_nomorkamar');
        $edit_fasilitas = $this->input->post('edit_fasilitas');
        $edit_ukuran_kamar = $this->input->post('edit_ukuran_kamar');
        $edit_lantai = $this->input->post('edit_lantai');
        $edit_tgl_kosong = $this->input->post('edit_tgl_kosong');
        $edit_status = $this->input->post('edit_status');
        $edit_harga = $this->input->post('edit_harga');
    
        $remove_photo1 = $this->input->post('remove_photo1');
        $remove_photo2 = $this->input->post('remove_photo2');
        $remove_photo3 = $this->input->post('remove_photo3');

        if ($remove_photo1) {
            if(file_exists('upload/foto/'. $remove_photo1) && $remove_photo1)
                unlink('upload/foto/'. $remove_photo1);
            $data['foto1'] = '';
        }

        if ($remove_photo2) {
            if(file_exists('upload/foto/'. $remove_photo2) && $remove_photo2)
                unlink('upload/foto/'. $remove_photo2);
            $data['foto2'] = '';
        }

        if ($remove_photo3) {
            if(file_exists('upload/foto/'. $remove_photo3) && $remove_photo3)
                unlink('upload/foto/'. $remove_photo3);
            $data['foto3'] = '';
        }

        $edit_foto1 = 'edit_foto1';
        if ($_FILES[$edit_foto1]['name']) {
            if ($this->fileupload($this->path_foto1, $edit_foto1)) {
                $editdatafoto1 = $this->$edit_foto1->data('file_name');
                $uploadfoto1 = $editdatafoto1;
            }else{
                $this->session->set_flashdata('error', $this->$edit_foto1->display_errors());
                redirect(site_url('kamar'));
            }
            
            $id_kamar = $this->input->post('id_kamar');
            $edit1 = $this->kamar->get_by_id($id_kamar);
            $basename1 = basename($edit1->foto1);
            if(file_exists('upload/foto/'.$basename1) && $basename1)
                unlink('upload/foto/'.$basename1);
        }

        $edit_foto2 = 'edit_foto2';
        if ($_FILES[$edit_foto2]['name']) {
            if ($this->fileupload($this->path_foto2, $edit_foto2)) {
                $editdatafoto2 = $this->$edit_foto2->data('file_name');
                $uploadfoto2 = $editdatafoto2;
            }else{
                $this->session->set_flashdata('error', $this->$edit_foto2->display_errors());
                redirect(site_url('kamar'));
            }

            $id_kamar = $this->input->post('id_kamar');
            $edit2 = $this->kamar->get_by_id($id_kamar);
            $basename2 = basename($edit2->foto2);
            if(file_exists('upload/foto/'.$basename2) && $basename2)
                unlink('upload/foto/'.$basename2);
        }        

        $edit_foto3 = 'edit_foto3';
        if($_FILES[$edit_foto3]['name']) {
            if ($this->fileupload($this->path_foto3, $edit_foto3)) {
                $editdatafoto3 = $this->$edit_foto3->data('file_name');
                $uploadfoto3 = $editdatafoto3;
            }else{
                $this->session->set_flashdata('error', $this->$edit_foto3->display_errors());
                redirect(site_url('kamar'));
            }

            $id_kamar = $this->input->post('id_kamar');
            $edit3 = $this->kamar->get_by_id($id_kamar);
            $basename3 = basename($edit3->foto3);
            if(file_exists('upload/foto/'.$basename3) && $basename3)
                unlink('upload/foto/'.$basename3);
        }

        $data = array(
            'nomor_kamar' => $edit_nomorkamar,
            'fasilitas' => $edit_fasilitas,
            'ukuran_kamar' => $edit_ukuran_kamar,
            'lantai' => $edit_lantai,
            'tgl_kosong' => $edit_tgl_kosong,
            'status' => $edit_status,
            'harga' => $edit_harga,
            'foto1' => $uploadfoto1,
            'foto2' => $uploadfoto2,
            'foto3' => $uploadfoto3
        );

        $id_update = $this->input->post('id_kamar');
 
        $update = $this->kamar->update_kamar($id_update, $data);
        
        if ($update) {
           $response = [
                'status' => 'success',
                'message' => 'Berhasil Update Data Kamar'
           ];
           echo json_encode($response);
        }else{
            $response = [
                'status'    => 'error',
                'message'   => 'Gagal Update Data Kamar'
            ];
            echo json_encode($response);
        }
    }

    public function edit_kamar($id_kamar)
    {
        $data = $this->kamar->get_by_id($id_kamar);
        echo json_encode($data);
    }

    public function detail_kamar($id_kamar)
    {
        $detail['detail_kamar'] = $this->kamar->get_by_id($id_kamar);
        $data = $detail;
        echo json_encode($data);
    }

    public function delete_kamar($id_kamar)
    {
        $app = $this->kamar->get_by_id($id_kamar);
        $app2 = $this->kamar->get_by_id($id_kamar);
        $app3 = $this->kamar->get_by_id($id_kamar);
        $basename1 = basename($app->foto1);
        $basename2 = basename($app2->foto2);
        $basename3 = basename($app3->foto3);
        if(file_exists('upload/foto/'.$basename1) && $basename1)
            unlink('upload/foto/'.$basename1);
        if(file_exists('upload/foto/'.$basename2) && $basename2)
            unlink('upload/foto/'.$basename2);
        if(file_exists('upload/foto/'.$basename3) && $basename3)
            unlink('upload/foto/'.$basename3);
        $this->kamar->delete_by_id($id_kamar);
        echo json_encode(array("status" => TRUE));
    }

    public function fileupload($path,$file){
		$config=array(
			'upload_path'=>$path,
			'allowed_types'=>'JPG|jpeg|jpg|png',
			'max_size'=>5000, //5MN
			'encrypt_name'=>false, //ENCTYPT
		);
		$this->load->library('upload',$config,$file);
		return $this->$file->do_upload($file);
	}
}
