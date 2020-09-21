<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
     <h1>
      PTPN 7
      <small>bandar lampung</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">users</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">


        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data User</h3>

          </div>
          <a  href="<?php echo base_url() ; ?>admin/tampil_tambah_user" class="btn btn-app">
            <i class="fa fa-edit"></i> Create User 
          </a>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Id Bagian</th>
                  <th>Status</th>
                  <th>Action</th>


                </tr>
              </thead>
              <tbody>

               <?php 
               $no = 1;
               foreach($view_user as $u){ 
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $u->username ?></td>
                  <td><?php echo $u->email ?></td>
                  <td><?php echo $u->first_name?></td>
                  <td><?php echo $u->last_name ?></td>
                  <td><?php echo $u->nama_bagian ?></td>

                  <td> <?php if($u->active == 0){ 
                    ?> 
                    <span class="badge btn-danger">Non Aktif</span>
                    <?php
                    echo anchor('admin/aktif/'.$u->id_user,'aktifkan');
                  } else {
                    ?> 
                    <span class="badge btn-success">Aktif</span>
                    <?php
                    echo anchor('admin/nonaktif/'.$u->id_user,'nonaktifkan');
                  } ?></td>

                  <td>
                   <?php echo anchor('admin/detail_user/'.$u->id_user,'detail'); ?>
                   <?php echo anchor('admin/tampil_edit_user/'.$u->id_user,'edit'); ?>
                   <?php echo anchor('admin/hapus/'.$u->id_user,'Hapus'); ?>
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