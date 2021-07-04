<?php
function sydney_add_woocommerce_support() {
	add_theme_support('post-thumbnails');
	add_theme_support( 'widgets' );
    add_theme_support( 'woocommerce' );
    if (is_user_logged_in()) {
        add_filter( 'show_admin_bar', '__return_true' , 1000 );

    }

    
}
add_action( 'admin_menu', 'misha_options_page' );

function misha_options_page() {

    /*add_options_page(
        'Sydney Settings', // page <title>Title</title>
        'Sydney Settings', // menu link text
        'manage_options', // capability to access the page
        'sydney-settings', // page URL slug
        'sydney_settings', // callback function with content
        1 // priority
    );*/
    if( function_exists('acf_add_options_page') ) {

    $page = acf_add_options_page(array(
        'page_title'    => __('Sydney Settings', 'productify'),
        'menu_title'    => __('Sydney Settings', 'productify'),
        'menu_slug'     => 'sydney-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

}

}

function sydney_settings(){

    

}


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



// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) { // print_r($fields );
    foreach ($fields as $category => $value) {
        // loop by fields
        foreach ($fields[$category] as $field => $property) {
           //$fields[$category][$field]['placeholders'] = $fields[$category][$field]['label'] ;
           //$fields[$category][$field]['label'] = '';
           //$fields[$category][$field]['placeholder'] = $field ;
            $fields[$category][$field]['input_class'] =array('form-control');
           // unset($fields[$category][$field]['label']);
           
        }
     }
     /*$fields['billing']['billing_first_name'] =  array(
                                     'placeholder'   => 'First Name',
                                     'required'=>true,
                                     'priority'=>1
                                    );
     $fields['billing']['billing_last_name'] =  array(
                                     'placeholder'   => 'Last Name',
                                     'priority'=>2
                                    );
     $fields['billing']['billing_company'] =  array(
                                     'placeholder'   => 'Company Name'
                                     ,
                                     'priority'=>3
                                    );*/
     

      
     return $fields;
}
// WooCommerce Checkout Fields Hook
//add_filter('woocommerce_checkout_fields','custom_wc_checkout_fields_no_label');

// Our hooked in function - $fields is passed via the filter!
// Action: remove label from $fields
function custom_wc_checkout_fields_no_label($fields) {
    // loop by category
    foreach ($fields as $category => $value) {
        // loop by fields
        foreach ($fields[$category] as $field => $property) {
            // remove label property
            $fields[$category][$field]['placeholder'] = $fields[$category][$field]['label'];
            //unset($fields[$category][$field]['label']);
        }
    }
     return $fields;
}

/**
 * Display field value on the order edit page
 */

add_action( 'woocommerce_admin_order_data_after_shipping_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
    global $post_id;
    $order = new WC_Order( $post_id );
    echo '<p><strong>'.__('Field Value').':</strong> ' . get_post_meta($order->get_id(), '_shipping_field_value', true ) . '</p>';
}



add_filter( 'woocommerce_order_button_html', 'misha_custom_button_html' );

function misha_custom_button_html( $button_html ) {
    $button_html = str_replace( 'Place order', 'Submit', $button_html );
    return $button_html;
}
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_filter('gettext', 'translate_reply');
function translate_reply($translated) {


   $translated = str_ireplace('Quantity', 'Qty', $translated);
    return $translated;
 
}

add_action('woocommerce_after_product_title', 'my_print_stars' );


function my_print_stars(){
    global $wpdb;
    global $post;
    $count = $wpdb->get_var("
    SELECT COUNT(meta_value) FROM $wpdb->commentmeta
    LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
    WHERE meta_key = 'rating'
    AND comment_post_ID = $post->ID
    AND comment_approved = '1'
    AND meta_value > 0
");

$rating = $wpdb->get_var("
    SELECT SUM(meta_value) FROM $wpdb->commentmeta
    LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
    WHERE meta_key = 'rating'
    AND comment_post_ID = $post->ID
    AND comment_approved = '1'
");
$count =10; $rating =7;
if ( $count > 0 ) {

    $average = number_format($rating / $count, 2);

    echo '<div class="starwrapper" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">';

    echo '<span class="star-rating" title="'.sprintf(__('Rated %s out of 5', 'woocommerce'), $average).'"><span style="width:'.($average*16).'px"><span itemprop="ratingValue" class="rating">'.$average.'</span> </span></span>';

    echo '</div>';
    }

}
?>