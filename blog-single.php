
<?php 
include_once'includes/header.php';
include'includes/blog-post.php';
?>

<!--Breadcrumb start-->
<div class="ed_pagetitle">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="page_title">
					<h2>Blog Post</h2>
				</div>
			</div>
			<div class="col-lg-6 col-md-8 col-sm-6">
				<ul class="breadcrumb">
					<li><a href="index.php?ho=ho">home</a></li>
					<li><i class="fa fa-chevron-left"></i></li>
					<li><a href="blog-single.php?bl=bl">Ulearning blog</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<!--Blog content start-->
<div class="ed_transprentbg ed_toppadder80 ed_bottompadder80" style="margin-left:auto; margin-right:auto; padding-left:60px; with:100%;">
	<div class="container">
		<div class="row" >
			<div class="col-lg-9 col-md-9 col-sm-9" >
				<div class="ed_blog_all_item" >
					<div class="ed_blog_item ed_bottompadder50">
						<div class="ed_blog_image" style="padding-bottom: 20px;">
							<img src="images/blog/blog_1.1.jpg" alt="blog image" />
						</div>
					<div class="ed_blog_info">
						<blockquote>
						Technology is revolutionizing the world of education – replacing familiar classroom tools and changing the way we learn. Ulearning explores the future of learning in all its dimensions – covering cultural and technology trends, groundbreaking research, education policy and more.
						</blockquote>
						<p>The purpose of an education is to maximize individual talents for the good of democracy, citizenship and social cohesion. Schools and colleges must empower citizens and potential citizens with the ability to think critically, engage in the democratic processes and behave in a civic fashion, knowing that our fates in democracy are intertwined. .Educational leaders must take responsibility for instilling basic civic practices and virtues in their students immediately, or they may lose the option to autocrats who have other ideas on how to run a country.</p>
					</div>
					</div>
					<!--Quotation start-->
					<div class="ed_quotation">
						<div class="col-lg-12 col-md-12 col-sm-12">
				<h4>You should also read:<span>“We are the latest evolution in ubiquitous learning.”</span></h4>
						</div>
					</div>
					<!--Quotation end-->
					<!--Comments section start-->
					<div class="ed_blog_comment_wrapper">
						<h4>All Comments</h4>
						<div class="ed_blog_comment ed_toppadder30">
							<div class="ed_comment_image"> <img src="images/blog/Bloger_1.1.jpg" alt="" /> </div>
							<div class="ed_comment_text">
								<h5>Obi Collins <span>November 27, 2017</span></h5>
								 <blockquote style="border-left:5px solid #006E4D">The Dangers of Social Media to Your Security</blockquote>
                                <p>Social media has become a part of everyday life, but precautions must be made to make sure data and personal security aren’t compromised. Learn what you can do to stay safe while staying connected. If education researchers hope to see more of their findings influence everyday learning and instruction—and they desperately do—then their... </p>
							</div>
						</div>
						</div>
						<div class="ed_blog_comment ed_toppadder30">
							<div class="ed_comment_image"> <img src="images/blog/Bloger_2.2.jpg" alt="" /> </div>
							<div class="ed_comment_text">
								<h5> Nicole  <span>November 28, 2017</span></h5>
                                <blockquote style="border-left:5px solid #006E4D">Your worst nightmare; An employee with network access and an ax to grind</blockquote>
								<p>The news media focuses on external attacks such as malicious email attachments and ransomware as the only attack vector, but internal threats remain one of the most common cybersecurity issues facing any organization. Learn how to protect your company against all threats, internal and external, to avoid putting your employee’s and customer’s data at risk because you think you know someone.</p>
							</div>
						</div>
						<div class="ed_blog_comment ed_toppadder30">
							<div class="ed_comment_image"> <img src="images/blog/Bloger_3.3.jpg" alt="" /> </div>
							<div class="ed_comment_text">
								<h5>Mc Bright <span>December 25, 2017</span></h5>
                                <blockquote style="border-left:5px solid #006E4D">Game of Clouds</blockquote>
								<p>The battle for control of the cloud computing market plays out every day between many players, some well-known, others up and coming. Industry veterans have been upended by rising upstarts and will be again. There are the beloved and the reviled, new capabilities emerge, but new threats appear as well. Bad actors threaten the security of the common folk and nothing is certain or permanent. Nothing sums this struggle up for us like the epic battle for dominance and control that is the Game of Thrones. Welcome to the Westeros of IT. Who’s who in the Game of Clouds?</p>
							</div>
						</div>
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
                    $sql_blog = "SELECT * FROM blogpost LIMIT $page_start,15";
                    $query_blog = mysqli_query($conn, $sql_blog);
                     $row_blog = mysqli_num_rows($query_blog);
                    if($query_blog) {
                        for($i = 1; $i <= $row_blog; $i++) {
                        $blog_array = mysqli_fetch_assoc($query_blog);
                        ?>    
                  
						<div class="ed_blog_comment ed_toppadder30">
							<div class="ed_comment_image"> <img src="<?php echo $blog_array['poster_photo']; ?>" alt="" /> </div>
							<div class="ed_comment_text">
								<h5> &nbsp;<?php echo $blog_array['bloguser_uid']; ?><br /><span><?php echo $blog_array['post_date']; ?></span></h5><br />
                                <blockquote style="border-left:5px solid #006E4D">&nbsp;<?php echo $blog_array['poster_subject']; ?></blockquote>
								<p><?php echo $blog_array['post']; ?></p>
							</div>
						</div>
						<?php       
                        }
                    } ?>
					</div><br /><br />
					<!--Comments section end--> 
					<!--Comments Form start-->
					<div class="ed_blog_message_wrapper" style="padding-top: 40px;">
					<?php
$sql1 = "SELECT * FROM blogpost";
$query1 = $conn->query($sql1);
$rowcount = mysqli_num_rows($query1);
$nums = $rowcount/15;
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
<li <?php if($i == $page) { echo 'class="active"';}?> id="pagination"><a href="blog-single.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?> 
					</ul>
				</nav>
				</div>
			</div>        
						<h4 style="padding-top: 20px;">Post Comment</h4>
						<div class="ed_blog_messages ed_toppadder30">
							<div class="row">
								<form method="post" action="blog-single.php">
								<?php include'includes/blogpost_msg.php'; ?> <br  /><br />
									<div class="form-group">
										<div class="col-lg-4">
											<input type="text" class="form-control" name="poster_subject" placeholder="Subject/Reference" required/>
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-4">
											<input type="email" class="form-control" name="poster_email" placeholder="Your Email" required/>
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-12">
											<textarea class="form-control" rows="5" name="poster_message" placeholder="Your Message" required></textarea>
										</div>
									</div>
								    <div class="form-group">
										<div class="col-lg-12" hidden="hidden">
										<label for="poster_check" class="control-label">leave this field blank</label>
											<textarea class="form-control" rows="5" name="poster_check"></textarea>
										</div>
									</div>
								
								<?php
                                    if(isset($_SESSION['user_uid']) || isset($_SESSION['instructor_uid'])) {
                                        echo '
                                        <style>
                                                #ed_submit:hover{
                                                 background-color:#006E4D; 
                                                color:#f0f0f0;
                                                }
                                                #ed_submit{
                                                color: #f0f0f0;
                                                background-color: #000;
                                                text-align: center;
                                                }
                                                .form-group{
                                                text-align: center;
                                                }
                                        </style>
									<div class="form-group">
										<div class="col-lg-12">
											<button  type="submit" name="submit_post" id="ed_submit" class="btn ed_btn ed_orange pull-right" >Post</button>
										</div>
									</div> ';
                                   }
                                    ?>             
								</form>
								
                            </div><br />
                            <?php  if(!isset($_SESSION['user_uid']) && !isset($_SESSION['instructor_uid'])) { 
                            echo '<style>
                            .form-group{
                            text-align: center
                            }
                            #ed_submit{
                             background-color:#006E4D;
                             border:2px solid #8FA83B;
                             color:white;
                             border-radius:5px;
                             height: 40px;
                            }
                            </style>
                            <form method="post" action="loginpage.php">
                                <div class="form-group ">
                                <button type="submit" name="userSignin" id="ed_submit">You have to login to enable you to post</button>
                                </div>
                                </form>
                                '; }
                            ?>
						</div>
					</div>
				<!--Comments Form end-->
				</div>       
			</div>
		</div>
	</div>  
<!--Blog content end-->
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