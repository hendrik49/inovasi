<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $title ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><?php echo $title ?></li>
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
        <strong>Form Banner</strong>
      </div>
      <div class="box-body">
        <?php echo form_open_multipart('banner/index')?>
        <input type="hidden" name="id" value="<?php echo $row['banner_id'] ?>">
        <div class="form-group">
          <label>Judul*</label>
          <input type="text" name="title" class="form-control" value="<?php echo $row['title'] ?>">
          <p class="help-block text-red"><?php echo form_error('title',' ')?></p>
        </div>
        <div class="form-group">
          <label>Kategori*</label>
          <select name="kategori" class="form-control">
            <option value="0">Banner</option>
            <option value="1">Event</option>
          </select>
        </div>
        <div class="form-group">
          <label>Posisi*</label>
          <select name="position" class="form-control">
            <?php
            foreach ($position as $no => $nm) {
              $sel = '';
              if($row['position']==$no) {
                $sel = 'selected';
              }
              echo "<option value='".$no."' ".$sel.">". $nm."</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Gambar</label>
          <input type="file" name="banner_file">
          <?php if($row['banner_file']): ?>
          <p class="help-block"><img src="<?php echo base_url('uploads/banner/'.$row['banner_file']) ?>" height="70"></p>
        <?php endif;?>
        </div>
        <div class="form-group">
          <label>Link</label>
          <input type="text" name="link" class="form-control" value="<?php echo $row['link'] ?>">
        </div>
        <div class="form-group">
          <label>Publish <input type="checkbox" name="status" value="1" <?php if($row['status']==1){ echo "checked"; } ?>></label>
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
              <th>Gambar</th>
              <th>Judul</th>
              <th>Posisi</th>
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
              <td><img src="<?php echo base_url('uploads/banner/'.$rows->banner_file) ?>" width="100"></td>
              <td><?php echo $rows->title ?></td>
              <td><?php echo posisi_banner($rows->position) ?></td>
              <td>
                <a href="<?php echo site_url('banner/index/'.$rows->banner_id)?>" class="btn btn-xs bg-green" data-toggle="tooltip" title="Edit Data"><i class="fa fa-pencil"></i></a>
                <a href="<?php echo site_url('trash/proses?tabel=banner&primary='.$rows->banner_id.'&url=banner&img=uploads/banner/'.$rows->banner_file)?>" class="btn btn-xs bg-red" data-toggle="tooltip" title="Hapus Data" onclick="return confirm('Menghapus data ini akan menghapus data posting juga!! Anda yakin??')"><i class="fa fa-trash-o"></i></a>
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