<?php    
class Mread extends CI_Model{
    function report($id=null){
    	if($id==null){
        $query = $this->db->query("SELECT * from opd, inovasi, perkembangan where opd.opd_id=inovasi.opd_id and inovasi.inovasi_id=perkembangan.inovasi_id");
         }else{
 	$query = $this->db->query("SELECT * from opd, inovasi, perkembangan where opd.opd_id=inovasi.opd_id and inovasi.inovasi_id=perkembangan.inovasi_id and opd.opd_id =".$id);

         }
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function status(){
        $status="";
        for ($no=1; $no < 7 ; $no++) { 
            $jumlah=strlen($no);
           /* if ($jumlah == 1) {
                
            $sql = $this->db->query("Select * from perkembangan where like");
            }else{
            $sql = $this->db->query("Select * from perkembangan");

            }*/
              $sql = $this->db->query("Select * from perkembangan where status = ".$no)->num_rows();
              if($no==7){
              $status .=  $sql;
          }else{
              $status .=  $sql.",";  
          }
              //echo $no;
              "<br>".$sql;
        }

        return $status;

       }



        public function GetPie1(){
        $query=$this->db->query(" SELECT * FROM inovasi INNER JOIN perkembangan ON inovasi.inovasi_id = perkembangan.inovasi_id ");
        return $query;
        }


       public function GetPie(){


        $pie="";
        $nilaipie  = array('','30','90','90');

        for ($no=1; $no <= 3 ; $no++) { 
            $jumlah=strlen($no);

        if ($no==3) {
          $sql = $this->db->query(" SELECT tgl FROM perkembangan WHERE tgl <= (DATE_SUB(CURDATE(), INTERVAL + $nilaipie[$no] DAY))")->num_rows();
        }else{
        $sql = $this->db->query(" SELECT tgl FROM perkembangan WHERE tgl > (DATE_SUB(CURDATE(), INTERVAL + $nilaipie[$no] DAY))")->num_rows();

        }
             
              if($no==3){
              $pie .=  $sql;
          }else{
              $pie .=  $sql.",";  
          }
              //echo $no;
              "<br>".$sql;
        }

        return $pie;


        
        }
}