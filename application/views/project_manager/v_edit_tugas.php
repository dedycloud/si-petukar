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
                    <input type="text"name="tujuan"value="<?php echo $row['id_tujuan']; ?>"
 						class="form-control" id="inputEmail3" placeholder="tujuan">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Penyetuju</label>

                  <div class="col-sm-10">
                    <input type="text"name="penyetuju"value="<?php echo $row['id_penyetuju']; ?>"
            class="form-control" id="inputEmail3" placeholder="penyetuju">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jangka Waktu</label>

                  <div class="col-sm-10">
                    <input type="date"name="jangka_waktu" class="form-control" id="inputEmail3" placeholder="jangka_waktu">
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
                  <textarea class="form-control"name="deskripsi"value="<?php echo $row['deskripsi_tugas']; ?>"
						 rows="3" placeholder="deskripsi..."></textarea>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis</label>

                  <div class="col-sm-10">
				          <select class="form-control select2"name="jenis" style="width: 100%;" >
                  <option selected="selected">--Pilih--</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>                  </div>
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
                <button type="submit" class="btn btn-default">Cancel</button>
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