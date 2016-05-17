 <link type="text/css" href="<?php echo base_url(); ?>assets/lte/styles_pilihpaket.css" rel="stylesheet" media="all" />
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
	Edit Profile
  </h1>
  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="#">Examples</a></li>
	<li class="active">Edit profile</li>
  </ol>
</section>
<section class="content">

		<div class="price_table">
			<?php foreach($list as $item){?>

			<div class="column_1">
				<ul>
					<li class="header_row_1 align_center">
						<div class="pack-title"><?php echo $item['packet_name']; ?></div>
					</li>
					<li class="header_row_2 align_center">
						<div class="price"><span>Rp <?php echo $item['harga']; ?>K</span></div>
						<div class="time"><?php echo $item['life_time']; ?> Days</div>
					</li>
					<li class="row_style_1 align_center"><span><b><?php echo $item['max']; ?> Credit</b></span></li>
					<li class="row_style_1 align_center"><span>Limited Bandwidth</span></li>
					<li class="row_style_1 align_center no-option"><span><?php if($item['parenting']=='Yes'){echo 'Save Content For Children';}else{echo 'Freedom';} ?></span></li>
					<li class="row_style_1 align_center no-option"><span>Secure Connection</span></li>
					<li class="row_style_1 align_center no-option"><span>Anonymous</span></li>
					<li class="row_style_1 align_center no-option"><span>Unblock Websites</span></li>
					<li class="row_style_1 align_center no-option"><span>Play Game Online</span></li>
					<li class="row_style_1 align_center no-option"><span>Streaming Videos</span></li>
					<li class="row_style_footer_1">
						<form method="post" action="http://sudovpn.id:5002/beliPaket">
							<input name="id_user" type="hidden" class="form-control" id="inputEmail3" value="<?php echo $id_user; ?>">
							<input name="id_packet" type="hidden" class="form-control" id="inputEmail3" value="<?php echo $item['id_packet']; ?>">
							<button class="btn btn-info pull-center" type="submit" >Choose</button>
						</form>
					</li>
				</ul>
			</div><!--end column-->

			<?php } ?>
		</div><!--end price table-->

    </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     