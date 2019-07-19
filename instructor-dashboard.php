<?php 
include'includes/instructor_reg.php';
include_once'includes/header.php';
$ins_uid = $_SESSION['instructor_uid'];
?>
<!--Breadcrumb start-->
<div class="ed_pagetitle">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="page_title">
					<h2>Ulearning Instructor</h2>
				</div>
			</div>
			<div class="col-lg-6 col-md-8 col-sm-6">
				<ul class="breadcrumb">
					<li><a href="index.php?ho=ho">home</a></li>
					<li><i class="fa fa-chevron-left"></i></li>
					<li><a href="instructor.php?al=al">Ulearning Instructor</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<style type="text/css">
    video{
        object-fit:fill;
        width: 100%;
        height: 260px;
    -webkit-width: 470px;
    -webkit-height: 260px;
    -moz-width:470px;
    -moz-height: 260px;
    -ms-470px;
    -ms-height: 260px;
    -o-width:470px;
    -o-height: 260px;
    }
</style>
<!--instructor single start-->
<div class="ed_dashboard_wrapper">
	<div class="container">
		<div class="row">
                <h3 style="text-align:center; padding-bottom:20px;"><?php if(isset($_SESSION['instructor_uid'])) { ?>
                <p><strong style="color:#006E4D; "><?php echo $_SESSION['instructor_uid']; ?></strong> Welcome To Your <strong>Dashboard</strong></p>
                    <?php } ?></h3>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="ed_sidebar_wrapper">
					<div class="ed_profile_img">
					<img style="width:263px; height:250px;" src='<?php echo $_SESSION["instructor_photo"]; ?>' alt="Profile Image" class="img-responsive" />
					</div>
					<h3 style="color:#006E4D"><?php echo $_SESSION['instructor_uid']; ?> </h3>
					<p><span>active :- </span> <?php if(isset($_SESSION['instructor_uid'])) { echo date('i'); } ?> Min ago</p>
					 <div class="ed_tabs_left">
						<ul class="nav nav-tabs">
						  <li class="active"><a href="#a" data-toggle="tab">profile</a></li>
						  <li><a href="#b" data-toggle="tab">Uploaded courses <span><?php 
                 $sql_i = "SELECT * FROM coursecontents WHERE instructor_uid = '$ins_uid'";
                 $query_i = mysqli_query($conn, $sql_i);
                 $rownum = mysqli_num_rows($query_i);
                              echo $rownum; ?></span></a></li>
						  <li><a href="coursewareUpload.php?cupl=cupl">Upload Course Contents</a></li>
						  <li><a href="bookUpload.php?upl=upl">Upload Books</a></li>
                        <?php if(isset($_SESSION['instructor_uid'])) { ?>
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
					<div class="tab-pane active" id="a">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#view" aria-controls="view" role="tab" data-toggle="tab">instructor Detail</a></li>
								</ul>
					
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="view">
									<div class="ed_inner_dashboard_info">
										<h2><?php echo $_SESSION['instructor_first']; ?> &nbsp;<?php echo $_SESSION['instructor_last']; ?>(instructor)</h2>
										<table id="profile_view_settings">
											<thead>
												<tr>
													<th>Name</th>
													<th>Location</th>
													<th>Intro</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><?php echo $_SESSION['instructor_first']; ?> &nbsp;<?php echo $_SESSION['instructor_last']; ?></td>
													<td><?php echo $_SESSION['country']; ?></td>
													<td>I am <?php echo $_SESSION['instructor_first']; ?> &nbsp;<?php echo $_SESSION['instructor_last']; ?>. I am from <?php echo $_SESSION['country']; ?>.</td>
												</tr>												
											</tbody>
										</table>
									</div>
									</div>
								</div>
					
							</div><!--tab End-->
						</div>
					</div>
					<div class="tab-pane" id="b">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#my" aria-controls="my" role="tab" data-toggle="tab">courses</a></li>
								</ul>
					
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="my">
										<div class="ed_inner_dashboard_info">
											<h2 style="padding-bottom:20px; text-align:center">all courses by <?php echo $_SESSION['instructor_first']; ?> &nbsp;<?php echo $_SESSION['instructor_last']; ?></h2>
											<div class="row">
												<div class="ed_mostrecomeded_course_slider">
                                    
            <?php 
                 $sql_i = "SELECT * FROM coursecontents WHERE instructor_uid = '$ins_uid'";
                 $query_i = mysqli_query($conn, $sql_i);
                 $rownum = mysqli_num_rows($query_i);
                                                    
                            for($i = 1; $i <= $rownum; $i++) {
                    $array = mysqli_fetch_array($query_i); ?>
                           
													<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ed_bottompadder20">
														<div class="ed_item_img">
                                                <?php 
        echo "<video poster='".$array["poster_path"]."' style='height:150px'>
        <source src='".$array["video_path"]."'>
        </video>";
?>
														</div>
														<div class="ed_item_description ed_most_recomended_data">
																<h4 style="font-weight: 600px; text-align:center;"><a href="#!" ><?php echo $array['course_title']; ?></a></h4><br />
                                                                <div style="text-align:center; font-weight: 400;" > 
						<a href="edit-course.php?v_id=<?php echo $array['content_id']; ?>" class="ed_getinvolved" style="color: #1A8738">Edit Course <i class="fa fa-long-arrow-right"></i></a> </div>
														</div>
													</div>
                                                    
                            <?php  } ?>
												</div>
											</div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="instructing">
										<div class="ed_inner_dashboard_info">
											<h2>upcoming courses by <?php echo $_SESSION['instructor_first']; ?> &nbsp;<?php echo $_SESSION['instructor_last']; ?></h2>
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
<!--instructor single end-->
<?php include'includes/footer.php'; ?>