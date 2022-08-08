<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<?php $active_menu = 'blog'; ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
	<meta name="facebook-domain-verification" content="yrh2357yxnl943n3ucwx3yz4bzsh2" />
<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
<?php wp_head(); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="<?php echo get_template_directory_uri()?>/css/custom.css" rel="stylesheet" type="text/css" />
<link media="screen" rel="stylesheet" href="/css/colorbox.css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<?php if(is_front_page()):?>
<script src="/js/responsiveslides.min.js"></script>
<script>
jQuery(function () {
  jQuery("#slider4").responsiveSlides({
	auto: true,
	pager: false,
	nav: true,
	speed: 500,
	namespace: "callbacks",
	before: function () {
	  jQuery('.events').append("<li>before event fired.</li>");
	},
	after: function () {
	  jQuery('.events').append("<li>after event fired.</li>");
	}
  });

});
</script>
<?php endif; ?>
<script src="/js/jquery.colorbox.js"></script>
<script>
	jQuery(document).ready(function(){
		//Examples of how to assign the ColorBox event to elements
		if(jQuery(window).width() < 600){
			jQuery("a[rel='example1']").click(function(){
				e.preventDefault();
			});
		}else{
			jQuery("a[rel='example1']").colorbox();
		}
		//Example of preserving a JavaScript event for inline calls.
		jQuery("#click").click(function(){
			jQuery('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
		});
	});
</script>
</head>

<body <?php body_class(); ?>>
<?php if(is_front_page() && $_COOKIE['shadePopup'] != 1):?>
<script type="text/javascript">
	jQuery(document).ready(function($){
		/* POPUP SCRIPTS */
		$("#vipPopup").delay(5000).fadeIn(500);
		$('.popupClose').click(function(){
			$('#vipPopup').hide();
		});
		$('.popupHolder').click(function(){
			$('#vipPopup').hide();
		})
		$('.popupCnt').click(function(event){
			event.stopPropagation();
		});				
		var expiryDate = new Date();
  		expiryDate.setMonth(expiryDate.getMonth() + 1);
		document.cookie = 'shadePopup = 1; expires=' + expiryDate.toGMTString();
	});
</script>
<div class="popupHolder" id="vipPopup">
	<div class="popupFlex">
	<div class="popup">
			<div class="popupClose"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></div>
			<div class="container p-0">
				<div class="row">
					<div class="col-xs-12">
						<div class="popupCnt">
							<div class="row d-flex">
								<div class="col-xs-12 col-lg-4 popImage">
									<img src="https://www.shadesofsleep.ca/blog/wp-content/uploads/2021/11/ju-ju-image.jpg" alt="Shades of Sleep - Bed Head" class="popImg" />
								</div>
								<div class="col-xs-12 col-lg-8 text-left popCnt">
									<div class="popLogo">
										<img src="https://www.shadesofsleep.ca/images/logo.png" class="img-fluid">
									</div>
									<div class="popDec">
										<h3>Join Our VIP Sleepers Club!</h3>
										<p>For new arrivals, store news &amp; surprises and so much more….</p>
										<form method="post" class="popForm" action="https://shadesofsleep.us3.list-manage.com/subscribe/post">
											<div class="form-group">
												<input type="email" class="form-control" name="MERG0" placeholder="Email Address" />
											</div>
											<div class="form-group">
												<input type="text" class="form-control" name="MERGE1" placeholder="First Name" />
											</div>
											<div class="form-group">
												<input type="text" class="form-control" name="MERGE2" placeholder="Last Name" />
											</div>
											<div class="form-group">
												<input type="submit" class="form-control formBtn" value="Join Now!" />
											</div>
										</form>
									</div>
									<div class="popTerms hidden-xs visible-md visible-lg visible-xl">
										<p>*By submitting your email address, you are providing your consent to Shades of Sleep &amp; Accessories Inc. to send electronic messages to your email or similar account about updates on future events, promotions and exciting new products that have arrived in store.”   You can withdraw your consent at any time by <a href="/contact-store-hours/">contacting us</a> or selecting unsubscribe at the bottom of your email.  We will treat the information that you provide in accordance with our <a href="/privacy-policy/">Privacy Policy</a>.</p>
									</div>
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
<?php endif; ?>
<?php if($_GET['test'] == true): ?>
<div class="popupHolder" id="swatchPopup">
	<div class="popupFlex">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-lg-8 col-lg-offset-2">
				<div class="swatchCnt">
					<h2>Request a Swatch - <?php echo get_the_title(); ?></h2>
					<?php echo do_shortcode('[contact-form-7 id="17711" title="Request A Swatch"]'); ?>
				</div>				
			</div>
		</div>
		</div>
	</div>
</div>	
<?php endif; ?>
<div class="mobile_call_top"><a href="tel:403-457-0092">(403) 457-0092</a> | <a href="/contact-store-hours/" class="contact_top">Contact Us</a></div>
<div id="wrapper">
<div class="header_top"><div class="header_notification text-center" style="background:#F15C22;color:#fff;padding:5px 0px;">Free Shipping on ALL sleepwear in Canada over $150.00</div>
  <div class="container">
    <div class="logo"><a href="/"><img src="/images/logo.png" alt="" /></a></div>
    <div class="call_top"><a class="fb" href="https://www.facebook.com/shadesofsleep" target="_blank"></a><a class="in" href="https://www.instagram.com/shadesofsleep/" target="_blank"></a><a href="tel:403-457-0092">(403) 457-0092</a> | <a href="/our-story/" class="contact_top">Our Story</a> | <a href="/blog/" class="contact_top">Blog</a> | <a href="/contact-store-hours/" class="contact_top">Contact Us</a> | <a href="/questions/">FAQ</a> | <div style="display:inline-block;"><a href="/cart/" class="cartBtn"><span class="cartCount"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span> <i class="fa fa-shopping-cart"></i></a></div></div>
  </div>
  <div class="menu_main">
    <div class="container">
      <div class="menu_nav">
        <?php wp_nav_menu(array('menu'=>'main')); ?>
      </div>
    </div>
  </div>
</div>
<br clear="all" />
<?php if(is_front_page()):?>
	<div class="slider_main">
        <div class="callbacks_container">
          <ul class="rslides" id="slider4">
			<li> <img src="/blog/wp-content/uploads/2022/05/aniversary-michelle-main.jpg" alt="Shades of Sleep - Cambridge" />
				<div class="caption"><span class="slide_txt3">Sleep Well. Stay Well.</span></div>
            </li>
            <li> <img src="/blog/wp-content/uploads/2022/05/wrap-up-banner.jpg" alt="Shades of Sleep - Cabana" />
				<div class="caption"><span class="slide_txt3">Sleep Well. Stay Well.</span></div>
            </li>
			<li> <img src="/blog/wp-content/uploads/2022/05/13-aniversary-banner.jpg" alt="Shades of Sleep - Ayrtight" />
				<div class="caption"><span class="slide_txt3">Sleep Well. Stay Well.</span></div>
            </li>
          </ul>
        </div>
      </div>
<?php endif; ?>
<br clear="all" />
<?php if(is_front_page()):?>
<section id="catNav" class="d-mobile">
	<div class="container-fluid">
		<div class="col-12 col-lg-10 col-lg-offset-1">
		<div class="row">
			<div class="col-12 col-md-4 col-lg-2 p-0 catNavLink">
				<a href="/product-category/cotton-pajamas/">Cotton Sleepwear</a>
			</div>
			<div class="col-12 col-md-4 col-lg-2 p-0 catNavLink">
				<a href="/product-category/silk-sleepwear/">Silk Sleepwear</a>
			</div>
			<div class="col-12 col-md-4 col-lg-2 p-0 catNavLink">
				<a href="/product-category/bamboo-wicking/">Bamboo &amp; Wicking PJS</a>
			</div>
			<div class="col-12 col-md-4 col-lg-2 p-0 catNavLink">
				<a href="/product-category/modal-sleepwear/">Modal Pjs</a>
			</div>
			<div class="col-12 col-md-4 col-lg-2 p-0 catNavLink">
				<a href="/product-category/womens-robes/">Women's Robes</a>
			</div>
			<div class="col-12 col-md-4 col-lg-2 p-0 catNavLink">
				<a href="/product-category/mens-pjs-robes/">Mens PJ's &amp; Robes</a>
			</div>
		</div>
		</div>
	</div>
</section>
<div id="contain_ld" class="container-fluid">
<div class="row">
<div class="col-xs-10 col-xs-offset-1">
<?php else: ?>
<div id="contain_ld" class="container">
<div class="row">
<div class="col-xs-12">
<?php endif; ?>
