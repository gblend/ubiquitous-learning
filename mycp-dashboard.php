<?php
include'includes/header_mycp.php';
if(isset($_SESSION['dashboard_uid'])) {
include'includes/updateprofile.php';
include'includes/delete.php';
?>
<style type="text/css">
    .table{
     background-color:#002020;
    }
    .table tr{
        border: 2px solid #167AC6;
    }
    .table tr:hover{
        border: 3px solid teal;
    }
    .table thead{
        background-color: teal;
    }
    .table tr td{
        color:white;
        text-align: center;
    }
    .table tr th{
        color: white;
        text-align: center;
    }
    .ed_profile_img img{
        height: 200px;
    }
    .ed_btn{
        background-color: #167AC6;
        color: white;
    }
    .ed_btn:hover{
        background-color: teal;
        color: white;
    }
    .table button:hover{
        background-color: teal;
        color: white;
    }
    .dashboard{
        text-align: center;
    }
    li .admin{
        background-color: #167AC6;
        color: white;
    }
</style>

<!--instructor single start-->
<div class="ed_dashboard_wrapper">
<?php include'includes/updateprofile_error.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="ed_sidebar_wrapper">
					<div class="ed_profile_img">
					<img src="<?php if(isset($_SESSION['dashboard_photo'])) { echo $_SESSION['dashboard_photo']; } ?>" alt="Profile Image" class="img-responsive" />
					</div>
					<h3 style="color:#19A15E; text-align: center"><?php if(isset($_SESSION['dashboard_uid'])) { echo $_SESSION['dashboard_uid']; } ?></h3><br />
					 <div class="ed_tabs_left">
						<ul class="nav nav-tabs">
						  <li class="active"><a href="#a" data-toggle="tab">Admin</a></li>
						  <li><a href="#b" data-toggle="tab">all users</a></li>
						  <li><a href="#c" data-toggle="tab">activities</a></li>
						   <li><a href="#d" data-toggle="tab">profile</a></li>
						  <li><a href="#e" data-toggle="tab">newsletter email</a></li>
                          <?php if(isset($_SESSION['dashboard_uid'])) { ?>
                           <li style="height:42px; padding-left:12px; padding-top:8px"><strong style="color:#006E4D"><?php
                           echo $_SESSION['success'];
                           ?></strong></li>
                           <?php } ?>
                        <?php if(isset($_SESSION['dashboard_uid'])) { ?>
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
									<li role="presentation"><a href="#view" aria-controls="view" role="tab" data-toggle="tab" class="admin">Welcome To Admin Dashboard</a></li>
								</ul>
					
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="view">
									<div class="ed_inner_dashboard_info">
										<h2 class="dashboard">Site Admin</h2>
									</div>
									</div>
								</div>
					
							</div><!--tab End-->
						</div>
					</div>
                    <div class="tab-pane" id="b" style="width: 780px; background-color: #FFFFFF;">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">View Users</a></li>
									<li role="presentation"><a href="#instructors" aria-controls="instructors" role="tab" data-toggle="tab">View Instructors</a></li>
								</ul>
					
								<!-- Tab panes -->
								<div class="tab-content"  style="width: 100%; background-color: #FFFFFF;">
									<div role="tabpanel" class="tab-pane active" id="users">
										<div class="ed_dashboard_inner_tab">
										<h2>all registered users</h2>
<!--                                                                fetched users details-->
                                                    <?php
$page = "";
if(isset($_GET['page'])) {
	$page = $_GET['page'];
}
if($page == "" || $page == "1") {
	$page_start = 0;
} else {
   $page_start = ($page * 15) - 15;  
}
                                                    $sql = "SELECT * FROM users LIMIT $page_start,15";
                                                    $query = $conn->query($sql);
                                                    $row = mysqli_num_rows($query);
                                                               ?>
                                                                 <table class="table">
                                                                    <tr>
                                                                     <thead>
                                                                         <th>id</th>
                                                                         <th>first name</th>
                                                                         <th>last name</th>
                                                                         <th>username</th>
                                                                         <th>email</th>
                                                                         <th>sex</th>
                                                                         <th>photo</th>
                                                                         <th></th>
                                                                     </thead>
                                                                     </tr>
                                                                     <tbody>
                                                                        <?php
                                                                if($query) {
                                                                 for($i = 1; $i <= $row; $i++) { 
                                                                     $data = mysqli_fetch_assoc($query);
                                                                        ?>
                                                                         <tr>
                                                                             <td><?php echo $data['user_id']; ?></td>
                                                                             <td><?php echo $data['user_first']; ?></td>
                                                                             <td><?php echo $data['user_last']; ?></td>
                                                                             <td><?php echo $data['user_uid']; ?></td>
                                                                             <td><?php echo $data['user_email']; ?></td>
                                                                             <td><?php echo $data['user_sex']; ?></td>
                                                                             <td><img src="<?php echo $data['profilephoto']; ?>" style="width:40px; height: 40px; border-radius: 100%;" alt="photo"/></td>
                                                                             <td><div class="form-group">
                         <a  href="mycp-dashboard.php?u_id=<?php echo $data['user_uid']; ?>" class="ed_getinvolved" class="btn ed_btn ed_green"> <button type="Submit" name="delete_user" class="btn ed_btn ed_green">delete? </button></a></div></td>
                                                                         </tr>
                                                                                <?php
                                                            }
                                                                         }
                                                                         ?>
                                                                     </tbody>
                                                                   </table>
										</div>
<?php
$sql1 = "SELECT * FROM users";
$query1 = $conn->query($sql1);
$rowcount = mysqli_num_rows($query1);
$nums = $rowcount/15;
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
<li <?php if($i == $page) { echo 'class="active"';}?> id="pagination"><a href="mycp-dashboard.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?> 
					</ul>
				</nav>
				</div>
			</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="instructors" >
										<div class="ed_dashboard_inner_tab">
										<h2>All registered instructors</h2>
<!--                                                                fetched instructors details-->
                                                    <?php
$page = "";
if(isset($_GET['page'])) {
	$page = $_GET['page'];
}
if($page == "" || $page == "1") {
	$page_start = 0;
} else {
   $page_start = ($page * 15) - 15;  
}
                                                    $sql = "SELECT * FROM instructortable LIMIT $page_start,15";
                                                    $query = $conn->query($sql);
                                                    $row = mysqli_num_rows($query);
                                                               ?>
                                                                 <table class="table">
                                                                    <tr>
                                                                     <thead>
                                                                         <th>id</th>
                                                                         <th>first name</th>
                                                                         <th>last name</th>
                                                                         <th>username</th>
                                                                         <th>email</th>
                                                                         <th>sex</th>
                                                                         <th>photo</th>
                                                                         <th></th>
                                                                     </thead>
                                                                     </tr>
                                                                     <tbody>
                                                                        <?php
                                                                if($query) {
                                                                 for($i = 1; $i <= $row; $i++) { 
                                                                        $data = mysqli_fetch_assoc($query);?>
                                                                         <tr>
                                                                             <td><?php echo $data['instructor_id']; ?></td>
                                                                             <td><?php echo $data['instructor_first']; ?></td>
                                                                             <td><?php echo $data['instructor_last']; ?></td>
                                                                             <td><?php echo $data['instructor_uid']; ?></td>
                                                                             <td><?php echo $data['instructor_email']; ?></td>
                                                                             <td><?php echo $data['sex']; ?></td>
                                                                             <td><img src="<?php echo $data['i_profilephoto']; ?>" style="width:40px; height: 40px; border-radius: 100%;" alt="photo"/></td>
                                                                             <td><div class="form-group">
                       <a  href="mycp-dashboard.php?i_id=<?php echo $data['instructor_id']; ?>" class="ed_getinvolved" class="btn ed_btn ed_green">
                         <button type="Submit" name="delete_user"  data-id='<?php echo $data['instructor_id']; ?>' class="btn ed_btn ed_green clickremove">
                        delete?
                       </button></a>
                       </div></td>
                                                                         </tr>
                                                                                <?php
                                                            }
                                                                                } ?>
                                                                     </tbody>
                                                                   </table> 
										</div>
<?php
$sql1 = "SELECT * FROM instructortable";
$query1 = $conn->query($sql1);
$rowcount = mysqli_num_rows($query1);
$nums = $rowcount/15;
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
<li <?php if($i == $page) { echo 'class="active"';}?> id="pagination"><a href="mycp-dashboard.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?> 
					</ul>
				</nav>
				</div>
			</div>
									</div>
								</div>
					
							</div><!--tab End-->
						</div>
					</div>

					<div class="tab-pane" id="c" style="width: 750px; background-color: #FFFFFF;">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#courses" aria-controls="courses" role="tab" data-toggle="tab">All Courses</a></li>
									<li role="presentation"><a href="#books" aria-controls="books" role="tab" data-toggle="tab">All books</a></li>
									<li role="presentation"><a href="#posts" aria-controls="posts" role="tab" data-toggle="tab">All blog posts</a></li>
								</ul>
					
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="courses">
									<div class="ed_inner_dashboard_info">
										<div class="ed_course_single_info">
<?php
$page = "";
if(isset($_GET['page'])) {
	$page = $_GET['page'];
}
if($page == "" || $page == "1") {
	$page_start = 0;
} else {
   $page_start = ($page * 10) - 10;  
}	 
                                                    $sql = "SELECT * FROM coursecontents LIMIT $page_start,10";
                                                    $query = $conn->query($sql);
                                                    $row = mysqli_num_rows($query);
                                                               ?>
                                                                 <table class="table">
                                                                    <tr>
                                                                     <thead>
                                                                         <th>id</th>
                                                                         <th>course title</th>
                                                                         <th>course duration</th>
                                                                         <th>uploaded by</th>
                                                                         <th>date uploaded</th>
                                                                         <th>video poster</th>
                                                                         <th></th>
                                                                     </thead>
                                                                     </tr>
                                                                     <tbody>
                                                                        <?php
                                                                if($query) {
                                                                 for($i = 1; $i <= $row; $i++) { 
                                                                        $data = mysqli_fetch_assoc($query);?>
                                                                         <tr>
                                                                             <td><?php echo $data['content_id']; ?></td>
                                                                             <td><?php echo $data['course_title']; ?></td>
                                                                             <td><?php echo $data['course_duration']; ?> hrs</td>
                                                                             <td><?php echo $data['instructor_uid']; ?></td>
                                                                             <td><?php echo $data['upload_date']; ?></td>
                                                                             <td><img src="<?php echo $data['poster_path']; ?>" style="width:40px; height: 40px;" alt="photo"/></td>
                                                                             <td><div class="form-group">
                        
                        <a  href="mycp-dashboard.php?c_id=<?php echo $data['content_id']; ?>" class="ed_getinvolved" class="btn ed_btn ed_green" ><button type="submit" name="delete_user" class="btn ed_btn ed_green">delete?
                       </button></a>
                       </div></td>
                                                                         </tr>
                                                                                <?php
                                                            }
                                                                                } ?>
                                                                     </tbody>
                                                                   </table> 
										</div>
									</div>
<?php
$sql1 = "SELECT * FROM coursecontents";
$query1 = $conn->query($sql1);
$rowcount = mysqli_num_rows($query1);
$nums = $rowcount/10;
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
<li <?php if($i == $page) { echo 'class="active"';}?> id="pagination"><a href="mycp-dashboard.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?> 
					</ul>
				</nav>
				</div>
			</div>  
									</div>
									<div role="tabpanel" class="tab-pane" id="books">
									<div class="ed_inner_dashboard_info">
									<div  class="ed_course_single_info">
									  <?php
$page = "";
if(isset($_GET['page'])) {
	$page = $_GET['page'];
}
if($page == "" || $page == "1") {
	$page_start = 0;
} else {
   $page_start = ($page * 15) - 15;  
}
                                                    $sql = "SELECT * FROM bookcontents LIMIT $page_start,15";
                                                    $query = $conn->query($sql);
                                                    $row = mysqli_num_rows($query);
                                                               ?>
                                                                 <table class="table">
                                                                    <tr>
                                                                     <thead>
                                                                         <th>id</th>
                                                                         <th>book title</th>
                                                                         <th>book author</th>
                                                                         <th>uploaded by</th>
                                                                         <th>date uploaded</th>
                                                                         <th>book poster</th>
                                                                         <th></th>
                                                                     </thead>
                                                                     </tr>
                                                                     <tbody>
                                                                        <?php
                                                                if($query) {
                                                                 for($i = 1; $i <= $row; $i++) { 
                                                                        $data = mysqli_fetch_assoc($query);?>
                                                                         <tr>
                                                                             <td><?php echo $data['book_id']; ?></td>
                                                                             <td><?php echo $data['book_title']; ?></td>
                                                                             <td><?php echo $data['book_author']; ?></td>
                                                                             <td><?php echo $data['instructor_uid']; ?></td>
                                                                             <td><?php echo $data['date_created']; ?></td>
                                                                             <td><img src="<?php echo $data['bookcover']; ?>" style="width:40px; height: 40px;" alt="photo"/></td>
                                                                             <td><div class="form-group">
                        <a  href="mycp-dashboard.php?b_id=<?php echo $data['book_id']; ?>" class="ed_getinvolved" class="btn ed_btn ed_green" ><button type="submit" name="delete_user" class="btn ed_btn">delete?
                       </button></a>
                       </div></td>
                                                                         </tr>
                                                                                <?php
                                                            }
                                                                                } ?>
                                                                     </tbody>
                                                                   </table>
									</div>
									</div>
<?php
$sql1 = "SELECT * FROM bookcontents";
$query1 = $conn->query($sql1);
$rowcount = mysqli_num_rows($query1);
$nums = $rowcount/15;
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
<li <?php if($i == $page) { echo 'class="active"';}?> id="pagination"><a href="mycp-dashboard.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?> 
					</ul>
				</nav>
				</div>
			</div>  
									</div>
									<div role="tabpanel" class="tab-pane" id="posts">
									<div class="ed_inner_dashboard_info">
																		<div  class="ed_course_single_info">
									  <?php
                                                                            
$page = "";
if(isset($_GET['page'])) {
	$page = $_GET['page'];
}
if($page == "" || $page == "1") {
	$page_start = 0;
} else {
   $page_start = ($page * 15) - 15;  
}
                                                    $sql = "SELECT * FROM blogpost LIMIT $page_start,15";
                                                    $query = $conn->query($sql);
                                                    $row = mysqli_num_rows($query);
                                                               ?>
                                                                 <table class="table">
                                                                    <tr>
                                                                     <thead>
                                                                         <th>id</th>
                                                                         <th>poster name</th>
                                                                         <th>post reference</th>
                                                                         <th>date posted</th>
                                                                         <th>poster photo</th>
                                                                         <th></th>
                                                                     </thead>
                                                                     </tr>
                                                                     <tbody>
                                                                        <?php
                                                                if($query) {
                                                                 for($i = 1; $i <= $row; $i++) { 
                                                                        $data = mysqli_fetch_assoc($query);?>
                                                                         <tr>
                                                                             <td><?php echo $data['poster_id']; ?></td>
                                                                             <td><?php echo $data['bloguser_uid']; ?></td>
                                                                             <td><?php echo $data['poster_subject']; ?></td>
                                                                             <td><?php echo $data['post_date']; ?></td>
                                                                             <td><img src="<?php echo $data['poster_photo']; ?>" style="width:40px; height: 40px;" alt="photo" /></td>
                                                                             <td><div class="form-group">
                        <a  href="mycp-dashboard.php?p_id=<?php echo $data['poster_id']; ?>" class="ed_getinvolved" class="btn ed_btn ed_green" ><button type="submit" name="delete_user" class="btn ed_btn">delete?
                            </button></a>
                       </div></td>
                                                                         </tr>
                                                                                <?php
                                                            }
                                                                                } ?>
                                                                     </tbody>
                                                                   </table>
									</div>
									</div>
<?php
$sql1 = "SELECT * FROM blogpost";
$query1 = $conn->query($sql1);
$rowcount = mysqli_num_rows($query1);
$nums = $rowcount/15;
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
<li <?php if($i == $page) { echo 'class="active"';}?> id="pagination"><a href="mycp-dashboard.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?> 
					</ul>
				</nav>
				</div>
			</div> 
									</div>
								</div>
					
							</div><!--tab End-->
						</div>
					</div>
				<div class="tab-pane" id="d">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#change" aria-controls="change" role="tab" data-toggle="tab">change profile photo</a></li>
								</ul>
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="change">
										<div class="ed_dashboard_inner_tab">
											<h2>change photo</h2>
											<form id="profileimage"  method="post" action="mycp-dashboard.php" class="ed_tabpersonal" enctype="multipart/form-data">
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
								</div>
					
							</div><!--tab End-->
						</div>
					</div>
				<div class="tab-pane" id="e">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#newsletter" aria-controls="newsletter" role="tab" data-toggle="tab">all newsletter email</a></li>
								</ul>
					
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="newsletter">
										<div class="ed_dashboard_inner_tab">
                                       									  <?php
                                                                                
$page = "";
if(isset($_GET['page'])) {
	$page = $_GET['page'];
}
if($page == "" || $page == "1") {
	$page_start = 0;
} else {
   $page_start = ($page * 15) - 15;  
}   
                                                 $sql = "SELECT * FROM newsletteremail LIMIT $page_start,15";
                                                    $query = $conn->query($sql);
                                                    $row = mysqli_num_rows($query);
                                                               ?>
                                                                 <table class="table">
                                                                    <tr>
                                                                     <thead>
                                                                         <th>id</th>
                                                                         <th>newsletter email</th>
                                                                         <th></th>
                                                                     </thead>
                                                                     </tr>
                                                                     <tbody>
                                                                        <?php
                                                                if($query) {
                                                                 for($i = 1; $i <= $row; $i++) { 
                                                                        $data = mysqli_fetch_assoc($query);?>
                                                                         <tr>
                                                                             <td><?php echo $data['newsletter_id']; ?></td>
                                                                             <td><?php echo $data['user_email']; ?></td>
                                                                             <td><div class="form-group">
                        
                        <a  href="mycp-dashboard.php?n_id=<?php echo $data['newsletter_id']; ?>" class="ed_getinvolved" class="btn ed_btn ed_green"><button type="submit" name="delete_user" class="btn ed_btn ed_green">delete?
                       </button></a>
                       </div></td>
                                                                         </tr>
                                                                                <?php
                                                            }
                                                                                } ?>
                                                                     </tbody>
                                                                   </table>
										</div>
<?php
$sql1 = "SELECT * FROM newsletteremail";
$query1 = $conn->query($sql1);
$rowcount = mysqli_num_rows($query1);
$nums = $rowcount/15;
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
<li <?php if($i == $page) { echo 'class="active"';}?> id="pagination"><a href="mycp-dashboard.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?> 
					</ul>
				</nav>
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
	</div>
</div>
</div>
<!--instructor single end-->

<?php include'includes/footer.php';
} else {
    header("Location:not-found.php");
}
?>