<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
			 <h1>
      PTPN 7
      <small>bandar lampung</small>
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

  <?php if($this->session->flashdata('flashdatatambah') ) : ?>
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">
          <i class="ace-icon fa fa-times"></i>
        </button>
        <?= $this->session->flashdata('flashdatatambah'); ?>
      </div> 
    <?php endif; ?>
     <?php if($this->session->flashdata('flashdatadelete') ) : ?>
      <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">
          <i class="ace-icon fa fa-times"></i>
        </button>
        <?= $this->session->flashdata('flashdatadelete'); ?>
      </div> 
    <?php endif; ?>
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