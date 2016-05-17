
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/application_responsive.css" media="screen" rel="stylesheet" type="text/css" />
 
 
<!-- Content Wrapper. Contains page content -->
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
 
 <!-- Main content -->
<section class="content">
  <div class='login'>
    <div class='container'>
      <div class='row-fluid'>
        <div class='span4 offset4'>
          <form accept-charset="UTF-8" action="http://sudovpn.id:5002/updateUser" class="new_user" id="new_user" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="83XB3tOTNc32k3lTEDQcXvHfs1TRPTYQupERDaRSlx8=" /></div>

			<br><br>
            <label class="control-label" for="inputEmail">Full Name</label>
            <input name="name" type="text" id="inputName" value="<?php echo $list['fullname'];?>" required>

            <label class="control-label" for="inputEmail">Phone</label>
            <input name="phone" type="text" id="inputEmail" value="<?php echo $list['phone'];?>" required>

            <label class="control-label" for="inputEmail">Address</label>
            <input name="address" type="text" id="inputEmail" value="<?php echo $list['address'];?>" required>

            <label class="control-label" for="inputPassword">Password</label>
            <input name="passwd" type="password" id="inputPassword" value="Input Your Password!" required>

            <br>
            <input class="bttn bttn-green button button-small" name="commit" type="submit" value="Update"/>
          </form>

        </div>
      </div>
    </div>
  </div>
  
    </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     