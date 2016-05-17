 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Create Packet
            <small>Form</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dasboard</a></li>
            <li><a href="#">Create Packet</a></li>
          
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
                          <th>User</th>
                          <th>Created</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $count=0;
                      $max =$list_listpaket['max'];
                      foreach($list_vpn as $item){$count++; ?>
                        <tr>
                          <td><?php echo $count; ?></td>
                          <td><?php echo $item['username']; ?></td>
                          <td><?php echo $item['date']; ?></td>
                          <td>
                            <div class="timeline-footer">

                              <a id="download" class="btn btn-success btn-xs" href="<?php echo base_url(); ?>client/download/<?php echo $item['id_vpn']; ?>">Download</a>
                            </div>

                          </td>
                          </tr>
                      <?php } ?>


                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                 
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
    
          </div><!-- /.row -->

          <div class="row">
            <!-- left column -->
            <div class="col-md-3">

            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Create User VPN</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php if($count<$max) { ?>
                <form class="form-horizontal" method="post" action="http://sudovpn.id:5002/validateNewVPN">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">User</label>
                      <input name="id_user" type="hidden" class="form-control" id="inputEmail3" value="<?php echo $id_user; ?>">
                      <input name="id_list" type="hidden" class="form-control" id="inputEmail3" value="<?php echo $list_listpaket['id_list']; ?>">
                      <div class="col-sm-8">
                        <input name="username" type="text" class="form-control" id="inputEmail3" placeholder="User VPN">
                      </div>
                    </div>

                  </div><!-- /.box-body -->
                  <div class="box-footer">

                    <button type="submit" class="btn btn-info pull-right">Create</button>
                  </div><!-- /.box-footer -->
                </form>
                <?php }else {echo "PENUH <br>";} ?>

              </div><!-- /.box -->
              </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

 <script>
   // Capture the "click" event of the link.
   var link = document.getElementById("download");
   link.addEventListener("click", function(evt) {
     // Stop the link from doing what it would normally do.
     evt.preventDefault();
     // Open the file download in a new window. (It should just
     // show a normal file dialog)
     window.open(this.href, "_blank");
     // Then redirect the page you are on to whatever page you
     // want shown once the download has been triggered.
     window.location = "<?php site_url('client/sucess')?>";
   }, true);
 </script>
