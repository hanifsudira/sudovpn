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

<div id='fb-root'></div>
    <script src='http://connect.facebook.net/en_US/all.js'></script>
    
    <script> 
      FB.init({appId: "275365986132209", status: true, cookie: true});//change your application ID

      function postToFeed() {
        // calling the API ...
        var obj = {
          method: 'feed',
          link: 'https://developers.facebook.com/docs/reference/dialogs/',
          picture: 'http://sudovpn.id/assets/images/devices%402x-1ee5a67a11e5bf5fd15aa68dfc6e3123.png',
          name: 'SudoVPN - A Fast and Secure VPN',
          caption: 'SUDOVPN.ID',
          description: 'SudoVPN provides fast and secure world-wide VPN services with easy-to-use apps for PC, Mac, iOS, Android, and Linux. Unblock and secure your internet today!'
        };

        function callback(response) {
          location.href='http://sudovpn.id'; //go to your page after LIKE
        }

        FB.ui(obj, callback);
      }
    
    </script>

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
							<?php 	if($item['id_packet']==2):?>
										<a href="https://www.facebook.com/sharer/sharer.php?u=sudovpn.id" class="btn btn-info pull-center" target="_blank" style="color:white" > Share on Facebook </a>
										<p><a onclick='postToFeed(); return false;'class="btn btn-info pull-center" style="color:white">Share on Facebook</a></p>
										<p id='msg'></p>
	
							<?php 	else:?>
									<button class="btn btn-info pull-center" type="submit" >Choose</button>
				
							<?php endif;?>
						
						</form>
					</li>
				</ul>
			</div><!--end column-->

			<?php } ?>
		</div><!--end price table-->

    </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     