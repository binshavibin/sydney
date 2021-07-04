<?php 
    get_header(); ?>
      <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
    <?php

  echo   do_shortcode('[woocommerce_checkout]');
?>
</div>
</div>
</div>
</div>
<?php 
    get_footer();
?>