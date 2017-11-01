<?php
/**
* Author Tri Wanda
*/
class Adm_rekaman_suara extends CI_Controller
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
		$data['title'] = "Rekaman Siaran";
		$data['konten'] = 'admin/rekaman_suara/index';
		$link = 'adm_rekaman_suara/index/';
		$limit= 10;
		$uri_segment= 3;
		$offset= $this->uri->segment($uri_segment);
		$data['list'] = $this->supermodel->getData('rekaman_suara');
		$jum = $this->supermodel->getData('rekaman_suara');
		$data['listview'] = $this->supermodel->getData('rekaman_suara',$field='', $order='rekaman_date', $dasc='DESC', $limit, $offset);
		$this->supermodel->paging($link,$jum,$limit,$uri_segment);
		$data['offset'] = $offset;
		$this->load->vars($data);
		$this->load->view('admin/template');
	}

	function tambah()
	{
		$this->form_validation->set_rules('rekaman_title','Judul Rekaman','required');
		
		if($this->form_validation->run()===TRUE) {
			$in['rekaman_title'] = $this->input->post('rekaman_title');
			$in['deskripsi'] = $this->input->post('deskripsi');
			$in['kategori'] = $this->input->post('kategori');
			$in['file'] = $this->input->post('file');
			$in['rekaman_date'] = $this->input->post('rekaman_date');
			$in['upload_date'] = date("Y-m-d");
			if($_FILES['file']['name']) 
			{
				$ext = end(explode(".", $_FILES['file']['name']));
				$rand = rand(000,999);
				$name = date("Ymd").$rand.'.'.$ext;
				$unggah = $this->supermodel->unggah_suara('rekaman/','file',$name,true);
				if($unggah===false) {
					$this->session->set_flashdata('error', 'Upload gagal!!');
					redirect('adm_rekaman_suara');
				}
				$in['file'] = $name;
			}

			$this->supermodel->insertData('rekaman_suara',$in);
			$this->session->set_flashdata('success', 'Penyimpanan data sukses');
			$this->m_global->activities('Menyimpan rekaman suara '.$in['rekaman_tittle']);
			redirect('adm_rekaman_suara');
		}
		$data['title'] = "Tambah Rekaman Suara";
		$data['konten'] = 'admin/rekaman_suara/index';
		$limit= 10;
		$uri_segment= 3;
		$offset= $this->uri->segment($uri_segment);
		$data['listview'] = $this->supermodel->getData('rekaman_suara',$field='', $order='rekaman_date', $dasc='DESC', $limit, $offset);
		$this->load->vars($data);
		$this->load->view('admin/template');
	}

	function edit($id=null)
	{
		$this->form_validation->set_rules('rekaman_title','Judul Foto','required');
		
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$in['rekaman_title'] = $this->input->post('rekaman_title');
			$in['deskripsi'] = $this->input->post('deskripsi');
			$in['kategori'] = $this->input->post('kategori');
			
			$in['rekaman_date'] = $this->input->post('rekaman_date');
			$in['upload_date'] = date("Y-m-d");

			if($_FILES['file']['name']) 
			{
				$cek = $this->supermodel->getData('rekaman_suara',array('rekaman_suara_id'=>$id))->row();
				if($cek->file!='') {
					@unlink('./uploads/rekaman/'.$cek->file);
				
				}
				$ext = end(explode(".", $_FILES['file']['name']));
				$rand = rand(000,999);
				$name = date("Ymd").$rand.'.'.$ext;
				$unggah = $this->supermodel->unggah_suara('rekaman/','file',$name,true);
				if($unggah===false) {
					$this->session->set_flashdata('error', 'Upload gagal!!');
					redirect('adm_rekaman_suara/edit/'.$id);
				}
				$in['file'] = $name;
			}

			$this->supermodel->updateData('rekaman_suara',$in,'rekaman_suara_id',$id);
			$this->session->set_flashdata('success', 'Update data sukses');
			$this->m_global->activities('Mengubah Rekaman Suara '.$in['rekaman_title']);
			redirect('adm_rekaman_suara');
		}
		$data['title'] = "Edit Rekaman Suara";
		$data['konten'] = 'admin/rekaman_suara/edit';
		$data['item'] = $this->supermodel->getData('rekaman_suara',array('rekaman_suara_id'=>$id))->row_array();
		$data['listview'] = $this->supermodel->getData('rekaman_suara');
		$this->load->vars($data);
		$this->load->view('admin/template');
	}
}
?>