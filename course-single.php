<?php
include_once'includes/header.php'; 
include'includes/dbconnect.php';
$user_id = '';
if(isset($_SESSION['user_id'])){
$user_id = $_SESSION['user_id'];
} 
?>
<!--Breadcrumb start-->
<div class="ed_pagetitle">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="page_title">
					<h2>Single course</h2>
				</div>
			</div>
			<div class="col-lg-6 col-md-8 col-sm-6">
				<ul class="breadcrumb">
					<li><a href="index.php?ho=ho">home</a></li>
					<li><i class="fa fa-chevron-left"></i></li>
					<li><a href="course-single.php?si=si">Single course</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<!--Single content start-->
<div class="ed_graysection ed_course_single ed_toppadder80 ed_bottompadder80">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
				<div class="ed_course_single_item">
					<div class="ed_course_single_image">
                        <?php if(isset($_GET['v_id'])){
    $vid_id = $_GET['v_id'];
                $sql = "SELECT * FROM coursecontents WHERE content_id = '$vid_id'";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
          $i_uid = $row['instructor_uid'];
    $sql1 = "SELECT * FROM instructortable WHERE instructor_uid = '$i_uid'";
    $query1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($query1);
?>
                        <img src="<?php echo $row['poster_path']; ?>" /> 
					</div>
					<div class="ed_course_single_info">
						<h2><?php echo $row['course_title']; ?></h2>
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
								<div class="course_detail">
									<div class="course_faculty">
										<img src="<?php echo $row1['i_profilephoto']; ?>" alt=""> <a href="instructor-dashboard.php?my=my"><?php echo ucwords($row1['instructor_first']." ".$row1['instructor_last']); ?></a>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 pull-right text-right">
								<div class="ed_course_duration">
								time duration: <?php echo $row['course_duration']; ?> hours
							</div>
							</div>
						</div>
					</div>
					<div class="ed_course_single_tab">
						<div role="tabpanel">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">description</a></li>
								<li role="presentation"><a href="#students" aria-controls="students" role="tab" data-toggle="tab">students</a></li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="description">
									<div class="ed_course_tabconetent">
									<h2>about course</h2>
										<p><?php echo $row['course_description']; ?></p>
									</div>
                                    <div style="text-align:center;">
                                    <?php if(isset($_SESSION['user_uid']) && !isset($_SESSION['instructor_uid'])) {
                                        echo '
										<p><a class="btn btn-success" href="dashboard.php?uid='.$user_id.'&&cid='.$vid_id.'" style="background-color:#006E4D; margin-top:20px; border:2px solid #8FA83B">Join This Course </a></p>'; } else { echo '<form action="loginpage.php" method="POST">
                                            <div class="form-group">
										    <button type="submit" name="userSignin" style="background-color:#006E4D; margin-top:20px; border:2px solid #8FA83B; color:white; border-radius:5px; height: 40px;">You have to login as a user to join this course</button>
									        </div>
                                           </form>'; } ?>
									</div>
								</div>
                                <?php include'includes/dbconnect.php';
                                $request = "SELECT * FROM users_coursecontents WHERE coursecontent_id = '$vid_id'";
                                $requestQuery = mysqli_query($conn, $request);
                                $row_fetch = mysqli_fetch_assoc($requestQuery);
                                $students = mysqli_num_rows($requestQuery);
                                $student_id = $row_fetch['user_id'];
                                $sql_student = "SELECT * FROM users WHERE user_id = '$student_id'";
                                $query_sql_student = mysqli_query($conn, $sql_student);
                                $rowUser_id = mysqli_num_rows($query_sql_student); 
                                ?>
                                <div role="tabpanel" class="tab-pane" id="students">
                                <div class="ed_inner_dashboard_info">
                                <div class="ed_course_single_info">
                                <h2>total students :- <span><?php echo $students; ?></span></h2>
                                <h5><?php if($students == 0) { echo 'No'; } else { echo $students; }  ?> students recently join this course</h5>
                                </div>
                                </div>
                                </div>
							</div>
						</div>
					</div><!--tab End-->
				</div>	
			</div>
		</div>
	</div>
</div>
<?php } ?>
<!--Single content end-->
<?php include_once'includes/footer.php'; ?>