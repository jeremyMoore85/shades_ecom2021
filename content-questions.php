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
<div class="faqAcc">
	<div class="question">
    	<h4><?php echo get_the_title(); ?></h4>
    </div>
    <div class="answer">
    	<?php the_content(); ?>
    </div>
</div>