<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);
?>
 <div class="col-12 col-lg-7">
	<div class="single_product_thumb">
            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                
		<?php
		 $html =''; $listhtml='';
		if ( $post_thumbnail_id ) {
			
			$listhtml .=' <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url('.get_the_post_thumbnail_url($product->ID ) .');">
                                    </li>';
            $html.= '<div class="carousel-item active"><a class="gallery_img" href="'.get_the_post_thumbnail_url($product->ID ).'">
                    <img class="d-block w-100" src="'.get_the_post_thumbnail_url($product->ID ).'" alt="First slide">
                </a></div>';

			
		} else {
			
			$listhtml .=' <li class="" data-target="#product_details_slider" data-slide-to="0" style="background-image: url('.esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ).');">
                                    </li>';
            $html.= '<div class="carousel-item active"><a class="gallery_img" href="'.wc_placeholder_img_src('woocommerce_single' ).'">
                    <img class="d-block w-100" src="'.wc_placeholder_img_src('woocommerce_single' ).'" alt="First slide">
                </a></div>';

		}

		
$attachment_ids = $product->get_gallery_image_ids();

if ( $attachment_ids && $product->get_image_id() ) {
	foreach ( $attachment_ids as $attachment_id ) {
        $listhtml .= '<li class="" data-target="#product_details_slider" data-slide-to="0" style="background-image: url('.esc_url( wp_get_attachment_url( $attachment_id ) ).');">
                                    </li>';
           $html.='<div class="carousel-item"><a class="gallery_img" href="'.wp_get_attachment_url('woocommerce_single' ).'">
                    <img class="d-block w-100" src="'.wp_get_attachment_url('woocommerce_single' ).'" alt="First slide">
                </a></div>';

		/*echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id ), $attachment_id );*/ // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
	}
}
		?>
		<ol class="carousel-indicators">
			<?php echo $listhtml; ?>
                </ol>
                 <div class="carousel-inner">
                 	<?php echo $html; ?>
                 </div>
	
</div>
</div>
	<!-- </figure> -->
<!-- </div> -->
</div>
