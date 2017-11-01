<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $title ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li>Radio Sipatahunan</li>
    <li class="active"><?php echo $title ?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <a href="<?php echo site_url('adm_daftar_acara/tambah')?>" class="btn btn-sm bg-light-blue"><i class="fa fa-plus"></i> Tambah</a>
    </div>
    <div class="box-body">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Program</th>
          <th>Hari</th>
          <th>Waktu</th>
          <th>Tools</th>
        </tr>
      </thead>
      <tbody>
      <?php
      if($listview->num_rows()>0) {
        $no = $offset + 1;
        foreach ($listview->result() as $rows) {
      ?>
      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $rows->nama_program ?></td>
        <td><?php echo $rows->hari ?></td>
        <td><?php echo $rows->waktu ?></td>
        <td align="center">
          <a href="<?php echo site_url('adm_daftar_acara/edit/'.$rows->daftar_acara_id)?>" class="btn btn-xs bg-green" data-toggle="tooltip" title="Edit Data"><i class="fa fa-pencil"></i></a>
          <a href="<?php echo site_url('trash/proses?tabel=daftar_acara&primary='.$rows->daftar_acara_id.'&url=adm_daftar_acara')?>" class="btn btn-xs bg-red" data-toggle="tooltip" title="Hapus Data" onclick="return confirm('Anda yakin??')"><i class="fa fa-trash-o"></i></a>
        </td>
      </tr>
      <?php
      $no++;
        }
      } else {
        echo "<tr><td colspan='10'>No Data...</td></tr>";
      }
      ?>
      </tbody>
    </table>
      
    </div><!-- /.box-body -->
    <div class="box-footer">
    <?php echo $this->pagination->create_links(); ?>
    </div><!-- /.box-footer-->
  </div><!-- /.box -->
</section><!-- /.content -->