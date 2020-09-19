

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
                        Please Enter Your email
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
              
              	<?php $attributes = array('method' => 'post','class' => 'text-center', 'role' => 'form','form-auth-small');
												echo form_open('auth/sendCredential', $attributes);?> 

<!--                 <form action ="<?php echo base_url()."auth/login"; ?>" method="post">
 -->                        <fieldset>
                        

                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                           	<input type="email" class="form-control" id="username" name="email" placeholder="email" value="<?php echo set_value('email'); ?>" required>
                              <i class="ace-icon fa "></i>
                            </span>
                          </label>

                          <div class="space"></div>

                           								<button type="submit" class="btn btn-primary btn-lg btn-block">submit</button>

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
