<?php
/**
  Template Name: Contact Us

 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_twentyOne
 * @since 1.0
 * @version 1.0
 */
    get_header();
    if(have_posts()){
?>

  <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2><?php the_title(); ?></h2>
                            </div>
                            <?php echo   do_shortcode('[contact-form-7 id="42" title="Contact form 1"]'); ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>





 
<?php 
    }

    ?>
</div>
<?php
    get_footer();