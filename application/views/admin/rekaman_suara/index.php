<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $title ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><?php echo $title ?></li>
    <li class="active"></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<?php
if($this->session->flashdata('success')) {
  echo '
  <div class="alert alert-success">'.$this->session->flashdata('success').'</div> 
  ';
}
if($this->session->flashdata('error')) {
  echo '
  <div class="alert alert-danger">'.$this->session->flashdata('error').'</div> 
  ';
}
?>
<div class="row">
  <div class="col-lg-4">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <strong>Form Rekaman Siaran</strong>
      </div>
      <div class="box-body">
        <?php echo form_open_multipart('adm_rekaman_suara/tambah')?>
        <div class="form-group">
          <label>Judul Rekaman</label>
          <input type="text" name="rekaman_title" class="form-control" value="">
          <p class="help-block text-red"></p>
        </div>
        <div class="form-group">
          <label>Kategori Rekaman</label><br/>
          <select name="kategori" class="form-control">
            <option value="pilih">Pilih</option>
            <option value="Bilik">Bilik</option>
            <option value="Kontak Juanda 10">Kontak Juanda 10</option>
          </select>
        </div>
        <div class="form-group">
          <label>Rangkuman Rekaman</label>
          <textarea class="form-control" rows="4" name="deskripsi"></textarea>
        </div>
        <div class="form-group">
          <label>Tanggal Rekaman</label>
          <input type="text" name="rekaman_date" value="<?php echo date('Y-m-d')?>" class="form-control" id="dp2">
        </div>
        <div class="form-group">
          <label>File Rekaman</label>
          <input type="file" name="file">
        </div>
        <div class="form-group">
          <button class="btn btn-info" type="submit"><i class="fa fa-save"></i> Save</button>
          <button class="btn btn-default" type="reset">Reset</button>
        </div>
        <?php echo form_close();?>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
  <div class="col-lg-8">
    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Judul</th>
              <th>Tanggal Upload</th>
              <th>Tools</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($listview->num_rows()>0) {
              $no = 1;
              foreach ($listview->result() as $rows) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $rows->rekaman_title ?></td>
              <td><?php echo $rows->upload_date ?></td>
              <td>
                <a href="<?php echo site_url('adm_rekaman_suara/edit/'.$rows->rekaman_suara_id)?>" class="btn btn-xs bg-green" data-toggle="tooltip" title="Edit Data"><i class="fa fa-pencil"></i></a>
                <a href="<?php echo site_url('trash/proses?tabel=rekaman_suara&primary='.$rows->rekaman_suara_id.'&url=adm_rekaman_suara'.'&img=uploads/rekaman/'.$rows->file)?>" class="btn btn-xs bg-red" data-toggle="tooltip" title="Hapus Data" onclick="return confirm('Menghapus data ini akan menghapus data posting juga!! Anda yakin??')"><i class="fa fa-trash-o"></i></a>
              </td>
            </tr>
            <?php
              $no++;
              }
            }
            ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>
</section><!-- /.content -->