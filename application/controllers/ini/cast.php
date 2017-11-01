<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cast extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_global');
		$this->load->model('supermodel');
	}

	
	function index()
	{
		$data['isi'] = 'Build by: Tri Wanda(Desember 2015-Januari 2016)';	
		$this->load->view('cast', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */