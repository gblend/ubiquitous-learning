<?php
include_once'includes/header.php';
?>
<!--Breadcrumb start-->
<div class="ed_pagetitle">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="page_title">
					<h2>Contact Us</h2>
				</div>
			</div>
			<div class="col-lg-6 col-md-8 col-sm-6">
				<ul class="breadcrumb">
					<li><a href="index.php?ho=ho">home</a></li>
					<li><i class="fa fa-chevron-left"></i></li>
					<li><a href="contact.php?con=con">Contact Us</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<!--Section fourteen Contact form start-->
<div class="ed_transprentbg ed_toppadder80 ed_bottompadder80">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ed_heading_top">
					<h3>Send us a message</h3>
				</div>
			</div>
             <div style="margin-top:100px; text-align:center" >
                 <div id="form-messages"></div>
            </div>
            <form id="ajax-contact" action="contactform/forwardmessage.php" method="POST">
			<div class="ed_contact_form ed_toppadder60">
				<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="form-group">
                    <input type="text"  name="u_name" id="uname" class="form-control"  placeholder="Your Name" required>
				</div>
				<div class="form-group">
					<input type="email" name="u_email" id="uemail" class="form-control"  placeholder="Your Email" required>
				</div>
				<div class="form-group">
					<input type="text" name="u_subject" id="sub" class="form-control"  placeholder="Subject" required>
				</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="form-group">
					<textarea id="msg" name="u_message" class="form-control" rows="6" placeholder="Message" required></textarea>
				</div>
				<button  type="submit" name="submit" id="ed_submit" class="btn ed_btn ed_orange pull-right" style="background-color:#006E4D; color:#f0f0f0">send</button>
				<p id="err"></p>
				</div>
			</div>
            </form>
		</div>
	</div>
</div>
<script src="contactform/jquery-2.1.0.min.js"></script>
<script src="contactform/app.js"></script>
<!--Section fourteen Contact form start-->
<!--Section fifteen Contact form start-->
  <div class="ed_event_single_contact_address ed_toppadder70 ed_bottompadder70">
	<div class="container">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ed_heading_top ed_bottompadder70">
					<h3>Contact & Find</h3>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="row">
					<div class="ed_event_single_address_info ed_toppadder50 ed_bottompadder50">
						<h4 class="ed_bottompadder30">contact info</h4>
						<p class="ed_bottompadder40 ed_toppadder10">You can always reach us via following contact details. We will give our best to reach you as possible.</p>
                        <p>Phone: <span>+2348166195490</span></p>
                        <p>Email: <a href="#">info@ulearning.edu@gmail.com</a></p>
                        <p>Website: <a href="#">www.ulearning.com</a></p>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="row">
					<div class="ed_event_single_address_map">
						<div id="map"></div>
					</div>
				</div>
			</div>
	</div>
</div>	
					
<!--Section fifteen Contact form start-->
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