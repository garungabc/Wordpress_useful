<div class="fb-chatdialog" style="position:relative">
	<button class="btn btn-primary btn-fb-dialog" style="position: fixed; bottom: 0; right: 10px;">Gửi tin nhắn cho chúng tôi</button>
	<iframe class="fb-iframe" src="https://www.facebook.com/plugins/page.php?href=https:%2F%2Fwww.facebook.com%2Fthoitrangchuyende&tabs=messages&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1696048927319976" width="340" height="500" data-show="none" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($){
		$('.btn-fb-dialog').css({'display' : 'block', 'z-index' : '1000'});
		$('.fb-iframe').css({'display' : 'none'});
		var height_ifr = $('.fb-iframe').height();
		console.log(height_ifr);
		$('.btn-fb-dialog').click(function(){
			var show = $('.fb-iframe').attr('data-show');
			if(show == 'none') {
				$('.fb-iframe').css({'display' : 'block','position': 'fixed', 'z-index' : '1000', 'bottom' : '0', 'right' : '0'});
				$('.btn-fb-dialog').css({'position' : 'absolute', 'bottom' : height_ifr});
				$('.fb-iframe').attr('data-show', 'show');
				$('.btn-fb-dialog').text('Đóng x');
			} else {
				$('.fb-iframe').attr('data-show', 'none');
				$('.fb-iframe').css({'display' : 'none', 'bottom' : '0'});
				$('.btn-fb-dialog').css({'bottom' : '0'});
				$('.btn-fb-dialog').text('Gửi tin nhắn cho chúng tôi ');
			}
		});
	});
</script>