<?php
/**
* Author Rizki Maulana
* Agustus 2017

*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Perkembangan extends CI_Controller
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
		$ini = $this->session->userdata('opd_id');
		$data['title'] = "Perkembangan Inovasi";
		$data['status'] = "Tambah";
		$data['jumlah'] = $this->db->query("SELECT  inovasi_id  FROM  inovasi")->num_rows();
		$data['konten'] = 'admin/perkembangan';
		
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
		$data['level'] = array('Ide Awal','Proposal','Ada Perencanaan','Ada Rancangan','Dalam Pembangunan','Dalam Penerapan Awal','Sudah Berjalan','Terhenti');
		$data['listvieww'] = $this->supermodel->getData('inovasi');
	//	$data['listvieww'] = $this->supermodel->getData('inovasi', array('opd_id'=>$ini);
		$data['listview'] = $this->db->query('SELECT * from opd, inovasi, perkembangan where opd.opd_id=inovasi.opd_id and inovasi.inovasi_id=perkembangan.inovasi_id');

		$this->load->vars($data);
		$this->load->view('admin/template');
	}


}


/* End of file user.php */
/* Location: ./application/controllers/user.php */


/* End of file category.php */
/* Location: ./application/controllers/category.php */