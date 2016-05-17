
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Paket
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dasboard</a></li>
            <li><a href="#">List Paket</a></li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
         
          </div><!-- /.row -->
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
                      <th>User Maks</th>
                      <th>Bandwidth</th>
                      <th>Parenting</th>
					  <th>Life Time</th>
					  <th>Harga</th>
                      <th>Action</th>
                    </tr>
                    <?php foreach($list as $item){?>
                    <tr>
                      <td><?php echo $item['id_packet']; ?></td>
                      <td><?php echo $item['packet_name']; ?></td>
                      <td><?php echo $item['max']; ?></td>
                      <td><?php echo $item['bandwidth']; ?> MB</td>
                      <td><?php echo $item['parenting']; ?></td>
					  <td><?php echo $item['life_time']; ?> Days</td>
					   <td><?php echo $item['harga']; ?> K</td>
                      <td>
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url() ?>admin/edit_packet/<?php echo $item['id_packet'];?>">Edit</a>
                        <a class="btn btn-danger btn-xs" href="http://sudovpn.id:5002/deletePacket/<?php echo $item['id_packet'];?>">Delete</a>
                      </td>

                    <tr>
                    <?php } ?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    