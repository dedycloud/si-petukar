<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			General Form Elements
			<small>Preview</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Forms</a></li>
			<li class="active">General Elements</li>
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
						<h3 class="box-title">Input Bagian</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
				 <?php foreach ($bagian as $row): ?>					

					<form class="form-horizontal"action="<?php echo base_url(). 'admin/actioneditbagian'; ?>" method="post"
						>
						<div class="box-body">


									<input type="hidden"name="id" value="<?= $row->id ?>" class="form-control" id="inputPassword3" placeholder="id bagian">


								<div class="form-group">
									<label for="inputPassword3" class="col-sm-2 control-label">Nama Bagian</label>

									<div class="col-sm-10">
										<input type="text"name="nama_bagian" value="<?= $row->nama_bagian ?>" class="form-control" id="inputPassword3" placeholder="nama bagian">

									</div>
								</div>
							

								

								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<div class="checkbox">

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