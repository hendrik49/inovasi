<?php
/**
* Author Rizki
* Juni 2015
* user.php
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller
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

	function index($id=null)
	{
		//$id = $this->session->userdata('opd_id');
		$data['row'] = array('opd_id'=>'','user_name'=>'','username'=>'','kepala_opd'=>'','email_opd'=>'','penginput'=>'','email_penginput'=>'','kontak'=>'','level'=>'');
		$data['title'] = "Perangkat Daerah";
		$data['konten'] = 'admin/user';
		if($id!=null) {
			$data['row'] = $this->supermodel->getData('opd',array('opd_id'=>$id))->row_array();
		}
		$this->form_validation->set_rules('user_name','user name', 'required');
		$this->form_validation->set_rules('username','username', 'required');
		$this->form_validation->set_rules('password','password', 'md5');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			
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
			$in['level'] = $this->input->post('level');

			if($id==null) {
				$this->supermodel->insertData('opd',$in);
				$this->session->set_flashdata('success','Simpan data berhasil');
				$this->m_global->activities('Menyimpan user '.$in['user_name']);
			} else {
				$this->supermodel->updateData('opd',$in,'opd_id',$id);
				$this->session->set_flashdata('success','Update data berhasil');
				$this->m_global->activities('Mengupdate user '.$in['user_name']);
			}
			redirect('user'); 
		}
		$data['level'] = array('Superadmin','Perangkat Daerah','Komunitas');
		$data['listview'] = $this->supermodel->getData('opd');
		$this->load->vars($data);
		$this->load->view('admin/template');
	}


}


/* End of file user.php */
/* Location: ./application/controllers/user.php */