<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

		</div>
        </div>
      </div>
    </div>
  </div>
  <?php if(is_singular('product')):?>
  <?php global $catID; ?>
<?php if(isset($catID)): ?>
  <div class="brandCTA">
  <a href="<?php echo get_term_link($catID); ?>" class="brandLink">
  	<div class="container">
    	<div class="row">
        	<div class="col-xs-12 text-center">
            	<h4>Shop More Products By</h4>
            	<img src="<?php echo get_field('logo', 'product_cat_'.$catID); ?>" />
            </div>
        </div>
    </div>
    </a>
  </div>
<?php endif; ?>
  <?php endif; ?>
  <div id="footer">
  <div class="container">
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left">We ship anywhere in Canada and Mainland USA. | <a href="<?php echo get_the_permalink('1424'); ?>">Shipping &amp; Returns</a> | <a href="<?php echo get_the_permalink('14717'); ?>">Privacy Policy</a><br />Copyright &copy; <?php echo date('Y'); ?> shadesofsleep.com. All Rights Reserved. <br /><a href="https://www.oracast.com" target="_blank">Website by Oracast</a></div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 pull-left"> <a class="fb" href="https://www.facebook.com/shadesofsleep" target="_blank"></a> <a class="in" href="https://www.instagram.com/shadesofsleep/" target="_blank"></a></div>
  </div>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-22088814-1', 'auto');
  ga('send', 'pageview');
</script>
<script type="text/javascript">
	var trigger_times = 0;
	jQuery(window).scroll(function(){
		var y_scroll_pos = window.pageYOffset;
		var scroll_pos_trigger = 20;
		if(y_scroll_pos > scroll_pos_trigger){
			if(trigger_times == 0){
				jQuery('.header_top').addClass('mini-header');
				jQuery('.header_top .logo img').attr('src', '/images/pillow-logo.png');
				trigger_times = 1;
			}
		}else{
			trigger_times = 0;
			jQuery('.header_top').removeClass('mini-header');	
			jQuery('.header_top .logo img').attr('src', '/images/logo.png');
		}
	})
<?php if(is_singular('product')):?>
	// Update price according to variable price
jQuery(document).ready(function($){
	var originalPrice = $('.productPrice .price').text();
	var priceVar;
	$('.variation select').change(function(){
		var variationVal = $(this).val();
		if(variationVal != ''){
			priceVar = setInterval(newPrice, 500);		
		}else{
			$('.productPrice .price').html(originalPrice);
		}
	});
	function newPrice(){
		var upPrice = $('.woocommerce-variation-price .price').text();		
		if(upPrice != ''){
			if(upPrice.replace(/[^-]/g, "").length < 1){
				if(upPrice.replace(/[^$]/g, "").length > 1){
					var upPrices = upPrice.split("$");
					var slPrice = upPrices[2];
					var orPrice = upPrices[1];
					//alert(slPrice);
					$('.productPrice .price').html('<span class="saleLbl">SALE: $'+slPrice+'</span><span class="noSale">$'+orPrice+'</span>');
				}else{
					$('.productPrice .price').html(upPrice);
				}
			}
		}else{
			$('.productPrice .price').html(originalPrice);
		}
		clearInterval(priceVar);
	}
});
<?php endif; ?>
<?php if(is_archive('questions')):?>
jQuery(document).ready(function($) {
    $('.faqAcc .question').click(function(){
		$(this).parent('.faqAcc').toggleClass('active');
	});
});
<?php endif; ?>
</script>
</div>
	<?php wp_footer(); ?>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '365859884685901');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=365859884685901&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
</body>
</html>