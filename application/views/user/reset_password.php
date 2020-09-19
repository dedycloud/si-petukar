

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Login Page - PETUKAR</title>

	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link rel="icon" href="<?php echo base_url(); ?>assets/image/ptpn.ico">

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/login/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/login/font-awesome/4.5.0/css/font-awesome.min.css" />

	<!-- text fonts -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/login/css/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/login/css/ace.min.css" />

	
	<link rel="stylesheet" href="<?php echo base_url();?>assets/login/css/ace-rtl.min.css" />

	<script type="text/javascript">
		
		
	</script>
</head>

<body class="login-layout">
	<div class="main-container">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-container">
						<div class="center">
							<h1>
								<i class="ace-icon fa fa-leaf green"></i>
								<span class="red"></span>
								<span class="red" id="id-text2">P E T U K A R</span>
							</h1>
							<h4 class="green" id="id-company-text"> PT Perkebunan Nusantara 7</h4>
						</div>

						<div class="space-6"></div>

						<div class="position-relative">
							<div id="login-box" class="login-box visible widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<h4 class="header blue lighter bigger">
											<i class="ace-icon fa fa-coffee green"></i>
											Ubah password kamu
										</h4>

										<div class="space-6"></div>
										<?php if($this->session->flashdata('sukses') ) : ?>
											<div class="alert alert-danger alert-dismissable">
												<button type="button" class="close" data-dismiss="alert">
													<i class="ace-icon fa fa-times"></i>
												</button>
												<?= $this->session->flashdata('sukses'); ?>
											</div>
										<?php endif; ?>
										<?php if($this->session->flashdata('terkirim') ) : ?>
											<div class="alert alert-success alert-dismissable">
												<button type="button" class="close" data-dismiss="alert">
													<i class="ace-icon fa fa-times"></i>
												</button>
												<?= $this->session->flashdata('terkirim'); ?>
											</div>
										<?php endif; ?>
										<?php if($this->session->flashdata('flash') ) : ?>
											<div class="alert alert-success alert-dismissable">
												<button type="button" class="close" data-dismiss="alert">
													<i class="ace-icon fa fa-times"></i>
												</button>
												<?= $this->session->flashdata('flash'); ?>
											</div>
										<?php endif; ?>
										
										<?php $attributes = array('class' => 'form-horizontal m-t-20', 'role' => 'form');
										echo form_open('auth/reset_password/token/'.$token, $attributes);?> 
										<div class="form-group m-b-0"> 

											<p>Password Baru:</p> 

											<p><input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control input-SM" placeholder="Enter password"> </p>
											<p> <?php echo form_error('password'); ?> </p> 
											<p>Konfirmasi Password Baru:</p> 
											<p>   
												<input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" class="form-control input-SM" placeholder="konfirmasi password"  />   
											</p>   
											<p> <?php echo form_error('passconf'); ?> </p>   

											<p> 
												<button  type="submit" name="btnSubmit" value="Reset" class="btn btn-SM btn-primary waves-effect waves-light">Reset</button>  </p> 

											</div> 


											<div class="space"></div>


											<div class="bottom">
												<span class="helper-text"> <a href="<?php echo base_url()."auth/login"; ?>">Back to login</a></span>
											</div>

										</div>

										<div class="space-4"></div>
									</fieldset> </form>

									
								</div>
							</div>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.main-content -->
			</div><!-- /.main-container -->

			<!-- basic scripts -->

			<!--[if !IE]> -->
			<script src="<?php echo base_url();?>assets/login/js/jquery-2.1.4.min.js"></script>

			
			<script type="text/javascript">
				if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>assets/login/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
			</script>

			<!-- inline scripts related to this page -->
			<script type="text/javascript">
				jQuery(function($) {
					$(document).on('click', '.toolbar a[data-target]', function(e) {
						e.preventDefault();
						var target = $(this).data('target');
        $('.widget-box.visible').removeClass('visible');//hide others
        $(target).addClass('visible');//show target
    });
				});
				
				
				
				jQuery(function($) {
					$('#btn-login-dark').on('click', function(e) {
						$('body').attr('class', 'login-layout');
						$('#id-text2').attr('class', 'white');
						$('#id-company-text').attr('class', 'blue');
						
						e.preventDefault();
					});
					$('#btn-login-light').on('click', function(e) {
						$('body').attr('class', 'login-layout light-login');
						$('#id-text2').attr('class', 'grey');
						$('#id-company-text').attr('class', 'blue');
						
						e.preventDefault();
					});
					$('#btn-login-blur').on('click', function(e) {
						$('body').attr('class', 'login-layout blur-login');
						$('#id-text2').attr('class', 'white');
						$('#id-company-text').attr('class', 'light-blue');
						
						e.preventDefault();
					});
					
				});
			</script>
		</body>
		</html>
