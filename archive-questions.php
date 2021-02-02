<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Fourteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<section id="primary" class="content-area">
  <div id="content" class="site-content" role="main">
    <?php if ( have_posts() ) : ?>
    <div class="row mb-30">
      <div class="col-xs-12 col-md-4">
        <div class="catImg"> <img src="/blog/wp-content/uploads/2019/11/faq.jpg"> </div>
      </div>
      <div class="col-xs-12 col-md-8">
        <h1 class="woocommerce-products-header__title page-title">FAQ</h1>
        <div class="catDesc">
          <p></p>
        </div>
      </div>
    </div>
    <?php
					// Start the Loop.
					while ( have_posts() ) : the_post();
?>
<div class="faqAcc">
	<div class="question">
    	<h4><?php echo get_the_title(); ?></h4>
    </div>
    <div class="answer">
    	<?php the_content(); ?>
    </div>
</div>
<?php

					endwhile;
					// Previous/next page navigation.
					twentyfourteen_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
  </div>
  <!-- #content --> 
</section>
<!-- #primary -->

<?php
get_footer();

