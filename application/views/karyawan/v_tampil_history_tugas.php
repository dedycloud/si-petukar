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
									<th>Judul Tugas</th>
									<th>Tenggang Waktu</th>
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
										<td><?php echo $u->judul_tugas?></td>
										<td><?= date("d M Y",strtotime($u->jangka_waktu )) ; ?>    </td>
										<td><?php echo $u->id_jenis?></td>
										<td><?php if($u->status_success == 'success' ) { ?> 
											<span class="badge btn-success">success</span>
											
										<?php } ?>
									</td>

									<td>

										<form class="form-horizontal"action="<?php echo base_url(). 'karyawan/detail/'.$u->id. '/'.$u->id_jenis; ?>" method="post">
											<input type="hidden" name="id" value="<?php echo $u->id; ?>" />
											<button type="submit" class="btn btn-outline pull-right" >Detail</button>
										</div>
									</form>
									<!-- nama file, itu nama buat action nya -->
									<?php echo anchor('karyawan/'.$u->id.''.$u->id_jenis,'detail'); ?>
									
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