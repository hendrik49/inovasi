<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $title ?> | Administrator</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url()?>assets/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    .sidebar-menu > li > a {
          padding: 8px 5px 8px 15px;
    }
    .sidebar-menu .treeview-menu > li > a {
      border-bottom: 1px solid;
    }
    </style>
  </head>
  <body class="skin-blue">
    <!-- Site wrapper -->
    <div class="wrapper">
      
      <header class="main-header">
        <a href="#" class="logo"><i><b>Web Admin</b>istrator</i></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('assets/dist/img/avatar.png')?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('name') ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> <?php level($this->session->userdata('userlvl')) ?></a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->

          <ul class="sidebar-menu">
            <li class="header">AKUN</li>
            <li><a href="<?php echo site_url('adminweb/edit_profile')?>"><i class="fa fa-gear"></i> Profil Pengguna</a></li>
            <li><a href="<?php echo site_url('adminweb/logout')?>"><i class="fa fa-lock"></i> Keluar</a></li>
          	<?php
          		$lev = $this->session->userdata('userlvl');
          		if($lev=='0'){
          			echo "<li class='header'>MAIN MENU</li>"; 
            		echo "<li><a href='".site_url('adminweb/')."'><i class='fa fa-dashboard'></i> Dashboard</a></li>";
            		echo "<li class='treeview'>";
		              echo "<a href='#'>";
		                echo "<i class='fa fa-list'></i> <span>Data Master</span> <i class='fa fa-angle-left pull-right'></i>";
		              echo "</a>";
		              echo "<ul class='treeview-menu'>";
		               // echo "<li><a href='".site_url('category')."'><i class='fa fa-file'></i> Kategori</a></li>";
		                echo "<li><a href='".site_url('user')."'><i class='fa fa-group'></i> User</a></li>";
		              echo "</ul>";
		            echo "</li>";
		           /* echo "<li class='treeview'>";
		              echo "<a href='#'>";
		                echo "<i class='fa fa-list'></i> <span>Konten </span> <i class='fa fa-angle-left pull-right'></i>";
		              echo "</a>";
		              echo "<ul class='treeview-menu'>";
		                echo "<li><a href='".site_url('post/category/0')."'><i class='fa fa-table'></i> Data Statis</a></li>";
		                echo "<li><a href='".site_url('post/category/1')."'><i class='fa fa-table'></i> Data Dinamis</a></li>";
		                echo "<li><a href='".site_url('post/category/2')."'><i class='fa fa-table'></i> Data Media</a></li>";
		              echo "</ul>";
		            echo "</li>";
		            echo "<li><a href='".site_url('album_galeri')."'><i class='fa fa-picture-o'></i> Album</a></li>";*/
                echo "<li class='treeview'>";
                  echo "<a href='#'>";
                    echo "<i class='fa fa-list'></i> <span>Inovasi</span> <i class='fa fa-angle-left pull-right'></i>";
                  echo "</a>";
                echo "<ul class='treeview-menu'>";
                    
                   echo "<li><a href='".site_url('adm_inovasii')."'><i class='fa fa-picture-o'></i> Inovasi</a></li>";
                   echo "<li><a href='".site_url('perkembangan')."'><i class='fa fa-file'></i> Perkembangan</a></li>";
                  echo "</ul>";
                echo "</li>";
		            
		           /* echo "<li><a href='".site_url('slide')."'><i class='fa fa-caret-square-o-right'></i> Slideshow</a></li>";
		            echo "<li><a href='".site_url('banner')."'><i class='fa fa-camera-retro'></i> Banner</a></li>";
		            echo "<li><a href='".site_url('adm_daftar_acara')."'><i class='fa fa-film'></i> Program Acara</a></li>";
		            echo "<li><a href='".site_url('adm_rekaman_suara')."'><i class='fa fa-bullhorn'></i> Rekaman Suara</a></li>";
		            echo "<li><a href='".site_url('konfig')."'><i class='fa fa-cogs'></i> Pengaturan</a></li>";*/
                  echo "<li class='treeview'>";
                  echo "<a href='#'>";
                    echo "<i class='fa fa-list'></i> <span>Data Grafik</span> <i class='fa fa-angle-left pull-right'></i>";
                  echo "</a>";
                  echo "<ul class='treeview-menu'>";
                   // echo "<li><a href='".site_url('category')."'><i class='fa fa-file'></i> Kategori</a></li>";
                    echo "<li><a href='".site_url('utama')."'><i class='fa fa-group'></i> Data Grafik</a></li>";
                     echo "<li><a href='".site_url('grafik')."'><i class='fa fa-group'></i> Data Grafik Per OPD</a></li>";
                  echo "</ul>";
                echo "</li>";
          		}
          		 else if($lev=='3'){
          			echo "<li class='header'>MAIN MENU</li>"; 
            	  echo "<li class='treeview'>";
                  echo "<a href='#'>";
                    echo "<i class='fa fa-list'></i> <span>Inovasi</span> <i class='fa fa-angle-left pull-right'></i>";
                  echo "</a>";
                echo "<ul class='treeview-menu'>";
                    
                   echo "<li><a href='".site_url('adm_inovasi')."'><i class='fa fa-picture-o'></i> Inovasi</a></li>";
                   echo "<li><a href='".site_url('category')."'><i class='fa fa-file'></i> Perkembangan</a></li>";
                  echo "</ul>";
                echo "</li>";
		           /* echo "<li class='treeview'>";
		              echo "<a href='#'>";
		                echo "<i class='fa fa-list'></i> <span>Konten </span> <i class='fa fa-angle-left pull-right'></i>";
		              echo "</a>";
		              echo "<ul class='treeview-menu'>";
		                echo "<li><a href='".site_url('post/category/0')."'><i class='fa fa-table'></i> Data Statis</a></li>";
		                echo "<li><a href='".site_url('post/category/1')."'><i class='fa fa-table'></i> Data Dinamis</a></li>";
		                echo "<li><a href='".site_url('post/category/2')."'><i class='fa fa-table'></i> Data Media</a></li>";
		              echo "</ul>";
		            echo "</li>";
		            echo "<li><a href='".site_url('album_galeri')."'><i class='fa fa-picture-o'></i> Album</a></li>";*/
               
		            
		           /* echo "<li><a href='".site_url('slide')."'><i class='fa fa-caret-square-o-right'></i> Slideshow</a></li>";
		            echo "<li><a href='".site_url('banner')."'><i class='fa fa-camera-retro'></i> Banner</a></li>";
		            echo "<li><a href='".site_url('adm_daftar_acara')."'><i class='fa fa-film'></i> Program Acara</a></li>";
		            echo "<li><a href='".site_url('adm_rekaman_suara')."'><i class='fa fa-bullhorn'></i> Rekaman Suara</a></li>";
		            echo "<li><a href='".site_url('konfig')."'><i class='fa fa-cogs'></i> Pengaturan</a></li>";*/
                  echo "<li class='treeview'>";
                  echo "<a href='#'>";
                    echo "<i class='fa fa-list'></i> <span>Data Grafik</span> <i class='fa fa-angle-left pull-right'></i>";
                  echo "</a>";
                  echo "<ul class='treeview-menu'>";
                   // echo "<li><a href='".site_url('category')."'><i class='fa fa-file'></i> Kategori</a></li>";
                    echo "<li><a href='".site_url('utama')."'><i class='fa fa-group'></i> Data Grafik</a></li>";
                     
                  echo "</ul>";
                echo "</li>";
          		}          		else {
          			echo "<li class='header'>MAIN MENU</li>";
          			$hide = '';
          			if($this->session->userdata("level") == 0){
          			    $hide .= "style='display:none;'";
          			}
            		echo "<li ".$hide."><a href='".site_url('adminweb/')."'><i class='fa fa-dashboard'></i> Dashboard</a></li>";
            	//	echo "<li class='treeview'>";
		           //   echo "<a href='#'>";
		            //    echo "<i class='fa fa-list'></i> <span>Data Master</span> <i class='fa fa-angle-left pull-right'></i>";
		            //  echo "</a>";
		              //echo "<ul class='treeview-menu'>";
		               // echo "<li><a href='".site_url('category')."'><i class='fa fa-file'></i> Kategori</a></li>";
		             //   echo "<li><a href='".site_url('user')."'><i class='fa fa-group'></i> User</a></li>";
		            //  echo "</ul>";
		           // echo "</li>";
		           /* echo "<li class='treeview'>";
		              echo "<a href='#'>";
		                echo "<i class='fa fa-list'></i> <span>Konten </span> <i class='fa fa-angle-left pull-right'></i>";
		              echo "</a>";
		              echo "<ul class='treeview-menu'>";
		                echo "<li><a href='".site_url('post/category/0')."'><i class='fa fa-table'></i> Data Statis</a></li>";
		                echo "<li><a href='".site_url('post/category/1')."'><i class='fa fa-table'></i> Data Dinamis</a></li>";
		                echo "<li><a href='".site_url('post/category/2')."'><i class='fa fa-table'></i> Data Media</a></li>";
		              echo "</ul>";
		            echo "</li>";
		            echo "<li><a href='".site_url('album_galeri')."'><i class='fa fa-picture-o'></i> Album</a></li>";*/
                echo "<li class='treeview'>";
                  echo "<a href='#'>";
                    echo "<i class='fa fa-list'></i> <span>Inovasi</span> <i class='fa fa-angle-left pull-right'></i>";
                  echo "</a>";
                echo "<ul class='treeview-menu'>";
                    
                   echo "<li><a href='".site_url('adm_inovasi')."'><i class='fa fa-picture-o'></i> Inovasi</a></li>";
                   echo "<li><a href='".site_url('category')."'><i class='fa fa-file'></i> Perkembangan</a></li>";
                  echo "</ul>";
                echo "</li>";
          		}
            ?>
                 
          </ul>
          
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <?php $this->load->view($konten)?>
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2015. All rights reserved.</strong>
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url()?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/dist/js/app.min.js" type="text/javascript"></script>

    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
      });

      $('#dp2').datepicker({ format: 'yyyy-mm-dd' });

      $("#kategori").change(function(){
        var tipe = $("#kategori").val();
      if(tipe=="Foto") {
        $("#foto").show();
        $("#video").hide();
      } else if(tipeGaleri=="Video") {
        $("#video").show();
        $("#foto").hide();
      } else if(tipeGaleri=="pilih"){
        $("#video").show();
        $("#foto").show();
      }

      });
    </script>

  </body>
</html>