<?php
    get_header();
    if(have_posts()){
?>
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cart-title mt-50">
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_content();?></p>
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