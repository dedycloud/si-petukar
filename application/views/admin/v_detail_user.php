  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1>
      PTPN 7
      <small>bandar lampung</small>
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">users</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <?php foreach ($detail_user as $row): ?>
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>asset/dist/img/avatar3.png" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $row['username']; ?></h3>

              <p class="text-muted text-center">PTPN 7 BAGIAN <?= $row['nama_bagian']; ?></p>

              <!-- <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
        
              </ul> -->

             <?php if($row['active'] == 1 ) { ?> 
               <a href="#" class="btn btn-success btn-block"><b>	STATUS ACTIVE </b></a>
             <?php }else { ?>
               <a href="#" class="btn btn-danger btn-block"><b>	STATUS NON ACTIVE </b></a>
             <?php  } ?> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
     






<div class="box">
          <div class="box-header">
            <h3 class="box-title">Detail User</h3>

 
          </div>
          <!-- /.box-header -->
          <div class="box-body">

     
              <div class="message-content" id="id-message-content">
							<!-- <div class="message-header clearfix">
								
              </div> -->
              <table class="table table-condensed">
                <tr>
                  <th style="width: 10px"></th>
                  
                </tr>
                <tr>
                  <td></td>
                  <td>first name</td>
                  <td><?= $row['first_name']; ?></td>
                </tr>

                <tr>
                  <td></td>
                  <td>last name </td>
                  <td><?= $row['last_name'] ; ?></td>
                </tr>

                <tr>
                  <td></td>
                  <td>username</td>
                  <td><?= $row['username']; ?></td>
                </tr>

                <tr>
                  <td></td>
                  <td>email</td>
                  <td><?= $row['email']; ?></td>              
                </tr>


            </table>
          </div>

 
        <div class="box-header">


</div>
</div>
</div>

















          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
        <?php endforeach ?>

    </section>
    <!-- /.content -->
  </div>