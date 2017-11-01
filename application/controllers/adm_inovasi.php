<?php
/**
* Author Rizki Maulana
*/
class Adm_inovasi extends CI_Controller
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

	function index()
	{
		$id = $this->session->userdata('opd_id');
		$data['title'] = "Inovasi";
		$data['konten'] = 'admin/galeri/index';
		$link = 'adm_inovasi/index/';
		$limit= 10;
		$uri_segment= 3;
		$offset= $this->uri->segment($uri_segment);
		//$data['list'] = $this->supermodel->getData('album');
		$jum = $this->supermodel->getData('inovasi');
		$data['listview'] = $this->supermodel->getData('inovasi',array('opd_id'=>$id));
		//$data['listview'] = $this->supermodel->getData('inovasi',$field='', $order='inovasi_id', $dasc='DESC', $limit, $offset);
		$this->supermodel->paging($link,$jum,$limit,$uri_segment);
		$data['offset'] = $offset;
		$this->load->vars($data);
		$this->load->view('admin/template');
	}
	function add_data()
	{
		$data['title'] = "Inovasi";
		$data['konten'] = 'admin/galeri/tambah';
		$link = 'adm_inovasi/tambah/';
		$limit= 10;
		$uri_segment= 3;
		$offset= $this->uri->segment($uri_segment);
		//$data['list'] = $this->supermodel->getData('album');
		$jum = $this->supermodel->getData('inovasi');
		$data['listview'] = $this->supermodel->getData('inovasi',$field='', $order='inovasi_id', $dasc='DESC', $limit, $offset);
		$this->supermodel->paging($link,$jum,$limit,$uri_segment);
		$data['offset'] = $offset;
		$this->load->vars($data);
		$this->load->view('admin/template');
	}

	function tambah()
	{
		$this->form_validation->set_rules('nama_inovasi','Nama Inovasi','required');
		//$this->form_validation->set_rules('tahun_pembuatan','Tahun Pembuatan','required');
		//$this->form_validation->set_rules('hasil_pengawasan','Hasil Pengawasan','required');
		//$this->form_validation->set_rules('kelurahan_id','kelurahan','required');
		//$this->form_validation->set_rules('alamat','alamat','required');
		if($this->form_validation->run()===TRUE) {
			$in['opd_id'] = $this->input->post('opd_id');
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
		//	$in['tgl'] = date("Y-m-d");
			
			$this->supermodel->insertData('inovasi',$in);
			$this->session->set_flashdata('success', 'Penyimpanan data sukses');
			$this->m_global->activities('Menyimpan Galeri Foto '.$in['nama_inovasi']);
			redirect('adm_inovasi');
		}
		$data['title'] = "Tambah Inovasi";
		$data['konten'] = 'admin/galeri/index';
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
		$data['title'] = "Edit Inovasi";
		$data['konten'] = 'admin/galeri/edit';
		$data['item'] = $this->supermodel->getData('inovasi',array('inovasi_id'=>$id))->row_array();
		//$data['listview'] = $this->supermodel->getData('album');
		$this->load->vars($data);
		$this->load->view('admin/template');
	}
}
?>