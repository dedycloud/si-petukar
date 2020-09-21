<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
     <h1>
      PTPN 7
      <small>bandar lampung</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">history</a></li>
      <li class="active">detail</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Detail History</h3>
          </div>
          <div class="box-body">
           <?php foreach ($view_tampil_tugas as $row): ?>
            <div >
              <div class="box-header with-border">
                <h3 class="box-title">Tugas : <?= $row->judul_tugas ?></h3>
              </div>
              <div class="box-body">
                <strong> <span class="label label-default">Available</span>
                  <i class="fa margin-r-5"></i> Dibuat</strong>
                  <p class="text-muted">
                   Tugas ini di buat oleh Nugraha
                 </p>

                 <hr>

                 <strong>  <span class="label label-info">Proccess</span><i class="fa margin-r-5"></i> Dilihat</strong>

                 <p class="text-muted">Di lihat pada tanggal <?= date("d M Y",strtotime($row->updateAt_proccess )) ; ?> </p>

                 <hr>
                 <strong>                <span class="label label-warning">Waiting accept</span>
                  <i class="fa margin-r-5"></i> Telah di upload</strong>
                  <p class="text-muted">Di selesaikan pada tanggal <?= date("d M Y",strtotime($row->updateAt_waiting_accept  )) ; ?> </p>


                  <hr>
                  <strong>                <span class="label label-success">Success</span>
                    <i class="fa margin-r-5"></i> Telah terverifikasi</strong>
                    <p class="text-muted">Di verifikasi pada tanggal <?= date("d M Y",strtotime($row->updateAt_success )) ; ?></p>

                    <hr>

                    <strong>                <span class="label label-danger">failed</span>
                      <i class="fa margin-r-5"></i> Terjadi kesalahan</strong>
                      <p class="text-muted">Di lihat pada tanggal <?= date("d M Y",strtotime($row->updateAt_failed )) ; ?></p>

                      <hr>


                      <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                      <p>Tugas Telah selesai</p>
                    </div>
                    <!-- /.box-body -->
                  </div>
                <?php endforeach ?>

              </div>
            </div>


          </div>


          <!-- /.box-header -->

          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>