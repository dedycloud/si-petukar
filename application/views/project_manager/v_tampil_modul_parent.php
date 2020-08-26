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
			<li class="active">Data Modul</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">


				<div class="box">
					<div class="box-header">

						<a  href="<?php echo base_url() ; ?>projectmanager/tambahtugas_modul" class="btn btn-app">
							<i class="fa fa-edit"></i> Create Modul
						</a>


					</div>


					<div class="box-body">
    <?php 
             $no = 1;
             foreach($view_tampil_divisi as $u){ 
              ?>
						<div class="col-md-3">
							<!-- Profile Image -->
							<div class="box box-primary">
								<div class="box-body box-profile">
									<h3 class="profile-username text-center"><?php echo $u->nama_bagian ?></h3>
									<p class="text-muted text-center">Software Engineer</p>
									<hr>
									<a  href="<?php echo base_url() ; ?>projectmanager/tampil_modul_child/<?php echo $u->id ?>" class="btn btn-primary btn-block">
										<b> DETAIL</b>
									</a>
									
								</div>
								<!-- /.box-body -->
							</div>

						</div>

						  <?php } ?>


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