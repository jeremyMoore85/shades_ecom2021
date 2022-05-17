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

<div class="container-fluid">
  <div class="row col-flex">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center mb-sm-20" style="height:100%;">
      <div class="imageBlock" style="background-image: url('/blog/wp-content/uploads/2022/05/fav-lounge-wear.jpg');"> <a href="/product-category/best-sleepwear/" class="cta_link"></a>
        <div class="inner">
          <div class="innerBlock">
            <h2>Our Favorite Loungewear</h2>
          </div>
        </div>
      	<div class="overlay"></div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center mb-sm-20" style="height:100%;">
      <div class="imageBlock" style="background-image: url('/blog/wp-content/uploads/2021/04/shades-of-sleep-fav-duvets.jpg');"> <a href="/product-category/best-duvets-pillows/" class="cta_link"></a>
        <div class="inner">
          <div class="innerBlock">
            <h2>Our Best Selling Duvets &amp; Pillows</h2>
          </div>
        </div>
      	<div class="overlay"></div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center mb-sm-20" style="height:100%;">
      <div class="imageBlock" style="background-image: url('/blog/wp-content/uploads/2021/04/shades-of-sleep-fav-sheets.jpg');"> <a href="/product-category/best-sheets/" class="cta_link"></a>
        <div class="inner">
          <div class="innerBlock">
            <h2>Our Best Selling Sheets</h2>
          </div>
        </div>
      	<div class="overlay"></div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center mb-sm-20" style="height:100%;">
      <div class="imageBlock" style="background-image: url('/blog/wp-content/uploads/2021/04/shades-of-sleep-fav-bedlinen.jpg');"> <a href="/product-category/best-linens/" class="cta_link"></a>
        <div class="inner">
          <div class="innerBlock">
            <h2>Our Favorite Bedding</h2>
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
            <h4 class="title">Join Our <em>VIP Sleepers Club</em></h4>
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
