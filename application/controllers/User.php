<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usermodel');
	}

	public function index()
	{
		$data_user = $this->usermodel->read_data();
		$this->load->view('template/header');
		$this->load->view('user/index', array('users' => $data_user));
		$this->load->view('template/footer');
	}

	public function add()
	{
		$this->load->model('levelmodel');
		$level = $this->levelmodel->read_data();

		$this->load->view('template/header');
		$this->load->view('user/form_add', array('levels' => $level));
		$this->load->view('template/footer');
	}

	public function simpan_data()
	{
		//validasi
		//prepare data (mapping data) \
		$data = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'level_id' => $this->input->post('level_id'),
			'password' => md5($this->input->post('password')),
			'description' => $this->input->post('description'),
			'is_active' => $this->input->post('status')
		);
		//proses simpan
		$simpan = $this->usermodel->create_data($data);
		//cek berhasil atau tidak
		if ($simpan) {
			$this->index();
		} else {
			$this->add();
		}
	}

	public function edit($id = null)
	{
		// id yang akan di edit
		$user_id = (int) $id;
		// data level berdasarkan id
		$user = $this->usermodel->get_data($user_id);
		//data level
		$this->load->model('levelmodel');
		$levels = $this->levelmodel->read_data();
		// proses update
		$this->load->view('template/header');
		$this->load->view('user/form_edit', array('user' => $user, 'levels' => $levels));
		$this->load->view('template/footer');
	}

	public function update_data()
	{
		//validasi
		//prepare data (mapping data) \
		$data = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'level_id' => $this->input->post('level_id'),
			'password' => md5($this->input->post('password')),
			'description' => $this->input->post('description'),
			'is_active' => $this->input->post('status')
		);
		//proses simpan
		$update = $this->usermodel->update_data($this->input->post('id'), $data);
		//cek berhasil atau tidak
		if ($update) {
			$this->index();
		} else {
			$this->edit($this->input->post('id'));
		}
	}

	public function delete($id = null)
	{
		// id yang akan di delete
		$user_id = (int) $id;
		// delete data level berdasarkan id
		$hapus = $this->usermodel->delete_data($user_id);
		// cek
		$this->index();
	}
}
