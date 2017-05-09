<?php
/*
Template Name: Contact 2
 */
get_header();?>
	<style type="text/css">
		.contactPage .innerCont{
			margin: 0 auto;
		    position: relative;
		}
		.contactPage .innerCont .largeTitle{
		 	position: absolute;
		    top: -30px;
		    z-index: -1;
		}
		.contactPage .innerCont .largeTitle h1{
			font-size: 18em;
		    font-family: 'OpenSansSemiBold';
		    color: #ddd;
		}
		.contactPage .innerCont .box-shadow{
			height: auto;
		    width: 100%;
		    position: relative;
		    background-color: #FFFFFF;
		    border-width: 1px;
		    border-style: solid;
		    border-color: #DDDDDD;
		    border-radius: 5px;
		    box-shadow: 0px 10px 6px -6px #777777;
		    padding: 15px;
		    overflow: auto;
		    padding-bottom: 50px;
		}
	</style>
	<div class="contactPage container">
	<?php while (have_posts()): the_post();?>
		<div class="innerCont w1354">
			<!-- <div class="largeTitle">
				<h1><?php //the_title();?></h1>
			</div> -->
			<div class="box-shadow shadow">

				<div class="col-md-8 google-map">
					<h3 style="padding-bottom: 20px;">Contact Info</h3>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.2911075565835!2d105.81590831443697!3d21.021034986002576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab7ab9f58a8f%3A0x1afa7897cbbd41a5!2zMjMgTMOhbmcgSOG6oSwgVGjDoG5oIEPDtG5nLCBCYSDEkMOsbmgsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1494312810047" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
				<div class="col-md-4 contact-right" style="font-family: &quot;Open Sans&quot;;">
					<h3 style="text-align: justify;">Công ty Cổ phần Dịch vụ Truyền thông Đa phương tiện Việt Nam (Vietnam Multimedia Services., JSC)</h3>
					<hr>
					<p><img class="pull-left" style="float: left; margin: 0px 10px 0px 0px;" src="http://lifelockcode.dev/wp-content/uploads/2016/12/email.png" alt="LifeLock coupon"></p>
					<p style="text-align: justify;"><span id="cloak39709"><a href="mailto:info@lifelockcodes.com" title="World">info@vmms.vn</a></span></p>
					<h3>Contact Vicoders</h3>
					<hr>
					<p style="text-align: justify;"><img class="pull-left" style="float: left; margin: 0 10px 0 0;" src="http://lifelockcode.dev/wp-content/uploads/2016/12/world.png" alt="LifeLock Contact" height="32" width="32"></p>
					<p style="text-align: justify;">Phòng 107, Tòa nhà CFM, 23 Láng Hạ, Ba Đình, Hà Nội</p>
					<p>&nbsp;</p>
					<p><img class="pull-left" style="float: left; margin: 0px 10px 0px 0px;" src="http://lifelockcode.dev/wp-content/uploads/2016/12/email.png" alt="LifeLock coupon"></p>
					<p style="text-align: justify;"><span id="cloak63349"><a href="mailto:member.services@lifelock.com">vicoders@gmail.com</a></span></p>
					<p>&nbsp;</p>
					<p><img class="pull-left" style="margin: 0px 10px 0px 0px; float: left;" src="http://lifelockcode.dev/wp-content/uploads/2016/12/contact.png" alt="LifeLock promo code"></p>
					<p style="text-align: justify;">Kinh doanh: &nbsp; 0962.180.180<br>Kỹ thuật: 0963.88.63.63</p>
					<p style="text-align: justify;">&nbsp;</p>
					<p><img class="pull-left" style="float: left; margin: 0 10px 0 0;" src="http://lifelockcode.dev/wp-content/uploads/2016/12/business-contact.png" alt="LifeLock Contact"></p>
					<p style="text-align: justify;">FAX:&nbsp; (+84-4) 3562.6298 </p>
					<p style="text-align: justify;">&nbsp;</p>
				</div>
			</div>
		</div>
	<?php endwhile; // end of the loop. ?>
	</div>

 <?php get_footer()?>