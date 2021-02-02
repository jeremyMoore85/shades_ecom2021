<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<?php if(is_home()):?>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pull-left text-center">
                  <div class="pro_main">
                      <div class="pro_img">
                      	<?php
                          if(has_post_thumbnail()):
                          ?>
                          	<a href="<?php echo get_the_permalink(); ?>">
                            	<?php the_post_thumbnail(); ?>
                            </a>
                          <?php
						  else:
						  ?>
                          	<a href="<?php echo get_the_permalink(); ?>">
                          		<img src="http://shadesofsleep.dev2.oracastdev.com/blog/wp-content/uploads/2017/01/duvet-picture-672x372.jpg" alt="<?php echo get_the_title(); ?>" />
                            </a>
                          <?php
                          endif;
                          ?>
                      </div>
                      <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                      <br clear="all" />
                  </div>
                </div>
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php twentyfourteen_post_thumbnail(); ?>
	<header class="entry-header">
		<?php

			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>

		<div class="entry-meta">
			<?php
				if ( 'post' == get_post_type() )

				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyfourteen' ), __( '1 Comment', 'twentyfourteen' ), __( '% Comments', 'twentyfourteen' ) ); ?></span>
			<?php
				endif;

				edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ) );
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<?php //the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
  <div class="sub_con" style="min-height:0px !important;margin-bottom:40px;"></div>
</article><!-- #post-## -->
<?php endif; ?>