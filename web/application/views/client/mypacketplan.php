 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            My Packet Plan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">My Packet Plan</li>
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
                  <h3 class="box-title">Packet Plan</h3>
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
                          <th>Paket</th>
                          <th>Max</th>
                          <th>Start</th>
                          <th>End</th>
						  <th>Bandwidth</th>
						  <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $count=0;
                      foreach($list_user as $item){$count++;?>
                        <tr>
                          <td><?php echo $count; ?></td>
                          <td><?php echo $item['packet_name']; ?></td>
                          <td><?php echo $item['max']; ?></td>
                          <td><?php echo $item['start_time']; ?></td>
                          <td><?php echo $item['stop_time']; ?></td>
                          <td>1GB/500Gb</td>
                          <td>
                            <div class="timeline-footer">
                              <?php if($item['status']=='Active') {?>
                              <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>client/createVpn/<?php echo $item['id_list']; ?>">Detail</a>
                              <?php }else if($item['status']=='Not Active'){ ?>
                                <a class="btn btn-warning btn-xs" disabled><?php echo $item['status']; ?></a>
                              <?php }else if($item['status']=='Suspend'){ ?>
                                <a class="btn btn-danger btn-xs" disabled><?php echo $item['status']; ?></a>
                              <?php }?>
                              <!--a class="btn btn-danger btn-xs" href="http://sudovpn.id:5002/delperid/">Delete</a-->
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
