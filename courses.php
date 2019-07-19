<?php include_once'includes/header.php'; 
$user_id = ''; 
if( isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
}
?>

<style type="text/css">
    video{
        object-fit:fill;
        width: 100%;
        height: 200px;
    }
    video[poster] {
        margin: 0px;
        height: 100%;
        height: 200px;
    }
         #course_title{
         padding-top:5px;
     }
     #course_title:hover{
         color:#167AC6;
         cursor: pointer;
     }
    #course_title{
        font-size: 20px;
    }
     #course_description:hover{
         cursor: pointer;
         color:#167AC6;
     }
         #view_course{
        text-align:center;
        font-weight:400;
         color: #1A8738;
     }
     #view_course:hover{
         color: #167AC6;
     }
</style>
<!--Breadcrumb start-->
<div class="ed_pagetitle">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="page_title">
					<h2>Ulearning Courses</h2>
				</div>
			</div>
			<div class="col-lg-6 col-md-8 col-sm-6">
				<ul class="breadcrumb">
					<li><a href="index.php?ho=ho">home</a></li>
					<li><i class="fa fa-chevron-left"></i></li>
					<li><a href="courses.php?cos=co">Ulearning Courses</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<!-- Section eleven start -->
<div class="ed_courses ed_toppadder80 ed_bottompadder80">
	<div class="container">
		<div class="row">         
<?php
include'includes/dbconnect.php';
$page = "";
if(isset($_GET['page'])) {
	$page = $_GET['page'];
}
if($page == "" || $page == "1") {
	$page_start = 0;
} else {
   $page_start = ($page * 12) - 12;  
}	 
$sql = "select * from coursecontents LIMIT $page_start,12";
$query = mysqli_query($conn,$sql);
$rowcount = mysqli_num_rows($query);

for ($i = 1; $i <= $rowcount; $i ++ ) { 
    $row = mysqli_fetch_array($query); ?>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="min-height: 430px; display: flex">
				<div class="ed_mostrecomeded_course">
					<div > 
<?php 
        echo "<video poster='".$row["poster_path"]."'>
        <source src='".$row["video_path"]."'>
        </video>";
?>
					</div>
					<div class="ed_item_description ed_most_recomended_data">
                       	<h4 id="course_title"><?php echo $row['course_title']; ?></h4><br />
                            <h5 id="course_description"><?php echo $row['course_description']; ?></h5><br />
                        <div style="text-align:center; font-weight:400;">
						<a href="course-single.php?v_id=<?php echo $row['content_id']; ?>" class="ed_getinvolved" id="view_course">View course <i class="fa fa-long-arrow-right"></i></a> </div>
					</div>
				</div>
			</div>                

<?php
    }
?>
   </div>
    </div><!-- /.container -->
<?php
$sql1 = "SELECT * FROM coursecontents";
$query1 = $conn->query($sql1);
$rowcount = mysqli_num_rows($query1);
$nums = $rowcount/12;
$nums = ceil($nums); ?>

    			<div class="col-lg-12" style="margin-left: 85px;">
				<div class="ed_blog_bottom_pagination">
				<nav>
					<ul class="pagination">
				<?php
$page = "";
if(isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
    $page = 1;
}
for($i = 1; $i <= $nums; $i++) {
?>
<li <?php if($i == $page) { echo 'class="active"';}?> id="pagination"><a href="courses.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?> 
					</ul>
				</nav>
				</div>
			</div>                 
</div>
<!-- Section eleven end -->
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