<?php
function menus()
{
	$mn = '<ul class="nav navbar-nav">';
	$mn .= '<li><a href="'.site_url('').'">BERANDA</a></li>';
	$ci =& get_instance();
	$get = $ci->db->query("select * from category where parent = 0 order by sort asc");
	foreach ($get->result() as $rows) {
		$cek = $ci->db->query("select * from category where parent = '".$rows->category_id."' order by sort asc ");
		if($cek->num_rows()>0) {
			$mn .= '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$rows->category_name.' <span class="caret"></span></a>';
			$mn .= '<ul class="dropdown-menu">';
			foreach ($cek->result() as $row) {
				$mn .= '<li><a href="'.site_url('kategori/kode/'.$row->category_id).'">'.$row->category_name.'</a></li>';
			}
			$mn .= "</ul>";
			$mn .= "</li>";
		} else {
			$mn .= '<li><a href="'.site_url('kategori/kode/'.$rows->category_id).'">'.$rows->category_name.'</a></li>';
		}
	}
	$mn .= '<li><a href="'.site_url('daftar_acara').'">PROGRAM ACARA</a></li>';
	$mn .= '<li><a href="'.site_url('galeri').'">GALERI</a></li>';
	$mn .= '<li><a href="'.site_url('kontak').'">KONTAK KAMI</a></li>';
	$mn .= "</ul>";

	return $mn;
}

function menus2()
{
	$mn = '<li>';
	$mn .= '<li><a href="'.site_url('').'">BERANDA</a></li>';
	$ci =& get_instance();
	$get = $ci->db->query("select * from category where parent = 0 order by sort asc");
	foreach ($get->result() as $rows) {
		$cek = $ci->db->query("select * from category where parent = '".$rows->category_id."' order by sort asc ");
		if($cek->num_rows()>0) {
			$mn .= '<li><a href="#">'.$rows->category_name.'</a>';
			$mn .= '<ul>';
			foreach ($cek->result() as $row) {
				$mn .= '<li><a href="'.site_url('kategori/kode/'.$row->category_id).'">'.$row->category_name.'</a></li>';
			}
			$mn .= "</ul>";
			$mn .= "</li>";
		} else {
			$mn .= '<li><a href="'.site_url('kategori/kode/'.$rows->category_id).'">'.$rows->category_name.'</a></li>';
		}
	}
	$mn .= '<li><a href="'.site_url('daftar_acara').'">PROGRAM ACARA</a></li>';
	$mn .= '<li><a href="'.site_url('galeri').'">GALERI</a></li>';
	$mn .= '<li><a href="'.site_url('#').'">REKAMAN SUARA</a><ul><li><a href="#">SPTV</a></li><li><a href="#">Radio Sipatahunan</a><ul><li><a href="'.site_url('rekaman_suara/bilik').'">Bilik</a></li><li><a href="'.site_url('rekaman_suara/juanda10').'">Kontak Juanda 10</a></li></ul></li></ul></li>';
	//$mn .= '<li><a href="'.('http://139.255.53.116/live').'">TV STREAMING (SPTV)</a></li>';
	$mn .= '<li><a href="'.site_url('kontak').'">KONTAK KAMI</a></li>';
	$mn .= "</li>";

	return $mn;
}

function color()
{
	$warna = array(
		'bg-red'=>'Merah',
		'bg-yellow'=>'Kuning',
		'bg-green'=>'Hijau',
		'bg-aqua'=>'Aqua',
		'bg-blue'=>'Biru',
		'bg-light-blue'=>'Biru muda',
		'bg-navy'=>'Biru Tua',
		'bg-teal'=>'Teal',
		'bg-olive'=>'Olive',
		'bg-lime'=>'Lime',
		'bg-orange'=>'Orange',
		'bg-purple'=>'Ungu',
		'bg-marron'=>'Maroon',
		'bg-black'=>'Black');
	return $warna;
}

function convert_tanggal($tgl)
{
	$bulan = array(
		"01"=>"Januari",
			"02"=>"Februari",
			"03"=>"Maret",
			"04"=>"April",
			"05"=>"Mei",
			"06"=>"Juni",
			"07"=>"Juli",
			"08"=>"Agustus",
			"09"=>"September",
			"10"=>"Oktober",
			"11"=>"November",
			"12"=>"Dessember",);
	$ex = explode("-", $tgl);
	$d = $ex[2];
	$y = $ex[0];
	$m = $bulan[$ex[1]];

	return $cetak = $d.' '.$m.' '.$y;
}

function posisi_banner($id=null)
{
	$posisi = array(
		'atasportal'=>'Bagian Atas Portal',
		'sisikiriportal'=>'Bagian Kiri Portal',
		'sisikananportal'=>'Bagian Kanan Portal',
		'bawahportal'=>'Bagian Bawah Portal',
		'kanankonten'=>'Sisi Kanan Konten',
		'kirikonten'=>'Sisi Kiri Konten');
	if($id==null)
		return $posisi;
	else
		return $posisi[$id];
	// Edit sesuai kebutuhan
}

function category_parent($id)
{
	$ci =& get_instance();

	$cek = $ci->db->get_where('category',array('category_id'=>$id));
	if($cek->num_rows()==1) {
		$cek = $cek->row();
		return $cek->category_name;
	} else {
		return $m = "- Parent Category -";
	}
}

function album_parent($id)
{
	$ci =& get_instance();

	$cek = $ci->db->get_where('album',array('album_id'=>$id));
	if($cek->num_rows()==1) {
		$cek = $cek->row();
		return $cek->album_title;
	} else {
		return $m = "- Parent Album -";
	}
}

function level($id)
{
	$level = array('Superadmin','Perangkat Daerah','Komunitas','Perguruan Tinggi');
	echo $level[$id];
}

function linked($id, $title) {
	$link = str_replace(" ", "-", htmlspecialchars($title));
	$linked = site_url('kategori/addview?id='.$id.'&title='.$link);
	return $linked;
}

function get_image($data, $default_url = null) {
    if($default_url!="") {
    	$img = base_url()."uploads/post/".$default_url;
    	return $img;
    } else {
    	if(preg_match_all('/\!\[.*?\]\((.*?)\)/', $data, $matches)) {
        	return $matches[1][0];
	    }
	    
	    if(preg_match_all('/<img (.*?)?src=(\'|\")(.*?)(\'|\")(.*?)? ?\/?>/i', $data, $matches)) {
	        return $matches[3][0];
	    }

    	return $foto = base_url()."uploads/post/foto-default.png";
    }
}


function navigate($id)
{
	$t = "";
	$ci =& get_instance();
	$get = $ci->db->query("select * from category where category_id ='".$id."' ");
	if($get->num_rows()==1) {
		foreach ($get->result() as $c) {
			if($c->parent!="0") {
				$cek = $ci->db->query("select * from category where category_id ='".$c->parent."' ");
				foreach ($cek->result() as $k) {
					$t .= '<li><a href="#">'.$k->category_name.'</a></li>';
				}
				$t .= '<li><a href="#">'.$c->category_name.'</a></li>';
			} else {
				$t .= '<li><a href="'.site_url('kategori/kode/'.$c->category_id).'">'.$c->category_name.'</a></li>';
			}
		}
	}
	return $t;
}

function galeri_album($id)
{
	$ci =& get_instance();
	$kel = $ci->db->get_where('galeri',array('album_id'=>$id))->row();
	if($kel) {
		return base_url("uploads/galeri/".$kel->image);
	}
	return base_url("uploads/post/default.jpg");
}


?>