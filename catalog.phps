<?php
$page_title="| Catalog";

    error_reporting(E_ALL ^ E_NOTICE);
    if($_POST['view']||$_POST['sort']||$_POST['category']){
        header("Location:catalog.php?page=1");
    }
    include("header.php");
    $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

?>
    <div class="row">
        <div class="large-12 medium-12 small-12 columns">
            <h2>
            Product Catalog
            </h2>
        </div>
    </div>
    <div class="row moreSpace">
          
         <div class="large-3 medium-3 small-12 columns">
            &nbsp;
        </div>
          
         <div class="large-2 medium-12 columns">
            <p>Sort by:</p>
<?(isset($_POST["sort"])) ? ($sort = $_POST["sort"]) &&($_SESSION['sort']=$_POST["sort"]) : $sort=$_SESSION['sort'];?>
            <form id="sort_form" method="post" onchange="change2()">
                <select id="sort" name="sort">
                  <option <? if ($sort == blank ) echo 'selected' ; ?> value="blank">--</option>
                  <option <? if ($sort == Name ) echo 'selected' ; ?> value="Name">Name</option>
                  <option <? if ($sort == Price ) echo 'selected' ; ?> value="Price">Price</option>
                </select>
            </form>
        </div>
         
            

         <div class="large-2 medium-12 columns">
             <p>View by:</p>
           
        <?          if($_SESSION['view']>12){
                        $view=$_SESSION['view'];
                    }

                    else{$_SESSION['view']=12;}

((isset($_POST["view"])) ? ($view = $_POST["view"])&&($_SESSION['view']=$_POST["view"]) : $view=$_SESSION['view']);?>
                
            <form id="view_form" method="post" onchange="change()">
                <select id="view" name="view">
                    <option <? if ($view == 12 ) echo 'selected' ; ?> value="12">View 12</option>
                    <option <? if ($view == 24 ) echo 'selected' ; ?> value="24"> View 24</option>
                    <option <? if ($view == 36 ) echo 'selected' ; ?> value="36"> View 36</option>
                </select>
            </form>
                
            <? 

                (isset($_POST["category"])) ? ($category = $_POST["category"]) &&($_SESSION['category']=$_POST["category"]) : $category=$_SESSION['category'];

                $page = (int) $_GET['page'];
                if ($page < 1) $page = 1;
                $startResults = ($page - 1) * $view;
                
                

                if($sort==Name){
                    $order = "product_name ASC";
                }

                elseif($sort==Price){
                    $order = "price ASC";
                }

                else{$order= "product_id ASC";}

                if($category==Family){
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
                     WHERE category='Family'
                     ORDER BY ".$order."
                     LIMIT $startResults, $view";
                    $numberOfRows = mysqli_num_rows($mysqli->query('SELECT * FROM products WHERE category="Family"'));
                }

                elseif($category==Strategy){
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
                     WHERE category='Strategy'
                     ORDER BY ".$order."
                     LIMIT $startResults, $view";
                    $numberOfRows = mysqli_num_rows($mysqli->query('SELECT * FROM products WHERE category="Strategy"'));
                }


                elseif($category==Party){
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
                     WHERE category='Party'
                     ORDER BY ".$order."
                     LIMIT $startResults, $view";
                    $numberOfRows = mysqli_num_rows($mysqli->query('SELECT * FROM products WHERE category="Party"'));
                }


                elseif($category=="Co-op"){
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
                     WHERE category='Co-op'
                     ORDER BY ".$order."
                     LIMIT $startResults, $view";
                    $numberOfRows = mysqli_num_rows($mysqli->query('SELECT * FROM products WHERE category="Co-op"'));
                }


                else{
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
                     ORDER BY ".$order."
                     LIMIT $startResults, $view";
                    $numberOfRows = mysqli_num_rows($mysqli->query('SELECT * FROM products'));
                }

                $totalPages = ceil($numberOfRows / $view);
    
    
                $select_result = $mysqli->query($select_query);
                
                
            
                    $last_number_result = $mysqli->query($select_query); 

                      $amount = $last_number_result->fetch_object();
            ?>
<br>
            <span class="viewing">
                   <?  
                    if(($startResults+$view)>($numberOfRows)){
                     print "Viewing ".($startResults+1)."-".($numberOfRows)." of ".$numberOfRows."\n";
                    }
                    else{
                        print "Viewing ".($startResults+1)."-".($startResults+$view)." of ".$numberOfRows."\n";
                    }?>
            </span>
        
        </div>
    </div>
   
   
      <div class="large-3 medium-3 small-12  columns side-nav" >
          <h3>
            Categories
          </h3>
          


        <form id="category_form" method="post" onchange="change3()">
            <ul class="">
              <li>
                <div class="large-12 columns  ">
                  <input name="category" type="submit" value="Family" class="sort_button <? if($category==Family){ print "category_select";}?>" />
                </div>

              </li>
              <li>
                 <div class="large-12 columns ">
                   <input name="category" type="submit" value="Strategy" class="sort_button <? if($category==Strategy){ print "category_select";}?>" />
                </div>

              </li> 
              <li>
                 <div class="large-12 columns ">
                   <input name="category" type="submit" value="Party" class="sort_button  <? if($category==Party){ print "category_select";}?> " />
                </div>

              </li>
              <li>
                 <div class="large-12 columns ">
                   <input name="category" type="submit" value="Co-op" class="sort_button <? if($category==="Co-op"){ print "category_select";}?> " />
                </div>

              </li>
              <li>
                 <div class="large-12 columns  ">
                   <input name="category" type="submit" value="All" class="sort_button <? if($category==All){ print "category_select";}?> " />
                </div>
              </li>

            </ul>
        </form>
      </div>
      <?              
           
if($view==24){
    
  $twenty_four=0;
                $limit_twenty_four=23;


                while(($row = $select_result->fetch_object())&&($twenty_four<=$limit_twenty_four)) {
                  
				$twenty_four++;
                 print "\t\t\t<div class='large-3 medium-3 small-12 columns'>\n";
                print "\t\t\t\t<div class ='products'>\n";
                ?>  
                <form method="post" 
                      
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
                
                <button type='submit' class='add btn product1 catalog'>Add to Cart</button>\n";} 
                
                print "\t\t\t\t\t\t</div>\n";
                print "\t\t\t\t\t</form>\n";
                
                print"\t\t\t\t</div>\n";    
                    
                    
                print"\t\t\t\t</div>\n";
                print "\t\t\t</div>\n";
                      
}  
    
} 

elseif($view==36){
    
  $thirty_six=0;
                $limit_thirty_six=35;


                while(($row = $select_result->fetch_object())&&($thirty_six<=$limit_thirty_six)) {
                  
				$thirty_six++;
                print "\t\t\t<div class='large-3 medium-3 small-12 columns'>\n";
                print "\t\t\t\t<div class ='products'>\n";
                ?>  
                <form method="post" 
                      
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
                
                <button type='submit' class='add btn product1 catalog'>Add to Cart</button>\n";} 
                
                print "\t\t\t\t\t\t</div>\n";
                print "\t\t\t\t\t</form>\n";
                
                print"\t\t\t\t</div>\n";    
                    
                    
                print"\t\t\t\t</div>\n";
                print "\t\t\t</div>\n";
                      
}  
    
}

else{
                $twelve=0;
                $limit_twelve=11;


                while(($row = $select_result->fetch_object())&&($twelve<=$limit_twelve)) {
                  
				$twelve++;
                print "\t\t\t<div class='large-3 medium-3 small-12 columns'>\n";
                print "\t\t\t\t<div class ='products'>\n";
                ?>  
                <form method="post" 
                      
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
                
                <button type='submit' class='add btn product1 catalog'>Add to Cart</button>\n";} 
                
                print "\t\t\t\t\t\t</div>\n";
                print "\t\t\t\t\t</form>\n";
                
                print"\t\t\t\t</div>\n";    
                    
                    
                print"\t\t\t\t</div>\n";
                print "\t\t\t</div>\n";
                      
}
            
}
            
?>  
   
        <hr/>
        <div class="catalog_bottom">
            <div class="page_number">
                <ul>
                    <?
                        if($page > 1){
                        print "<li>\n"; 
                        print "\t\t\t\t\t\t<a href='?page=".($page - 1)."'>< Previous </a>\n"; 
                        print "\t\t\t\t\t</li>\n";      
                        }

                    for($i = 1; $i <= $totalPages; $i++)
                        {   print "\t\t\t\t\t<li>\n";
                            if($i == $page){
                              print "\t\t\t\t\t\t<span='active_page'>".$i."</span>\n";
                            }
                            else{
                              print "\t\t\t\t\t\t<a href='?page=".$i."'>".$i."</a>\n";
                            }
                            print "\t\t\t\t\t</li>\n";
                        } 
                    ?>
                    <li>
                        <?  if($numberOfRows > $view){
                            print "<a href='?page=".($page + 1)."'>Next > </a>\n"; 
                    }
                        ?>
                    </li>
                </ul>


            </div>

            <div class="numbers_bottom">

                 <div class="item_numbers_bottom">
                     <?  
                    if(($startResults+$view)>($numberOfRows)){
                     print "Viewing ".($startResults+1)."-".($numberOfRows)." of ".$numberOfRows."\n";
                    }
                    else{
                        print "Viewing ".($startResults+1)."-".($startResults+$view)." of ".$numberOfRows."\n";
                    }?>
                </div>
            </div>
        </div>
   
<script src="js/script.js"></script>
<?php include("footer.php"); ?>