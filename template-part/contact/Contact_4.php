<?php
/*
Template Name: Contact 4
*/
get_header();
?>

<style type="text/css">
	.contactPage .contact {
		margin-left: 0px;
		margin-right: 0px;
		padding-left: 0;
    	padding-right: 0;
	}
	.contactPage .section-contact {
	    min-height: 400px;
	    background-color: #fff;
	    padding-bottom: 20px;
	    padding-top: 20px;
	    overflow: hidden;
        font-family: 'Lato';
        background-color:#ede9e3;
	}
	.contactPage .section-contact .title {
	    margin-left: auto;
	    margin-right: auto;
	    margin-bottom: 30px;
	    float: none;
	    max-width: 92%;
	}
	.contactPage .section-contact .title p {
	    font-weight: 300;
	    text-align: center;
	    color: #888;
	    font-size: 18px;
	}
	.contactPage .section-contact .title h1 {
	    text-transform: uppercase;
	    color: #515151;
	    font-size: 48px;
	    font-weight: 300;
	    text-align: center;
	}
	.contactPage .section-contact #map {
	    position: relative;
	    width: 100%;
	    height: 500px;
	}
	.contactPage .section-contact .contact-details {
	    background-color: #fff;
	    margin-bottom: 50px;
	    box-shadow: 0 1px 3px rgba(0,0,0,0.07);
	    -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.07);
	}
	.contactPage .detail {
	    padding: 15px 0;
	    text-align: center;
	    font-size: 19px;
	    white-space: nowrap;
	    color: #999;
	}
	.contactPage .detail .fa {
	    margin-right: 5px;
	}
	.contactPage .peThemeContactForm .form-control {
	    background-color: #fff;
	    border-color: #ececec;
	    box-shadow: none;
	    -webkit-box-shadow: none;
	}
	.contactPage .peThemeContactForm textarea.form-control {
	    height: 165px;
	    resize: none;
	}
	.contactPage .btn-custom:hover {
	    border-color: #fff;
	    color: #fff;
	}
	.contactPage .btn-custom {
	    border-color: #a5aa84;
	    text-transform: uppercase;
	    -webkit-animation-duration: 1s;
	    animation-duration: 1s;
	    -webkit-animation-fill-mode: both;
	    animation-fill-mode: both;
	    background-color: #a5aa84;
	    font-family: Lato;
		font-size: 14px;
		font-stretch: normal;
		color: #fff;
	}
	.contactPage .peThemeContactForm .btn {
	    margin-top: 15px;
	    margin-right: 15px;
	}
</style>
<div class="container-fluid contactPage">
	<section class="section section-contact">
		<div class="container">
	      <div class="title col-md-8 col-sm-10 col-xs-12">
	        <h1>Liên hệ với chúng tôi</h1>
	        <hr>
	        <p>CÔNG TY CỔ PHẦN DỊCH VỤ VÀ TRUỀN THÔNG ĐA PHƯƠNG TIỆN VIỆT NAM</p>
	        <p>(Vietnam Multimedia Services., JSC)</p>
	        <p>Địa chỉ: Phòng 107, Tòa nhà CFM, 23 Láng Hạ, Ba Đình, Hà Nội</p>
	      </div>
	    </div>
    	<div id="map">
    		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.2911075565835!2d105.81590831443697!3d21.021034986002576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab7ab9f58a8f%3A0x1afa7897cbbd41a5!2zMjMgTMOhbmcgSOG6oSwgVGjDoG5oIEPDtG5nLCBCYSDEkMOsbmgsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1494322181960" width="100%" height="100%" frameborder="0" style="border:0; pointer-events:none;" allowfullscreen ></iframe>
    	</div>
	
		<div class="contact-details">
			<div class="container">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="detail">
						<i class="fa fa-map-marker"></i>
						<span>Vietnam Multimedia Services., JSC</span>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="detail">
						<i class="fa fa-phone"></i>
						<span>+84 985 136 895</span>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="detail last">
						<i class="fa fa-envelope"></i>
						<span>info@vmms.vn</span>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="col-md-8 col-md-offset-2">
				<div id="contact-form">
					<form method="post" name="contactform" class="peThemeContactForm">
						<div class="col-md-5 col-sm-5 col-xs-12 animated hiding" data-animation="slideInLeft">
							<div class="form-group">
								<input type="text" name="author" class="form-control input-lg" placeholder="Full Name" required />
							</div>
							<div class="form-group">
								<input type="email" name="email" class="form-control input-lg" placeholder="Email" required />
							</div>
							<div class="form-group">
								<input type="text" name="phone" class="form-control input-lg" placeholder="Phone">
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-12 animated hiding" data-animation="slideInRight">
							<div class="form-group">
								<textarea name="message" class="form-control input-lg" placeholder="Message" required ></textarea>
							</div>
						</div>
						<input type="submit" class="btn btn-custom pull-right" value="Gửi tin" data-animation="fadeInUpBig">
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>