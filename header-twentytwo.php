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
<?php //if(is_front_page()):?>
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
<?php// endif; ?>
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

<body class="home page-template page-template-page-templates page-template-tp-home page-template-page-templatestp-home-php page page-id-256 theme-shades_ecom2021 woocommerce-js group-blog masthead-fixed full-width grid">
<?php //if(is_front_page()):?>
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
<?php// endif; ?>
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
<?php// if(is_front_page()):?>
	<div class="container">
		<div class="row">
			<div class="col-12">
			
	<div class="slider_main">
        <div class="callbacks_container">
          <ul class="rslides" id="slider4">
			<li> <img src="/blog/wp-content/themes/shades_ecom2021/images/banner-20.jpg" alt="Annual Bedding Sale" />
				<div class="caption"><span class="slide_txt3">Annual Bedding Sale January 23 to February 13.</span></div>
            </li>
            <li> <img src="/blog/wp-content/themes/shades_ecom2021/images/banner-20-2.jpg" alt="Annual Bedding Sale" />
				<div class="caption"><span class="slide_txt3">Sleep Well. Stay Well.</span></div>
            </li>
          </ul>
        </div>
      </div>
				</div>
		</div>
	</div>
<?php// endif; ?>
<br clear="all" />
<?php// if(is_front_page()):?>
<div id="contain_ld" class="container-fluid">
<div class="row">
<div class="col-xs-10 col-xs-offset-1">
<?php /*else: ?>
<div id="contain_ld" class="container">
<div class="row">
<div class="col-xs-12">
<?php endif;*/ ?>
