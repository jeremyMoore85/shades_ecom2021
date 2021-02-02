<?php 
/**
 * Template Name: Landing Page Template
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
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-left">
                  	<div style="position:relative;">
                    <div class="con_left2_top"><img src="<?php bloginfo('template_url'); ?>/images/img_top_bg2.png" alt="" /></div>
                    <div class="con_left2_midd page_thumb">
                      <?php if(has_post_thumbnail()):
                          the_post_thumbnail();					
                      else: ?>
                          <img src="/images/bedding/bellanotte/top-left-corner.jpg" alt="Bella Notte Linens" />
                      <?php endif; ?>
                    </div>
                    <div class="con_left2_btm"><img src="<?php bloginfo('template_url'); ?>/images/img_btm_bg2.png" alt="" /></div>
                    </div>
                    <br clear="all" />
                    <div class="lp_subnav">
					  <?php if(is_page('luxury-bedding') || is_page('174')):
					  	wp_nav_menu(array('menu'=>'bedding')); 
					  elseif(is_page('luxury-sleepwear') || is_page('176')):
					  	wp_nav_menu(array('menu'=>'sleepwear'));
					  elseif(is_page('bridal-lingerie') || is_page('214')):
					    wp_nav_menu(array('menu'=>'bridal'));
					  elseif(is_page('everyday-and-lounge-wear') || is_page('864')):
					  	wp_nav_menu(array('menu'=>'Everyday & Lounge Wear'));
					  endif; ?>
                    </div>
                  </div>
                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 pull-left">
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
                	
                </div>
            <?php					
				endwhile;
			?>
            <br clear="all" />
            
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
