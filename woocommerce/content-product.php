<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if ( empty( $product ) || !$product->is_visible() ) {
  return;
}
?>
<li <?php wc_product_class( '', $product ); ?>> <a href="<?php echo get_the_permalink(); ?>" class="prodLink">
  <div class="productItem">
    <div class="productImg">
      <div class="productImgOverlay">
        <div class="productOverlayCnt">
          <div class="overlayCnt">
            <h4><?php echo $product->name; ?></h4>
            <div class="overlayBtn">Shop Now</div>
          </div>
        </div>
      </div>
      <?php $productImg = $product->image_id; ?>
      <?php $imgSource = wp_get_attachment_image_src($productImg, 'full'); ?>
      <img src="<?php echo $imgSource[0]; ?>" class="prodImg" /> </div>
    <h4 class="prodTtl"><?php echo $product->name; ?></h4>
    <?php if($_GET['test'] == 'test'):?>
    <?php
    $terms = get_the_terms( $post->ID, 'product_cat' );
    foreach ( $terms as $term ) {
      if ( in_array( $term->parent, array( '90', '62' ) ) ) {
        $catID = $term->term_id;
      }
    }
    ?>
    <div class="brandInfo"> <a href="<?php echo get_term_link($catID); ?>" class="brandLink">
      <h4>Shop More Products By</h4>
      <img src="<?php echo get_field('logo', 'product_cat_'.$catID); ?>" /> </a> </div>
    <?php endif; ?>
  </div>
  </a> </li>
