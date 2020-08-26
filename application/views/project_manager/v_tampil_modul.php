<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Data tables</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
        <div class="box-body">

          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>divisi</th>
                <th>Judul Modul</th>
                <th>Deskripsi</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

             <?php 
             $no = 1;
             foreach($view_tampil_modul as $u){ 
              ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $u->nama_bagian ?></td>
                <td><?php echo $u->nama ?></td>
                <td><?php echo $u->deskripsi ?></td>
             <td>
              <?php echo anchor('projectmanager/edit_task/'.$u->id,'edit'); ?>
              <?php echo anchor('projectmanager/hapus_task/'.$u->id,'hapus'); ?>


            </td>
          </tr>
        <?php } ?>
      </tbody>

    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>