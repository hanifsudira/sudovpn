 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Plan
            <small>Form</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dasboard</a></li>
            <li><a href="#">Edit Plan</a></li>
          
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-3">
		
          
              

            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Plan</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="http://sudovpn.id:5002/validateNewPacket">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Nama Paket</label>
					  <label for="inputEmail3" class="col-sm-3 " style="padding-top: 7px; margin-bottom: 0;">:Nama Paket</label>
                      
                    </div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Start</label>
					  <label for="inputEmail3" class="col-sm-3 " style="padding-top: 7px; margin-bottom: 0;">:Start</label>
                      
                    </div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">End</label>
                      <label for="inputEmail3" class="col-sm-3 " style="padding-top: 7px; margin-bottom: 0;">:Nama</label>
                    </div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Data Usage</label>
                      <label for="inputEmail3" class="col-sm-3 " style="padding-top: 7px; margin-bottom: 0;">:Data Usage</label>
                    </div>
					 <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Status</label>
					  <div class="col-sm-8">
                      <select class="form-control" name="parenting" id="inputEmail3">
                        <option>-Pilih</option>
                        <option value="Yes">Active</option>
                        <option value="No" >Suspend</option>
                       
                      </select>
					  </div>
                    </div>
                   
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                   
                    <button type="submit" class="btn btn-info pull-right">Update</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      