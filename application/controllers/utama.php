<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author Imam Teguh
* Date Mei 2015
* Namefile Adminweb.php
*/
class Utama extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_global');
		$this->load->model('supermodel');
		//$this->load->model('mread');
		if($this->session->userdata('getLoginAct')==FALSE) {
			$this->session->set_flashdata('error', 'Tidak ada akses untuk ini!!!');
			redirect('loginweb');
		}
	}

	function index() { $this->dashboard(); /*redirect('adminweb/dashboard');*/ }

	function dashboard($id=null) 
	{
		{
		$ini = $this->session->userdata('opd_id');
		$data['title'] = "Perkembangan Inovasi";
		$data['status'] = "Tambah";
		$data['jumlah'] = $this->db->query("SELECT  inovasi_id  FROM  inovasi")->num_rows();
		$data['konten'] = 'admin/utama';
		
		if($id!=null) {
			$data['status'] = "Ubah";
			$data['row'] = $this->db->query("SELECT * FROM inovasi INNER JOIN perkembangan ON inovasi.inovasi_id = perkembangan.inovasi_id where perkembangan_id = ".$id)->row_array();
		}
		/*$this->form_validation->set_rules('inovasi_id','user name', 'required');
		$this->form_validation->set_rules('status','status', 'required');*/
		$this->form_validation->set_rules('tgl','tgl', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			echo $this->input->post('persentase');
			$in['inovasi_id'] = $this->input->post('inovasi');
			$in['status'] = $this->input->post('status');
			$in['persentase'] = $this->input->post('persentase');
			$in['tgl'] = $this->input->post('tgl');
			

			if($id==null) {
				$this->supermodel->insertData('perkembangan',$in);
				$this->session->set_flashdata('success','Simpan data berhasil');
				$this->m_global->activities('Menyimpan user '.$in['inovasi_id']);
			} else {
				$this->supermodel->updateData('perkembangan',$in,'perkembangan_id',$id);
				$this->session->set_flashdata('success','Update data berhasil');
				$this->m_global->activities('Mengupdate user '.$in['inovasi_id']);
			}
			//redirect('perkembangan'); 
		}
		//$data['level'] = array('Ide Awal','Proposal','Ada Perencanaan','Ada Rancangan','Dalam Pembangunan','Dalam Penerapan Awal','Sudah Berjalan','Terhenti');
		$data['level'] = array('Perumusan Masalah','Ide/Konsep Awal','Perencanaan Pembangunan','Proses Pembangunan',' Proses Pemanfaatan','Rencana Pengembangan');
		$data['listvieww'] = $this->supermodel->getData('inovasi');
	//	$data['listvieww'] = $this->supermodel->getData('inovasi', array('opd_id'=>$ini);
		$data['listview'] = $this->db->query('SELECT * from opd, inovasi, perkembangan where opd.opd_id=inovasi.opd_id and inovasi.inovasi_id=perkembangan.inovasi_id');

		$this->load->vars($data);
		$this->load->view('admin/template');
	}


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

function edit($id=null)
	{
		$this->form_validation->set_rules('nama_inovasi','Judul Foto','required');
		//$this->form_validation->set_rules('tahun_pembuatan','Tahun Pembuatan','required');
		//$this->form_validation->set_rules('kelurahan_id','kelurahan','required');
		//$this->form_validation->set_rules('alamat','alamat','required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			//$in['opd_id'] = $this->input->post('opd_id');
			$in['nama_inovasi'] = $this->input->post('nama_inovasi');
			$in['penjelasan'] = $this->input->post('penjelasan');
			//$in['status'] = $this->input->post('status');
			$in['manfaat'] = $this->input->post('manfaat');
			$in['keunikan'] = $this->input->post('keunikan');
			$in['kemitraan'] = $this->input->post('kemitraan');
			$in['potensi'] = $this->input->post('potensi');
				$in['strategi'] = $this->input->post('strategi');
				$in['sumber'] = $this->input->post('sumber_daya');
				$in['analisa'] = $this->input->post('analisa_resiko');

			$this->supermodel->updateData('inovasi',$in,'inovasi_id',$id);
			$this->session->set_flashdata('success', 'Update data sukses');
			$this->m_global->activities('Mengubah Galeri '.$in['nama_inovasi']);
			redirect('adm_inovasi');
		}
		$data['title'] = "Detail Inovasi";
		$data['konten'] = 'admin/utama/edit';
		$data['item'] = $this->supermodel->getData('inovasi',array('inovasi_id'=>$id))->row_array();
		//$data['listview'] = $this->supermodel->getData('album');
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