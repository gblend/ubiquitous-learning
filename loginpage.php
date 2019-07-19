<?php
include'includes/instructorlogin.php';
include'includes/userlogin.php';
include'includes/header.php';
?>

<script>
    function displayinstructorlogin(){
        var instuctorlogin = document.getElementById("instructorlogin");
        var Reset = document.getElementById("Reset");
        instuctorlogin.style.display = "block";
       Reset.style.display = "none";
    }
    
    function displayinstructorReset(){
        var instuctorlogin = document.getElementById("instructorlogin");
        var Reset = document.getElementById("Reset");
        Reset.style.display = "block";
        instructorlogin.style.display = "none";
    }
//displayinstructorlogin();
//displayinstructorReset();
    function displayuserlogin(){
        var userlogin = document.getElementById("userlogin");
        var Resetuser = document.getElementById("Resetuser");
        userlogin.style.display = "block";
       Resetuser.style.display = "none";
    }
    
    function displayuserReset(){
        var userlogin = document.getElementById("userlogin");
        var Resetuser = document.getElementById("Resetuser");
        Resetuser.style.display = "block";
        userlogin.style.display = "none";
    }
    
    $('form.myForm').submit(function(event){
        event.preventDefault();
        $.post( $(this).attr("action"),
        $(this).serialize(),
        function(info){
            $("includes/uresetError.php").html(info);
        });
                            });
</script>
<style type="text/css">
    #instructorlogin{
        display: block;
    }
    #Reset{
        display: none;
    }
    #userlogin{
        display: block;
    }
    #Resetuser{
        display: none;
    }
</style>


<?php if(isset($_POST['userSignin']) || isset($_POST['ulogin']) || isset($_POST['ureset']) || isset($_SESSION['user_id'])) {
echo
'<div class="ed_graysection ed_toppadder80 ed_bottompadder80">
  <div class="container">
    <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-lg-offset-3 col-md-offset-3">
				<div class="ed_teacher_div">
                   <div id="userlogin">
					<h3><span>User Login<i class="fa fa-hand-o-down"></i></span></h3>
                    
					<form action="loginpage.php" method="POST" class="ed_teacher_form" autocomplete="off">'; ?>
                   <?php include'includes/uloginError.php'; ?>
                   <?php echo'
						<div class="form-group">
							<label class="control-label">Username:</label>
							<input type="text" name="uname" class="form-control" required>
						</div>
						<div class="form-group">
							<label  class="control-label">Password:</label>
							<input type="password" name="upwd" class="form-control" required>
						</div>
                        <div class="form-group">
				        <button type="submit" name="ulogin" style="background-color:#006E4D; color:#f0f0f0; width:80px; font-size: 18px">login</button>
                        <a href="#" onclick="displayuserReset()"><span style="color:red;display: inline-block; float:right">forgot password?</span></a>	
                       </div>
                    </form>
				</div> &nbsp;
                
                <div id="Resetuser">
                    <h3><span>Reset Login Password<i class="fa fa-hand-o-down"></i></span></h3>'; ?>
                 <div id="form-messages"></div>
				<?php echo' <form id="ajax-ureset" action="includes/userReset.php" method="POST" class="ed_teacher_form" autocomplete="off">
						<div class="form-group">
							<label class="control-label">Email<span style="color:red"><sup>*</sup></span></label>
							<input type="text" name="u_email" class="form-control" id="ru_email" required>
						</div>
						<div class="form-group">
							<label class="control-label">Username<span style="color:red"><sup>*</sup></span></label>
							<input type="text" name="u_uid" class="form-control" id="u_uid" required>
						</div>
						<div class="form-group">
							<label  class="control-label">New Password<span style="color:red"><sup>*</sup></span></label>
							<input type="password" name="u_pwd" class="form-control" id="ru_pwd" required>
						</div>
                        <div class="form-group">
				        <label  class="control-label">Confirm Password<span style="color:red"><sup>*</sup></span></label>
				        <input type="password" name="cu_pwd" class="form-control" id="rcu_pwd" required>
						</div>
                        <div class="form-group">
				        <button type="submit" name="ureset" style="background-color:#006E4D; color:#f0f0f0; width:auto; font-size: 18px">Reset Password</button>
                        <a href="#" onclick="displayuserlogin()"><span style="color:#006E4D; display: inline-block; float:right">Sign in?</span></a>
                       </div>
                    </form>
                    </div>
                    
				</div>
			</div>
	</div>
  </div>  
</div>';
} elseif (isset($_POST['iSignin']) || isset($_POST['ilogin'])) {
echo                            
'<div class="ed_graysection ed_toppadder80 ed_bottompadder80">
  <div class="container">
    <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-lg-offset-3 col-md-offset-3">
				<div class="ed_teacher_div">
                
                    <div id="instructorlogin"> 
					<h3><span>Instructor Login<i class="fa fa-hand-o-down"></i></span></h3>'; ?>
                 <?php include'includes/iloginError.php'; ?>
				<?php echo'<form action="loginpage.php" method="POST" class="ed_teacher_form" autocomplete="off">

                            <div class="form-group">
							<label class="control-label">Username:</label>
							<input type="text" name="i_uname" class="form-control" required>
						</div>
						<div class="form-group">
							<label  class="control-label">Password:</label>
							<input type="password" name="i_pwd" class="form-control" required>
						</div>
                        <div class="form-group">
				        <button type="submit" name="ilogin" style="background-color:#006E4D; color:#f0f0f0; width:80px; font-size: 18px">login</button>
                <a href="#" onclick="displayinstructorReset()"><span style="color:red; display: inline-block; float:right">forgot password?</span></a>
                       </div>
                    </form>
				</div>&nbsp;
                
                <div id="Reset">
                    <h3><span>Reset Login Password<i class="fa fa-hand-o-down"></i></span></h3>'; ?>
                    <div id="form-message"></div>
                   <?php echo'<form  id="ajax-ireset" action="includes/instructorReset.php" class="ed_teacher_form" autocomplete="off">
						<div class="form-group">
							<label class="control-label">Email<span style="color:red"><sup>*</sup></span></label>
							<input type="text" name="ri_email" class="form-control" id="ri_email" required>
						</div>
						<div class="form-group">
							<label class="control-label">Username<span style="color:red"><sup>*</sup></span></label>
							<input type="text" name="i_uid" class="form-control" id="i_uid" required>
						</div>
						<div class="form-group">
							<label  class="control-label">New Password<span style="color:red"><sup>*</sup></span></label>
							<input type="password" name="ri_pwd" class="form-control" id="ri_pwd" required>
						</div>
                        <div class="form-group">
				        <label  class="control-label">Confirm Password<span style="color:red"><sup>*</sup></span></label>
				        <input type="password" name="ric_pwd" class="form-control" id="ric_pwd" required>
						</div>
                        <div class="form-group">
				        <button type="submit" name="ireset" style="background-color:#006E4D; color:#f0f0f0; width:auto; font-size: 18px">Reset Password</button>
                         <a href="#" onclick="displayinstructorlogin()"><span style="color:#006E4D; display: inline-block; float:right">Sign in?</span></a>
                       </div>
                    </form>
                    </div>
                </div>
			</div>
	</div>
  </div>  
</div>';
}  else {
    header("Location:index.php");
}

?>
<script src="contactform/jquery-2.1.0.min.js"></script>
<script src="includes/userReset.js"></script>
<script src="includes/instructorReset.js"></script>

<?php include'includes/footer.php'; ?>