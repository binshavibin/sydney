<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce\Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
global $product;
the_title( '<a href="#"><h6>', '</h6></a>' );
//do_action('woocommerce_after_product_title');
//$product = wc_get_product( $id );
?>
<div class="rating-custom">
    <?php wc_get_template( 'single-product/rating.php' ); ?>
</div>
<?php

the_content(' <div class="short_overview my-5">',
                              
                            '</div>');
