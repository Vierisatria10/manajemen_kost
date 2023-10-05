<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }

        $this->load->model('UserModel', 'user');
    }

    public function index()
	{
        $data['title'] = 'Penghuni - Kost';
        // $data['get_data'] = $this->kamar->get_data_kamar();
		$this->template->load('layouts/main', 'user/dashboard_penghuni', $data);
	}

    public function penghuni()
    {
        $data['title'] = 'Akun Penghuni - Kost';
        // $data['get_data'] = $this->kamar->get_data_kamar();
		$this->template->load('layouts/main', 'user/v_user', $data);
    }

    public function data_komplain()
    {
        $data['title'] = 'Komplain Penghuni - Kost';
        // $data['get_data'] = $this->kamar->get_data_kamar();
		$this->template->load('layouts/main', 'user/data_komplain', $data);
    }

    public function get_data_user()
    {
        $list = $this->user->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<b>'.$field->nama.'</b>';
            $row[] = $field->username;
            if ($field->level == 'Administrator') {
                $row[] = '<div class="badge badge-success">Administrator</div>';
            }else{
                $row[] = '<div class="badge badge-info">Penghuni</div>';
            }
            $row[] = $field->no_hp;
            
            $tlp = $field->no_hp;
        
            $aksi = '
            <div class="d-flex justify-content-center items-align-center">
                <a class="btn btn-sm btn-success mx-1" href="
                https://api.whatsapp.com/send?phone='.hp($field->no_hp).'&text=
				Assalamaualaikum Wr..Wb.., ...%0a
				Kami dari Admin SaluvKost, ingin mengkonfirmasi untuk data login username dan password anda pada website https://saluvkost.com/. berikut data nya : , %0a
				%0a
				Nama : '.$field->nama.', %0a
				Username : '.$field->username.', %0a
				Password : '.$field->password.', %0a
				Level : '.$field->level.', %0a
				%0a
				Jika ada kendala pada saat login silahkan hubungi mami, terimakasih!!!
                " title="Pesan Wa" target="_blank"><i class="fab fa-whatsapp"></i></a>
			    <a class="btn btn-sm btn-warning mx-1" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$field->id_user."'".')"><i class="fa fa-edit"></i></a>
			    <a class="btn btn-danger btn-sm" href="javascript:void(0)" title="Hapus" onclick="delete_user('."'".$field->id_user."'".')" data-id='.$field->id_user.'><i class="fa fa-trash fa-lg"></i></a>
			</div>';

            $row[] = $aksi;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->user->count_all(),
            "recordsFiltered" => $this->user->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function add_user()
    {
        $nama = htmlspecialchars($this->input->post('nama'));
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars($this->input->post('password'));
        $level = htmlspecialchars($this->input->post('level'));
        $no_hp = htmlspecialchars($this->input->post('no_hp'));

        $data = array(
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'level' => $level,
            'no_hp' => $no_hp
        );
        $insert = $this->user->insert_user($data);
        if ($insert) {
            $response = [
                'status' => 'success',
                'message' => 'Data User Berhasil di Simpan'
            ];
            echo json_encode($response);
        }else{
            $response = [
                'status' => 'success',
                'message' => 'Data User Gagal di Simpan'
            ];
            echo json_encode($response); 
        }
    }

    public function update_user()
    {
        $id_user = $this->input->post('id_user');
        $edit_nama = htmlspecialchars($this->input->post('edit_nama'));
        $edit_username = htmlspecialchars($this->input->post('edit_username'));
        // $password = $this->input->post('password');
        $edit_level = $this->input->post('edit_level');
        $edit_no_hp = $this->input->post('edit_no_hp');

        $data = array(
            'nama' => $edit_nama,
            'username' => $edit_username,
            'level' => $edit_level,
            'no_hp' => $edit_no_hp
        );

        $update = $this->user->update_user($id_user, $data);
        if ($update) {
            $response = [
                'status' => 'success',
                'message' => 'Data User Berhasil di Update'
            ];
            echo json_encode($response);
        }else{
            $response = [
                'status' => 'success',
                'message' => 'Data User Gagal di Update'
            ];
            echo json_encode($response); 
        }
    }

    public function edit_user($id_user)
    {
        $data = $this->user->get_by_id($id_user);
        echo json_encode($data);
    }

    public function delete_user($id_user) 
    {
        $this->user->delete_by_id($id_user);
        echo json_encode(array("status" => TRUE));
    }

    public function get_data_penghuni_komplain()
    {
        $get_penghuni_komplain = $this->user->get_data_penghuni_komplain();
        $data['get_penghuni_komplain'] = $get_penghuni_komplain;
        echo json_encode($data);
    }
    
    public function get_penghuni_komplain()
    {
        $id_penghuni_komplain = $this->input->get('id_penghuni_komplain');
        $this->db->select('a.*, b.*');
        $this->db->from('tbl_penghuni a');
        $this->db->join('tbl_kamar b', 'a.id_penghuni = b.id_penghuni', 'left');
        $this->db->where('a.id_penghuni', $id_penghuni_komplain);
        $data = $this->db->get()->row();
        // $data['get_nama'] = $get_nama_penghuni->row();
        echo json_encode($data);
    }

    public function add_komplain()
    {
        $id_penghuni_komplain = htmlspecialchars($this->input->post('id_penghuni_komplain'));
        $nama_penghuni_komplain = htmlspecialchars($this->input->post('nama_penghuni_komplain'));
        $nomor_kamar_komplain = htmlspecialchars($this->input->post('nomor_kamar_komplain'));
        $jenis_komplain = htmlspecialchars($this->input->post('jenis_komplain'));
        $lama_keresahan = htmlspecialchars($this->input->post('lama_keresahan'));
        $permasalahan = htmlspecialchars($this->input->post('permasalahan'));

        $data = array(
            'id_penghuni'   => $id_penghuni_komplain,
            'nama_penghuni' => $nama_penghuni_komplain,
            'nomor_kamar'   => $nomor_kamar_komplain,
            'jenis_komplain' => $jenis_komplain,
            'lama_keresahan' => $lama_keresahan,
            'permasalahan'   => $permasalahan
        );

        $insert = $this->user->insert_komplain($data);
        if ($insert) {
            $response = [
                'status' => 'success',
                'message' => 'Data Ajukan Komplain Berhasil di Simpan'
            ];
            echo json_encode($response);
        }else{
            $response = [
                'status' => 'error',
                'message' => 'Data Ajukan Komplain Gagal di Simpan'
            ];
            echo json_encode($response);
        }
    }
}