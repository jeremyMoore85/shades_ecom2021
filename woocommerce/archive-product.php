<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); // get current term
$parent = get_term($term->parent, get_query_var('taxonomy') ); // get parent term
$children = get_terms( array('taxonomy' => 'product_cat','child_of' => $term->term_id,'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => false));
//$children = get_term_children($term->term_id, get_query_var('taxonomy')); // get children
$catDesc = get_field('catDesc', 'product_cat_'.$term->term_id);
$imgID = get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true);
$imgSource = wp_get_attachment_image_src($imgID, 'full');
?>
<header class="woocommerce-products-header">
    	<div class="row mb-30">
        	<div class="col-xs-12 col-md-4">
            	<div class="catImg">
                    <img src="<?php echo $imgSource[0]; ?>" />
                </div>
            </div>
            <div class="col-xs-12 col-md-8">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>
	<?php if($catDesc):?>
    	<div class="catDesc">
        	<?php echo $catDesc; ?>
        </div> 
    <?php endif; ?>
    </div>
</header>
<?php


if(sizeof($children)==0) {

if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}
?>
<?php 
	if( have_rows('instoreProducts', 'product_cat_'.$term->term_id) ):
?>
<div class="row" id="instore">
	<div class="col-xs-12">
    	<h3>In-store Options</h3>
        <div class="pro_list woocommerce">
        <ul class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">
<?php
	global $i;
	$i = 0;
	  while ( have_rows('instoreProducts', 'product_cat_'.$term->term_id) ) : the_row();
?>
<?php if($i == 0):?>
<li class="product first">
<?php elseif($i == 2):?>
<li class="product last">
<?php else: ?>
<li class="product">
<?php endif; ?>
<a href="<?php echo get_sub_field('productImage'); ?>" rel="example1" title="" class="cboxElement prodLink">
<div class="productItem">
    	<div class="productImg">
        	<div class="productImgOverlay">
            	<div class="productOverlayCnt">
                	<div class="overlayCnt">
                		<h4><?php echo get_sub_field('productName'); ?></h4>
                    	<div class="overlayBtn">View Larger Image</div>
                    </div>
                </div>
            </div>
            <img src="<?php echo get_sub_field('productImage'); ?>" alt="<?php echo get_sub_field('productImage'); ?>" class="prodImg" />
        </div>
        <h4 class="prodTtl"><?php echo get_sub_field('productName'); ?></h4>
    </div>
</a>                         	
</li>
<?php
		$i++;
		if($i == wc_get_loop_prop( 'columns' )){
			$i = 0;
		}
	  endwhile;
?>
		</ul>
		</div>
    </div>
</div>
<?php
	endif;
?>
    
<?php
}elseif(($parent->term_id=="") && (sizeof($children)>0)) {
?>
<div class="row">
<?php
asort( $children );
?>
<?php
foreach($children as $child):	
	$childData = get_term_by('id', $child->term_id, 'product_cat');
	$parentData = get_term_by('id', $parent, 'product_cat');
	$childImgID = get_woocommerce_term_meta($child->term_id, 'thumbnail_id', true);
	$childImgURL = wp_get_attachment_image_src($childImgID, 'full');
	$childImg = wp_get_attachment_url($childImgID);
	$curCat = get_queried_object();
	$brandLogo = get_field('logo', 'product_cat_'.$childData->term_id);
?>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    	<a href="/product-category/<?php echo $curCat->slug; ?>/<?php echo $childData->slug; ?>/">
    	<div class="brandLogo" style="background:url(<?php echo $childImgURL[0]; ?>) top center; background-size:cover;">
        	<div class="brandLogoInner">
            	<?php if($brandLogo != ''):?>
    			<img src="<?php echo $brandLogo; ?>" />
                <?php else: ?>
                	<h4><?php echo $childData->name; ?></h4>
                <?php endif; ?>
        	</div>
        </div>
        </a>
    </div>
<?php
endforeach;
?>
</div>
<?php
}
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
