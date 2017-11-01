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
        <strong>Form User</strong>
      </div>
      <div class="box-body">
        <?php echo form_open('user/index')?>
        <input type="hidden" name="id" value="<?php echo $row['opd_id'] ?>">
         <div class="form-group">
          <label>Username*</label>
          <input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>">
          <p class="help-block text-red"><?php echo form_error('username',' ')?></p>
        </div>
         <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" >
          <p class="help-block text-blue">*isi jika ingin dirubah</p>
        </div>
        <div class="form-group">
          <label>Nama Perangkat Daerah</label>
          <input type="text" name="user_name" class="form-control" value="<?php echo $row['user_name'] ?>">
          <p class="help-block text-red"><?php echo form_error('user_name',' ')?></p>
        </div>
        <div class="form-group">
          <label>Nama Kepala Perangkat Daerah</label>
          <input type="text" name="kepala_opd" class="form-control" value="<?php echo $row['kepala_opd'] ?>">
          <p class="help-block text-red"><?php echo form_error('kepala_opd',' ')?></p>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email_opd" class="form-control" value="<?php echo $row['email_opd'] ?>">
          <p class="help-block text-red"><?php echo form_error('email_opd',' ')?></p>
        </div>
         <div class="form-group">
          <label>Nama Pengisi</label>
          <input type="text" name="penginput" class="form-control" value="<?php echo $row['penginput'] ?>">
          <p class="help-block text-red"><?php echo form_error('penginput',' ')?></p>
        </div>
        <div class="form-group">
          <label>Email Penginput</label>
          <input type="email" name="email_penginput" class="form-control" value="<?php echo $row['email_penginput'] ?>">
          <p class="help-block text-red"><?php echo form_error('email_penginput',' ')?></p>
        </div>
         <div class="form-group">
          <label>Kontak</label>
          <input type="text" name="kontak" class="form-control" value="<?php echo $row['kontak'] ?>">
          <p class="help-block text-red"><?php echo form_error('kontak',' ')?></p>
        </div>

        <div class="form-group">
          <label>Level</label>
          <select name="level" class="form-control">
            <?php
            foreach ($level as $no => $nm) {
              $sel = '';
              if($row['level']==$no) {
                $sel = 'selected';
              }
              echo "<option value='".$no."' ".$sel.">". $nm."</option>";
            }
            ?>
          </select>
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
              <th>Name</th>
              <th>Username</th>
              <th>Level</th>
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
              <td><?php echo $rows->user_name ?></td>
              <td><?php echo $rows->username; ?></td>
              <td><?php echo $level[$rows->level] ?></td>
              <td>
                <a href="<?php echo site_url('user/index/'.$rows->opd_id)?>" class="btn btn-xs bg-green" data-toggle="tooltip" title="Edit Data"><i class="fa fa-pencil"></i></a>
                <a href="<?php echo site_url('trash/proses?tabel=opd&primary='.$rows->opd_id.'&url=user')?>" class="btn btn-xs bg-red" data-toggle="tooltip" title="Hapus Data" onclick="return confirm('Menghapus data!! Anda yakin??')"><i class="fa fa-trash-o"></i></a>
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