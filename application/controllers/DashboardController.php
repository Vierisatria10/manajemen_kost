<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !== TRUE){
		  redirect('login');
		}

		// $this->load->model('UserModel', 'user');
		$this->load->model('DashboardModel', 'dashboard');
	}

	public function index()
	{
        $data['title'] = 'Dashboard - Kost';
		$data['jml_kamar'] = $this->dashboard->data_kamar();
		$data['jml_penghuni'] = $this->dashboard->data_penghuni(); 
		$this->template->load('layouts/main', 'dashboard/v_dashboard', $data);
	}
}
