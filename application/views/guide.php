
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Timeline
        <small>example</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">UI</a></li>
        <li class="active">Timeline</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

 <?php if($this->ion_auth->in_group('admin') ) { ?>
      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-blue">
                    PETUNJUK PENGGUNAAN 
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa  bg-grey"><b>1</b></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#">HOW TO </a> create task</h3>

                <div class="timeline-body">
                  Untuk membuat task akun yang terdaftar ada lah projecy manager
                </div>
              <!--   <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Read more</a>
                  <a class="btn btn-danger btn-xs">Delete</a>
                </div> -->
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
           <i class="fa  bg-grey"><b>2</b></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                <h3 class="timeline-header no-border"><a href="#">HOW TO</a> deleted tugas </h3>
                  <div class="timeline-body">
                  Untuk mendelete tugas status harus available <a class="btn btn-default btn-flat btn-xs">Available</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa  bg-grey"><b>3</b></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                <h3 class="timeline-header"><a href="#">HOW TO </a> edit tugas</h3>

                <div class="timeline-body">
                kamu dapat mengedit tugas kalo status nya available  <a class="btn btn-default btn-flat btn-xs">Available</a>
                </div>
              <!--   <div class="timeline-footer">
                 
                </div> -->
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline time label -->
            
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
               <i class="fa  bg-grey"><b>4</b></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 days ago</span>

                <h3 class="timeline-header"><a href="#">LIHAT VIDEO</a> agar lebih paham </h3>

                <div class="timeline-body">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs"
                            frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
              <!--   <div class="timeline-footer">
                  <a href="#" class="btn btn-xs bg-maroon">See comments</a>
                </div> -->
              </div>
            </li>
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <?php  }elseif($this->ion_auth->in_group('karyawan')) { ?>
      	 <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-blue">
                    PETUNJUK PENGGUNAAN 
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa  bg-grey"><b>1</b></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#">HOW TO </a> create task</h3>

                <div class="timeline-body">
                  Untuk membuat task akun yang terdaftar ada lah projecy manager
                </div>
              <!--   <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Read more</a>
                  <a class="btn btn-danger btn-xs">Delete</a>
                </div> -->
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
           <i class="fa  bg-grey"><b>2</b></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                <h3 class="timeline-header no-border"><a href="#">HOW TO</a> deleted tugas </h3>
                  <div class="timeline-body">
                  Untuk mendelete tugas status harus available <a class="btn btn-default btn-flat btn-xs">Available</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa  bg-grey"><b>3</b></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                <h3 class="timeline-header"><a href="#">HOW TO </a> edit tugas</h3>

                <div class="timeline-body">
                kamu dapat mengedit tugas kalo status nya available  <a class="btn btn-default btn-flat btn-xs">Available</a>
                </div>
              <!--   <div class="timeline-footer">
                 
                </div> -->
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline time label -->
            
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
               <i class="fa  bg-grey"><b>4</b></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 days ago</span>

                <h3 class="timeline-header"><a href="#">LIHAT VIDEO</a> agar lebih paham </h3>

                <div class="timeline-body">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs"
                            frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
              <!--   <div class="timeline-footer">
                  <a href="#" class="btn btn-xs bg-maroon">See comments</a>
                </div> -->
              </div>
            </li>
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <?php  }elseif($this->ion_auth->in_group('project_manager')) { ?>
      	 <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-blue">
                    PETUNJUK PENGGUNAAN 
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa  bg-grey"><b>1</b></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#">HOW TO </a> create task</h3>

                <div class="timeline-body">
                  Untuk membuat task akun yang terdaftar ada lah projecy manager
                </div>
              <!--   <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Read more</a>
                  <a class="btn btn-danger btn-xs">Delete</a>
                </div> -->
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
           <i class="fa  bg-grey"><b>2</b></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                <h3 class="timeline-header no-border"><a href="#">HOW TO</a> deleted tugas </h3>
                  <div class="timeline-body">
                  Untuk mendelete tugas status harus available <a class="btn btn-default btn-flat btn-xs">Available</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa  bg-grey"><b>3</b></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                <h3 class="timeline-header"><a href="#">HOW TO </a> edit tugas</h3>

                <div class="timeline-body">
                kamu dapat mengedit tugas kalo status nya available  <a class="btn btn-default btn-flat btn-xs">Available</a>
                </div>
              <!--   <div class="timeline-footer">
                 
                </div> -->
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline time label -->
            
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
               <i class="fa  bg-grey"><b>4</b></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 days ago</span>

                <h3 class="timeline-header"><a href="#">LIHAT VIDEO</a> agar lebih paham </h3>

                <div class="timeline-body">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs"
                            frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
              <!--   <div class="timeline-footer">
                  <a href="#" class="btn btn-xs bg-maroon">See comments</a>
                </div> -->
              </div>
            </li>
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <?php  }elseif($this->ion_auth->in_group('co_project_manager')) { ?>
      	 <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-blue">
                    PETUNJUK PENGGUNAAN 
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa  bg-grey"><b>1</b></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#">HOW TO </a> create task</h3>

                <div class="timeline-body">
                  Untuk membuat task akun yang terdaftar ada lah projecy manager
                </div>
              <!--   <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Read more</a>
                  <a class="btn btn-danger btn-xs">Delete</a>
                </div> -->
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
           <i class="fa  bg-grey"><b>2</b></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                <h3 class="timeline-header no-border"><a href="#">HOW TO</a> deleted tugas </h3>
                  <div class="timeline-body">
                  Untuk mendelete tugas status harus available <a class="btn btn-default btn-flat btn-xs">Available</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa  bg-grey"><b>3</b></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                <h3 class="timeline-header"><a href="#">HOW TO </a> edit tugas</h3>

                <div class="timeline-body">
                kamu dapat mengedit tugas kalo status nya available  <a class="btn btn-default btn-flat btn-xs">Available</a>
                </div>
              <!--   <div class="timeline-footer">
                 
                </div> -->
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline time label -->
            
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
               <i class="fa  bg-grey"><b>4</b></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 days ago</span>

                <h3 class="timeline-header"><a href="#">LIHAT VIDEO</a> agar lebih paham </h3>

                <div class="timeline-body">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs"
                            frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
              <!--   <div class="timeline-footer">
                  <a href="#" class="btn btn-xs bg-maroon">See comments</a>
                </div> -->
              </div>
            </li>
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
  <?php  }else { ?>

      <?php  } ?>

    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->