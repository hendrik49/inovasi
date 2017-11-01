<?php
/**
* 
*/
class Rekaman_suara extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_global');
		$this->load->model('supermodel');
	}

	function juanda10()
	{
			
		$konfig = $this->m_global->get_konfig();
		$tanggal = date('Y-m-d');
		$bataswaktu = time() - 300;
		$link = 'rekaman_suara/juanda10/';
		$limit= 5;
		$uri_segment= 3;
		$offset= $this->uri->segment($uri_segment);
		$jum = $this->supermodel->getData('rekaman_suara',array('Kategori'=>'Kontak Juanda 10'), $order='rekaman_date', $dasc='DESC');
		$data['all'] = $this->supermodel->getData('rekaman_suara',array('kategori'=>'Kontak Juanda 10'), $order='rekaman_date', $dasc='DESC', $limit, $offset);
		$this->supermodel->paging($link,$jum,$limit,$uri_segment);

		$data['banner'] = $this->supermodel->getData('banner',array('status'=>1,'Kategori'=>0));
		$data['pengunjung']       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip")); 
		$data['totalpengunjung']  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
		$data['pengunjungonline'] = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));
		$data['webconfig'] = $this->supermodel->getData('webconfig');
		$data['slide'] = $this->supermodel->getData('slide',array('status'=>1));
		$data['galeri'] = $this->supermodel->getData('galeri',$field='', $order='', $dasc='DESC', $limit='8');
		$data['populer'] = $this->m_global->getPostAll(array('p.status'=>1,'c.type'=>1),'p.view','desc',3);

		$data['konten'] = 'rekaman_suara';
		$data['category'] = array('category_id'=>'');
		$data['breadcrumb'] = "Rekaman Suara";
		$data['title'] = "Rekaman Suara (Juanda 10)";
		$vrs = array_merge($konfig,$data);
		$this->load->vars($vrs);
		$this->load->view('template');

	}

	function bilik()
	{
		$konfig = $this->m_global->get_konfig();
		$tanggal = date('Y-m-d');
		$bataswaktu = time() - 300;
		$link = 'rekaman_suara/bilik/';
		$limit= 5;
		$uri_segment= 3;
		$offset= $this->uri->segment($uri_segment);
		$jum = $this->supermodel->getData('rekaman_suara',array('Kategori'=>'Bilik'), $order='rekaman_date', $dasc='DESC');
		$data['all'] = $this->supermodel->getData('rekaman_suara',array('kategori'=>'Bilik'), $order='rekaman_date', $dasc='DESC', $limit, $offset);
		$this->supermodel->paging($link,$jum,$limit,$uri_segment);

		$data['banner'] = $this->supermodel->getData('banner',array('status'=>1,'Kategori'=>0));
		$data['pengunjung']       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip")); 
		$data['totalpengunjung']  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
		$data['pengunjungonline'] = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));
		$data['webconfig'] = $this->supermodel->getData('webconfig');
		$data['slide'] = $this->supermodel->getData('slide',array('status'=>1));
		$data['galeri'] = $this->supermodel->getData('galeri',$field='', $order='', $dasc='DESC', $limit='8');
		$data['populer'] = $this->m_global->getPostAll(array('p.status'=>1,'c.type'=>1),'p.view','desc',3);

		$data['konten'] = 'rekaman_suara';
		$data['category'] = array('category_id'=>'');
		$data['breadcrumb'] = "Rekaman Suara";
		$data['title'] = "Rekaman Suara (Bilik)";

		$vrs = array_merge($konfig,$data);
		$this->load->vars($vrs);
		$this->load->view('template');
	}
}
?>