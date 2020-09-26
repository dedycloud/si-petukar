<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
       <h1>
      PTPN 7
      <small>bandar lampung</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">accept task</a></li>
      <li class="active">detail</li>
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
							<!-- <div class="message-header clearfix">
              </div> -->
              <table class="table table-condensed">
                <tr>
                  <th style="width: 10px"></th>
                  
                </tr>
                <tr>
                  <td></td>
                  <td>From</td>
                  <td><?= $row['tujuan']; ?></td>
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
                  <td><?php if ($row['id_jenis'] == 1) {
                    echo "new task";
                  }else{
                    echo "job desk";
                  } ?></td>              
                </tr>

                <tr>
                  <td></td>
                  <td>Created At</td>
                  <td><?= $row['created_at']; ?></td>
                </tr>

                <tr>
                  <td></td>
                  <td>Created By</td>
                  <td><?= $row['dibuat']; ?></td>      
                </tr>
                
                <tr>
                  <td></td>
                  <td>Status</td>
                  <td><?= $row['status']; ?></td>
                </tr>
              </table>
            </div>
          <?php endforeach ?>

          <div class="box-header">
            <?php if ($jenis == 1){ ?>
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
                  <td> <?php if ( $row['dokumen'] == ''){ ?>
                    <b>Not Yet upload</b>
                  <?php } else { ?>
                   <a href="<?php echo base_url(); ?>upload/<?= $row['dokumen']; ?>" target="_blank"> <?= $row['dokumen']; ?>
                 <?php } ?>

               </td>
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
          <th>file</th>
          <!-- <th style="width: 40px">Label</th> -->
        </tr>
        <?php $no = 1; foreach ($view_detail_modul as $row): ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?= $row['detail_modul']; ?></td>
          <td><?= $row['status']; ?></td>
          <td> <?php if ( $row['file'] == ''){ ?>
            <b>Not Yet upload</b>
          <?php } else { ?>
           <a href="<?php echo base_url(); ?>upload/<?= $row['file']; ?>" target="_blank"> <?= $row['file']; ?>
         <?php } ?>

       </td>
            <!--   <td>
              <?php echo anchor('karyawan/detail/'.$row['id'],'kerjakan'); ?></td> -->
            </tr>
          <?php endforeach ?>

        </table>
      </div>
    <?php } 
    ?>  
    <?php $no = 1; foreach ($view_detail_tugas as $row): ?>
    <?php if($row['status'] == 'waiting_accept'){ ?>
      <center><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-rejected<?php echo $row['id']; ?>">

        Rejected Task
      </button>

      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info<?php echo $row['id']; ?>">

        Accept Task
      </button></center>

    <?php } else if($row['status'] == 'success')  { ?>
     <center> <b><i>SUCCESS</i></b></center>
    <?php } else if($row['status'] == 'failed')  { ?>
      <center><b><i>failed must revisi</i></b></center>
    <?php } else  { ?>
      <center> <b><i>wait status to waiting accept</i></b></center>
    <?php }  ?>                  

    <div class="modal modal-info fade" id="modal-info<?php echo $row['id']; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Info Modal</h4>
            </div>
            <form class="form-horizontal"action="<?php echo base_url(). 'Coprojectmanager/accept_task/'; ?>" method="post">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
              <input type="hidden" name="tujuan" value="<?php echo $row['tujuan']; ?>" />

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

    <?php $no = 1; foreach ($view_detail_tugas as $row): ?>

    <div class="modal modal-info fade" id="modal-rejected<?php echo $row['id']; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Info Modal</h4>
            </div>
            <form class="form-horizontal"action="<?php echo base_url(). 'Coprojectmanager/rejected_task/'; ?>" method="post">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
              <input type="hidden" name="tujuan" value="<?php echo $row['tujuan']; ?>" />

              <div class="modal-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Komentar</label>

                  <div class="col-sm-10">
                    <textarea class="form-control"name="Komentar" rows="3" placeholder="Komentar..."></textarea>
                  </div>
                </div>
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