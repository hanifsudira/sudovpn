 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Beta Version</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">CPU Traffic</span>
                  <span class="info-box-number">90<small>%</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Likes</span>
                  <span class="info-box-number">41,410</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Sales</span>
                  <span class="info-box-number">760</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">New Members</span>
                  <span class="info-box-number">2,000</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
              <!-- MAP & BOX PANE -->
             
            

              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Customer</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                      <th>No.</th>
					  <th>ID_User</th>
                      <th>Paket</th>
                      <th>Max</th>
                      <th>Start</th>
                      <th>End</th>
					  <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
					   <?php
                    $count=0;
                    foreach($list_user as $item){$count++;?>
                        <tr>
                          <td>
							<?php echo $count; ?></td>
							<td><a href="<?php echo base_url(); ?>admin/view/<?php echo $item['id_user']; ?>"><?php echo $item['id_user']; ?></a></td>
							<td><?php echo $item['packet_name']; ?></td>
							<td><?php echo $item['max']; ?></td>
							<td><?php echo $item['start_time']; ?></td>
							<td><?php echo $item['stop_time']; ?></td>
							<td><?php echo $item['status']; ?></td>
							
                        </tr>
                       
					<?php } ?>
                       
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                  <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Member</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->

           
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
