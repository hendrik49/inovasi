<?php
/**
* 
*/
class Kontak extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_global');
		$this->load->model('supermodel');
	}

	function index()
	{
		$konfig = $this->m_global->get_konfig();
		$tanggal = date('Y-m-d');
		$bataswaktu = time() - 300;

		$data['banner'] = $this->supermodel->getData('banner',array('status'=>1,'Kategori'=>0));
		$data['pengunjung']       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip")); 
		$data['totalpengunjung']  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
		$data['pengunjungonline'] = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));
		
		$data['webconfig'] = $this->supermodel->getData('webconfig');
		$data['slide'] = $this->supermodel->getData('slide',array('status'=>1));
		$data['galeri'] = $this->supermodel->getData('galeri',$field='', $order='', $dasc='DESC', $limit='8');
		$data['populer'] = $this->m_global->getPostAll(array('p.status'=>1,'c.type'=>1),'p.view','desc',3);

		$data['konten'] = 'kontak';
		$data['category'] = array('category_id'=>'');
		$data['breadcrumb'] = "Kontak Kami";
		
		$vrs = array_merge($konfig,$data);
		$this->load->vars($vrs);
		$this->load->view('template');
	}
}
?>