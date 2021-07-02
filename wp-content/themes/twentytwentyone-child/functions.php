<?php
function sydney_add_woocommerce_support() {
	add_theme_support('post-thumbnails');
	add_theme_support( 'widgets' );
    add_theme_support( 'woocommerce' );
    if (  current_user_can( 'manage_options' ) ) {
    	show_admin_bar( true );
	}
}

add_action( 'after_setup_theme', 'sydney_add_woocommerce_support' );
?>