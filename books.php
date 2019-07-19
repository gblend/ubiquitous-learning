<?php include'includes/header.php';
?>

<!--Breadcrumb start-->
<div class="ed_pagetitle">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="page_title">
					<h2>Ulearning Books</h2>
				</div>
			</div>
			<div class="col-lg-6 col-md-8 col-sm-6">
				<ul class="breadcrumb">
					<li><a href="index.php?ho=ho">home</a></li>
					<li><i class="fa fa-chevron-left"></i></li>
					<li><a href="books.php?bo=bo">Ulearning Books</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<!-- Section eleven start -->
<style type="text/css">
    object{
        margin: 0px;
        width: 100%;
        height: 100%;
    }
    .ed_mostrecomeded_course{
        z-index: -100;
    }
    .ed_courses{
        z-index: -100;
    }
</style>
<div class="ed_courses ed_toppadder80 ed_bottompadder80">
	<div class="container">
		<div class="row" style="display: flex">
            
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
$sql = "select * from bookcontents LIMIT $page_start,12";
$query = mysqli_query($conn,$sql);
$rowcount = mysqli_num_rows($query);

for ($i = 1; $i <= $rowcount; $i ++ ) { 
    $row = mysqli_fetch_array($query); ?>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="ed_mostrecomeded_course" style="min-height: 350px;">
					<div > 
<?php 
   echo " <div>
        <img src='".$row["bookcover"]."'  style='height: 200px; width: 300px;'>
    </div>";
?>
					</div>
					<div class="ed_item_description ed_most_recomended_data">
                       				<h4>
                                        
                                        <a href="course-single.php?si=si"></a></h4>
                        <div >
						<a href="#!" class="ed_getinvolved" style="padding-top: 5px;">Book Title: <span style="text-align:center; color: #CA2205; font-weight:bold; padding-top:10px"><?php echo $row['book_title']; ?></span></a> </div>
                        <div>
				<a href="#!" class="ed_getinvolved">Description:<span style="text-align:center; font-weight:lighter; color: #CA2205;"> <?php echo $row['book_description']; ?></span></a> </div>
						<a href="#!" class="ed_getinvolved">Author: <span style="text-align:center; font-weight:lighter; color: #CA2205;"><?php echo $row['book_author']; ?></span></a>
					</div>
					<h4 style=" text-align: center;"><a href="<?php echo $row["book_path"]; ?>" style="text-decoration: none; color: #006E4D;">Download Book</a></h4>
				</div>
			</div>                

<?php
    }
?>
   
		</div>
    </div>
    <?php
$sql1 = "SELECT * FROM bookcontents";
$query1 = $conn->query($sql1);
$rowcount = mysqli_num_rows($query1);
$nums = $rowcount/12;
$nums = ceil($nums); ?>

    			<div class="col-lg-12" style="margin-left: 80px;">
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
<li <?php if($i == $page) { echo 'class="active"';}?> id="pagination"><a href="books.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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