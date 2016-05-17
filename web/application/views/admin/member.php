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
                          <th>Member ID</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      foreach($listmember as $item){?>
                        <tr>
                          <td>
                            <a href="pages/examples/invoice.html"><?php echo $item['email']; ?></a>
							</td>
                          <td><?php echo $item['fullname']; ?></td>
							<td>
						  <?php 
							if($item['status']=='1'){ echo "<span class='label label-success'>Active</span>"; 
							}else{ 
							echo "<span class='label label-danger'>Suspend</span>";} 
							?>
							</td>
                          <td>
							 <div class="timeline-footer">
                              <a class="btn btn-primary btn-xs" href="<?php echo base_url() ?>admin/view/<?php echo $item['id_user'];?>">View</a>
                              <a class="btn btn-danger btn-xs" href="http://sudovpn.id:5002/delperid/<?php echo $item['id_user'];?>">Delete</a>
                            </div>
						  
						  </td>
						  
                           
                          
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
