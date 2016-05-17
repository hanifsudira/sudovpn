  <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>assets/lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $list['fullname'];?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
         

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Client Dashboard</li>
			 <li class="active ">
              <a href="<?php echo base_url() ?>client/">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa pull-right"></i>
              </a>
              
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>My Profile</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('client/profile');?>"><i class="fa fa-circle-o"></i> View Profile</a></li>
                <li><a href="<?php echo site_url('client/edit');?>"><i class="fa fa-circle-o"></i> Edit Profile</a></li>
              </ul>
            </li>

            <!--li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Download Config</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Indonesia Server</a></li>
                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Singapure Server</a></li>
                <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> United States Server</a></li>
              </ul>
            </li-->

            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Plans and Pricing</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('client/plans');?>"><i class="fa fa-circle-o"></i> Buy Packet Plan</a></li>
				<li><a href="<?php echo site_url('client/myplan');?>"><i class="fa fa-circle-o"></i> My Packet Plan</a></li>
              </ul>
            </li>
			 <li>
              <a href="<?php echo base_url() ?>client/mail">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
