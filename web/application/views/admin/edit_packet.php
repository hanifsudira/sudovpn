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
            <li><a href="#">Edit Packet</a></li>
          
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
                  <h3 class="box-title">Edit Paket</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="http://sudovpn.id:5002/updateNewPacket">
                  <div class="box-body">
                    <div class="form-group">
                      <input name="id" type="hidden" class="form-control" id="inputEmail3" value="<?php echo $list['id_packet'] ?>">
                      <label for="inputEmail3" class="col-sm-3 control-label">Nama Paket</label>
                      <div class="col-sm-8">
                        <input name="nama" type="text" class="form-control" id="inputEmail3" value="<?php echo $list['packet_name'] ?>" required>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">User Maks</label>
                      <div class="col-sm-8">
                        <input name="max" type="text" class="form-control" id="inputEmail3" value="<?php echo $list['max'] ?>" required>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Bandwidth</label>
                      <div class="col-sm-8">
                        <input name="bandwidth" type="text" class="form-control" id="inputEmail3" value="<?php echo $list['bandwidth'] ?>" required>
                      </div>
                    </div>
                   
					 <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Parenting</label>
					  <div class="col-sm-8">
                      <select class="form-control" name="parenting" id="inputEmail3" required>
                        <option>-Pilih</option>
                        <option value="Yes" <?php if($list['parenting']=='Yes'){echo 'selected';} ?>>Yes</option>
                        <option value="No" <?php if($list['parenting']=='No'){echo 'selected';} ?>>No</option>

                      </select>
					  </div>
                    </div>
					  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Life Time</label>
                      <div class="col-sm-8">
                        <input name="life_time" type="text" class="form-control" id="inputEmail3" value="" required>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                   <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Harga</label>
                      <div class="col-sm-8">
                        <input name="harga" type="text" class="form-control" id="inputEmail3" value="" required>
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
      