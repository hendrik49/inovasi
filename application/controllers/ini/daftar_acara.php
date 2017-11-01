<?php
/**
* 
*/
class Daftar_acara extends CI_Controller
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

		$data['banner'] = $this->supermodel->getData('banner',array('status'=>1));
		$limit= 10;
		$uri_segment= 3;
		$offset= $this->uri->segment($uri_segment);
		$tanggal = date('Y-m-d');
		$bataswaktu = time() - 300;
		$data['listview1'] = $this->supermodel->getData('daftar_acara',$field=array('kategori'=>1), $order='daftar_acara_id', $dasc='ASC', $limit, $offset);
		$data['listview2'] = $this->supermodel->getData('daftar_acara',$field=array('kategori'=>2), $order='daftar_acara_id', $dasc='ASC', $limit, $offset);
		$data['listview3'] = $this->supermodel->getData('daftar_acara',$field=array('kategori'=>3), $order='daftar_acara_id', $dasc='ASC', $offset);
		$data['slide'] = $this->supermodel->getData('slide',array('status'=>1));
		$data['galeri'] = $this->supermodel->getData('galeri',$field='', $order='', $dasc='DESC', $limit='8');
		$data['populer'] = $this->m_global->getPostAll(array('p.status'=>1,'c.type'=>1),'p.view','desc',3);
		$data['pengunjung']       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip")); 
		$data['totalpengunjung']  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
		$data['pengunjungonline'] = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));
		
		$data['konten'] = 'daftar_acara';
		$data['category'] = array('category_id'=>'');
		$data['breadcrumb'] = "Program Acara";
		
		$vrs = array_merge($konfig,$data);
		$this->load->vars($vrs);
		$this->load->view('template');
	}
}
?>