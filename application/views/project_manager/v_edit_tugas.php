<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1>
      PTPN 7
      <small>bandar lampung</small>
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">edit task</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
       
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Input Tugas</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach ($view_edit_tugas as $row): ?>					

            <form class="form-horizontal"action="<?php echo base_url(). 'projectmanager/actionedittugas'; ?>" method="post">
            	<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />

              <div class="box-body">
                
                <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Tujuan</label>

                <div class="col-sm-10">
                  <select class="form-control select2"name="tujuan" style="width: 100%;" >
                    <option value="" >--Pilih--</option>
                    <?php foreach($tujuan as $u) : ?>
                      <!-- -->
                      <option  <?php if($u['id'] == $row['id_tujuan']){ echo 'selected="selected"'; } ?>  value="<?=$u['id'] ?>"><?=$u['username'] ?></option>   

                    <?php endforeach; ?>

                  </select>  
                        <span class="text-danger"><?php echo form_error('tujuan'); ?></span>

                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Penyetuju</label>

                <div class="col-sm-10">
                  <select class="form-control select2" name="penyetuju" style="width: 100%;" >
                    <option value="" >--Pilih--</option>
                    <?php foreach($penyetuju as $rows) : ?>
                      <!-- -->
                      <option   <?php if($rows['id'] == $row['id_penyetuju']){ echo 'selected="selected"'; } ?>   value="<?=$rows['id'] ?>"><?=$rows['username'] ?></option>   

                    <?php endforeach; ?>

                  </select>     
                        <span class="text-danger"><?php echo form_error('penyetuju'); ?></span>

                </div>
              </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jangka Waktu</label>

                  <div class="col-sm-10">
                    <input type="date"name="jangka_waktu" class="form-control" value="<?php echo $row['jangka_waktu']; ?>" id="inputEmail3" placeholder="jangka_waktu">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Judul Tugas</label>

                  <div class="col-sm-10">
                    <input type="text"name="judul_tugas"value="<?php echo $row['judul_tugas']; ?>"
						 class="form-control" id="inputPassword3" placeholder="judul_tugas">
                    
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi Tugas</label>

                  <div class="col-sm-10">
                  <textarea class="form-control"name="deskripsi"
						 rows="3" placeholder="deskripsi..."><?php echo $row['deskripsi_tugas']; ?></textarea>
                  </div>
                </div>

             
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                <button type="submit" class="btn btn-info pull-right">Send</button>
              </div>
              <!-- /.box-footer -->
            </form>
            <?php endforeach ?>

          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
          
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>