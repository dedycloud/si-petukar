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
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <div class="col-md-12" >
  <div class="col-md-4">
  <table  class="  table table-condensed " >
									<tr>
										<td><b>Kepada </b></td>
										<td>:</td>
										<td> <b>Rivalino</b></td>
									</tr>
					
                  <tr>
										<td><b>Leader </b></td>
										<td>:</td>
										<td> <b>Ella</b></td>
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
            <!-- /.box-header -->
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
                <td>
                  <?= date("d M Y",strtotime($u->jangka_waktu )) ; ?>
                    <?php 
                        $sql="SELECT datediff(current_date(), '$u->jangka_waktu') as selisih FROM tbl_tugas where id = '$u->id' ";
                        $sisa = $this->db->query($sql);
                        $jatuh_tempo = $sisa->row()->selisih;
                        if ($jatuh_tempo < 0 ) {
                          echo ' ( <span class="red"><b>'.$jatuh_tempo.' hari </b> </span>  )' ;
                        }else {
                          echo ' ( <span class="green"><b>'.$jatuh_tempo.' hari </b> </span>  )' ;
                        }
                  
                  
                    ?>  
                  </td>
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
                  <?php }else if($u->status == 'revisi' ) { ?> 
                       <span class="badge btn-success">acc revisi </span>
                  <?php }
                  else { ?>
                       <span class="badge btn-default">available</span>

                  <?php } ?>
                </td>

                <td>
                <!-- nama file, itu nama buat action nya -->
                 <?php echo anchor('coprojectmanager/detailtugas/'.$u->id. '/'.$u->status.'/'.$u->id_jenis ,'detail'); ?>
               
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