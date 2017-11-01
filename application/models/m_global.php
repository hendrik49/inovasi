<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author Imam Teguh
* Date 28 Mei 2015
* namefile global.php type Model
*/
class M_global extends CI_Model
{
	
	function getPost($where=null,$limit='', $offset='')
	{
		$this->db->select('*');
		$this->db->from('post p');
		$this->db->join('category c','p.category_id=c.category_id');
		$this->db->join('user u','p.user_id=u.user_id');

		if($where!=null) {
			$this->db->where($where);
		}

		$this->db->order_by('p.post_date','desc');
		if(!empty($limit)):
			$this->db->limit($limit,$offset);
		endif;

		$get = $this->db->get();
		
		return $get;

	}

	function getPostAll($where=null,$order='p.post_date',$by='desc',$limit='', $offset='')
	{
		$this->db->select('*');
		$this->db->from('post p');
		$this->db->join('category c','p.category_id=c.category_id');
		$this->db->join('user u','p.user_id=u.user_id');

		if($where!=null) {
			$this->db->where($where);
		}

		$this->db->order_by($order,$by);
		if(!empty($limit)):
			$this->db->limit($limit,$offset);
		endif;

		$get = $this->db->get();
		
		return $get;

	}		

	function getAct($where=null,$limit='', $offset='')
	{
		$this->db->select('*');
		$this->db->from('logactivity p');
		$this->db->join('opd u','p.opd_id=u.opd_id');

		if($where!=null) {
			$this->db->where($where);
		}

		$this->db->order_by('p.time','desc');
		if(!empty($limit)):
			$this->db->limit($limit,$offset);
		endif;

		$get = $this->db->get();
		
		return $get;
	}
	

	function activities($activity)
	{
		$in['opd_id'] = $this->session->userdata('opd_id');
		$in['activity'] = $activity;
		$in['time'] = date('Y-m-d H:i:s');
		$this->supermodel->insertData('logactivity',$in);
		return TRUE;
	}

	function get_konfig()
	{
		$this->db->where('webconfig_id','1');
		$get = $this->db->get('webconfig');
		foreach ($get->result_array() as $key => $value) {
			$key = $value;
		}
		return $key;
	}

}

?>