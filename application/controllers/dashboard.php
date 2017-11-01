<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Dashboard extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('mread');
    }
    public function index($id=null)
    {
    	if($id==null){
        $data['report'] = $this->mread->report();
        $this->load->view('chart', $data);
    }else{

    	  $data['report'] = $this->mread->report($id);
        $this->load->view('chart', $data);
    }
    }
}