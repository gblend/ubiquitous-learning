<?php
include'includes/header.php';
include'includes/dbconnect.php';
?>

<?php
if(isset($_SESSION['instructor_uid'])) { 
include'includes/coursewareScript.php';
?>

<div class="ed_graysection ed_toppadder80 ed_bottompadder80">
  <div class="container">
    <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-lg-offset-3 col-md-offset-3">
				<div class="ed_teacher_div">
					<h3>Upload Course<span>&nbsp;Contents <i class="fa fa-hand-o-down"></i></span></h3>
                     <?php include('includes/courseuploadErrors.php'); ?>
                    
					<form method="post" action="coursewareUpload.php" class="ed_teacher_form" autocomplete="off" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label">Course Title<span style="color:red"><sup>*</sup></span></label>
							<input type="text" name="course_title" class="form-control" value="<?php echo $course_title; ?>" required>
						</div>
						<div class="form-group">
							<label class="control-label">Course Description<span style="color:red"><sup>*</sup></span></label>
							<input type="text" name="course_description" class="form-control" value="<?php echo $course_description; ?>" required>
						</div>
				        <div class="form-group">
							<label class="control-label">Course Duration(Hour(s)<span style="color:red"><sup>*</sup></span></label>
							<input type="text" name="course_duration" class="form-control" value="<?php echo $course_duration; ?>" required>
						</div>
						<div class="form-group">
							<label class="control-label">Select Course Poster/Image<span style="color:red"><sup>*</sup></span></label>
							<input type="file" name="course_poster" accept="image/*" required>
						</div>
                        <div class="form-group">
				         <label class="control-label">Select Course Content (Video)<span style="color:red"><sup>*</sup></span></label>
				         <input type="file" name="course" accept="video/*" required>
						</div>
						<button type="Submit" name="upload_course" class="btn ed_btn ed_green" style="background-color:#006E4D; color:#f0f0f0">Upload Course</button>
						
					</form>
				</div>
			</div>
	</div>
  </div>  
</div>


<?php include'includes/footer.php'; ?>
<?php } else {
    header("location:index.php");
} ?>