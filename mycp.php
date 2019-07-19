<?php
include'includes/dashboard_script.php';
include'includes/header_mycp.php';
?>
<div class="ed_graysection ed_toppadder80 ed_bottompadder80">
  <div class="container">
    <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-lg-offset-3 col-md-offset-3">
				<div class="ed_teacher_div">
					<h3><span>Dashboard authorization <i class="fa fa-hand-o-down"></i></span></h3>
                     <?php include('includes/dashboard_script_error.php'); ?>
					<form method="post" action="mycp.php" class="ed_teacher_form" autocomplete="off">
						<div class="form-group">
							<label class="control-label">Username<span style="color:red"><sup>*</sup></span></label>
							<input type="text" name="dashboard_name" class="form-control" value="" required>
						</div>
						<div class="form-group">
							<label class="control-label">Email<span style="color:red"><sup>*</sup></span></label>
							<input type="email" name="dashboard_email" class="form-control" value="" required>
						</div>
                        <div class="form-group">
							<label class="control-label">Password<span style="color:red"><sup>*</sup></span></label>
							<input type="password" name="dashboard_pwd" class="form-control" value="" required>
						</div>
						<button type="Submit" name="dashboard_submit" class="btn ed_btn ed_green" style="background-color:#006E4D; color:#f0f0f0">grant access</button>
						
					</form>
				</div>
			</div>
	</div>
  </div>  
</div>
<?php include'includes/footer.php';
?>