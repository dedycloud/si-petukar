<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">

        <p> 
          <?php echo $user->username; ?>
          <?php if($group == 3 ){
            echo "- Karyawan";
          } else if($group == 2){
            echo "- Project Manager";
          } else if($group == 4){
            echo "- Co Project Manager";
          }else{
            echo "admin";
          }?>


        </p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <?php if($this->ion_auth->in_group('admin') ) { ?>
        <li>
          <a href="<?php echo base_url(); ?>admin">

            <i class="fa fa-th"></i> <span>Dashboard</span>
            
          </a>
        </li>
        <li class="treeview">

          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Manage User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>admin/tampil_user"><i class="fa fa-circle-o"></i>List User</a></li>
            <li><a href="<?php echo base_url(); ?>admin/tampil_group"><i class="fa fa-circle-o"></i>List Group</a></li>
            <li><a href="<?php echo base_url(); ?>admin/tampil_list_bagian"><i class="fa fa-circle-o"></i>List Bagian</a></li>


          </ul>
        </li>
        
      <?php  }elseif($this->ion_auth->in_group('karyawan')) { ?>
        <li>
          <a href="<?php echo base_url(); ?>Dashboard">
            <i class="fa fa-th"></i> <span>Dashboard</span>
            
          </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>karyawan/tampil_task">
            <i class="fa fa-th"></i> <span>My Task</span>

            
          </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>karyawan/tampil_history_task">
            <i class="fa fa-th"></i> <span>History</span>
            
          </a>
        </li>
         <li>
          <a href="<?php echo base_url(); ?>karyawan/guide">
            <i class="fa fa-th"></i> <span>Guide</span>
            
          </a>
        </li>

      <?php  }elseif($this->ion_auth->in_group('project_manager')) { ?>
        <li>
          <a href="<?php echo base_url(); ?>projectmanager/">
            <i class="fa fa-th"></i> <span>Dashboard</span>
            
          </a>
        </li>

      

        <li>
          <a href="<?php echo base_url(); ?>projectmanager/tampil_create_task">
            <i class="fa fa-th"></i> <span>Create Task</span>
            
          </a>
        </li>
          <li>
          <a href="<?php echo base_url(); ?>projectmanager/tampil_modul">
            <i class="fa fa-th"></i> <span>Create Modul</span>
            
          </a>
        </li>
         <li>
          <a href="<?php echo base_url(); ?>projectmanager/guide">
            <i class="fa fa-th"></i> <span>Guide</span>
            
          </a>
        </li>


      <?php  }elseif($this->ion_auth->in_group('co_project_manager')) { ?>
        <li>
          <a href="<?php echo base_url(); ?>coprojectmanager">
            <i class="fa fa-th"></i> <span>Dashboard</span>
            
          </a>
        </li>

    <!--     <li>
          <a href="<?php echo base_url(); ?>coprojectmanager/tampil_task">
            <i class="fa fa-th"></i> <span>My Task</span>
            
          </a>
        </li>
 -->

        <li>
          <a href="<?php echo base_url(); ?>coprojectmanager/tampil_accept_task">
            <i class="fa fa-th"></i> <span>Accept</span>
            
          </a>
        </li>

 <li>
          <a href="<?php echo base_url(); ?>coprojectmanager/guide">
            <i class="fa fa-th"></i> <span>Guide</span>
            
          </a>
        </li>
        

      <?php  }else { ?>

      <?php  } ?>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>