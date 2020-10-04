<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
			 <h1>
      PTPN 7
      <small>bandar lampung</small>
    </h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">add user</a></li>
			
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
					<form class="form-horizontal"action="<?php echo base_url(). 'admin/actiontambahuser'; ?>" method="post"
						>
						<div class="box-body">

							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">first name</label>

								<div class="col-sm-10">
									<input type="text"name="firstname" class="form-control" id="inputPassword3" placeholder="firstname">

								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">last name</label>

								<div class="col-sm-10">
									<input type="text"name="lastname" class="form-control" id="inputPassword3" placeholder="lastname">

								</div>
							</div>

							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">username</label>

								<div class="col-sm-10">
									<input type="text"name="username" class="form-control" id="inputPassword3" placeholder="username" required>

								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">email</label>

								<div class="col-sm-10">
									<input type="email"name="email" class="form-control" id="inputPassword3" placeholder="email" required>

								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">password</label>

								<div class="col-sm-10">
									<input type="password"name="password" class="form-control" id="inputPassword3" placeholder="password" required>

								</div>
							</div>


							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Groups</label>

								<div class="col-sm-10">
									<select class="form-control select2"name="group" style="width: 100%;" required>
										<option value="">--Pilih--</option>
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
									<select class="form-control select2"name="bagian" style="width: 100%;" required>
										<option value="">--Pilih--</option>
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
									<!-- <button type="submit" class="btn btn-default">Cancel</button> -->
									<button type="submit" class="btn btn-info pull-right">Send</button>
								</div>
								<!-- /.box-footer -->
							</form>
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