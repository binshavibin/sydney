<?php
    get_header();

?>
<!-- <form id="searchform">
 <div class="shop_sidebar_area"> 
    
           
           
            <div class="widget catagory mb-50">
               
                <h6 class="widget-title mb-30">Catagories</h6>
                
             
                <div class="catagories-menu">
                    <?php //echo do_shortcode('[woof autosubmit=1  per_page=6  ]');  
                    $categories = get_categories(array('taxonomy'=>'product_cat','hide_empty'=>false));
                    //print_r($categories);

                    ?>
                    <div class="widget-desc">
                    
                    <?php if(!empty($categories)) { 
//print_r($_GET['product_cat']);
                        foreach($categories as $ky=> $eachcategory){
                     if(isset($_GET['product_cat'])&&!empty($_GET['product_cat']) && in_array($eachcategory->term_id, $_GET['product_cat']) )
                            
                        $selectected = 'checked';
                    else
                        $selectected = '';
                    echo '<div class="form-check">
                        <input class="form-check-input searchinput" type="checkbox" value="'.$eachcategory->term_id.'" id="" name=product_cat[]'.$selectected.' >
                        <label class="form-check-label" for="amado">'.$eachcategory->name.'</label> </div> ';
                   
                 } } ?>
                </div>
                </div>
            </div>         

           

        </div>
    </form> -->
   
        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
<!-- 
                <div class="row">
                    <div class="col-12">
                        <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                           
                            <div class="total-products">
                                <p>Showing 1-8 0f 25</p>
                               
                            </div>
                            
                            <div class="product-sorting d-flex">
                                <div class="sort-by-date d-flex align-items-center mr-15">
                                    <p>Sort by</p>
                                    <form action="#" method="get">
                                        <select name="select" id="sortBydate">
                                            <option value="value">Date</option>
                                            <option value="value">Newest</option>
                                            <option value="value">Popular</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="view-product d-flex align-items-center">
                                    <p>View</p>
                                    <form action="#" method="get">
                                        <select name="select" id="viewProduct">
                                            <option value="value">12</option>
                                            <option value="value">24</option>
                                            <option value="value">48</option>
                                            <option value="value">96</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
              <!--   content goes here -->

              <?php  echo do_shortcode('[woof_products per_page=6  taxonomies=product_cat]'); ?>
            </div>
        </div>
</div>
</div>
<?php
    get_footer();

?>
<script type="text/javascript">
    jQuery('.searchinput').on('change',function(){
    //alert('searching');
    jQuery('#searchform').submit();
    })
</script>