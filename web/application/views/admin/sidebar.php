 <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active ">
              <a href="<?php echo base_url() ?>admin/">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa pull-right"></i>
              </a>
              
            </li>
			 <li class="">
              <a href="<?php echo base_url() ?>admin/member">
                <i class="fa  fa-users"></i> <span>Member</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              
            </li>
            <li class="treeview">
              <a href="">
                <i class="fa fa-files-o"></i>
                <span>Packet Plan</span>
               
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ?>admin/create_paket"><i class="fa fa-circle-o"></i>Create Packet</a></li>
                <li><a href="<?php echo base_url() ?>admin/paket"><i class="fa fa-circle-o"></i>View Packet</a></li>
              </ul>
            </li>
          
          
            <li>
              <a href="<?php echo base_url() ?>admin/mail">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li>
            
           
          
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
