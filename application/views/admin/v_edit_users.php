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
						<h3 class="box-title">Input User</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<?php foreach($users as $row) : ?>

						<form class="form-horizontal"action="<?php echo base_url(). 'admin/update'; ?>" method="post"
							>
							<div class="box-body">

								<input type="hidden"name="id" value="<?=  $row->id ?>" class="form-control" id="inputPassword3" placeholder="id">

								<div class="form-group">
									<label for="inputPassword3" class="col-sm-2 control-label">first name</label>

									<div class="col-sm-10">
										<input type="text"name="firstname" value="<?=  $row->first_name ?>" class="form-control" id="inputPassword3" placeholder="firstname">

									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword3" class="col-sm-2 control-label">last name</label>

									<div class="col-sm-10">
										<input type="text"name="lastname" value="<?=  $row->last_name ?>" class="form-control" id="inputPassword3" placeholder="lastname">

									</div>
								</div>

								<div class="form-group">
									<label for="inputPassword3" class="col-sm-2 control-label">username</label>

									<div class="col-sm-10">
										<input type="text"name="username" value="<?=  $row->username ?>" class="form-control" id="inputPassword3" placeholder="username">

									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword3" class="col-sm-2 control-label">email</label>

									<div class="col-sm-10">
										<input type="email"name="email" value="<?=  $row->email ?>" class="form-control" id="inputPassword3" placeholder="email">

									</div>
								</div>
								<!-- <div class="form-group">
									<label for="inputPassword3" class="col-sm-2 control-label">password</label>

									<div class="col-sm-10">
										<input type="password"name="password" value="<?=  $row->password ?>" class="form-control" id="inputPassword3" placeholder="password">

									</div>
								</div> -->


								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Groups</label>

									<div class="col-sm-10">
										<select class="form-control select2"name="group" style="width: 100%;" >
											<option>--Pilih--</option>
											<?php foreach($groups as $row) : ?>
												<!-- -->
												<option value="<?=$row['id'] ?>"><?=$row['name'] ?></option>   

											<?php endforeach; ?>

										</select>             
									</div>
								</div>



								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Bagian</label>

									<div class="col-sm-10">
										<select class="form-control select2"name="bagian" style="width: 100%;" >
											<option>--Pilih--</option>
											<?php foreach($bagian as $row) : ?>
												<!-- -->
												<option value="<?=$row['id'] ?>"><?=$row['nama_bagian'] ?></option>   

											<?php endforeach; ?>

										</select>             
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
						<?php endforeach; ?>
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