<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Levelmodel extends CI_Model {

	private $table_name;

	public function __construct()
	{
		parent::__construct();
		
		$this->table_name = 'level';
		//koneksi ke db
		$this->load->database();
	}

	public function read_data()
	{
		return $this->db->get($this->table_name)->result();
	}



}