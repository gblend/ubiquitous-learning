<?php

include'includes/vid_enroll_db.php';
include_once'includes/header.php';
$user_sid = "";
if(isset($_SESSION['user_id'])) {
$user_sid = $_SESSION['user_id'];
}
if(isset($_SESSION['user_id'])) { ?>
<?php 
include"includes/profilepix.php";
include"includes/userlogin.php";
?>
<!--Breadcrumb start-->
<div class="ed_pagetitle">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="page_title">
					<h2>Ulearning Student</h2>
				</div>
			</div>
			<div class="col-lg-6 col-md-8 col-sm-6">
				<ul class="breadcrumb">
					<li><a href="index.php?ho=ho">home</a></li>
					<li><i class="fa fa-chevron-left"></i></li>
					<li><a href="dashboard.php?mys=my">Ulearning Student</a></li>
				</ul>
			</div>
		</div>
	</div>
</div><style type="text/css">
    video{
        object-fit:fill;
        width: 100%;
        height: 150px;
    }
    .ed_item_description a{
        text-decoration: none;
    }
    .ed_item_description h5{
        padding-top: 10px;
    }
    .ed_green:hover{
        background-color: #167AC6;
        color: white;
    }
</style>
<!--Breadcrumb end-->
<!--single student detail start-->
<div class="ed_dashboard_wrapper">
    <?php include'includes/profilepixError.php'; ?>
    <?php include'includes/vid_enroll_error.php'; ?>
	<div class="container">
                        <h3><?php if(isset($_SESSION['user_uid'])) { ?>
                <p style="text-align:center; padding-bottom:20px;"><strong style="color:#006E4D"><?php echo ucfirst($_SESSION['user_uid']); ?></strong> Welcome To Your <strong>Dashboard</strong></p>
                    <?php } ?></h3>
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="ed_sidebar_wrapper">
					<div class="ed_profile_img">
					<img src='<?php echo $_SESSION['user_photo']; ?>' alt="Dashboard Image" style="width:263px; height:263px;" />
					</div>
					<h3 style="color:#006E4D"><?php echo $_SESSION['user_uid']; ?></h3>
					 <div class="ed_tabs_left">
						<ul class="nav nav-tabs">
						  <li class="active" style="height:42px; padding-left:12px; padding-top:8px"><span style="color:black; font-weight:lighter; font-size:20px">active :- </span><?php if(isset($_SESSION['user_uid'])) { echo date('i'); } ?> Min ago</li>
						  <li class="active"><a href="#dashboard" data-toggle="tab">dashboard</a></li>
						  <li><a href="#courses" data-toggle="tab">courses <span><?php
$sql_ = "select * from users_coursecontents where user_id = $user_sid";
$query2 = mysqli_query($conn, $sql_);
$rowcount = mysqli_num_rows($query2);
        echo $rowcount;
?></span></a></li>
						  <li><a href="#profile" data-toggle="tab">profile</a></li>
                          <?php if(isset($_SESSION['user_uid'])) { ?>
                           <li style="height:42px; padding-left:12px; padding-top:8px"><strong style="color:#006E4D"><?php
                           echo $_SESSION['success'];
                           ?></strong></li>
                           <?php } ?>
                        <?php if(isset($_SESSION['user_uid'])) { ?>
				        <li>
                              <form action="includes/logout.php" method="post">
                                <input type="submit" name="logout" value="Logout" style="width:100%; height:42px; background-color:#FFFFFF; font-weight:bolder; color:#006E4D">  
                            </form>
                        </li>
                            <?php } ?> 
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="ed_dashboard_tab">
				<div class="tab-content">
					<div class="tab-pane active" id="dashboard">
						<div class="ed_dashboard_tab_info">
						<h1>hello, <span>student</span></h1>
						<h1>welcome to dashboard</h1>
						<p>Hi <strong style="color:#006E4D"><?php echo $_SESSION['user_uid']; ?></strong>, here you have to see and update your profile and other things. All the above updates can be modified from the left panel provided.</p>
						</div>
					</div>
                    
                    
					<div class="tab-pane" id="courses">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#my" aria-controls="my" role="tab" data-toggle="tab">my courses</a></li>
								</ul>
					
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="my">
									<div class="ed_inner_dashboard_info">
										<div class="row">
											<div class="ed_mostrecomeded_course_slider">    
    <?php
$sql_ = "select * from users_coursecontents where user_id = $user_sid";
$query2 = mysqli_query($conn, $sql_);
$rowcount = mysqli_num_rows($query2);                                    
?>
                                        <h2 style="text-align:center; font-size:24px; padding-top:20px">You Have Subscribed To <?php echo $rowcount; ?>&nbsp;Courses</h2> <br />
<?php
for ($i = 1; $i <= $rowcount; $i ++ ) { 
    $row = mysqli_fetch_array($query2);
    $video_sid = $row['coursecontent_id']; //video unique id
    $sql_new = "select * from coursecontents where content_id = $video_sid";
    $vid_query = mysqli_query($conn, $sql_new);
    $vid_array = mysqli_fetch_array($vid_query);
     ?>  
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ed_bottompadder20" style="min-height: 380px;">
				<div class="ed_mostrecomeded_course" style="min-height:300px;">
					<div class="ed_item_img">
<?php 
        echo "<video controls poster='".$vid_array["poster_path"]."' allowfullscreen id='video'>
        <source src='".$vid_array["video_path"]."'>
        </video>";
 ?>
					</div>
					<div class="ed_item_description ed_most_recomended_data">
                       				<h4>
                                    <a href="#!"><?php echo $vid_array['course_title']; ?></a>
                                    </h4>
                                    <h5>
                                    <a href="#!"><?php echo $vid_array['course_description']; ?></a>
                                    </h5>
					</div>
				</div>
			</div>                
<?php
    }
?>

											</div>
										</div>
									</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="result">
										<div class="ed_dashboard_inner_tab">
											<h2>result details</h2>
											<p></p>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="status">
										<div class="ed_dashboard_inner_tab">
											<h2>some recent status about this course</h2>
											<p></p>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="instructing">
										<div class="ed_dashboard_inner_tab">
											<h2>you have not created any course</h2>
											<p></p>
										</div>
									</div>
								</div>
					
							</div><!--tab End-->
						</div>
					</div>
					<div class="tab-pane" id="activity">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="personal">
									<div class="ed_dashboard_inner_tab">
										<h2>What's new, <?php echo $_SESSION['user_email']; ?> ?</h2>
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<form class="ed_tabpersonal">
													<div class="form-group">
													<textarea name="whats_new" class="form-control" id="whats_new" cols="50" rows="5"></textarea>
													</div>
													<div class="form-group">
													<button class="btn ed_btn ed_green">post update</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="mentions">
									<div class="ed_dashboard_inner_tab">
										<h2>sorry, there was no mentions event found. please try a different filter</h2>
									</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="favourites">
									<div class="ed_dashboard_inner_tab">
										<h2>sorry, there was no favourites event found. please try a different filter</h2>
									</div>
									</div>
								</div>
					
							</div><!--tab End-->
						</div>
					</div>
					<div class="tab-pane" id="profile">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#view" aria-controls="view" role="tab" data-toggle="tab">view</a></li>
									<li role="presentation"><a href="#change" aria-controls="change" role="tab" data-toggle="tab">change profile photo</a></li>
								</ul>
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="view">
									<div class="ed_dashboard_inner_tab">
										<h2>your profile</h2>
										<table id="profile_view_settings">
											<thead>
												<tr>
													<th>Name</th>
													<th>Id</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td><?php echo $_SESSION['user_uid']; ?></td>
													<td><a href="#"><?php echo $_SESSION['user_email']; ?></a></td>
												</tr>												
											</tbody>
										</table>
									</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="edit">
									</div>
									<div role="tabpanel" class="tab-pane" id="change">
										<div class="ed_dashboard_inner_tab">
											<h2>change photo</h2>
                                            <div id="photoMessages"></div>
											<form id="profileimage"  method="post" action="dashboard.php" class="ed_tabpersonal" enctype="multipart/form-data">
												<div class="form-group">
												<p>Click below to select a JPG, GIF or PNG format photo from your computer and then click 'Upload Image' to proceed.</p>
												</div>
												<div class="form-group">
												<input type="file" name="userphoto" id="userpix" accept="image/*" required>
												</div>
												<div class="form-group">
												<button type="submit" name="profilepix-btn" class="btn ed_btn ed_green">upload image</button>
												</div>
											</form>
										</div>
									</div>
<script src="includes/profilepix.js"></script>
<script src="contactform/jquery-2.1.0.min.js"></script>
								</div>
							</div><!--tab End-->
						</div>
					</div>
					<div class="tab-pane" id="setting">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<!-- Tab panes -->
								<div class="tab-content">s
									<div role="tabpanel" class="tab-pane" id="email">
									<div class="ed_dashboard_inner_tab">
										<h2>email notification</h2>
										<span>Send an email notice when:</span>
										<table id="notification_settings">
											<thead>
												<tr>
													<th class="title">Activity</th>
													<th class="yes">Yes</th>
													<th class="no">No</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td>A member mentions you in an update using "<?php echo $_SESSION['user_email']; ?>"</td>
													<td class="yes"><input type="radio" name="activity1" value="yes" checked="checked"></td>
													<td class="no"><input type="radio" name="activity1" value="no"></td>
												</tr>
												
												<tr>
													<td>A member replies to an update or comment you've posted</td>
													<td><input type="radio" name="activity2" value="yes" checked="checked"></td>
													<td><input type="radio" name="activity2" value="no"></td>
												</tr>
											</tbody>
										</table>
										<button class="btn ed_btn ed_green">save changes</button>
									</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="visibility">
									<div class="ed_dashboard_inner_tab">
										<h2>profile visibility</h2>
										<table id="visibility_settings">
											<thead>
												<tr>
													<th class="title">Name</th>
													<th class="yes">Visibility</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td><?php echo $_SESSION['user_uid']; ?></td>
													<td>Everyone</td>
												</tr>												
											</tbody>
										</table>
										<button class="btn ed_btn ed_green">save setting</button>
									</div>
									</div>
								</div>
					
							</div><!--tab End-->
						</div>
					</div>

				</div>
			</div>
			</div>			
		</div>
	</div>
</div>
<!--single student detail end-->
<?php include_once'includes/footer.php'; ?>
    <?php include'includes/profilepix.php'; ?>
<?php } else {
    header("location:courses.php");
} ?>