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
        
              <b>1.</b>
            <a  href="<?php echo base_url() ; ?>projectmanager/tambahtugas" class="btn btn-app">
              <i class="fa fa-edit"></i> Create task Now  &nbsp  &nbsp
            </a>
            <b>&nbsp  &nbsp 2.</b>
            <a  href="<?php echo base_url() ; ?>projectmanager/tambahtugas_bymodul" class="btn btn-app">
              <i class="fa fa-edit"></i> Create task modul
            </a>

         


            <?php if($this->session->flashdata('flashdatatambah') ) : ?>
              <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">
                  <i class="ace-icon fa fa-times"></i>
                </button>
                <?= $this->session->flashdata('flashdatatambah'); ?>
              </div> 
            <?php endif; ?>
            <?php if($this->session->flashdata('flashdatadelete') ) : ?>
              <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">
                  <i class="ace-icon fa fa-times"></i>
                </button>
                <?= $this->session->flashdata('flashdatadelete'); ?>
              </div> 
            <?php endif; ?>
          </div>


          <div class="box-body">

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tujuan</th>
                  <th>Penyetuju</th>
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
               foreach($view_tampil_tugas as $u){ ?>
                
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $u->tujuan?></td>
                   <td><?php echo $u->penyetuju ?></td>
                  <td><?= date("d M Y",strtotime($u->jangka_waktu )) ; ?></td>
                  <td><?php echo $u->judul_tugas?></td>
                  <td><?php  if($u->id_jenis == 1){  ?> tugas now <?php } elseif ($u->id_jenis == 2){ ?> tugas job <?php }  ?></td>
                  <td><?php if($u->status == 'failed' ) { ?> 
                    <span class="badge btn-danger">failed</span>
                  <?php } else if($u->status == 'proccess' ) { ?> 
                    <span class="badge btn-info">progress</span>
                  <?php } else if($u->status == 'waiting_accept' ) { ?> 
                   <span class="badge btn-warning">waiting accept</span>
                 <?php }
                 else if($u->status == 'success' ) { ?> 
                   <span class="badge btn-success">success</span>
                 <?php }else if($u->status == 'revisi' ) { ?> 
                   <span class="badge btn-success">acc revisi </span>
                 <?php }
                 else { ?>
                   <span class="badge btn-default">available</span>

                 <?php } ?>
               </td>
               <td>
                <?php if($u->status == 'failed' ) { ?> 

                <?php echo anchor('projectmanager/detail_create_task/'.$u->id. '/'.$u->status.'/'.$u->id_jenis.'/'.$u->id_tujuan,'detail'); ?>

                <?php } else if($u->status == 'proccess' ) { ?> 

                  <?php echo anchor('projectmanager/detail_create_task/'.$u->id. '/'.$u->status.'/'.$u->id_jenis.'/'.$u->id_tujuan,'detail'); ?>
                  <?php echo anchor('projectmanager/edit_task/'.$u->id,'edit'); ?>
                  <?php echo anchor('projectmanager/hapus_task/'.$u->id,'hapus'); ?>

                <?php } else if($u->status == 'waiting_accept' ) { ?> 

                <?php echo anchor('projectmanager/detail_create_task/'.$u->id. '/'.$u->status.'/'.$u->id_jenis.'/'.$u->id_tujuan,'detail'); ?>

                <?php } else if($u->status == 'success' ) { ?> 

               <?php echo anchor('projectmanager/detail_create_task/'.$u->id. '/'.$u->status.'/'.$u->id_jenis.'/'.$u->id_tujuan,'detail'); ?>

                <?php }else if($u->status == 'revisi' ) { ?> 

               <?php echo anchor('projectmanager/detail_create_task/'.$u->id. '/'.$u->status.'/'.$u->id_jenis.'/'.$u->id_tujuan,'detail'); ?>

                <?php }  else { ?>

                  <?php echo anchor('projectmanager/detail_create_task/'.$u->id. '/'.$u->status.'/'.$u->id_jenis.'/'.$u->id_tujuan,'detail'); ?>
                  <?php echo anchor('projectmanager/edit_task/'.$u->id,'edit'); ?>
                  <?php echo anchor('projectmanager/hapus_task/'.$u->id,'hapus'); ?>
                  
                <?php } ?>
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