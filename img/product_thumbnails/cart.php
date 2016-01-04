
<?php 
$page_title="| Cart";
include("header.php");

error_reporting(E_ALL ^ E_NOTICE);
if($_SESSION["cart_products"]==null){ ?>
    <br> 
    <h3 id='cart_h3' style='margin-left: 10%; margin-top: 50px; padding-bottom:0px'>
            Cart    
            
    </h3>
    <div class='empty_state_cart'>
        There are currently no items in your cart.
    </div> "
<? }

else{

?>
    
    <div class="row">
        <div class="large-12 medium-12 small-12 columns">
        <h3 id="cart_h3">
            Cart    
            
        </h3>
        </div>
    </div>  

    <div class="row">
     <!-- body wrap -->
    
           
            

         
          
         <div class="large-12 medium-12 small-12 columns">    
            <form method="post" action="process.php">
    <?php
    if(isset($_SESSION["cart_products"]))
    {
        
        foreach ($_SESSION["cart_products"] as $cart_itm)
        {
            //set variables to use in content below
            $product_name = $cart_itm["product_name"];
            $product_qty = $cart_itm["product_qty"];
            $product_price = $cart_itm["product_price"];
            $product_code = $cart_itm["product_code"];
            $product_image = $cart_itm["product_image"];
            $product_sku = $cart_itm["product_sku"];
            $product_stock = $cart_itm["product_stock"];
            $subtotal = ($product_price * $product_qty);
        ?>
                
                
    
        <div class="large-12 medium-12 small-12 columns item1">
        
        
               
            <div class="row">         
        <div class = "large-7 medium-7 small-12 columns ">
            
            
                    <div class="cart_image large-6 medium-12 small-12 columns">
                        <? print "<img src=\"".$product_image."\" alt=\"".$product_name."\">\n";  ?>   
                    </div>
               
                        <div class="large-5 medium-12 small-12 columns cart_item_name ">
                        <? print "<p>".$product_name."</p>\n"; ?>
                     
                        <? print "<p>".$currency.$product_price."</p>\n"; ?>
                </div>
                    </div>
                         
         
            <div class=" large-5 medium-5 small-12 columns">
                <div class="row">
             
                    

                <div class="cart_item_quantity large-5 medium-5 small-12 columns" >
                    <? print "<input type='text' size='2' maxlength='2' name='product_qty[".$product_code."]' value='".$product_qty."' />\n"; ?>
                    
                 <label for="remove_checkbox">
                     <? print "<input type='checkbox'id='remove_checkbox' name='remove_code[]' value='".$product_code."' />\n"; ?> Remove</label>
                    
                </div>

                <div class="cart_item_total large-7 medium-7 small-12 columns">
                     <? print "<p>".$currency.$subtotal."</p>\n"; ?>
                </div>

             
            </div>
             </div> 
               
                  
            </div>
      
            
            
            
             
        </div>
        
            
        
         
             
              <?
            $total = ($total + $subtotal); //add subtotal to total var
            print "<input type='hidden' name='item_name[".$cart_item."]' value='".$product_name."' />\n";
			print "\t\t\t<input type='hidden' name='item_code[".$cart_item."]' value='".$product_code."' />\n";
            print "\t\t\t<input type='hidden' name='item_price[".$cart_item."]' value='".$product_price."' />\n";
			print "\t\t\t<input type='hidden' name='item_qty[".$cart_item."]' value='".$product_qty."' />\n";
			$cart_item ++;
        }
        ?>
            </div>
        
        
            <div class="large-12 medium-12 small-12 columns grandtotal">
             <input type="hidden" name="return_url" value="<?php 
            $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
            echo $current_url; ?>" />
            
            <div class=" large-12 medium-12 small-12 columns below_cart">
<?
        
                    $grand_total = $total + $shipping_handling; //grand total including shipping cost
                    foreach($taxes as $key => $value){ //list and calculate taxes
                            $tax_amount     = round($total) * ($value);
                            $tax_item[$key] = $tax_amount;
                            $grand_total    = round($grand_total + $tax_amount,2);  //add tax val to grand total
                    }

                    foreach($shipping as $key => $value){ //list and calculate taxes in array
                            $ship_amount     = round($total) * ($value / 20);
                            $ship_item[$key] = $ship_amount;
                            $grand_total    = round($grand_total + $ship_amount,2);  //add shipping val to grand total
                    }

                    $list_tax       = '';
                    foreach($tax_item as $key => $value){ //List all taxes
                        $list_tax .= $key. sprintf("%01.2f", $value).'<br />';
                    }

                    $shipping_handling       = '';
                    foreach($ship_item as $key => $value){ //List all taxes
                        $shipping_handling  .= $key. sprintf("%01.2f", $value).'<br />';
                    }
                }
                $sub_total = round($grand_total-$list_tax-$shipping_handling,2);

                $_SESSION['grand_total']=$grand_total;
                $_SESSION['subtotal']=$sub_total;
                $_SESSION['shipping']=$shipping_handling;
                $_SESSION['tax']=$list_tax;
             ?>
                
                 <div class="large-7 medium-12 small-12 columns edit_shopping" style="float: left">
                
                    <div class="cart_continue large-12 medium-12 small-12 columns">
                        <a href="catalog.php">Continue Shopping</a>
                        <button type="submit" class="btn primary" formaction="cart_update.php">Update</button>
                    </div>    
                </div>
        
        
 
                <div class="large-5 columns below_cart" >
                  
                    <div class="total_box large-12 medium-12 small-12 columns">
                        <p class="sub1 ">Sub Total</p>
                        <? print "<p class='cost'>".$currency.$sub_total."</p>\n"; ?>
                        <p class="sub1 ">Shipping</p>
                        <? print "<p class='cost'>".$currency.$shipping_handling."</p>\n"; ?>
                        <p class="sub1 ">Tax</p>
                        <? print "<p class='cost'>".$currency.$list_tax."</p>\n"; ?>
                        <p class="sub1 grand" >Total</p>
                        <? print "<p class='cost grand'>".$currency.$grand_total."</p>\n"; ?>
                     
                
                    
                    
                         <button class="dw_button add checkout_button" type="submit" name="submitbutt" >
                             Checkout
                        </button>
                    </div>
                </div>
                  
                </div>
            </div>

           
        
             
             <div class="medium-12 small-12 columns sticky_footer" id="footer">
                 
                   <div class="medium-7 small-7 columns left-align">
                        <p class="cost">TOTAL : <? print $currency.$grand_total; ?></p>
                    </div>
                  
                   <div class="medium-5 small-5 columns right-align">
                        <button class="dw_button add checkout_button" id="mobile_checkout" type="submit" name="submitbutt" >
                            Checkout
                       </button>
                    </div>
             
             </div>
             
         
        </form>                  
          
            
    <div class="row" id="">
        <div class="large-4 medium-4 small-12 columns card_cart">
            <div class="cards">
                 SAFE AND SECURE CHECKOUT<br>
                <i class="fa fa-check-circle big">
                
                </i>
                <p class="explanation">
                
PayPal automatically encrypts your confidential information in transit from your computer to ours using the Secure Sockets Layer protocol (SSL) with an encryption key length of 128-bits (the highest level commercially available).
                </p>
            </div>
       
        </div>    
       <div class="large-4 medium-4 small-12 columns card_cart">
           <div class="cards">
                 ORDER HAVE A GIFT?
               <br>
               <i class="fa fa-gift big"></i>
             <p class="explanation">
                
The gift message will be printed on the packing slip. If you have added gift wrap, the packing slip will be placed in an envelope marked “Don’t spoil the surprise”. The recipient will also be able to use the packing slip to return an item if necessary.
                </p>
               
            </div>
        </div>    
       <div class="large-4 medium-4 small-12 columns card_cart">
               <div class="cards">
                 FREE AND EASY RETURNS<br>
                    <i class="fa fa-truck big">
                
                </i>
                   <p class="explanation">
                
 We will accept a return for any item within 15 days of your receipt of the order. We can only accept returns on items which are in their original condition. We can refund shipping costs only if the return is a result of our error. 
                </p>
            </div>
        </div>    
        
    </div>  
            
            
            


             
        </div> <!-- End Body Wrap -->
       
    
       <?
            }
            
            include("footer.php");
        ?>