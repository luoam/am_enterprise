        <div class="bannerbox">
        
        <!--banner-begin-->
<div class="main_visual">
        <div class="main_image">
            <ul>					
                <li><span class="img_1"></span></li>
                <li><span class="img_2"></span></li>
            </ul>
            <a href="javascript:;" id="btn_prev"></a>
            <a href="javascript:;" id="btn_next"></a>
        </div>
         </div>
          <script src="<?=$base_url?>skin/default/js/jquery.easing.js" type="text/javascript"></script>
<!--<script src="<?=$base_url?>skin/default/js/js.js" type="text/javascript"></script>-->
         <script src="<?=$base_url?>skin/default/js/jquery.touchSlider.js"></script>
<script>
$(document).ready(function () {
	$(".main_visual").hover(function(){
		$("#btn_prev,#btn_next").fadeIn()
		},function(){
		$("#btn_prev,#btn_next").fadeOut()
		})
	$dragBln = false;
	$(".main_image").touchSlider({
		flexible : true,
		speed : 600,
		btn_prev : $("#btn_prev"),
		btn_next : $("#btn_next"),
		paging : $(".flicking_con a"),
		counter : function (e) {
			$(".flicking_con a").removeClass("on").eq(e.current-1).addClass("on");
		}
	});
	$(".main_image").bind("mousedown", function() {
		$dragBln = false;
	})
	$(".main_image").bind("dragstart", function() {
		$dragBln = true;
	})
	$(".main_image a").click(function() {
		if($dragBln) {
			return false;
		}
	})
	timer = setInterval(function() { $("#btn_next").click();}, 5000);
	$(".main_visual").hover(function() {
		clearInterval(timer);
	}, function() {
		timer = setInterval(function() { $("#btn_next").click();}, 5000);
	})
	$(".main_image").bind("touchstart", function() {
		clearInterval(timer);
	}).bind("touchend", function() {
		timer = setInterval(function() { $("#btn_next").click();}, 5000);
	})
});
</script>
<!--banner-end-->

        </div>