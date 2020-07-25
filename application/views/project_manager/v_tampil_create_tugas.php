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
            <div class="box-header">
            	<a  href="<?php echo base_url() ; ?>projectmanager/tambahtugas" class="btn btn-app">
                <i class="fa fa-edit"></i> Create Tugas
              </a>
              
            	<!-- <a  href="<?php echo base_url() ; ?>managerunit/tambahtugas" ><span class="btn  btn-xs btn-primary  glyphicon-plus" > Create Tugas</a> -->

            </div>

            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tujuan</th>
                  <th>Jangka Waktu</th>
                  <th>Judul Tugas</th>
                  <th>Jenis</th>
                  <th>Status</th>
                  <th>Action</th>
                 
                 
                </tr>
                </thead>
                <tbody>
            
               <?php 
                $no = 1;
                foreach($view_tampil_tugas as $u){ 
                ?>
                <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $u->id_tujuan?></td>
                <td><?= date("d M Y",strtotime($u->jangka_waktu )) ; ?></td>
                <td><?php echo $u->judul_tugas?></td>
                <td><?php echo $u->jenis?></td>
           <td><?php if($u->status == 'failed' ) { ?> 
                  <span class="badge btn-danger">failed</span>
                  <?php } else if($u->status == 'proccess' ) { ?> 
                  <span class="badge btn-info">progress</span>
                  <?php } else if($u->status == 'waiting_accept' ) { ?> 
                       <span class="badge btn-warning">waiting accept</span>
                  <?php }else if($u->status == 'success' ) { ?> 
                       <span class="badge btn-success">success</span>
                  <?php }else { ?>
                       <span class="badge btn-default">available</span>

                  <?php } ?>
                </td>
                <td>
                <!-- nama file, itu nama buat action nya -->
                 <?php echo anchor('projectmanager/detail_create_task/'.$u->id,'detail'); ?>
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