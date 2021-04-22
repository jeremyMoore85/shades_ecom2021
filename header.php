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
<?php if(is_front_page()):?>
<script type="text/javascript">
	jQuery(document).ready(function($){
		/* POPUP SCRIPTS */
		$('.popupClose').click(function(){
			$('.popupHolder').hide();
		});
		$('.popupHolder').click(function(){
			$('.popupHolder').hide();
		})
		$('.popupCnt').click(function(event){
			event.stopPropagation();
		});					   
	});
</script>
<style type="text/css">
.popupHolder{
	position:fixed;
	top:0;
	left:0;
	width:100vw;
	height:100vh;
	background:rgba(0,0,0,0.5);
	z-index:888888;
}
.popupFlex{	
	display:flex;
	justify-content:center;
	align-items:center;
	width:100%;
	height:100%;
}
.popup{
	position:relative;
	background:rgba(70,70,70,0.75);
	border-radius:0.3rem;
	color:#fff;
	border:2px solid rgba(255,255,255,0.5);
}
.popupClose{
	position:absolute;
	right:0.5rem;
	top:0.5rem;
	color:#EFEFEF;
	cursor:pointer;
	z-index:999999;
}
.popupClose:hover{
	color:#FFF;
}
.popupCnt{
	padding:2rem;
	text-align:center;	
	font-size:1.5rem;
}	
	.popupCnt p{
		font-size: 1.75rem;
		line-height: 1.5;
		margin: 0.5rem 0;
	}
	.popupCnt a, .popupCnt a:visited{
		color:#fff;
		font-weight:bold;
		font-style: italic;
	}
	.popup_btn{
		background: #BF2E1A;
		padding: 1rem 2rem;
		color: #fff;
		margin-top: 1rem;
		font-weight: bold;
		text-transform: uppercase;
		margin:1.5rem 2rem;
		display:inline-block;
		font-style:normal;
	}
	.popup_btn:hover{
		background:#ce3723;
		color:#fff;
		text-decoration: none;
	}
</style>
<?php /*
<div class="popupHolder">
	<div class="popupFlex">
	<div class="popup">
			<div class="popupClose"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></div>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="popupCnt">
							<img src="https://www.shadesofsleep.ca/images/logo.png" style="height:100px; width:auto; margin-bottom:1rem;">
							<p>Our beautiful retail store is temporarily closed due to COVID-19 however <a href="/product-category/sleepwear/">have a peek at our online store!</a>  All of our beautiful sleepwear &amp; Lounge is on sale at 20% until June 15 with free shipping within Canada on any purchase over $100.00!</p>
							<p>Questions?  Feel free to email us at <a href="mailto:shadesofsleep@shaw.ca">shadesofsleep@shaw.ca</a></p>
							<a role="button" class="popup_btn lg" href="/product-category/sleepwear/"><span>Shop Sleepwear</span></a>
							<a role="button" class="popup_btn" href="/contact-store-hours/"><span>Contact Us</span></a>
							<br clear="all" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
*/ ?>
<?php endif; ?>
<div class="mobile_call_top"><a href="tel:403-457-0092">(403) 457-0092</a> | <a href="/contact-store-hours/" class="contact_top">Contact Us</a></div>
<div id="wrapper">
<div class="header_top"><div class="header_notification text-center" style="background:#F15C22;color:#fff;padding:5px 0px;">Free Shipping on ALL sleepwear in Canada over $100.00</div>
  <div class="container">
    <div class="logo"><a href="/"><img src="/images/logo.png" alt="" /></a></div>
    <div class="call_top"><a href="tel:403-457-0092">(403) 457-0092</a> | <a href="/our-story/" class="contact_top">Our Story</a> | <a href="/blog/" class="contact_top">Blog</a> | <a href="/contact-store-hours/" class="contact_top">Contact Us</a> | <a href="/questions/">FAQ</a> | <div style="display:inline-block;"><a href="/cart/" class="cartBtn"><span class="cartCount"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span> <i class="fa fa-shopping-cart"></i></a></div></div>
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
			<?php 
			  /*
				$today = date('Y-m-d');
			  	$week1_start = date('Y-m-d', strtotime('2020-11-16'));
			  	$week2_start = date('Y-m-d', strtotime('2020-11-23'));
			  	$week3_start = date('Y-m-d', strtotime('2020-11-30'));
			  	$week4_start = date('Y-m-d', strtotime('2020-12-07'));
			  	$week5_start = date('Y-m-d', strtotime('2020-12-14'));
				$week6_start = date('Y-m-d', strtotime('2020-12-21'));
			?>
			  
			<?php if($today >= $week1_start && $today < $week2_start):?>
			<li> <img src="/blog/wp-content/uploads/2020/11/kate-spade.jpg" alt="Kate Spade Sale" />
				<div class="caption"><span class="slide_txt3">Kate Spade 20% Off  <em>(November 16<sup>th</sup> - 22<sup>nd</sup>)</em></span></div>
            </li>
			<?php elseif($today >= $week2_start && $today < $week3_start):?>
			<li> <img src="/blog/wp-content/uploads/2020/11/paper-label.jpg" alt="Paper Label" />
				<div class="caption"><span class="slide_txt3">Paper Label 20% Off  <em>(November 23<sup>rd</sup> - 29<sup>th</sup>)</em></span></div>
            </li>
			<?php elseif($today >= $week3_start && $today < $week4_start):?>
			<li> <img src="/blog/wp-content/uploads/2020/11/mey-fashion-1.jpg" alt="Mey Fasshion" />
				<div class="caption"><span class="slide_txt3">Mey Fashion 20% Off  <em>(November 30<sup>th</sup> - December 6<sup>th</sup>)</em></span></div>
            </li>
			<?php elseif($today >= $week4_start && $today < $week5_start):?>
			<li> <img src="/blog/wp-content/uploads/2020/11/christine-vancouver-sale.jpg" alt="Paper Label" />
				<div class="caption"><span class="slide_txt3">Christine Vancouver 20% Off  <em>(December 7<sup>th</sup> - 13<sup>th</sup>)</em></span></div>
            </li>
			<?php elseif($today >= $week5_start && $today < $week6_start):?>
			<li> <img src="/blog/wp-content/uploads/2020/11/hanro-sale.jpg" alt="Paper Label" />
				<div class="caption"><span class="slide_txt3">Hanro 20% Off  <em>(December 7<sup>th</sup> - 13<sup>th</sup>)</em></span></div>
            </li>
			<?php endif; */ ?>
			<!--
			<li> <img src="/blog/wp-content/uploads/2021/01/Sedona-Ivory.jpg" alt="Annual Bedding Sale" />
				<div class="caption"><span class="slide_txt3">Annual Bedding Sale January 23 to February 13.</span></div>
            </li>
			-->
			<li> <img src="/blog/wp-content/uploads/2021/04/shades-of-sleep-ayrtight.jpg" alt="Shades of Sleep - Ayrtight" />
				<div class="caption"><span class="slide_txt3">Sleepwear Sale <span>on select brands</span></span></div>
            </li>
            <li> <img src="/blog/wp-content/uploads/2021/04/shades-of-sleep-dorset.jpg" alt="Shades of Sleep - Dorset" />
				<div class="caption"><span class="slide_txt3">Sleepwear Sale <span>on select brands</span></span></div>
            </li>
			<li> <img src="/blog/wp-content/uploads/2021/04/shades-of-sleep-pj-salvage.jpg" alt="Shades of Sleep - PJ Salvage" />
				<div class="caption"><span class="slide_txt3">Sleepwear Sale <span>on select brands</span></span></div>
            </li>
          </ul>
        </div>
      </div>
<?php endif; ?>
<br clear="all" />
<?php if(is_front_page()):?>
<section id="catNav">
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
				<a href="/product-category/bamboo-wicking/">Bamboo &amp; Wicking</a>
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
