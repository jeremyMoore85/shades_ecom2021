<?php 
/**
 * Template Name: Blog Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<!-- Container Start -->

<div class="container">
  <div class="row"> 
    <!-- Featured Post Start -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <?php
		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		$args = array(
    		'post_type' => 'post',
			'posts_per_page' => '1',
			'paged'=>$paged
		);
		// Custom query.
		$query = new WP_Query( $args );
 		// Check that we have query results.
		if ( $query->have_posts() ):
			// Start looping over the query results.
        	while ( $query->have_posts() ):
 		        $query->the_post();
	?>
    			<div class="featured-post">
                  <div class="featured-post-img">
                      <?php 
					  if(has_post_thumbnail()):
					  ?>
                      	<a href="<?php echo get_the_permalink(); ?>">
					  		<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php echo get_the_title(); ?>" />
                        </a>
                      <?php
                      endif;
					  ?>
                  </div>
                  <div class="featured-post-cnt">
                  	<h2><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
					<?php
                    	$featured_cnt = get_the_content();
						$featured_cnt = wp_trim_words($featured_cnt, '55', '...');
						echo $featured_cnt;
					?>
                  </div>
                </div>
    <?php
			endwhile;
		endif;
		// Restore original post data.
		wp_reset_postdata();
	?>

    </div>
    <div class="pro_list">
    <!-- Featured Post End --> 
    <!-- Other Posts Start -->
    <?php 
		echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="6" offset="1" button_label="Load More" button_loading_label="Loading Posts"]'); 
	?>
    </div>
    <!-- Other Posts End -->
  </div>
  <!-- Row End --> 
</div>
<!-- Container End -->
<?php get_footer(); ?>
