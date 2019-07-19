<?php 
include"dbconnect.php";
session_start();
include'includes/userlogin.php';
include'includes/instructorlogin.php';
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
    <script type="text/javascript">
          
            var instructorButton=document.getElementById('instructorButton') ;
            var loginButton=document.getElementById('loginButton');
            var instructor = document.getElementById('instructor');
            var login = document.getElementById('login');
        
        
            instructorButton.addEventListener('click', function() {
                instructor.style.display='block';
            });
        
             loginButton.addEventListener('click', function() {
              login.style.display='none';
            });
        
            function displayLogin () {
                 document.getElementById('login').style.display='block';
                 document.getElementById('instructor').style.display='none';
            }
            
            function displayInstructor () {
                 document.getElementById('instructor').style.display='block';
                document.getElementById('login').style.display='none';
            }
            function removeInstructor () {
                 document.getElementById('instructorButton').style.display='none';
                document.getElementById('loginButton').style.display='block';
            }
        function removeLogin () {
                 document.getElementById('instructorButton').style.display='block';
                document.getElementById('loginButton').style.display='none';
            }
            
            //preloader function start
            function myFunction() {
                myVar = setTimeout(showPage, 1);
            }
            
            function showPage() {
                document.getElementById("loader").style.display = "none";
                document.getElementById("myDiv").style.display = "block";
            }
        //preloader function ends
    </script>
    
          <style type="text/css">
          #loader{
              border: 16px solid #167AC6;
              border-top: 16px solid #00FFFF;
              border-radius: 50%;
              border-bottom: 16px solid #006E4D;
              border-right: 16px solid #B77FBD;
              width:100px;
              height:100px;
              animation-direction: alternate;
              position: absolute;
              left: 45%;
              top: 40%;
              z-index: 999;
              animation: spin 0.9s linear infinite;
              -webkit-animation: spin 0.4s ease infinite;
          }
          @-webkit-keyframes spin{
              0%{
                  transform: rotate(0deg);
              }
              100%{
                  transform: rotate(360deg);
              }
          }
          @keyframes spin{
              0%{
                  transform: rotate(0deg);
              }
              100%{
                  transform: rotate(360deg);
              }
          }
          #myDiv{
              display: none;
          }
              #instructor {
                  display: none;
              }
              #login{
/*  displayed*/
              }
      </style>
    
</head>
<body onload="myFunction()">
<!--Page main section start-->

<div id="educo_wrapper" >
<!--Header start-->
<header id="ed_header_wrapper">
	<div class="ed_header_top">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="welcome_info"><p>welcome to the latest evolution in learning</p></div>
					<div class="ed_info_wrapper">
						<?php if(isset($_SESSION['instructor_uid'])) { echo "<a href='#' id='login_button' style='background-color:#006E4D;'><img src='".$_SESSION['instructor_photo']."' style='width:35px; height:32px; border-radius:50%' /></a>"; } elseif (isset($_SESSION['user_uid'])) {
    echo "<a href='#' id='login_button' style='background-color:#006E4D; color:white'><img src='".$_SESSION['user_photo']."' style='width:35px; height:32px; border-radius:50%' alt='logged in'/></a>";
} else { echo  '<a href="#" id="login_button" style="background-color:#FFFFFF;">Login|Register </a>';} ?>
							<div id="login_one" class="ed_login_form">

                        <?php 
                                    if(isset($_SESSION['instructor_uid']) || isset($_SESSION['user_uid'])) {
                                    echo '
                                    <form action="includes/logout.php" method="POST">
                                    <button type="submit" name="logout">Logout</button>
                                    </form>'; 
                                     } else {
                                     echo '<form action="loginpage.php?lo=lo" method="POST">
                                         <div id="login" style="margin-top:1px">
                                            <h3>user</h3>
                                            <div class="form-group" style="margin-top:34px">
										    <button type="submit" name="userSignin">sign in</button>
                                            <a href="signupform.php?sig=sig">registration</a>	
									        </div>
                                            <div class="form-group" style="text-align:center; margin-top:27px; margin-bottom:-10px; padding-bottom:18px">
                                           <a href="#" id="instructorButton" onclick="displayInstructor(); removeInstructor()">Instructor?</a>
                                           </div>
                                           </div>
                                           </form>
                                    
                                    <form action="loginpage.php?lo=lo" method="POST">
                                    <div id="instructor" style="margin-top:-23px; padding-bottom:15px">
                                            <h3 style="padding-top:21px">instructor</h3> ?>
                                            <div class="form-group" style="margin-top:5px">
										    <button type="submit" name="iSignin">sign in</button>
                                            <a href="become-instructor.php?be=be">registration</a>	
									        </div>
                                     <div class="form-group" style="text-align:center; margin-top:29px; margin-bottom:-28px">
								     <a href="#" onclick="displayLogin(); removeLogin()" id="loginButton" >user?</a> <br />
                                     </div>
                                     </div>
                                     </form>';
                               }
                                ?> 
                           
							
							</div>
					</div>
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
									<?php if(isset($_SESSION['instructor_uid'])) { 
                                    echo "<li style='font-weight: lighter'><a href='instructor-dashboard.php?my=my'>my dashboard</a></li>";
                                      } ?>
                                    <?php if(isset($_SESSION['user_uid'])) {
									echo "<li style='font-weight: lighter'><a href='dashboard.php?my=my'>my dashboard</a></li>";
                                    } ?>
									<li style="font-weight: lighter"><a href="become-instructor.php?be=be"><?php if(!isset($_SESSION['user_uid']) && !isset($_SESSION['instructor_uid'])) { echo 'Become instructor'; } ?></a></li>
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