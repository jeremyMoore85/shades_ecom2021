<?php 
/**
 * Template Name: Contact Page Template
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<!-- Container Start -->

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
				$content2_meta = get_post_meta($post->ID, '_content2_meta', true);
			?>
            	<div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-left">
                    <div class="con_left2_midd page_thumb">
                      <iframe width="100%" height="368" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.ca/maps?t=m&amp;sll=51.041622,-114.035475&amp;sspn=0.0051808,0.0109864&amp;q=Shades+of+Sleep+%26+Accessories+Inc&amp;cid=0xd3e283135a362a10&amp;ie=UTF8&amp;hq=&amp;hnear=&amp;ll=51.041622,-114.035475&amp;spn=0.006295,0.006295&amp;output=embed"></iframe>
                    </div>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-left">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                  </div>
                </div>
                <br clear="all" />
                <div class="content_seperator">&nbsp;</div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 pull-right">
                	<?php echo $content2_meta; ?>
                    <?php if(is_page('luxury-bedding') || is_page('174')):?>
                    	<div class="slogan_ld">“Sleep is that golden chain that ties health and our bodies together”<br><span>(Thomas Dekker)</span></div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-right">
                	<h4>Location:</h4>
                    <p>1221- 9 Avenue S.E. (Inglewood)<br />Calgary, Alberta T2G 0S9</p>
                    <p><strong>Customer parking at rear of store.</strong></p>
                </div>
            <?php					
				endwhile;
			?>
            <br clear="all" />
            <div class="slogan">We look forward to meeting you...</div>
            <div class="sub_con">&nbsp;</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
