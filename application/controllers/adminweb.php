<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author Imam Teguh
* Date Mei 2015
* Namefile Adminweb.php
*/
class Adminweb extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_global');
		$this->load->model('supermodel');
		if($this->session->userdata('getLoginAct')==FALSE) {
			$this->session->set_flashdata('error', 'Tidak ada akses untuk ini!!!');
			redirect('loginweb');
		}
	}

	function index() { $this->dashboard(); /*redirect('adminweb/dashboard');*/ }

	function dashboard() 
	{
		$data['title'] = "Dashboard";
		$data['konten'] = 'admin/dashboard';
		$data['activity'] = $this->m_global->getAct();
		$this->load->vars($data);
		$this->load->view('admin/template');	
	}

	function tambah_post()
	{
		$data['title'] = "Add Content";
		$data['konten'] = 'admin/post/tambah';
		$data['listview'] = $this->supermodel->getData('category');
		$this->load->vars($data);
		$this->load->view('admin/template');
	}

	function edit_post($id=null)
	{
		if($id==null) {
			redirect('adminweb/post');
		}
		$data['title'] = "Edit Content";
		$data['konten'] = 'admin/post/edit';
		$data['row'] = $this->supermodel->getData('post',array('post_id'=>$id))->row_array();
		$data['listview'] = $this->supermodel->getData('category');
		$this->load->vars($data);
		$this->load->view('admin/template');
	}

	function edit_profile()
	{
		$id = $this->session->userdata('opd_id');
		$this->form_validation->set_rules('user_name','user name', 'required');
		$this->form_validation->set_rules('username','username', 'required');
		$this->form_validation->set_rules('password','password', 'md5');
		if($this->form_validation->run()===TRUE) {
			$in['user_name'] = $this->input->post('user_name');
			$in['username'] = $this->input->post('username');
			$in['kepala_opd'] = $this->input->post('kepala_opd');
			$in['email_opd'] = $this->input->post('email_opd');
			$in['penginput'] = $this->input->post('penginput');
			$in['email_penginput'] = $this->input->post('email_penginput');
			$in['kontak'] = $this->input->post('kontak');
			if($this->input->post('password')) {
				$in['password'] = $this->input->post('password');
			}
			//$in['level'] = $this->input->post('level');
			$this->supermodel->updateData('opd',$in,'opd_id',$id);
			$this->m_global->activities('Edit profile');
			$this->session->set_flashdata('success','Update data berhasil');
			redirect('adminweb/edit_profile');
			
		}
		$data['title'] = "Edit Profil";
		$data['konten'] = 'admin/edit_profile';
		$data['level'] = array('Superadmin','Operator');
		$data['row'] = $this->supermodel->getData('opd',array('opd_id'=>$id))->row_array();
		$this->load->vars($data);
		$this->load->view('admin/template');
	}

	// Fungsi Keluar
	function logout() {
		$this->m_global->activities('Logout administrator');
		$this->session->sess_destroy();
		redirect('loginweb');
	}

}

/* End of file adminweb.php */
/* Location: ./application/controllers/adminweb.php */