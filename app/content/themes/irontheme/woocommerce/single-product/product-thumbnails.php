<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$attachment_ids = $product->get_gallery_image_ids();
$post_thumbnail_id = $product->get_image_id();
$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
$image_size        = apply_filters( 'woocommerce_gallery_image_size', $thumbnail_size );
if ( $attachment_ids && $product->get_image_id() ): ?>
	<div class="woocommerce-product-thumb-slider swiper-container">
		<div class="swiper-wrapper">
			<div class="woocommerce-product-thumb-slider__item swiper-slide active">
				<?php echo wp_get_attachment_image($post_thumbnail_id, apply_filters( 'woocommerce_gallery_image_size', $image_size )); ?>
			</div>
			<?php foreach ( $attachment_ids as $attachment_id ): ?>
				<div class="woocommerce-product-thumb-slider__item swiper-slide">
					<?php echo wp_get_attachment_image($attachment_id, apply_filters( 'woocommerce_gallery_image_size', $image_size )); ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<!-- /.woocommerce-product-thumb-slider swiper-container -->
<?php endif; ?>