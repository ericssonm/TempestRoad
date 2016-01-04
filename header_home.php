<?php
session_start();
include("db_connect.php");
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<!doctype html>
<head>
    <link rel='shortcut icon' href='img/favicon%20(1).ico' type='image/x-icon'>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Tempest Road Board Games is the World's Best Board Game and Card Game Source, serving our customers since 1995."/>
    <meta name="keywords" content="Board Games,Card Games,Family Games,Abstract Strategy,Toys,Tempest Road Board Games"/>
    <title> Tempest Road <? echo $page_title ?></title>
    <style>
        
        @import url("css/searchstyle.css");   
        @import url("css/base.css"); 
        @import url("css/font-awesome.min.css"); 
        @import url("css/foundation.css"); 
        
     
    </style>
    <link rel="stylesheet/less" type="text/css" href="css/styles.less" />
    <script src="js/less.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script async="" src="//www.google-analytics.com/analytics.js"></script>
        
    <!-- Google Analytic stracking code -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-6309905-9', 'auto');
      ga('send', 'pageview');

    </script>

</head>

    <header>
               <? if(isset($_SESSION['logged_in'])){ ?>
      <div class="firstBar">
          <ul>
              <li>
                  Hello, <strong><? print $_SESSION['logged_in_first_name']." ".$_SESSION['logged_in_last_name']; ?></strong> (<i><? print $_SESSION['logged_in_user_access']; ?></i>)   
              </li>
              <li>
                  <a href='client.php'>My Account</a>
              </li>
              <li>
                  <a class ='logout' href='logout.php'>Log Out</a>
              </li>

          </ul>      
     </div>
       <?  
           } 
else{
       
       ?>
     

       <div class="firstBar">
           <ul>
               <li>
                    Hello, <i>Guest!</i>
               </li>
               <li>
                   <a href="sign_up.php">Signup</a>
               </li>

               <li>
                   <a href="login.php">Login</a>
               </li>
           </ul>
       </div>
       <? }  ?>



        
        <div class="banner_img" style="clear:both;">
            
              <div id="containtogrid" class="contain-to-grid sticky"
                   style="box-shadow: 0px 2px 0px transparent;
                          background-color: transparent;">
            
                <nav class="top-bar top-nav" id="topbar" data-topbar>
                    <ul class="title-area">
                        <li class="name" >
                            <a href="home.php">
                            <img src="img/text-01.png" id="logo" alt="tempest road logo">
                            </a>    
                        </li>  
                    
                        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                       
                        <li class="toggle-topbar ">
                            <a href="">
                                <span>
                                    <i class="fa fa-reorder"></i>
                                    
                                </span>
                            </a>
                        
                        </li>
                    </ul>
                    <div class="top-bar-section">
                        <!-- Right Nav Section -->
                        <ul class="left">
                            <li>
                                <a href="home.php" id="one">
                                HOME
                                </a>
                            </li>
                            <li>
                                <a href="catalog.php" id="two">
                                PRODUCTS
                                </a>
                            </li>
                            <li>
                                <a href="about.php" id="three">
                                ABOUT
                                </a>
                            </li>
                          
                              <li id="search1"> 
                                <div class='searchthing'> 
                                  <input type="text" id="search" autocomplete="off" placeholder="Search for products">
                                  <p id="results-text">Results for: <b id="search-string"></b></p>
                                  <ul id="results"></ul>
                                </div>
                            </li>
                               
                        </ul>

                    
                    
                    </div>
                                           
                     <ul class="right ul-cart title-area">
                         <li class="cart" >
                            <a href="cart.php" id="cart2">
                                <i class="fa fa-shopping-cart"></i>
                                 <span class="badge_count">
                                    
                                     <? print count($_SESSION['cart_products']); ?>
                                    
                                </span>
                                </a>
                        </li>
                        
                        </ul>
                </nav>
            </div>
            <div class="banner">

                <div class="row">
        <!--///START 1 COLUMNS ///-->
                
        <div class="large-1 medium-1 small-12 columns">
            &nbsp;
        </div>
           <!--///END 1 COLUMNS ///-->                 <!--///START 10 COLUMNS ///-->
                <div class="large-10 medium-12 small-12 columns" id="banner">
        <div class="row">
            
      <!--///START 12 COLUMNS ///-->
      
    <?  $select_query = "SELECT product_name,
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
                     LIMIT 2,1";
    $select_result = $mysqli->query($select_query);
    while(($row = $select_result->fetch_object())) {
                ?>  
                <form method="post" id="add_featured_banner" <? if($row->stock>0){print "action='cart_update.php'";} 
                else{print "action='".$_SERVER['PHP_SELF']."#'";}?>>
                <?
                print "\t\t\t\t\t\t\t<input type='hidden' name='product_qty' value='1' />\n";
                print "\t\t\t\t\t\t\t<input type='hidden' name='product_code' value=".$row->sku." />\n";
                print "\t\t\t\t\t\t\t<input type='hidden' name='type' value='add' />\n";
                print "\t\t\t\t\t\t\t<input type='hidden' name='return_url' value=".$current_url." />\n";
    ?>
     <div class="large-12 medium-12 small-12 columns">
        
         <h2>
                New Featured Item
         </h2>
                        
        </div>
       <!--///END 12 COLUMNS ///-->           
              <div class="row" id="banner1">
                <div class="large-5 medium-12 small-12 columns">
                    <?
                    print "\t\t\t\t\t\t\t<a href='product.php?id=".$row->product_id."'><img src=\"".$row->image_tn."\" alt=\"".$row->product_name." Image\"></a>\n";
                    ?>
                   <!--  <img src="img/CAH.jpg" alt="cards against humanity"> -->
                </div>                   
                 <div class="large-7 medium-12 small-12 columns" id="feat_desc">
                  <?php echo $row->description."\n";   ?>
                
                <br>
                          
                <ul class="button-group">
                   
                     <li class="">
                   <?  print "\t\t\t\t\t\t\t<button class='btn primary' type='submit'>Add to Cart</button>\n"; ?>
                
                    </li>
                <li class="">
                     <? print "\t\t\t\t<a class='learn_more' href='product.php?id=".$row->product_id."'>"  ?>
                    Learn More</a>       
                       
                    </li>
                  </ul>
                  </div>
                  </div>
                  <? print "\t\t\t\t\t</form>\n"; } ?>
                        
                    </div>
        <!--///END 8 COLUMNS ///-->
                <div class="row">
    <!--///START 5 COLUMNS ///-->
            <div class="large-5 medium-5 small-12 columns">
            
               &nbsp; 
            
            </div> 
    <!--///END 5 COLUMNS ///-->
    <!--///START 7 COLUMNS ///-->
              <div class="large-7 medium-7 small-12 columns">

               
            
            </div>        
        <!--///END 7 COLUMNS ///-->        
        </div>    
                </div>
    <!--///END 10 COLUMNS ///-->
    <!--///START 1 COLUMNS ///-->
                    <div class="large-1 medium-1 small-12 columns"> &nbsp;</div>
           <!--///END 1 COLUMNS ///-->       
        </div>
        </div>

        </div>  
    </header>
