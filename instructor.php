<?php include_once'includes/header.php'; ?>
<!--Breadcrumb start-->
<div class="ed_pagetitle">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="page_title">
					<h2>Ulearning Instructors</h2>
				</div>
			</div>
			<div class="col-lg-6 col-md-8 col-sm-6">
				<ul class="breadcrumb">
					<li><a href="index.php?ho=ho">home</a></li>
					<li><i class="fa fa-chevron-left"></i></li>
					<li><a href="instructor.php?al=al">Ulearning instructors</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<style>
    .instructor_name{
     padding-top:5px;
    padding-bottom:5px;
    text-align:center;
    font-size: 20px;
    }
    .instructor_name a {
    text-decoration: none;    
    }
    .instructor_name a:hover{
        color: #0239B9;
    }
    .ed_team_member:hover img{
        border-radius: 100%;
        color: #0239B9;
    }
</style>
<!--Breadcrumb end-->
<!-- team member section start -->
<div class="ed_transprentbg ed_toppadder80">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ed_heading_top ed_bottompadder50">
					<h3>Our Instructors</h3>
				</div>
			</div>
			<div class="ed_team_wrapper">
<!--  instructors are populated from the database              -->   
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
$sql = "select * from instructortable LIMIT $page_start,12";
$query = mysqli_query($conn,$sql);
$rowcount = mysqli_num_rows($query);

for ($i = 1; $i <= $rowcount; $i ++ ) { 
    $row = mysqli_fetch_array($query); ?>
                
<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12"  style="min-height: 400px;">
     <div class="ed_team_member">
				<div class="ed_team_member_img">
        		<img src="<?php echo $row['i_profilephoto']; ?>" alt="item1" class="img-responsive" style="width:233px; height:233px;  border-radius:100%" class="i_image">
				</div>
				<div class="ed_team_member_description">
				<h4 class="instructor_name"><a href="#"><?php echo $row['instructor_first']." ".$row['instructor_last']; ?></a></h4>
				<h5 style="padding-bottom:5px; text-align:center"><?php echo $row['instructor_specialization']; ?></h5>
				<p style="margin-bottom:5px; text-align:center; padding-bottom:5px;"><?php echo $row['i_quote']; ?></p>
				</div>
      </div>
</div>
<?php
    }
?>
			</div>
		</div>
		<?php
 $sql1 = "SELECT * FROM instructortable";
$query1 = $conn->query($sql1);
$rowcount = mysqli_num_rows($query1);
$nums = $rowcount/12;
$nums = ceil($nums); ?>

    			<div class="col-lg-12">
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
<li <?php if($i == $page) { echo 'class="active"';}?> id="pagination"><a href="instructor.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?> 
					</ul>
				</nav>
				</div>
			</div>
    </div><!-- /.container -->
</div>
<!-- team member section end -->
<!--chart section start -->
<div class="ed_graysection ed_toppadder90 ed_bottompadder90">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="ed_heading_top ed_bottompadder50">
					<h3>Why Choose Us</h3>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ed_counter_wrapper">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="ed_counter">
							<h2 class="timer" data-from="0" data-to="250" data-speed="3000"></h2>
							<h4>Students graduated</h4>
							<p>Throughout these year we have done amazing work with over 250 students...</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="ed_counter">
							<h2 class="timer" data-from="0" data-to="50" data-speed="3000"></h2>
							<h4>Awards won</h4>
							<p>We have been nominated and received over 50 awards. Only awards were the ones in the back of the magazines you find..</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="ed_counter">
							<h2 class="timer" data-from="0" data-to="1400" data-speed="3000"></h2>
							<h4>Classes visited</h4>
							<p>Can how you setup your classroom impact how students think...</p>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<!-- chart Section end -->
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