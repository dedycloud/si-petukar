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
              <h3 class="box-title">Data bagian</h3>
            </div>
               <a  href="<?php echo base_url() ; ?>admin/tampil_tambah_bagian" class="btn btn-app">
              <i class="fa fa-edit"></i> Create bagian 
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
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Bagian</th>
                  <th>Action</th>
                  
                 
                 
                </tr>
                </thead>
                <tbody>
            
               <?php 
                $no = 1;
                foreach($view_list_bagian as $u){ 
                ?>
                <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $u->nama_bagian?></td>
                

                <td>
                <!-- nama file, itu nama buat action nya -->
                 <?php echo anchor('admin/tampil_edit_bagian/'.$u->id,'edit'); ?>
                 <?php echo anchor('admin/hapus_bagian/'.$u->id,'Hapus'); ?>
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