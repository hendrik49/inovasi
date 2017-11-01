<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author Imam Teguh
* Date Mei 2015
* Namefile loginweb.php
*/
class Loginweb extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('supermodel');
		$this->load->model('m_global');
	}

	function index()
	{
		$this->load->view('login');
	}

	function go()
	{
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','reqiored');
		if($this->form_validation->run()===TRUE) {
			$user = $this->input->post('username');
			$pass = md5($this->input->post('password'));
			$login = $this->supermodel->getData('opd',array('username'=>$user,'password'=>$pass));
			if($login->num_rows()==1) {
				$login = $login->row_array();
				$sess['getLoginAct'] = "01n2s0129n1kz012klla";
				$sess['name'] = $login['user_name'];
				$sess['opd_id'] = $login['opd_id'];
				$sess['userlvl'] = $login['level'];
				$this->session->set_userdata($sess);
				$this->m_global->activities('Login administrator');
				if($login['level'] == 0){
				redirect('adminweb/dashboard');
				}else{
				redirect('adm_inovasi');    
				}
			} else {
				$this->session->set_flashdata('error', 'Maaf kombinasi username dan password tidak tepat!');
				redirect('loginweb');
			}
		} else {
			$this->index();
		}
	}
}

/* End of file loginweb.php */
/* Location: ./application/controllers/loginweb.php */