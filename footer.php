<!-- Footer -->
	<footer id="footer">
        <div class="row">
            <div class="large-5 medium-12 small-12  columns">
                <h5>WHAT'S NEW</h5>
				<p>If you're here, you likely already know what <i>Tempest Road Board Games</i> is.  However, if you somehow stumbled into our store without knowing about us, <i>Tempest Road Board Games</i> is a website dedicated to selling the best games on the market for a great price.  We have a variety of categories to choose from so go ahead, it's your move. </p>
            </div>
            <div class="large-2 medium-12 small-12 columns">
                <h5>CATEGORIES</h5>
                    
                       
                       <form id="category" method="post" action="catalog.php?page=1">
                        <ul>
                           
                           <li>
                               
                                  <input name="category" type="submit" value="Family" class="footer_button" />
                                

                           </li>
                              <li>
                                
                                   <input name="category" type="submit" value="Strategy" class="footer_button" />
                                
                              </li> 
                              <li>
                                
                                   <input name="category" type="submit" value="Party" class="footer_button" />
                               

                              </li>
                              <li>
                                 
                                   <input name="category" type="submit" value="Co-op" class="footer_button" />
                                

                              </li>
                              <li>
                                
                                   <input name="category" type="submit" value="All" class="footer_button" />
                               
                              </li>
                        </ul>
                        </form>
                    
            </div>
            
            <div class="large-2 medium-12 small-12 columns">
                <h5>HELP</h5>
                    
                        <ul id="help">
                            <li><a href="sign_up.php">Sign Up</a></li>
                            <li><a href="login.php">Log In</a></li>
                            <li><a href="about.php">Policies</a></li>
                        </ul>
                    </div>
           
            
            <div class="large-3 medium-12 small-12 columns">
                <h5>CONTACT INFO</h5>
                    <div class="row">
                        <ul>
                            <li>4000 Central Florida Blvd. Orlando, FL</li>
                            <li>Phone: (407)823-2000</li>
                            <li>Fax: (407)823-3000</li>
                            <li>info@tempestroad.com</li>
                        </ul>
                    </div>
            </div>
        </div>
        
        <!-- SNS Icons -->
        <div id="icons">
            <ul>
                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook-square fa-3x"></i></a></li>
                <li><a href="https://plus.google.com/"><i class="fa fa-google-plus-square fa-3x"></i></a></li>
                <li><a href="http://instagram.com/"><i class="fa fa-instagram fa-3x"></i></a></li>
                <li><a href="https://twitter.com/?lang=en"><i class="fa fa-twitter-square fa-3x"></i></a></li>
            </ul>
        </div>    
        
        <!-- copyright -->
        <div class="copyright">
            This site is not official and is an assignment for a UCF Digital Media course. | Designed by Tempest Road Board Games
        </div>
        
    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/foundation.topbar.js"></script>
    <script src="js/colorChange.js"></script>
    <script src="js/changeText.js"></script>
    <script src="js/custom.js"></script>
    <script>
        $(document).foundation();
        
    </script>


</body>
</html>
<? $mysqli->close(); ?>