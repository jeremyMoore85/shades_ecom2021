<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<?php 
	$thumb_height = get_post_meta($post->ID, '_thumb_height', true);
	if($thumb_height != ''):
?>
	<style type="text/css">
		@media (min-width:768px){
		.pro_list .pro_main .pro_img, .pro_list .pro_main .pro_img img{
			height:<?php echo $thumb_height;?> !important;	
		}
		}
	</style>
<?php
	endif; 
?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
					$product_array = get_post_meta($post->ID, '_product_meta_cnt', true);
			?>
            	<div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-left">
                    <div class="con_left2_top"><img src="/images/img_top_bg2.png" alt="" /></div>
                    <div class="con_left2_midd page_thumb">
                      <?php if(has_post_thumbnail()):
                          the_post_thumbnail();					
                      else: ?>
                          <img src="/images/bedding/bellanotte/top-left-corner.jpg" alt="Bella Notte Linens" />
                      <?php endif; ?>
                    </div>
                    <div class="con_left2_btm"><img src="/images/img_btm_bg2.png" alt="" /></div>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-left">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                  </div>
                  <br clear="all" />
                  <div class="sub_con">&nbsp;</div>
                </div>
                <div class="pro_list">
                	<?php
						foreach($product_array as $product):
					?>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pull-left text-center">
                            	<div class="pro_main">
                                	<div class="pro_img">
                                    	<a href="<?php echo $product['image']; ?>" rel="example1" title="" class="cboxElement">
                                			<img src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>" />
                                        </a>
                                    </div>
                                    <h4><?php echo $product['title']; ?></h4>
                                </div>                            	
                            </div>
                    <?php	
						endforeach;
					?>
                </div>
            <?php					
				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
