<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $allTask['allTask'] ?></h3>

              <p>All Task</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
     
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $taskSuccess['taskSuccess'] ?> <sup style="font-size: 20px"></sup></h3>
              <p>Task Success</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
   
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $taskInProgress['taskInProgress'] ?> </h3>

              <p>Task In Progress</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
    
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $taskRejected['taskRejected'] ?></h3>

              <p>Task Rejected</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          
          </div>
        </div>
        <!-- ./col -->
      </div>
    
      <!-- /.row -->
      <!-- Main row -->
     
      <!-- /.row (main row) -->
      <div class="col-md-12">
<div id="grafik" style="width:100%; height:400px;"></div>


    </section>

                  
                    
  </div>