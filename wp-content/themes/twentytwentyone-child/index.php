<?php 
	get_header();

	?>

	
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->


        <!-- Mobile Nav (max width 767px)-->
        

       
        <!-- Header Area End -->

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">
                <?php 
               
                $posts = get_posts(array('numberposts'=>6,'post_type'=>'product','order_by'=>'desc'));
            //   print_r($posts);die();
                    foreach($posts as $post) { 
                        $price = get_post_meta( $post->ID, '_sale_price', true);
                        ?>
                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="<?php echo get_permalink($post->ID); ?>">
                       
                        <?php echo get_the_post_thumbnail($post->ID); ?>
                       
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From $<?php echo $price; ?></p>
                            <h4><?php echo $post->post_title; ?></h4>
                        </div>
                    </a>
                </div>
<?php  } ?>
            
            </div>
        </div>
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    
	<?php
	get_footer();
?>