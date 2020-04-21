<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('levelmodel');
	}

	public function index()
	{
		$data_level = $this->levelmodel->read_data();
		$this->load->view('template/header');
		$this->load->view('level/index', array('levels' => $data_level));
		$this->load->view('template/footer');
	}
}
