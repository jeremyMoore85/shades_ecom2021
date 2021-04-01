<?php
/**
 * Template Name: Home Page Template
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();
global $post;
?>
<!-- Container Start -->
<?php if($_GET['test'] == 'true'):?>
<section id="catNav">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-4 col-lg-2">
				<a href="#">Cotton Sleepwear</a>
			</div>
			<div class="col-12 col-md-4 col-lg-2">
				<a href="#">Flannel Sleepwear</a>
			</div>
			<div class="col-12 col-md-4 col-lg-2">
				<a href="#">Bamboo Sleepwear</a>
			</div>
			<div class="col-12 col-md-4 col-lg-2">
				<a href="#">Wicking Sleepwear</a>
			</div>
			<div class="col-12 col-md-4 col-lg-2">
				<a href="#">Robes</a>
			</div>
			<div class="col-12 col-md-4 col-lg-2">
				<a href="#">Mens PJ's &amp; Robes</a>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<div class="container-fluid">
  <div class="row col-flex">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center mb-sm-20" style="height:100%;">
      <div class="imageBlock" style="background-image: url('/blog/wp-content/themes/shades-ecom/images/best-sleepwear.jpg');"> <a href="/product-category/best-sleepwear/" class="cta_link"></a>
        <div class="inner">
          <div class="innerBlock">
            <h2>Our Best Selling Sleepwear</h2>
          </div>
        </div>
      	<div class="overlay"></div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center mb-sm-20" style="height:100%;">
      <div class="imageBlock" style="background-image: url('/blog/wp-content/themes/shades-ecom/images/best-pillow.jpg');"> <a href="/product-category/best-duvets-pillows/" class="cta_link"></a>
        <div class="inner">
          <div class="innerBlock">
            <h2>Our Best Selling Duvets &amp; Pillows</h2>
          </div>
        </div>
      	<div class="overlay"></div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center mb-sm-20" style="height:100%;">
      <div class="imageBlock" style="background-image: url('/blog/wp-content/themes/shades-ecom/images/best-sheets.jpg');"> <a href="/product-category/best-sheets/" class="cta_link"></a>
        <div class="inner">
          <div class="innerBlock">
            <h2>Our Best Selling Sheets</h2>
          </div>
        </div>
      	<div class="overlay"></div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center mb-sm-20" style="height:100%;">
      <div class="imageBlock" style="background-image: url('/blog/wp-content/themes/shades-ecom/images/best-linens.jpg');"> <a href="/product-category/best-linens/" class="cta_link"></a>
        <div class="inner">
          <div class="innerBlock">
            <h2>Featured Bed Linens<br />On Sale</h2>
          </div>
        </div>
      	<div class="overlay"></div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <!--<div class="row mt-20 mb-30 flex-col">-->
  <div class="row mt-20 mb-30">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center mb-sm-20">
      <div class="cta_block"> <a href="https://www.instagram.com/shadesofsleep/" class="cta_link" target="_blank"></a>
        <div class="inner">
          <div class="innerBlock">
            <h4 class="title">Get Cozy With Us <em>On Instagram</em></h4>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center mb-sm-20">
      <div class="cta_block"> <a href="https://www.facebook.com/shadesofsleep" class="cta_link" target="_blank"></a>
        <div class="inner">
          <div class="innerBlock">
            <h4 class="title">Follow Us <em>On Facebook</em></h4>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center mb-sm-20">
      <div class="cta_block"> <a href="https://eepurl.com/Kb2-T" class="cta_link" target="_blank"></a>
        <div class="inner">
          <div class="innerBlock">
            <h4 class="title">Sign Up <em>For News &amp; Promotions</em></h4>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center mb-sm-20">
      <div class="cta_block"> <a href="/blog/" class="cta_link"></a>
        <div class="inner">
          <div class="innerBlock">
            <h4 class="title">What's New? <em>Read Our Blog</em></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-20 mb-30">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center mb-sm-20">
  		Please read our <a href="/shipping-returns/">Shipping &amp; Return policy</a>.
    </div>
  </div>	
</div>
<!-- Container End -->
<?php get_footer(); ?>
