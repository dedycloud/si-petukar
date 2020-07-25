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
              
            <h3 class="box-title">Accep tugas</h3>

            	<!-- <a  href="<?php echo base_url() ; ?>managerunit/tambahtugas" ><span class="btn  btn-xs btn-primary  glyphicon-plus" > Create Tugas</a> -->

            </div>

            <div class="col-md-12" >
  <div class="col-md-4">
  <table  class="  table table-condensed " >
									<tr>
										<td><b>Penyetuju </b></td>
										<td>:</td>
										<td> <b><?= $user->username ; ?></b></td>
									</tr>
					
                  <tr>
										<td><b>Tanggal Hari ini </b></td>
										<td>:</td>
										<td><?= date("d M Y",strtotime(date("Y-m-d h:i:s"))) ; ?></td>
									</tr>
						
                  <tr>
										<td></td>
										<td></td>
										<td> </td>
									</tr>
							
								</table>

  </div>
  <div class="col-md-8">
  </div>
            </div>
            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tujuan</th>
                  <th>Judul Tugas</th>
                  <th>Jangka Waktu</th>
                  <th>Jenis</th>
                  <th>Status</th>
                  <th>Action</th>
                 
                 
                </tr>
                </thead>
                <tbody>
            
               <?php 
                $no = 1;
                foreach($accept_tugas as $u){ 
                ?>
                <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $u->id_tujuan?></td>
                <td><?php echo $u->judul_tugas?></td>
                <td><?= date("d M Y",strtotime($u->jangka_waktu )) ; ?></td>
                <td><?php echo $u->jenis?></td>
                <td><?php if($u->status == 'failed' ) { ?> 
                  <span class="badge btn-danger">failed</span>
                  <?php } else if($u->status == 'proccess' ) { ?> 
                  <span class="badge btn-info">progress</span>
                  <?php } else if($u->status == 'waiting_accept' ) { ?> 
                       <span class="badge btn-warning">waiting accept</span>
                  <?php } else if($u->status == 'success' ) { ?> 
                       <span class="badge btn-success">success</span>
                  <?php }else if($u->status == 'revisi' ) { ?> 
                       <span class="badge btn-success">acc revisi </span>
                  <?php }
                  else { ?>
                       <span class="badge btn-default">available</span>

                  <?php } ?>
                </td>
                <td>
                <!-- nama file, itu nama buat action nya -->
                 <?php echo anchor('coprojectmanager/detail_accept_task/'.$u->id. '/'.$u->id_jenis,'detail'); ?>
                

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