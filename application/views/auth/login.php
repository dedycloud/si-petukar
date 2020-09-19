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
    <script src="<?php echo base_url();?>assets/login/js/ace-extra.min.js"></script>

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
                        Please Enter Your Information
                      </h4>

                      <div class="space-6"></div>
<!--  <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                      </button>
                      <strong>Warning!</strong>

                      Best
                      <br />
                    </div> -->
              
              <?php if($this->session->flashdata('message') ) : ?>
                      <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">
                          <i class="ace-icon fa fa-times"></i>
                        </button>
                        <?= $this->session->flashdata('message'); ?>
                      </div>
                    <?php endif; ?>
                  
                <form action ="<?php echo base_url()."auth/login"; ?>" method="post">
                        <fieldset>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="text" name="identity" id="username"  class="form-control" placeholder="Username" />
                              <i class="ace-icon fa fa-user"></i>
                            </span>
                          </label>
                        <?php echo form_error('identity'); ?>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
                             
                              <i class="ace-icon fa fa-lock"></i>
                            </span>
                          </label>
                          <?php echo form_error('identity'); ?>

                          <div class="space"></div>

                            <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                              <i class="ace-icon fa fa-key"></i>
                              <span class="bigger-110">Login</span>
                            </button>
                          <div class="bottom">
                          <span class="helper-text"> <a href="<?php echo base_url()."auth/lupa_password"; ?>">Forgot password?</a></span>

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
        <script src="<?php echo base_url();?>assets/login/js/bootstrap.min.js"></script>

<!-- <script type="text/javascript">window.setTimeout(function() {
    $(".alert").fadeTo(300, 0).slideUp(300, function(){
        $(this).remove(); 
    });
}, 1500);</script> -->
    
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>assets/login/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>

  </body>
</html>
