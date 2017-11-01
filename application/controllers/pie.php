<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class pie extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('mread');
    }
    public function index($id=null)
    {
         $data['pie_data']=$this->mread->GetPie();
        $this->load->view('pie',$data);

    	
    }
    public function inovasi($id=null)
    {
         $data['pie_data']=$this->mread->GetPie1();
        $this->load->view('pie1',$data);

        
    }
}