<?php
/**
* Author Tri Wanda
* Januari 2016
* daftar_acara.php
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Adm_daftar_acara extends CI_Controller
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
		$data['title'] = "Data Daftar Acara";
		$data['konten'] = 'admin/daftar_acara/index';
		$link = 'adm_daftar_acara/index/';
		$limit= 10;
		$uri_segment= 3;
		$offset= $this->uri->segment($uri_segment);
		$jum = $this->supermodel->getData('daftar_acara');
		$data['tgl1'] = '';
		$data['tgl2'] = '';
		$data['listview'] = $this->supermodel->getData('daftar_acara',$field='', $order='daftar_acara_id', $dasc='DESC', $limit, $offset);
		$this->supermodel->paging($link,$jum,$limit,$uri_segment);
		$data['offset'] = $offset;
		$this->load->vars($data);
		$this->load->view('admin/template');
	}

	function tambah()
	{
		$this->form_validation->set_rules('kategori','kategori','required');
		$this->form_validation->set_rules('nama_acara','Nama Acara','required');
		$this->form_validation->set_rules('hari','hari','required');
		$this->form_validation->set_rules('waktu','waktu','required');
		
		if($this->form_validation->run()===TRUE) {
			$in['kategori'] = $this->input->post('kategori');
			$in['nama_program'] = $this->input->post('nama_acara');
			$in['hari'] = $this->input->post('hari');
			$in['waktu'] = $this->input->post('waktu');
	
			$this->supermodel->insertData('daftar_acara',$in);
			$this->session->set_flashdata('success', 'Penyimpanan data sukses');
			$this->m_global->activities('Menyimpan data Daftar Acara'.$in['daftar_acara_id']);
			redirect('adm_daftar_acara/tambah');
		}
		$data['title'] = "Tambah Data Daftar Acara";
		$data['konten'] = 'admin/daftar_acara/tambah';
		$this->load->vars($data);
		$this->load->view('admin/template');
	}

	function edit($id=null)
	{
		$this->form_validation->set_rules('kategori','kategori','required');
		$this->form_validation->set_rules('nama_acara','Nama Acara','required');
		$this->form_validation->set_rules('hari','hari','required');
		$this->form_validation->set_rules('waktu','waktu','required');

		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$in['kategori'] = $this->input->post('kategori');
			$in['nama_program'] = $this->input->post('nama_acara');
			$in['hari'] = $this->input->post('hari');
			$in['waktu'] = $this->input->post('waktu');
			
			$this->supermodel->updateData('daftar_acara',$in,'daftar_acara_id',$id);
			$this->session->set_flashdata('success', 'Perubahan data sukses');
			$this->m_global->activities('Menyimpan data Daftar Acara'.$in['daftar_acara_id']);
			redirect('adm_daftar_acara/edit/'.$id);
		}
		$data['title'] = "Edit Data Daftar Acara";
		$data['konten'] = 'admin/daftar_acara/edit';
		$data['item'] = $this->supermodel->getData('daftar_acara',array('daftar_acara_id'=>$id))->row_array();
		$this->load->vars($data);
		$this->load->view('admin/template');
	}
}


/* End of file daftar_acara.php */
/* Location: ./application/controllers/daftar_acara.php */