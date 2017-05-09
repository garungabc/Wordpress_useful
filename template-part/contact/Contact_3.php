<?php
/*
Template Name: Contact 3
*/
get_header();
?>

<style type="text/css">
	#contact-us {
	    /*font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;*/
	    font-size: 14px;
	    line-height: 1.42857143;
	    margin-top: 50px;
	    margin-bottom: 50px;
	    overflow: auto;
	    font-family: proximanova;
	}
	#contact-us .form{
		margin-top: 20px;
	}
	#contact-us p{
	    font-family: proximanova-light;
	}

	#contact-us .content {
		color: #333;
	}

	#contact-us .content p{
	    text-align: center;
	}

	#contact-us .contact {
		color: #333;
	}

	#contact-us .contact h3{
		font-size: 24px;
	    text-transform: uppercase;
	    margin-bottom: 50px;
	}

</style>
<div class="container">
	<div id="contact-us">
		<div class="col-xs-12 col-md-6 contact">
			<h3 class="text-center">Contact us</h3>
			<div class="content">
				<p>Bạn có thể liên lạc với chúng tôi tại +84 985 136 895</p>
				<p>Hoặc bạn có thể gửi email cho chúng tôi</p>
				<p>Hãy nhớ rằng ứng dụng này được gửi trực tiếp đến chúng tôi.</p>
				<p>Địa chỉ của chúng tôi</p>
				<p><strong>Công ty cổ phần dịch vụ và truyền thông đa phương tiện Việt Nam</strong></p>
				<p><strong>Phòng 107, Tòa nhà CFM , 23 Láng Hạ, Ba Đình, Hà Nội</strong></p>
			</div>

		</div>
		<div class="col-xs-12 col-md-6 form">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Business / Investor / General *" required>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="First Name" required>
					</div>
				</div>
				<div class="col-xs-6">	
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Last Name" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="email" class="form-control" placeholder="Email address *" required>
			</div>
			<div class="form-group">
				<input type="email" class="form-control" placeholder="Phone *" required>
			</div>
			<div class="form-group">
				<input type="email" class="form-control" placeholder="Subject *" required>
			</div>
			<div class="form-group">
				<textarea class="form-control" placeholder="Write your message here. We will get back to you within 2 business days."></textarea>
			</div>
			<div class="form-group">
				<button class="btn btn-primary">Submit</button>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>