<?php
/**
 * The Content Sidebar
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<div id="content-sidebar" class="content-sidebar widget-area" role="complementary">

  <center><h1>Recent Posts</h1>
  <div class="lp_subnav">
    <div class="menu-bridal-container">
        <?php
        $args = array(
        	'numberposts' => 5,
        	'offset' => 0,
        	'category' => 0,
        	'orderby' => 'post_date',
        	'order' => 'DESC',
        	'include' => '',
        	'exclude' => '',
        	'meta_key' => '',
        	'meta_value' =>'',
        	'post_type' => 'post',
        	'post_status' => 'publish',
        	'suppress_filters' => true
        );

        $recent_posts = wp_get_recent_posts( $args, ARRAY_A );
       	foreach( $recent_posts as $recent ){
      		echo '<div class="col-lg-12 mb-10 recent-post">
          <a class="clearfix" href="' . get_permalink($recent["ID"]) . '">
		        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
              '.$recent["post_title"].'
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 img-thumb">
            ' . get_the_post_thumbnail( $recent["ID"], 'thumbnail' ) . '
            </div>

          </a>
          </div>';
      	}
      	wp_reset_query();
        ?>
    </div>
  </div>

  <br clear="all">
  </center>

  <div class="home">
    <div class="cta_block mb-20">
     <a href="https://www.instagram.com/shadesofsleep/" class="cta_link" target="_blank"></a>
     <div class="inner">
      <div class="innerBlock">
        <h4 class="title">Get Cozy With Us <em>On Instagram</em></h4>
      </div>
     </div>
    </div>

    <div class="cta_block mb-20">
      <a href="https://www.facebook.com/shadesofsleep" class="cta_link" target="_blank"></a>
      <div class="inner">
        <div class="innerBlock">
          <h4 class="title">Follow Us <em>On Facebook</em></h4>
        </div>
      </div>
    </div>

    <div class="cta_block mb-20">
      <a href="http://eepurl.com/Kb2-T" class="cta_link" target="_blank"></a>
      <div class="inner">
        <div class="innerBlock">
          <h4 class="title">Sign Up <em>For News &amp; Promotions</em></h4>
        </div>
      </div>
    </div>

  </div>
</div><!-- #content-sidebar -->
