<?php
include'includes/header_mycp.php';
include'includes/mycpl_script.php';
?>                                   
<div class="ed_graysection ed_toppadder80 ed_bottompadder80">
  <div class="container">
    <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-lg-offset-3 col-md-offset-3">
				<div class="ed_teacher_div">
					<h3><span>Dashboard Access<i class="fa fa-hand-o-down"></i></span></h3>
               <?php include'includes/mycpl_msg.php'; ?>
                <form action="mycpl.php" method="POST" class="ed_teacher_form" autocomplete="off">
                        <div class="form-group">
							<label class="control-label">Username<span style="color:red"><sup>*</sup></span></label>
							<input type="text" name="dashboard_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label class="control-label">Email<span style="color:red"><sup>*</sup></span></label>
							<input type="text" name="dashboard_email" class="form-control" required>
						</div>
						<div class="form-group">
							<label  class="control-label">Password<span style="color:red"><sup>*</sup></span></label>
							<input type="password" name="dashboard_pwd" class="form-control" required>
						</div>
                        <div class="form-group">
                        <button type="Submit" name="dashboard_login" class="btn ed_btn ed_green" style="background-color:#006E4D; color:#f0f0f0">Access</button>
                       </div>
                    </form>
				</div>
			</div>
	</div>
  </div>  
</div>
<?php include'includes/footer.php'; ?>