<?php 
$page_title=" | Home";
include("header_home.php"); 

?>

    <div class="categories">
        <div class="row" id="bigger_row" style="max-width: 90rem;">
            <div class="large-4 medium-4 small-12 columns">
                
                <div class="categories_img" id="first_category">
                    <div class="category_name">
                        <i class="fa fa-tag"></i>
                        <br>
                        Price Match
                        
                            <p class="descriptions">
                                    We won't be beat on price. We guarantee lowest prices on all of our products.
                            </p>
                    </div>
                </div>
            </div>
            <div class="large-4 medium-4 small-12 columns">
                <div class="categories_img" id="second_category">
                    <div class="category_name">
                        <i class="fa fa-paper-plane "></i>
                        <br>
                        Free Express Shipping
                        
                        <p class="descriptions">
                                    Free 3-day shipping standard on all purchases made in most U.S states.
                            </p>
                    </div>
                </div>
            </div>
            <div class="large-4 medium-4 small-12 columns">
                <div class="categories_img" id="third_category">
                    <div class="category_name">
                        <i class="fa fa-lock"></i>
                        <br> Secure Checkout
                        
                        <p class="descriptions">
                                    You can shop with us in confidence. We take the responsibility of keeping your information secure very seriously. 
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    
   <div class="on_sale_box">
       <div class="row">
       <div class="large-12 medium-12 small-12 columns">
        <h3>Featured</h3>
        <div class="row">
        
    
    <?

    $select_query = "SELECT product_name,
                            product_id,
							description,
							category,
							sku,
							cost,
							price,
                            stock,
							image,
                            image_tn
					 FROM products
                     WHERE featured='Yes'
                     LIMIT 0, 3";
    $select_result = $mysqli->query($select_query);
    while(($row = $select_result->fetch_object())) {

    print "\t\t\t<div class='large-4 medium-4 small-12 columns'>\n";
                print "\t\t\t\t<div class ='products'>\n";
                ?>  
                <form method="post" id="add_featured"
                      
                      <? if($row->stock>0){print "action='cart_update.php'";} 
                else{print "action='".$_SERVER['PHP_SELF']."#'";}?>>
                    
                    
                <?
                print "\t\t\t\t\t\t<div class='product_image'>\n";
                print "\t\t\t\t\t\t\t<a href='product.php?id=".$row->product_id."'><img src=\"".$row->image_tn."\" alt=\"".$row->product_name." Image\"></a>\n";
                print "\t\t\t\t\t\t</div>\n";
                            
                print "\t\t\t\t\t\t<p class='product_name'>".$row->product_name."</p>\n";
                  
              
                print "\t\t\t\t\t\t<div class='rw-ui-container' data-urid=".$row->product_id."></div>\n";
                print "\t\t\t\t\t\t<div>\n";
                print "\t\t\t\t\t\t\t<input type='hidden' name='product_qty' value='1' />\n";
                print "\t\t\t\t\t\t\t<input type='hidden' name='product_code' value=".$row->sku." />\n";
                print "\t\t\t\t\t\t\t<input type='hidden' name='type' value='add' />\n";
                print "\t\t\t\t\t\t\t<input type='hidden' name='return_url' value=".$current_url." />\n";
             
        
        if($row->stock<=0){
                    print "\t\t\t\t\t\t\t
                    <div class='bottom_product1'>
                \t\t\t\t\t\t<p class='price_product1'> $".$row->price."</p>\n;
                    <button disabled type='submit' class='add'>Out of Stock</button>\n";
                }
                else{print "\t\t\t\t\t\t\t
                <div class='bottom_product1'>
                \t\t\t\t\t\t<p> $".$row->price."</p>\n  
                
                <button type='submit' class='add product1'>Add to Cart</button>\n";} 
                
                print "\t\t\t\t\t\t</div>\n";
                print "\t\t\t\t\t</form>\n";
                
                print"\t\t\t\t</div>\n";
                print"\t\t\t\t</div>\n";
                print "\t\t\t</div>\n";
        
    }
  
    ?>
 
    </div>
              
           </div>
            <!-- <div class="large-4 medium-4 small-12 columns">
                <div class="row">
                    <img src="img/ad1.jpg" alt="Rentguard" class="ad1">
            </div>
        </div>-->
        </div>
                 
    </div>
       <script src="js/script.js"></script>

<?php include("footer.php"); ?> 