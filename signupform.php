<?php 
include"includes/userreg.php";
include_once'includes/header.php'; 
?>
<!--Breadcrumb start-->
<div class="ed_pagetitle">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="page_title">
					<h2>sign up</h2>
				</div>
			</div>
			<div class="col-lg-6 col-md-8 col-sm-6">
				<ul class="breadcrumb">
					<li><a href="index.php?ho=ho">home</a></li>
					<li><i class="fa fa-chevron-left"></i></li>
					<li ><a href="signup.php?sig=sig">sign up</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<div class="ed_transprentbg ed_toppadder80 ed_bottompadder80">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
				<div class="ed_teacher_div">
					<div class="ed_heading_top">
						<h3>sign up</h3>
					</div>
					<form  method="post" action="signupform.php" class="ed_contact_form ed_toppadder40" autocomplete="off">
                        <?php include('includes/uerrors.php'); ?>
						<div class="form-group">
							<label class="control-label">First Name<span style="color:red"><sup>*</sup></span></label>
							<input type="text" class="form-control" name="user_first" value="<?php echo $first; ?>" required>
						</div>
                        <div class="form-group"><label class="control-label">Last Name<span style="color:red"><sup>*</sup></span></label>
							<input type="text" class="form-control" name="user_last"  value="<?php echo $last; ?>" required>
						</div>
						<div class="form-group">
							<label class="control-label">Email<span style="color:red"><sup>*</sup></span></label>
							<input type="email" class="form-control" name="email"  value="<?php echo $email; ?>" required>
						</div>
						<div class="form-group">
							<label class="control-label">Username<span style="color:red"><sup>*</sup></span></label>
							<input type="text" class="form-control" name="uid"  value="<?php echo $uid; ?>" required>
						</div>
                        <div class="form-group">
							<label class="control-label">Sex<span style="color:red"><sup>*</sup></span></label>&nbsp;
							Male<input type="radio" name="sex" value="male" style="margin-left:5px;" checked>&nbsp;
							Female<input type="radio" name="sex" value="female" style="margin-left:5px;">
						</div>
						<div class="form-group">
							<label class="control-label">Password<span style="color:red"><sup>*</sup></span></label>
							<input type="password" class="form-control" name="pwd" required>
						</div>
                        <div class="form-group">
							<label class="control-label">Confirm Password<span style="color:red"><sup>*</sup></span></label>
							<input type="password" class="form-control" name="cpwd" required>
						</div>
						<button type="submit" name="submitu" class="btn ed_btn ed_orange pull-right" style="background-color:#006E4D; color:#f0f0f0">sign up</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once'includes/footer.php'; ?>