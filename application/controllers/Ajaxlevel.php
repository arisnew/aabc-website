<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxlevel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//harus login
		if (! $this->session->userdata('username')) {
			redirect('user/login');
		}

		$this->load->model('levelmodel');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$extra_js = $this->load->view('ajaxlevel/extra_js', NULL, TRUE);
		$data_level = $this->levelmodel->read_data();
		$this->load->view('template/header');
		$this->load->view('ajaxlevel/index', array('levels' => $data_level));
		$this->load->view('template/footer', array('extra_js' => $extra_js));
	}

	public function simpan()
	{
		$code = 0;
		$msg = '';
		//validasi
		// setting rule validasi
		$this->form_validation->set_rules('level-name', 'Level Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		//cek validasi
		if ($this->form_validation->run() == FALSE) {
			//jika tidak valid
			$msg = validation_errors();
		} else {
			//prepare data (mapping data) \
			$data = array(
				'level_name' => $this->input->post('level-name'),
				'description' => $this->input->post('description'),
				'is_active' => $this->input->post('status')
			);
			//proses simpan
			$simpan = $this->levelmodel->create_data($data);
			//cek berhasil atau tidak
			if ($simpan) {
				$code = 1;
			} else {
				$msg = 'Simpan data tidak berhasil! Cek data tersebut.';
			}
		}

		//output dalam bentuk json
		echo json_encode(array(
			'code' => $code,
			'msg' => $msg
		));
	}
}
