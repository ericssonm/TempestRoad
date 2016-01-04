<?php
    session_start();
$page_title="| New Product";

    include("db_connect.php");

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
        $insert_user_query = "INSERT INTO products(product_name,
                                                    description,
                                                    category,
                                                    sku,
                                                    stock,
                                                    cost,
                                                    price,
                                                    image,
                                                    image_tn,
                                                    weight,
                                                    origin,
                                                    recommended_age,
                                                    featured)
                                                 VALUES ('".mysqli_real_escape_string($mysqli,$_POST['product_name'])."',
                                                         '".mysqli_real_escape_string($mysqli,$_POST['description'])."',                                                              '".mysqli_real_escape_string($mysqli,$_POST['category'])."',
                                                        '".mysqli_real_escape_string($mysqli,$_POST['sku'])."',
                                                         '".mysqli_real_escape_string($mysqli,$_POST['stock'])."',                                                                  '".mysqli_real_escape_string($mysqli,$_POST['cost'])."',                                                                   '".mysqli_real_escape_string($mysqli,$_POST['price'])."',
                                                         '".mysqli_real_escape_string($mysqli,$_POST['image'])."',
                                                         '".mysqli_real_escape_string($mysqli,$_POST['image_tn'])."',                                                              '".mysqli_real_escape_string($mysqli,$_POST['weight'])."',
                                                         '".mysqli_real_escape_string($mysqli,$_POST['origin'])."',
                                                    '".mysqli_real_escape_string($mysqli,$_POST['recommended_age'])."',                                                              '".mysqli_real_escape_string($mysqli,$_POST['featured'])."')";
                        $mysqli->query($insert_user_query);
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
                      print "
                      
                      <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    Please fill out all the fields.\n
                                </span>    
                            </p>
                        </div>
                     \n";
                      
                      
                     
                  }
        

?>


<div class="large-3 medium-3 small-12 columns">
        &nbsp;
    </div>
    <div class="large-6 medium-6 small-12 columns">

        <h3>Insert Product</h3>
       
    	<form method="post" action="<? $_SERVER['PHP_SELF']; ?>#">
           <? 
                if(!empty($_POST['product_name'])&&!preg_match("/^[A-Z0-9]/",$_POST['product_name'])){
                    
                    print "
                    
                    <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    Please enter a valid product name. Product names must start with a capital letter or a number.\n
                                </span>    
                            </p>
                        </div>
                     \n";
                    
                    
                    
                    }
           ?>
        	<label for="product_name">Product Name</label>
            <input name="product_name" id="product_name" type="text" value="<? print $_POST['product_name']; ?>" />
            <br />
            <? 
                if(!empty($_POST['description'])&&!preg_match("/^([A-Z])/",$_POST['description'])){
                    
                    print "
                      
                    <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    Please try again. Descriptions must start with a capital letter.\n
                                </span>    
                            </p>
                        </div>
                     \n";
                    
                   
                    }
           ?>
            <label for="description">Description</label>
            <textarea name="description" id="description"><? print $_POST['description']; ?></textarea>
            <br />
            <label>category</label>
            <select name="category">
                  <option value="Family">Family</option>
                  <option value="Strategy">Strategy</option>
                  <option value="Party">Party</option>
                  <option value="Co-op">Co-op</option>
            </select>
             <br />
            <? 
                if(!empty($_POST['sku'])&&!preg_match("/^[A-Z]-[0-9]{3}/",$_POST['sku'])){
                    
                    print "
                          <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    >Please enter a valid SKU. SKU's must be in the format: S-052.\n
                                </span>    
                            </p>
                        </div>
                     \n";
                    
                   
                    }
           ?>
            <label for="sku">SKU</label>
            <input name="sku" id="sku" type="text" value="<? print $_POST['sku']; ?>" />
            <br />
            <? 
                if(!empty($_POST['stock'])&&!preg_match("/[0-9]{1,3}/",$_POST['stock'])){
                    
                    print "
                    
                         <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    >Please try again. Stocks must only be numbers and cannot exceed over 1000.\n
                                </span>    
                            </p>
                        </div>
                     \n";
                    
                   
                    
                   
                    }
           ?>
            <label for="stock">Stock</label>
            <input name="stock" id="stock" type="text" value="<? print $_POST['stock']; ?>" />
            <br />
            <? 
                if(!empty($_POST['cost'])&&!preg_match("/^[0-9]{1,3}.[0-9]{2}$/",$_POST['cost'])){
                    
                    print "
                     <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    >Please try again. Costs must be in the format: 19.89.\n
                                </span>    
                            </p>
                        </div>
                     \n";
                    
        
                    }
           ?>
            <label for="cost">Cost</label>
            <input name="cost" id="cost" type="number" min="0" max="1000" value="<? print $_POST['cost']; ?>" />
            <br />
            <? 
                if(!empty($_POST['price'])&&!preg_match("/^[0-9]{1,3}.[0-9]{2}$/",$_POST['price'])){
                    
                    print "
                     <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    >Please try again. Costs must be in the format: 19.89.\n
                                </span>    
                            </p>
                        </div>
                     \n";
                    
                    
                    }
           ?>
            <label for="price">Price</label>
            <input name="price" id="price" type="number" min="0" max="1000" value="<? print $_POST['price']; ?>" />
            <br />
            <label for="image">Image Link</label>
            <input name="image" id="image" type="text" value="<? print $_POST['image']; ?>" />
            <br />
            <label for="image_tn">Image Thumbnail Link (200x200)</label>
            <input name="image_tn" id="image_tn" type="text" value="<? print $_POST['image_tn']; ?>" />
            <br />
            <? 
                 if(!empty($_POST['weight'])&&!preg_match("/^[0-9]{1,2}.[0-9]$/",$_POST['weight'])){
                    
                    print "
                     <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    >Please try again. Weight (measured in pounds) must be in the format: 4.3.\n
                                </span>    
                            </p>
                        </div>
                     \n";
                  
                    }
           ?>
            <label for="weight">Weight (Pounds)</label>
            <input name="weight" id="weight" type="number" min="0" max="100" value="<? print $_POST['weight']; ?>" />
            <br />
            <? 
                if(!empty($_POST['origin'])&&!preg_match("/^[A-Z][A-Za-z]+/",$_POST['origin'])){
                    
                    print "
                     <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    >Please try again. Origins must start with a capitol letter and can only be made up of letters.\n
                                </span>    
                            </p>
                        </div>
                     \n";
                    
                    
                    }
           ?>
            <label for="origin">Origin (Country)</label>
            <input name="origin" id="origin" type="text" value="<? print $_POST['origin']; ?>" />
            <br />
            <label for="recommended_age">Recommended Age</label>
            <select id="recommended_age" name="recommended_age">
                  <option value="8">8</option>
                  <option value="12">12</option>
                  <option value="16">16</option>
            </select>
            <br />
            <label>Featured Item</label>
            Yes
            <input <? if ($_POST['featured']==Yes){echo 'checked="checked"' ;} ?>  type="radio" name="featured" value="Yes"> 
            No
            <input <? if ($_POST['featured']==No){echo 'checked="checked"' ;} ?> type="radio" name="featured" value="No">
                        <br />
            
                     
    </div>
    <div class="large-3 medium-3 small-12 columns">
        &nbsp;
    </div>


            <div class="row">

                    <div class="large-3 medium-3 small-12 columns">
                        &nbsp;
                       </div>


                            <div class="large-6 medium-6 small-12 columns">  
                                <ul class="button-group login_group">
                                    <li>
                                         <button name="submit" 
                                                 id="submit" 
                                                 type="submit" 
                                                 class="btn primary">
                                            Create Product  
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
    print "
    <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                   This page is for administrators and privileged users only, please sign in to view content.\n
                                </span>    
                            </p>
                        </div>
                     \n";
    
    
    
}
            ?>

<?php include("footer.php"); ?>