<?php include_once'includes/header.php';
?>

<!--Breadcrumb start-->
<div class="ed_pagetitle">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="page_title">
					<h2>About Ulearning</h2>
				</div>
			</div>
			<div class="col-lg-6 col-md-8 col-sm-6">
				<ul class="breadcrumb">
					<li><a href="index.php?ho=ho">Home</a></li>
					<li><i class="fa fa-chevron-left"></i></li>
					<li><a href="about.php?ab=ab">About Ulearning</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<!--chart section start -->
<div class="ed_graysection ed_toppadder90 ed_bottompadder90">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ed_heading_top ed_bottompadder50">
					<h3>Who We Are</h3>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ed_counter_wrapper">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="ed_chart_ratio">
							<i class="fa fa-line-chart"></i><p>For more than a decade, the ULearning.com program has helped millions around the world learn the essential skills they need to live and work in the 21st century. Ulearning.com offers more than 180 topics, including more than 2,000 lessons, 800+ videos, and 55+ interactives and games, completely free.</p> 
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="ed_chart_ratio">
							<i class="fa fa-sliders"></i>
							<h4>Learn&nbsp;anywhere,&nbsp;anytime.</h4> 
							<p>Our classroom is open 24 hours a day and serves people from around the world. Join the 60 million people from all walks of life who have come to the site to learn the essential skills they need to live and work in the 21st century. All you need is an Internet connection.</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="ed_chart_ratio">
							<i class="fa fa-folder-open-o"></i>
							<h4>Always&nbsp;here.&nbsp;Always&nbsp;growing.</h4> 
							<p>Online education isn’t new. We’ve been here for more than 10 years, and today we offer more tutorials than ever. When you take a class with us, you know it’s up to date—and that it will be available later when you need to review.</p>
						</div>
					</div>
				</div>
			</div>
        </div>
	</div>
</div>
<!-- chart Section end -->

<!--counter section start -->
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
							<h4>Students equipped</h4>
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
							<p>Learn how you setup your classroom, impact how students think...</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--counter section end -->
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