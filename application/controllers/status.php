<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Status extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('mread');
    }
    public function index($id=null)
    {
    	if($id==null){
        $data['status'] = $this->mread->status();
        $this->load->view('status', $data);
    }else{

    	  $data['status'] = $this->mread->status($id);
        $this->load->view('status', $data);
    }
    }
}