<?php
      $page_title="| Edit Product Details";
    session_start();
    include("db_connect.php");

    $id= $_GET['id'];
    $select_user = "SELECT * FROM products WHERE product_id = $id";
    $myUser = $mysqli->query($select_user);
    $row = $myUser->fetch_object();

     if(isset($_POST['submit'])&& 
        (!empty($_POST['product_name']))&& 
        (!empty($_POST['description']))&& 
        (!empty($_POST['sku']))&& 
        (!empty($_POST['stock']))&& 
        (!empty($_POST['cost'])) && 
        (!empty($_POST['price']))&& 
        (!empty($_POST['image']))&& 
        (!empty($_POST['image_tn'])) && 
        (!empty($_POST['weight']))&& 
        (!empty($_POST['origin']))&& 
        (!empty($_POST['recommended_age'])) && 
        (!empty($_POST['featured']))  && 
        preg_match("/^([A-Z])/",$_POST['description'])&& 
        preg_match("/^([A-Z0-9])/",$_POST['product_name'])&& 
        preg_match("/^[A-Z]-[0-9]{3}/",$_POST['sku']) && 
        preg_match("/[0-9]{1,3}/",$_POST['stock'])&& 
        preg_match("/^[0-9]{1,3}.[0-9]{2}$/",$_POST['cost'])&&
        preg_match("/^[0-9]{1,3}.[0-9]{2}$/",$_POST['price'])&&
        preg_match("/^[0-9]{1,2}.[0-9]$/",$_POST['weight'])&&
        preg_match("/^[A-Z][A-Za-z]+/",$_POST['origin'])){
        $update_product_query = "UPDATE products SET product_name = '".mysqli_real_escape_string($mysqli,$_POST['product_name'])."', 
                                                    description = '".mysqli_real_escape_string($mysqli,$_POST['description'])."',
                                                    category =  '".mysqli_real_escape_string($mysqli,$_POST['category'])."',
                                                    sku = '".mysqli_real_escape_string($mysqli,$_POST['sku'])."',
                                                    stock = '".mysqli_real_escape_string($mysqli,$_POST['stock'])."',
                                                    cost = '".mysqli_real_escape_string($mysqli,$_POST['cost'])."',
                                                    price = '".mysqli_real_escape_string($mysqli,$_POST['price'])."',
                                                    image = '".mysqli_real_escape_string($mysqli,$_POST['image'])."',
                                                    image_tn = '".mysqli_real_escape_string($mysqli,$_POST['image_tn'])."', 
                                                    weight = '".mysqli_real_escape_string($mysqli,$_POST['weight'])."',
                                                    origin = '".mysqli_real_escape_string($mysqli,$_POST['origin'])."',
                                                    recommended_age = '".mysqli_real_escape_string($mysqli,$_POST['recommended_age'])."',  
                                                    featured = '".mysqli_real_escape_string($mysqli,$_POST['featured'])."'
                                                   WHERE product_id = $id";
                                            
                        $mysqli->query($update_product_query);
                        header("Location: view_products.php");
    }
    include("header.php");

if($_SESSION['logged_in_user_access'] == ('Privileged'||'Administrator')){



                  if((isset($_POST['submit']))&&
                     (empty($_POST['product_name']) || 
                      empty($_POST['description']) || 
                      empty($_POST['category']) ||
                      empty($_POST['sku']) ||
                      empty($_POST['cost']) || 
                      empty($_POST['price']) ||
                      empty($_POST['image']) || 
                      empty($_POST['image_tn']) || 
                      empty($_POST['weight']) ||
                      empty($_POST['origin']) ||
                      empty($_POST['recommended_age']) || 
                      empty($_POST['featured']) || 
                      empty($_POST['stock']))){
                      print "<p class='red'>Please fill out all the fields.</p>\n";
                  }
        

?>
        <h3>Edit Product</h3>
      <div class="row">
           <div class="large-3 medium-3 small-12 columns">
            &nbsp;
           </div>
           <div class="large-6 medium-6 small-12 columns">
                	<form method="post" action="<? $_SERVER['PHP_SELF']; ?>"> 
    	<form method="post" action="<? $_SERVER['PHP_SELF']; ?>#">
           <? 
                if(!empty($_POST['product_name'])&&!preg_match("/^[A-Z0-9]/",$_POST['product_name'])){
                    
                    print "<p class='red'>Please enter a valid product name. Product names must start with a capital letter or a number.</p>";
                    }
           ?>
            
            
            

            
        	<label for="product_name">Product Name</label>
            <input name="product_name" id="product_name" type="text" value="<? print $row->product_name; ?>" />
            <br />
            <? 
                if(!empty($_POST['description'])&&!preg_match("/^([A-Z])/",$_POST['description'])){
                    
                    print "<p class='red'>Please try again. Descriptions must start with a capital letter.</p>";
                    }
           ?>
            <label for="description">Description</label>
            <textarea name="description" id="description"><? print $row->description; ?></textarea>
            <br />
            <label>category</label>
            <select name="category">
                  <option <? if ($row->category==Family){echo 'selected' ;} ?> value="Family">Family</option>
                  <option <? if ($row->category==Strategy){echo 'selected' ;} ?> value="Strategy">Strategy</option>
                  <option <? if ($row->category==Party){echo 'selected' ;} ?> value="Party">Party</option>
                  <option <? if ($row->category=="Co-op"){echo 'selected' ;} ?> value="Co-op">Co-op</option>
            </select>
             <br />
            <? 
                if(!empty($_POST['sku'])&&!preg_match("/^[A-Z]-[0-9]{3}/",$_POST['sku'])){
                    
                    print "<p class='red'>Please enter a valid SKU. SKU's must be in the format: S-052.</p>";
                    }
           ?>
            <label for="sku">SKU</label>
            <input name="sku" id="sku" type="text" value="<? print $row->sku; ?>" />
            <br />
            <? 
                if(!empty($_POST['stock'])&&!preg_match("/[0-9]{1,3}/",$_POST['stock'])){
                    
                    print "<p class='red'>Please try again. Stocks must only be numbers and cannot exceed over 1000.</p>";
                    }
           ?>
            <label for="stock">Stock</label>
            <input name="stock" id="stock" type="text" value="<? print $row->stock; ?>" />
            <br />
            <? 
                if(!empty($_POST['cost'])&&!preg_match("/^[0-9]{1,3}.[0-9]{2}$/",$_POST['cost'])){
                    
                    print "<p class='red'>Please try again. Costs must be in the format: 19.89.</p>";
                    }
           ?>
            <label for="cost">Cost</label>
            <input name="cost" id="cost" type="text" value="<? print $row->cost; ?>" />
            <br />
            <? 
                if(!empty($_POST['price'])&&!preg_match("/^[0-9]{1,3}.[0-9]{2}$/",$_POST['price'])){
                    
                    print "<p class='red'>Please try again. Costs must be in the format: 19.89.</p>";
                    }
           ?>
            <label for="price">Price</label>
            <input name="price" id="price" type="text" value="<? print $row->price; ?>" />
            <br />
            <label for="image">Image Link</label>
            <input name="image" id="image" type="text" value="<? print $row->image; ?>" />
            <br />
            <label for="image_tn">Image Thumbnail Link (200x200)</label>
            <input name="image_tn" id="image_tn" type="text" value="<? print $row->image_tn; ?>" />
            <br />
            <? 
                 if(!empty($_POST['weight'])&&!preg_match("/^[0-9]{1,2}.[0-9]$/",$_POST['weight'])){
                    
                    print "<p class='red'>Please try again. Weight (measured in pounds) must be in the format: 4.3.</p>";
                    }
           ?>
            <label for="weight">Weight (Pounds)</label>
            <input name="weight" id="weight" type="text" value="<? print $row->weight; ?>" />
            <br />
            <? 
                if(!empty($_POST['origin'])&&!preg_match("/^[A-Z][A-Za-z]+/",$_POST['origin'])){
                    
                    print "<p class='red'>Please try again. Origins must start with a capitol letter and can only be made up of letters.</p>";
                    }
           ?>
            <label for="origin">Origin (Country)</label>
            <input name="origin" id="origin" type="text" value="<? print $row->origin; ?>" />
            <br />
            <label for="recommended_age">Recommended Age</label>
            <select id="recommended_age" name="recommended_age">
                  <option <? if ($row->recommended_age==8){echo 'selected' ;} ?> value="8">8</option>
                  <option <? if ($row->recommended_age==12){echo 'selected' ;} ?> value="12">12</option>
                  <option <? if ($row->recommended_age==16){echo 'selected' ;} ?> value="16">16</option>
            </select>
            <br />
            <label>Featured Item</label>
            Yes
            <input <? if ($row->featured==Yes){echo 'checked="checked"' ;} ?> type="radio" name="featured" value="Yes"> 
            No
            <input <? if ($row->featured==No){echo 'checked="checked"' ;} ?> type="radio" name="featured" value="No">
                        <br />
            
            
            
            
             </div>
           
           <div class="large-3 medium-3 small-12 columns">
            &nbsp;
           </div>

        </div>
            
                
        <div class="row">

                <div class="large-3 medium-3 small-12 columns">
                    &nbsp;
                   </div>


                        <div class="large-6 medium-6 small-12 columns">  
                            <ul class="button-group login_group">
                                <li>
                                     <button name="submit" id="submit" type="submit" class="btn primary">
                                        Update Product  
                                     </button>  

                                </li>
                                <li>
                                    <a class="cancel_link" href="view_products.php" >
                                        Cancel  
                                    </a> 
                                </li>
                            </ul>
                        </div>

            <div class="large-3 medium-3 small-12 columns">
                    &nbsp;
                   </div>

                    </div>
            
            
            
            </form>
            <? 
    }
else{
    print "<p class='red'>This page is for administrators and privileged users only, please sign in to view content.</p>\n";
}
            ?>

<?php include("footer.php"); ?>