<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
global $catID;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div class="row">
	<div class="col-xs-12 col-md-6" id="productGal">
    	<?php woocommerce_show_product_images(); ?>
    </div>
    <div class="col-xs-12 col-md-6" id="productStats">
    	<div class="productTtl">
        	<?php woocommerce_template_single_title(); ?>
        </div>
        <div class="productPrice">
        	<?php woocommerce_template_single_price(); ?>
        </div>
        <div class="productDesc">
        	<?php echo apply_filters('the_content', $product->get_description()); ?>
        </div>
        <div class="productCart">
        	<?php woocommerce_template_single_add_to_cart(); ?>
        </div>
<?php
	$terms = get_the_terms($post->ID, 'product_cat');
	foreach($terms as $term){
		if(in_array($term->parent, array('90', '62'))){
			$catID = $term->term_id;
		}
	}
?>
<?php if( get_field('clothingType') == 'men' ):?>
	<?php if( have_rows('sizingChartMen', 'product_cat_'.$catID) ): ?>
			<div class="sizeChart">
				<div class="sizeChartTtl">
					<h4>Sizing Chart</h4>
				</div>
				<div class="sizeChartTbl">
					<div class="row sizeChartRow sizeChartLbl">
						<div class="col-xs-5 col-sm-4 col-md-3 sizeChartCol">
							<strong>Size</strong>
						</div>
						<div class="col-xs-7 col-sm-8 col-md-9 sizeChartCol">
							<strong>Description</strong>
						</div>
					</div>
					<?php while ( have_rows('sizingChartMen', 'product_cat_'.$catID) ) : the_row(); ?>
					<div class="row sizeChartRow">
						<div class="col-xs-5 col-sm-4 col-md-3 sizeChartCol">
							<strong><?php echo get_sub_field('size', 'product_cat_'.$catID); ?></strong>
						</div>
						<div class="col-xs-7 col-sm-8 col-md-9 sizeChartCol">
							<?php echo get_sub_field('sizeDesc', 'product_cat_'.$catID); ?>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
	<?php endif; ?>
<?php  else: ?>
	<?php if( have_rows('sizingChart', 'product_cat_'.$catID) ): ?>
			<div class="sizeChart">
				<div class="sizeChartTtl">
					<h4>Sizing Chart</h4>
				</div>
				<div class="sizeChartTbl">
					<div class="row sizeChartRow sizeChartLbl">
						<div class="col-xs-5 col-sm-4 col-md-3 sizeChartCol">
							<strong>Size</strong>
						</div>
						<div class="col-xs-7 col-sm-8 col-md-9 sizeChartCol">
							<strong>Description</strong>
						</div>
					</div>
					<?php while ( have_rows('sizingChart', 'product_cat_'.$catID) ) : the_row(); ?>
					<div class="row sizeChartRow">
						<div class="col-xs-5 col-sm-4 col-md-3 sizeChartCol">
							<strong><?php echo get_sub_field('size', 'product_cat_'.$catID); ?></strong>
						</div>
						<div class="col-xs-7 col-sm-8 col-md-9 sizeChartCol">
							<?php echo get_sub_field('sizeDesc', 'product_cat_'.$catID); ?>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
	<?php endif; ?>
<?php endif; ?>
    </div>
</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>

