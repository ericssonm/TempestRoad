<?php
session_start();
include("db_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <link href='img/favicon%20(1).ico' rel='shortcut icon' type='image/x-icon'>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tempest Road Home | Marineh Alboyadjian</title>
    <style>
        @import url("css/base.css"); 
        @import url("css/font-awesome.min.css"); 
        @import url("css/foundation.css");
      
    </style>
    <link href="css/styles.less" rel="stylesheet/less" type="text/css">
    <script src="js/less.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
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
       

        <div class="firstBar" id="fBar">
            <ul>
               <li>
                  Hello, <i>Guest!</i>
               </li>
               
                <li>
                    <a href="sign_up.php">Sign up</a>
                </li>

                <li>
                    <a href="login.php">Login</a>
                </li>
            </ul>
        </div>
        <? }  ?>

 
         <div id="containtogrid" class="contain-to-grid sticky">
            
                <nav class="top-bar top-nav" id="topbar" data-topbar role="navigation">
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
                    <section class="top-bar-section">
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
                      
                            <li>
                                <i style="font-size: 1.3em; margin-top:10px;" class="fa fa-search"></i>
                            </li>
                               
                        </ul>

                    
                    
                    </section>
                                           
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
    </header>