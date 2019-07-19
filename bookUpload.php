
<?php
include'includes/header.php';
include'includes/bookScript.php';
?>

<div class="ed_graysection ed_toppadder80 ed_bottompadder80">
  <div class="container">
    <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-lg-offset-3 col-md-offset-3">
				<div class="ed_teacher_div">
					<h3>Upload Book<span>&nbsp;Contents <i class="fa fa-hand-o-down"></i></span></h3>
                     <?php include('includes/bookuploadErrors.php'); ?>
                    
					<form method="post" action="bookUpload.php" class="ed_teacher_form" autocomplete="off" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label">Book Title<span style="color:red"><sup>*</sup></span></label>
							<input type="text" name="book_title" class="form-control" value="<?php echo $book_title; ?>" required>
						</div>
						<div class="form-group">
							<label class="control-label">Book Description<span style="color:red"><sup>*</sup></span></label>
							<input type="text" name="book_description" class="form-control" value="<?php echo $book_description; ?>" required>
						</div>
						<div class="form-group">
							<label class="control-label">Book Author<span style="color:red"><sup>*</sup></span></label>
							<input type="text" name="book_author" class="form-control" value="<?php echo $book_author; ?>" required>
						</div>
                        <div class="form-group">
							<label class="control-label">Book Cover(image)<span style="color:red"><sup>*</sup></span></label>
							<input type="file" name="bookcover" accept="image/*" required>
						</div>
						<div class="form-group">
							<label class="control-label">Select Book (pdf)<span style="color:red"><sup>*</sup></span></label>
							<input type="file" name="book" accept="application/pdf" required>
						</div>
						<button type="Submit" name="upload_book" class="btn ed_btn ed_green" style="background-color:#006E4D; color:#f0f0f0">Upload Book</button>
						
					</form>
				</div>
			</div>
	</div>
  </div>  
</div>


<?php include'includes/footer.php'; ?>