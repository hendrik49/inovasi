<?php
/**
* 
*/
class Galeri extends CI_Controller
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
		
		$data['banner'] = $this->supermodel->getData('banner',array('status'=>1));
		$data['unduh'] = $this->m_global->getPostAll(array('p.status'=>1,'c.type'=>2),'p.date_publish','desc',6);
		$data['galeri'] = $this->supermodel->getData('galeri',$field='', $order='', $dasc='DESC', $limit='8');
		$data['album'] = $this->supermodel->getData('album',$field='');
		$data['pengunjung']       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip")); 
		$data['totalpengunjung']  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
		$data['pengunjungonline'] = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

		$data['konten'] = 'album';
		$data['category'] = array('category_id'=>'');
		$data['breadcrumb'] = "Galeri ";
		
		$vrs = array_merge($konfig,$data);
		$this->load->vars($vrs);
		$this->load->view('template');
	}

	function album($id=NULL)
	{
		$konfig = $this->m_global->get_konfig();
		$tanggal = date('Y-m-d');
		$bataswaktu = time() - 300;

		$data['banner'] = $this->supermodel->getData('banner',array('status'=>1));
		$data['unduh'] = $this->m_global->getPostAll(array('p.status'=>1,'c.type'=>2),'p.date_publish','desc',6);
		$data['galeri'] = $this->supermodel->getData('galeri',$field='', $order='', $dasc='DESC', $limit='8');

		$data['listview'] = $this->supermodel->getData('galeri',array('album_id'=>$id));
		$data['album'] = $this->supermodel->getData('album',array('album_id'=>$id))->row_array();
		$data['pengunjung']       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip")); 
		$data['totalpengunjung']  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
		$data['pengunjungonline'] = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));
		
		$data['konten'] = 'galeri';
		$data['category'] = array('category_id'=>'');
		$data['breadcrumb'] = "<a href='".site_url('galeri')."'>Galeri</a> / Album";
		
		$vrs = array_merge($konfig,$data);
		$this->load->vars($vrs);
		$this->load->view('template');
	}
}
?>