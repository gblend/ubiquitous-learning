<?php 
include'includes/instructor_reg.php'; 
include_once'includes/header.php'; 
?>
<!--Breadcrumb start-->
<div class="ed_pagetitle">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="page_title">
					<h2>Ulearning Instructor</h2>
				</div>
			</div>
			<div class="col-lg-6 col-md-8 col-sm-6">
				<ul class="breadcrumb">
					<li><a href="index.php?ho=ho">home</a></li>
					<li><i class="fa fa-chevron-left"></i></li>
					<li><a href="become-instructor.php?be=be">Ulearning Instructor</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<!--teacher_form_wrapper start-->
<div class="ed_graysection ed_toppadder80 ed_bottompadder80">
  <div class="container">
    <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-lg-offset-3 col-md-offset-3">
				<div class="ed_teacher_div">
					<h3>Fill this form and become an <span>Instructor <i class="fa fa-hand-o-down"></i></span></h3>
                     <?php include('includes/ierrors.php'); ?>
					<form method="post" action="become-instructor.php" class="ed_teacher_form" autocomplete="off" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label">First Name<span style="color:red"><sup>*</sup></span></label>
							<input type="text" name="i_first" class="form-control" value="<?php echo $i_first; ?>" required>
						</div>
						<div class="form-group">
							<label class="control-label">Last Name<span style="color:red"><sup>*</sup></span></label>
							<input type="text" name="i_last" class="form-control" value="<?php echo $i_last; ?>" required>
						</div>
						<div class="form-group">
							<label class="control-label">Sex<span style="color:red"><sup>*</sup></span></label>&nbsp;
							Male<input type="radio" name="sex" value="male" style="margin-left:5px;" checked>&nbsp;
							Female<input type="radio" name="sex" value="female" style="margin-left:5px;">
						</div>
						<div class="form-group">
							<label class="control-label">Email<span style="color:red"><sup>*</sup></span></label>
							<input type="text" name="i_email" class="form-control" value="<?php echo $i_email; ?>" required>
						</div>
                        <div class="form-group">
				        <label class="control-label">Mobile number<span style="color:red"><sup>*</sup></span></label>
				        <input type="number"  name="i_number" class="form-control" value="<?php echo $i_number; ?>" placeholder="e.g 09098765432" required>
						</div>
                        <div class="form-group">
							<label class="control-label">Username<span style="color:red"><sup>*</sup></span></label>
							<input type="text" name="i_uname" class="form-control" value="<?php echo $i_uname; ?>" required>
						</div>
                        <div class="form-group">
                        <label  class="control-label">Country<span style="color:red"><sup>*</sup></span></label><br />
                        <select name="country" style="width:100%; height:45px; border-radius:5px;">
                            <option name="argentina">Argentina</option>
                            <option name="usa">U.S.A</option>
                            <option name="france">France</option>
                            <option name="nigeria" selected>Nigeria</option>
                            <option name="ghana">Ghana</option>
                            <option name="italy">Italy</option>
                            <option name="south africa">South Africa</option>
                            <option name="cameroun">Cameroun</option>
                            <option name="spain">Spain</option>
                            <option name="england">England</option> 
                            <option name="other">Other</option> 
                        </select>
						</div>
                        <div class="form-group">
				        <label class="control-label">Educational Specialization<span style="color:red"><sup>*</sup></span></label>
				        <input type="text" name="i_spec" class="form-control" value="<?php echo $i_spec; ?>" required>
						</div>
                        <div class="form-group">
				        <label class="control-label">Favorite Educational Quote</label>
				        <input type="text" name="i_quote" class="form-control" value="<?php echo $i_quote; ?>">
						</div>
                        <div class="form-group">
				         <label class="control-label">Profile photo<span style="color:red"><sup>*</sup></span></label>
				         <input type="file" name="i_photo" required>
						</div>
						<div class="form-group">
							<label  class="control-label">Password<span style="color:red"><sup>*</sup></span></label>
							<input type="password" name="i_pwd" class="form-control" required>
						</div>
						<div class="form-group">
							<label  class="control-label">Password Confirm<span style="color:red"><sup>*</sup></span></label>
							<input type="password" name="ci_pwd" class="form-control" required>
						</div>
						
						<button type="Submit" name="submiti" class="btn ed_btn ed_green" style="background-color:#006E4D; color:#f0f0f0">Join</button>
						
					</form>
				</div>
			</div>
	</div>
  </div>  
</div>

<!--teacher_form_wrapper end-->
<!--Newsletter Section six start-->
<div class="ed_newsletter_section">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="row">
					<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
						<div class="ed_newsletter_section_heading">
							<h4>Let us inform you about everything important directly.</h4>
						</div>
					</div>
					<div class="col-lg-5 col-md-5 col-sm-6 col-xs-6 col-lg-offset-0 col-md-offset-0 col-sm-offset-3 col-xs-offset-3">
						<div class="row">
							<div class="ed_newsletter_section_form">
							<div id="form-msg" style="text-align: center;"></div>
								<form id="ajax-newsletter" action="includes/newsletter.php" method="POST" class="form">
									<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
								    <input type="text" name="newsletter_email" id="newsletter_input"  class="form-control" placeholder="Newsletter Email" required />
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
								    <button type="submit" name="submit" class="newsletter_button" >Subscribe</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
	</div>
</div>
<!--Newsletter Section six end-->
<script src="contactform/jquery-2.1.0.min.js"></script>
<script src="includes/newsletter.js"></script>
<?php include_once'includes/footer.php'; ?>