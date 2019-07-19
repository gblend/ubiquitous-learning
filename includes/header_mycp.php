<?php 
include"dbconnect.php";
session_start();
?>
<!DOCTYPE html>
<head>  
<meta charset="utf-8" />
<?php 
     $pagetitle = $meta = $meta0 = $meta1 = $meta2 = $meta3 = ''; 
    if(isset($_GET['bl']) == "bl") {
    $pagetitle = "ulearning blog";
    $meta = "<meta content='width=device-width, initial-scale=1.0' name='viewport' />";
    $meta0 = "<meta name='description'  content='blog, uniquelearning, ulearning'/>";
    $meta1 = "<meta name='keywords' content='blog, blog post, post, ulearning-blog' />";
    $meta2 = "<meta name='author'  content='education'/>";
    $meta3 = "<meta name='MobileOptimized' content='320' />";
} else  if (isset($_GET['co']) == "co") {
    $pagetitle = "ulearning courses";
    $meta = "<meta content='width=device-width, initial-scale=1.0' name='viewport' />";
    $meta0 = "<meta name='description'  content='video courses, courses'/>";
    $meta1 = "<meta name='keywords' content='tutorial videos, tutorial courses, courses, video courses, educational videos, ubiquitous videos' />";
    $meta2 = "<meta name='author'  content='education'/>";
    $meta3 = "<meta name='MobileOptimized' content='320' />";
}
    else  if (isset($_GET['bo']) == "bo") {
    $pagetitle = "ulearning books";
    $meta = "<meta content='width=device-width, initial-scale=1.0' name='viewport' />";
    $meta0 = "<meta name='description'  content='books, ebooks'/>";
    $meta1 = "<meta name='keywords' content='tutorial books, tutorial pdf, books, ebooks, educational books' />";
    $meta2 = "<meta name='author'  content='education'/>";
    $meta3 = "<meta name='MobileOptimized' content='320' />";
}
    else  if (isset($_GET['al']) == "al") {
    $pagetitle = "ulearning instructors";
    $meta = "<meta content='width=device-width, initial-scale=1.0' name='viewport' />";
    $meta0 = "<meta name='description'  content='instructors, tutors'/>";
    $meta1 = "<meta name='keywords' content='instructors, teachers, tutors, ulearning instructors, education instructors, ubiquitous tutors' />";
    $meta2 = "<meta name='author'  content='education'/>";
    $meta3 = "<meta name='MobileOptimized' content='320' />";
}
    else  if (isset($_GET['my']) == "my") {
    $pagetitle = "my dashboard";
    $meta = "<meta content='width=device-width, initial-scale=1.0' name='viewport' />";
    $meta0 = "<meta name='description'  content='dashboard, profile'/>";
    $meta1 = "<meta name='keywords' content='my dashboard, dashboard, my profile, my page' />";
    $meta2 = "<meta name='author'  content='education'/>";
    $meta3 = "<meta name='MobileOptimized' content='320' />";
}
    else  if (isset($_GET['be']) == "be") {
    $pagetitle = "become instructor";
    $meta = "<meta content='width=device-width, initial-scale=1.0' name='viewport' />";
    $meta0 = "<meta name='description'  content='become instructor, register as instructor'/>";
    $meta1 = "<meta name='keywords' content='become instructor, register as instructor, become a teacher, become a tutor' />";
    $meta2 = "<meta name='author'  content='education'/>";
    $meta3 = "<meta name='MobileOptimized' content='320' />";
}
    else  if (isset($_GET['ab']) == "ab") {
    $pagetitle = "about";
    $meta = "<meta content='width=device-width, initial-scale=1.0' name='viewport' />";
    $meta0 = "<meta name='description'  content='about, info'/>";
    $meta1 = "<meta name='keywords' content='about, about ulearning, u-learning info' />";
    $meta2 = "<meta name='author'  content='education'/>";
    $meta3 = "<meta name='MobileOptimized' content='320' />";
} else  if (isset($_GET['con']) == "con") {
    $pagetitle = "contact";
    $meta = "<meta content='width=device-width, initial-scale=1.0' name='viewport' />";
    $meta0 = "<meta name='description'  content='contact ulearning'/>";
    $meta1 = "<meta name='keywords' contact us, contact ulearning' />";
    $meta2 = "<meta name='author'  content='education'/>";
    $meta3 = "<meta name='MobileOptimized' content='320' />";
}
    else  if (isset($_GET['si']) == "si") {
    $pagetitle = "course details";
    $meta = "<meta content='width=device-width, initial-scale=1.0' name='viewport' />";
    $meta0 = "<meta name='description'  content='course details, detail'/>";
    $meta1 = "<meta name='keywords' about course, course details, course info, details' />";
    $meta2 = "<meta name='author'  content='education'/>";
    $meta3 = "<meta name='MobileOptimized' content='320' />";
}
    else  if (isset($_GET['pr']) == "pr") {
    $pagetitle = "privacy policy";
    $meta = "<meta content='width=device-width, initial-scale=1.0' name='viewport' />";
    $meta0 = "<meta name='description'  content='privacy policy'/>";
    $meta1 = "<meta name='keywords'our policy, ulearning policy, private policy' />";
    $meta2 = "<meta name='author'  content='education'/>";
    $meta3 = "<meta name='MobileOptimized' content='320' />";
} 
    else  if (isset($_GET['sig']) == "sig") {
    $pagetitle = "sign up";
    $meta = "<meta content='width=device-width, initial-scale=1.0' name='viewport' />";
    $meta0 = "<meta name='description'  content='sign up, sign up form, registeration'/>";
    $meta1 = "<meta name='keywords' contact us, contact ulearning' />";
    $meta2 = "<meta name='author'  content='education'/>";
    $meta3 = "<meta name='MobileOptimized' content='320' />";
}
    else  if (isset($_GET['upl']) == "upl") {
    $pagetitle = "books upload";
    $meta = "<meta content='width=device-width, initial-scale=1.0' name='viewport' />";
    $meta0 = "<meta name='description'  content='books upload'/>";
    $meta1 = "<meta name='keywords'upload books, book upload, upload pdf' />";
    $meta2 = "<meta name='author'  content='education'/>";
    $meta3 = "<meta name='MobileOptimized' content='320' />";
} 
    else  if (isset($_GET['cupl']) == "cupl") {
    $pagetitle = "video upload";
    $meta = "<meta content='width=device-width, initial-scale=1.0' name='viewport' />";
    $meta0 = "<meta name='description'  content='video upload'/>";
    $meta1 = "<meta name='keywords'update videos, upload videos, populate videos' />";
    $meta2 = "<meta name='author'  content='education'/>";
    $meta3 = "<meta name='MobileOptimized' content='320' />";
} 
    else  if (isset($_GET['lo']) == "lo") {
    $pagetitle = "login";
    $meta = "<meta content='width=device-width, initial-scale=1.0' name='viewport' />";
    $meta0 = "<meta name='description'  content='login'/>";
    $meta1 = "<meta name='keywords'login, account login, sign in, account sign in' />";
    $meta2 = "<meta name='author'  content='education'/>";
    $meta3 = "<meta name='MobileOptimized' content='320' />";
} else {
    $pagetitle = "uniquelearning.com";
    $meta = "<meta content='width=device-width, initial-scale=1.0' name='viewport' />";
    $meta0 = "<meta name='description'  content='uniquelearning, ulearning'/>";
    $meta1 = "<meta name='keywords' content='ulearning, u-learning, unique learning, ubiquitous learning, learning,  html content' />";
    $meta2 = "<meta name='author'  content='education'/>";
    $meta3 = "<meta name='MobileOptimized' content='320' />";
} ?>
<?php echo '<title> '."$pagetitle".' </title>
'."$meta".'
'."$meta0".'
'."$meta1".'
'."$meta2".'
'."$meta3".'
';
    ?>
<!--contactform response message styling css-->
<link rel="stylesheet" href="contactform/style.css">


<link href="css/main.css" rel="stylesheet" type="text/css"/>

<!-- favicon links -->
<link rel="shortcut icon" type="image/png" href="images/header/favicon.png" />
</head>
<body>
<!--Page main section start-->

<div id="educo_wrapper" >
<!--Header start-->
<header id="ed_header_wrapper">
	<div class="ed_header_top">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="welcome_info"><p>welcome to the latest evolution in learning</p></div>
				</div>
			</div>
		</div>
	</div>
	<div class="ed_header_bottom">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-2">
					<div class="educo_logo"> <a href="index.php?ho=ho"><img src="images/header/Logo.png" alt="logo" /></a> </div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8">
					<div class="edoco_menu_toggle navbar-toggle" data-toggle="collapse" data-target="#ed_menu">Menu <i class="fa fa-bars"></i>
					</div>
					<div class="edoco_menu">
						<ul class="collapse navbar-collapse" id="ed_menu">
							<li><a href="index.php?ho=ho">Home</a>
							</li>
							<li><a href="blog-single.php?bl=bl">blog</a>
							</li>
							<li><a href="courses.php?co=co">courses</a></li>
                            <li><a href="#">Pages</a>
								<ul class="sub-menu" >
									<li style="font-weight: lighter"><a href="books.php?bo=bo">Books</a></li>
									<li style="font-weight: lighter"><a href="instructor.php?al=al">all instructor</a></li>
									<li style="font-weight: lighter"><a href="mycp-dashboard.php">dashboard</a></li>
								</ul>
							</li>
                            <li><a href="about.php?ab=ab">about us</a></li>
							<li><a href="contact.php?con=con">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2">
					<div class="educo_call"><i class="fa fa-phone"></i><a href="#">+2348166195490</a></div>
				</div>
			</div>
		</div>
    </div>
</header>
<!--header end -->