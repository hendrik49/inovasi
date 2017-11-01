<?php
/**
* Author Rizki Maulana
* Agustus 2017

*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category extends CI_Controller
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
		$data['konten'] = 'admin/category';
		if($id!=null) {
			$data['status'] = "Ubah";
			$data['row'] = $this->db->query("SELECT * FROM inovasi INNER JOIN perkembangan ON inovasi.inovasi_id = perkembangan.inovasi_id where perkembangan_id = ".$id)->row_array();
		}
		/*$this->form_validation->set_rules('inovasi_id','user name', 'required');
		$this->form_validation->set_rules('status','status', 'required');*/
		$this->form_validation->set_rules('tgl','tgl', 'required');
		$bobot = array("0","15","30","45","65","85");
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			if($this->input->post('persentase') == 100 AND $this->input->post('status') < 5){
				$in['status'] = $this->input->post('status') + 1;
				$in['persentase'] = 0;
			}Else{
				$in['status'] = $this->input->post('status');
				$in['persentase'] = $this->input->post("persentase");
			}
			$nilai = array("15","15","15","20","20","15");
			$status = $this->input->post('persentase');
			$ini = ($bobot[$this->input->post('status')] + ($nilai[$this->input->post('status')] / 100 * $this->input->post('persentase')));
			//$row = $this->db->query("SELECT * FROM perkembangan where perkembangan_id = ".$id)->row_array();
			$in['nilai'] = $ini;
			$in['inovasi_id'] = $this->input->post('inovasi');
			
			//$ini = (0 + (15 / 100 * $status));
			//$in['persentase'] = $ini;
			
		    //$in['persentase'] = $this->input->post('persentase');
			// $in['status'] = $this->input->post('status');
	
			$in['tgl'] = $this->input->post('tgl');
			$in['ket'] = $this->input->post('ket');
			

			if($id==null) {
				$this->supermodel->insertData('perkembangan',$in);
				$this->session->set_flashdata('success','Simpan data berhasil');
				$this->m_global->activities('Menyimpan user '.$in['inovasi_id']);
			} else {
				$this->supermodel->updateData('perkembangan',$in,'perkembangan_id',$id);
				$this->session->set_flashdata('success','Update data berhasil');
				$this->m_global->activities('Mengupdate user '.$in['inovasi_id']);
			}
			redirect('category'); 
		}
		$data['level'] = array('Perumusan Masalah','Ide/Konsep Awal','Perencanaan Pembangunan','Proses Pembangunan',' Proses Pemanfaatan','Rencana Pengembangan');
		$data['listvieww'] = $this->supermodel->getData('inovasi',array('opd_id'=>$ini));
	//	$data['listvieww'] = $this->supermodel->getData('inovasi', array('opd_id'=>$ini);
		$data['listview'] = $this->db->query('SELECT * from opd, inovasi, perkembangan where opd.opd_id=inovasi.opd_id and inovasi.inovasi_id=perkembangan.inovasi_id and opd.opd_id= '.$ini);

		$this->load->vars($data);
		$this->load->view('admin/template');
	}


}


/* End of file user.php */
/* Location: ./application/controllers/user.php */


/* End of file category.php */
/* Location: ./application/controllers/category.php */