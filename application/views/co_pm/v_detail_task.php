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
              <h3 class="box-title">Detail Task</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <?php foreach ($view_detail_tugas as $row): ?>
						<div class="message-content" id="id-message-content">

              <table class="table table-condensed">
                <tr>
                  <th style="width: 10px"></th>
                  
                </tr>
                <tr>
                  <td></td>
                  <td>Tujuan</td>
                  <td><?= $row['id_tujuan']; ?></td>
                </tr>

                <tr>
                  <td></td>
                  <td>Jangka Waktu</td>
                  <td><?= date("d M Y",strtotime($row['jangka_waktu'] )) ; ?></td>
                </tr>

                <tr>
                  <td></td>
                  <td>Judul Tugas</td>
                  <td><?= $row['judul_tugas']; ?></td>
                </tr>

                <tr>
                  <td></td>
                  <td>Jenis</td>
				  <td><?= $row['id_jenis']; ?></td>              
                </tr>

                <tr>
                  <td></td>
                  <td>Created At</td>
				  <td><?= $row['created_at']; ?></td>
                </tr>

                <tr>
                  <td></td>
                  <td>Created By</td>
				  <td><?= $row['created_by']; ?></td>      
                </tr>
                
                <tr>
                  <td></td>
                  <td>Status</td>
				  <td><?= $row['status']; ?></td>
                </tr>
               <?php if ( $row['status'] == 'failed'){?>
                 <tr>
                  <td></td>
                  <td>Komentar</td>
                  <td><?= $row['komentar']; ?></td>
                </tr>
              <?php }?>
                
              </table>
            </div>
            <?php endforeach ?>

            	<div class="box-header">
                <?php if ($id_jenis== 1){ ?>
                  <h3 class="box-title">New Task</h3> 
                </div>
              <div class="box-body no-padding">

              <table class="table table-condensed">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
                  <th style="width: 40px">Label</th>
                </tr>
                <?php $no = 1; foreach ($view_detail_tugas as $row): ?>

                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?= $row['deskripsi_tugas']; ?></td>
                  <td> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info<?php echo $row['id']; ?>">
               
                Launch Info Modal
              </button> </td>
                </tr>
               
              <?php endforeach ?>

              </table>
            </div>
                <?php } 
                else { ?>
                  <h3 class="box-title">Modul Task</h3>
                </div>

                  <div class="box-body no-padding">

              <table class="table table-condensed">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th style="width: 40px">Label</th>
                </tr>
                <?php $no = 1; foreach ($view_detail_modul as $row): ?>

                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?= $row['detail_modul']; ?></td>
                  <td><?= $row['status']; ?></td>
                  <td> <?php echo anchor('karyawan/detail/'.$row['id'],'kerjakan'); ?></td>
                </tr>
               
              <?php endforeach ?>

              </table>
            </div>
                <?php } 
                ?>  
                <?php $no = 1; foreach ($view_detail_tugas as $row): ?>
   
                <div class="modal modal-info fade" id="modal-info<?php echo $row['id']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Info Modal</h4>
              </div>
              <form class="form-horizontal"action="<?php echo base_url(). 'karyawan/submit_task/'; ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />

              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline pull-right" >Submit</button>
              </div>
            </div>
          </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
          <?php endforeach ?>
   
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