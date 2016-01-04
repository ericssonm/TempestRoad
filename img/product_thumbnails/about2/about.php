<?php 
    if($_POST['view']||$_POST['sort']||$_POST['category']){
        header("Location:catalog.php?page=1");
    }
    include("header.php");
    $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

?>

<div id="s-subpage">
<div class="row">
    <div id="sub-title" class="large-12 columns">
        <h2>ABOUT US</h2>
        <h4>Our History</h4>
        <p>Tempestroad Board Games is a leading hobby game company based out of   Orlando, Florida. We distribute a massive array of board and card   games. Established in 1995, Tempestroad has earned a reputation for its innovative   gameplay, immersive gaming experiences and industry-leading customer   service.        </p>
        <h4>The Team</h4>
        <ul>
          <li>Matthew K
          	<ul>
                <li>Leader of the team</li>
                <li>In charge of Search system</li>
            </ul>
          </li>
          <li>Matthew E
          	<ul>
                <li>In charge of Cart</li>
                <li>User Case Study Specialist</li>
            </ul>
          </li>
          <li>Daniel
          	<ul>
                <li>Database Manager</li>
                <li>Dynamic Content Creator</li>
            </ul>
          </li>
          <li>Marineh
          	<ul>
                <li>In Charge of Style and Design</li>
            </ul>
          </li>
          <li>Laney
          	<ul>
                <li>Content Research and Input</li>
            </ul>
          </li>
          <li>Sung Oh
          	<ul>
                <li>Legal Department</li>
                <li>Policy Manager</li>
            </ul>
          </li>
        </ul> 
    </div>
</div>

<div class="row">   
    <div id="s-info" class="large-3 columns">
        <!-- Sidebar -->
        <h4>Address</h4>
            <ul class="">
                    <li>Tempest Road Board Games</li>
                    <li>4000 Central Florida Blvd.</li>
                    <li>Orlando, FL 32816</li>
                    <li>USA</li>
            </ul>
        
        <h4>Contact</h4>
            <ul class="">
                    <li>Phone: (407)823-2000</li>
                    <li>Fax: (407)823-3000</li>
                    <li>info@tempestroad.com</li>
            </ul>

    
        <!--<h4>Categories</h4>
        <form id="category_form" method="post" onchange="change3()">
            <ul>
              <li>
                <div class="large-12 columns">
                  <input name="category" type="submit" value="Family" class="sort_button" />
                </div>

              </li>
              <li>
                 <div class="large-12 columns">
                   <input name="category" type="submit" value="Strategy" class="sort_button" />
                </div>

              </li> 
              <li>
                 <div class="large-12 columns">
                   <input name="category" type="submit" value="Party" class="sort_button" />
                </div>

              </li>
              <li>
                 <div class="large-12 columns">
                   <input name="category" type="submit" value="Co-op" class="sort_button" />
                </div>

              </li>
              <li>
                 <div class="large-12 columns">
                   <input name="category" type="submit" value="All" class="sort_button" />
                </div>
              </li>

            </ul>
        </form>-->

    </div>
    
    <!-- Main -->
    <div id="s-main" class="large-9 columns">
    
        <h2>Our Policies</h2>
        <div class="row">
    <div class="large-12 columns">
        <!-- top title --></div>
</div>

<div class="row">   
    <div class="large-3 columns">
        <!-- Sidebar -->
        
            <ul class="alt">
                <li><a href="#p-one">Payment Policy</a></li>
                <li><a href="#p-two">Shipping Policy</a></li>
                <li><a href="#p-three">Returns Policy</a></li>
                <li><a href="#p-four">Privacy Policy</a></li>
                <li><a href="#p-five">Security</a></li>
            </ul>    
    </div>
        
        <!-- main -->
        <div class="large-9 columns">
        <h4 id="p-one">Payment Policy</h4>
        <p>*Payment Options</p>
        
            <ul class="">
                    <li>1. PayPal - please make sure your payment address/shipping address are current in your PayPal account, as PayPal has a tendency to override the shipping information for TEMPEST ROAD BOARD GAMES Store orders.</li>
                    <li>2. Major Credit Cards - Visa, MasterCard, Discover Card, etc. - the applicable logos are shown on the payment page.</li>
                    <li>3. Taxes - Sales Tax (6.50%) will be charged on all orders shipped within the state of Florida, USA.</li>
            </ul>    
        
        <h4 id="p-two">Shipping Policy</h4>
        <p>*Standard Shipping within the United States</p>
        <p>Shipping &amp; handling charges depend on the size, weight and number of items comprising the shipment, and will be displayed on the Checkout page before you are asked for your payment information.
UPS For our Standard Shipping, we generally use UPS Ground service, which usually takes 2-5 business days to arrive, depending on your location and distance from our main warehouse. A transit time calculator may be found online. For further details about UPS services including UPS policies and online package tracking, please visit the <a href="http://www.ups.com" target="_blank">UPS web site</a>.
For smaller shipments under 2 pounds, we may opt to use USPS Priority Mail service, which usually takes 2-3 business days to arrive. We can accommodate customers wishing to have larger orders shipped via USPS to a P.O. Box, but shipping fees will be greater than the amounts quoted for "Standard Shipping" during our checkout process. For further details about USPS services, please visit the <a href="http://www.usps.gov" target="_blank">USPS web site</a>.</p>
        <p>*Expedited Shipping</p>
      <p>UPS For orders under 15 pounds, we offer three levels of expedited shipping: Express Saver, 2-Day, and Overnight. The price for expedited shipping is a flat amount added to the Standard shipping rate. Delivery times specified are typical for orders placed before 12:00 noon Pacific Time.</p>
        <p><img src="../img/shipping-table.jpg" width="610" height="104" /></p>
        <p>For expedited orders over 15 pounds, we will quote a rate for your requested speed of service.</p>
        
        <h4 id="p-three">Returns Policy</h4>
        <p>To request authorization for a return, please send an e-mail to Customer Service using our contact form, telling us what you'd like to return/exchange, and including your first and last name and original order number. You will be provided a Returned Merchandise Authorization number (RMA). You must have this return authorization number for your return to be processed.
We will accept a return for any item within 15 days of your receipt of the order. We can only accept returns on items which are in their original condition. Original condition means that the game cannot have been played and all parts must be in the same condition as when they game was received. We can refund shipping costs only if the return is a result of our error.
When we receive a return, we can issue you a refund of the purchase price in the form of Tempest Road Board Games credit, which may be applied toward an exchange or a future purchase. Gift recipients returning an item will be issued Tempest Road Board Games credit for the purchase price of the item(s). Holiday gift item returns/exchanges will be accepted until January 15th.
</p>
        <p>When sending an item back, please include:</p>
        
            <ul class="">
                    <li>1. the packing slip (or a legible copy);</li>
                    <li>2. the reason for your return;</li>
                    <li>3. your return authorization number (RMA)</li>
            </ul>    
        
        <p>Please use cushioning packing material in a sturdy carton so that the contents will be protected from damage. For your protection, please use FedEx, UPS or Insured Parcel Post for your shipment.</p>
        <p>Send it to:</p>
            <ul class="">
                    <li>Tempest Road Board Games</li>
                    <li>Returns Department</li>
                    <li>4000 Central Florida Blvd.</li>
                    <li>Orlando, FL 32816</li>
                    <li>USA</li>
            </ul>
        <p>We will notify you via email of your refund once we have received and processed the returned item.</p>
        
        <h4 id="p-four">Privacy Policy</h4>
        <p>TEMPEST ROAD BOARD GAMES is committed to protecting your privacy. We use the personal information you give us, such as your billing, shipping and e-mail addresses, to process and keep you informed of your order. We do not share this information with outside parties except to the extent necessary to complete that order. We will not sell, trade, rent or give away your personal information to anyone.</p>
        <p>*Our Commitment to Children's Privacy</p>
        <p>Protecting the privacy of the very young is especially important. For that reason, we never collect or maintain information at our website from those we actually know are under 13, and no part of our website is structured to attract anyone under 13. </p>
        
        <h4 id="p-five">Security</h4>
        <p>*Safe Shopping Guarantee</p>
        <p>Your security and privacy are of utmost importance to us. When you place an online order with Tempest Road Board Game, our secure server software encrypts the information you submit, ensuring that Internet transactions stay private and protected. Your personal information cannot be read as it travels to our ordering system.</p>
        <p>*Privacy Pledge</p>
        <p>We keep your personal information private and secure. When you make a purchase from our web site, you provide your name, email address, credit card information, address and phone number. We use this information only to process your order and to keep you updated on your order. We will never sell, trade or give away your information. Everything you submit remains private and confidential. We will not send you unsolicited email or direct mail.</p>
        <p>*Our Cookie Policy</p>
        <p>"Cookies" are small pieces of information that are stored by your browser on your computer's hard drive. We do not use cookies to collect or store any information about visitors or customers.</p>
        </div>
</div>
        

            
          
    </div>
</div>
</div>
        <!-- Footer -->
        <?php include("footer.php"); ?>