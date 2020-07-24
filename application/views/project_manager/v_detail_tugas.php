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
           
           
<div class="box-body">
						<?php foreach ($view_detail_tugas as $row): ?>
						</div><div class="message-content" id="id-message-content">
							<div class="message-header clearfix">
								
							<table  class="col-md-4" >
									<tr>
										<td><b>Tujuan </b></td>
										<td>:</td>
										<td><?= $row['id_tujuan']; ?></td>
									</tr>
										<tr>
										<td><b>Jangka Waktu</b></td>
										<td>:</td>
										<td><?= date("d M Y",strtotime($row['jangka_waktu'] )) ; ?></td>
									</tr>
											<tr>
										<td><b>Judul Tugas </b></td>
										<td>:</td>
										<td><?= $row['judul_tugas']; ?></td>
									</tr>
										<tr>
										<td><b>Jenis </b></td>
										<td>:</td>
										<td><?= $row['id_jenis']; ?></td>
									</tr>
										<tr>
										<td><b>Created At </b></td>
										<td>:</td>
										<td><?= $row['created_at']; ?></td>
									</tr>
										<tr>
										<td><b>Created By  </b></td>
										<td>:</td>
										<td><?= $row['created_by']; ?></td>
									</tr>
										
											<tr>
										<td><b>Status </b></td>
										<td>:</td>
									<td><?= $row['status']; ?></td>

									</tr>
								</table>

						</div>
						
							<?php endforeach ?>
						</div>
					</div>          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>