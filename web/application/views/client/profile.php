
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User Profile
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">User profile</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url() ?>assets/images/user4-128x128.jpg" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo $list['fullname'];?></h3>
                  <p class="text-muted text-center"><?php echo $list['email'];?></p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Phone</b> <a class="pull-right"><?php echo $list['phone'];?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Address</b> <a class="pull-right"><?php echo $list['address'];?></a>
                    </li>
                    <li class="list-group-item">
                      <b>count VPN</b> <a class="pull-right">13,287</a>
                    </li>
                  </ul>

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

             </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#timeline" data-toggle="tab">Paket Plan User</a></li>
                  <!--li><a href="#timeline" data-toggle="tab">Paket Plan User</a></li>
                  <li><a href="#settings" data-toggle="tab">Settings</a></li-->
                </ul>
                <div class="tab-content">
             
                  <div class="active" id="timeline">
                    <!-- The timeline -->
						<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Tabel Paket</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>No.</th>
                      <th>Paket</th>
                      <th>Start</th>
                      <th>End</th>
					  <th>Data Usage</th>
					  <th>Status</th>
					  <th>Detail</th>
                      
                    </tr>
					
                    <tr>
                      <td>1</td>
                      <td>Gold</td>
                      <td>11-7-2015</td>
                      <td>11-7-2016</td>
					  <td>1GB/500Gb</td>
					  <td><span class="label label-warning">Active</span></td>
					  <td>      <a class="btn btn-primary btn-xs" href="<?php echo site_url('client/detailpaket'); ?>">View</a></td>
						
						 
            
					 
  

                    </tr>
                   <tr>
					
				   </tr>
                   
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
     
                   </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     