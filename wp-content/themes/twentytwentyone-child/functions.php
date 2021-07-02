<?php
function sydney_add_woocommerce_support() {
	add_theme_support('post-thumbnails');
	add_theme_support( 'widgets' );
    add_theme_support( 'woocommerce' );
    if (  current_user_can( 'manage_options' ) ) {
    	show_admin_bar( true );
	}
}
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_filter('woocommerce_product_related_posts_query', '__return_empty_array', 100);
add_action( 'after_setup_theme', 'sydney_add_woocommerce_support' );
function woocommerce_template_loop_product_title() {
    echo '<a href="'.get_permalink().'">
                                        <h6>' . get_the_title() . '</h6></a>';
}

add_action( 'wp', 'njengah_remove_sidebar_product_pages' );

function  njengah_remove_sidebar_product_pages() {

    if ( is_product() ) {

    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

   }

}
/** to change the position of excerpt **/
//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
/*add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 31 );
function wdm_add_custom_fields()
{
   
    echo 'ABC'.get_post_meta(get_the_ID(), "ABC", true);
   
    
}
add_action( 'woocommerce_single_product_summary', 'wdm_add_custom_fields', 21 );*/
?>