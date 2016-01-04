<?php
    $page_title="| Product Details";
  include('header.php');
  $id= $_GET['id'];
  $select_id = "SELECT * FROM products WHERE product_id = $id";
  $myProduct = $mysqli->query($select_id);

  $select_review_id_query = "SELECT product_id, username, review_id, user_id, product_review, review_title, recommend, DATE_FORMAT( review_creation_date,  '%M %d, %Y') AS review_creation_date
                             FROM reviews
                             WHERE product_id ='".$id."'
                                             ORDER BY review_creation_date ASC";


  $row = $myProduct->fetch_object();
  $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

?> 
    <div class="large-1 medium-1 small-12 columns">
    &nbsp;
    </div>

     <div id="container" class="large-10  medium-10 small-12 columns">
      
      <div id="boardtitle">
          <?php echo "<h1 class='name'>".$row->product_name."</h1>\n";?>
      </div>
 <div class="row">
     <div class="large-6 medium-6 small-12 columns">
         <div id="image">
             <?php
              echo "\t\t<img src='".$row->image."' alt='".$row->product_name." Image' />\n";
             print "\t\t</div>\n";
             print "\t</div>\n";

              if(isset($_POST['submit'])) {

            if(!empty($_POST['recommend'])&&!empty($_POST['review']))  {
                        $insert_reviews_query = "INSERT INTO reviews(product_id, product_review, recommend, review_creation_date, review_title, user_id, username)
                                                 VALUES ('".$row->product_id."', '".mysqli_real_escape_string($mysqli, $_POST['review'])."', '".$_POST['recommend']."', CURRENT_TIMESTAMP, '".mysqli_real_escape_string($mysqli,$_POST['title'])."', '".$_SESSION['logged_in_user_id']."','".$_SESSION['logged_in_user']."' )";

                            $mysqli->query($insert_reviews_query);

                        }
        }                  


                              ?>

  
       
      <div class="large-6 medium-6 small-12 columns">
          <div id="money">
              <div id="first">
                  <?php echo "<div id='price'>$".$row->price."</div>\n";
                  if($row->stock<=0)
                    {print "\t\t\t\t\t<p><span class='red'>Out of Stock</span></p>\n";}
                  else{
                        print "\t\t\t\t\t<p><span class='green'>In Stock</span></p>\n";
                        };
                    ?>
              
              <?php echo "SKU: ".$row->sku. "\n";
                  print "\t\t\t<form method='post' action='cart_update.php'>\n";
                  print "\t\t\t\t<input type='hidden' name='product_qty' value='1' />\n";
                  print "\t\t\t\t<input type='hidden' name='product_code' value=".$row->sku." />\n";
                  print "\t\t\t\t<input type='hidden' name='type' value='add' />\n";
                  print "\t\t\t\t<input type='hidden' name='return_url' value=".$current_url." />\n";
print "\t\t\t\t\t\t<div class='rw-ui-container' data-urid=".$row->product_id."></div>\n";
              
              ?>
              </div>
                <div class="productbtn">
                    <?    print "\t<button class='primary btn' id='products_page_btn' type='submit'>Add to Cart</button>\n"; ?>
                </div> 
            </form>
           </div>
         </div> 
         
         <div class="large-1 medium-1 small-12 columns">
    &nbsp;
    </div>

        <div class="large-10 medium-10 small-12 columns">  
            <div id="description">
                <p id="desc">
                    <?php echo mb_substr($row->description,0, 4000,"utf-8")."\n"; ?> 
                </p>
                <br>
                <?php echo "Recommended Age: ". $row->recommended_age. "+" ;?> 
                <br>
                <?php echo "Weight: ". $row->weight. " pounds"; ?> 
                <br>
                <?php echo "Country of origin: ". $row->origin; ?> 
                <br>
            </div>
      </div>
        <div class="large-1 medium-1 small-12 columns">
    &nbsp;
    </div>

</div>
     
     
  <div class="large-1 medium-1 small-12 columns">
    &nbsp;
    </div>
     
         
      <div class="large-10 medium-10 small-12 columns bottom">
      <? if(isset($_SESSION['logged_in'])){?>
    <h3>Write a Review</h3>
        <? 
                  if((isset($_POST['submit']))&&(empty($_POST['recommend']) || empty($_POST['title']) || empty($_POST['review']))){
                      print "
                      <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    Please fill out the entire review form.
                                </span>    
                            </p>
                        </div>
                     \n";
                      
                      
                      
                  }
          ?>
        <form method="post" action="<? $_SERVER['PHP_SELF']; ?>#">
            <fieldset>
                <div class="control-group">
                    <label>Would you recommend this product?</label>
                    <div>
                        Yes
                        <input type="radio" name="recommend" value="Yes"> No
                        <input type="radio" name="recommend" value="No">
                    </div>
                </div>
                <div>
                    <label>Title</label>
                    <input name="title" type="text" value="<? if((isset($_POST['submit']))&&(empty($_POST['recommend']) || empty($_POST['title']) || empty($_POST['review']))){ print $_POST['title'];} ?>" />

                    <label>Review</label>

                    <textarea rows="3" name="review"><? if((isset($_POST['submit']))&&(empty($_POST['recommend']) || empty($_POST['title']) || empty($_POST['review']))){ print $_POST['review'];} ?></textarea>

                </div>
            <? print "\t\t\t\t\t\t\t<input type='hidden' name='product_name' value=".$row->product_name." />\n"; ?>
            </fieldset>
            <button type="submit" name="submit" class="btn primary" value="Submit Review">Submit Review</button>

       
<? }
else{
    print "<br> Want to write a review? Please sign up or login!";
}
                                    ?>
                                    
        <div class="reviews">
            <h3>Reviews</h3>
                <?   $select_review_id_result = $mysqli->query($select_review_id_query);
                    if(mysqli_num_rows($select_review_id_result)==0){
                        print "There are currently no reviews for ".$row->product_name.".";
                    }
                    else{
                     while($loop = $select_review_id_result->fetch_object()) {
                         print "\n\t\t\t<h5 class='review_title'>".$loop->review_title."</h5>";
                         print "Posted by: <strong> ".$loop->username."</strong> on <em>".$loop->review_creation_date."</em>";
                         if($loop->recommend==Yes){
                           print "\n\t\t\t<p>I would recommend this product!</p>\n";  
                         }
                         else if($loop->recommend==No){
                           print "\n\t\t\t<p>I would not recommend this product.</p>\n";  
                         }
                         print "\n\t\t\t<p>".$loop->product_review."</p>";
                         
                         print "\t\t\t<hr/>\n";
                     }
                   }
                ?>
             </form>
        </div>
    </div>
     <div class="large-1 medium-1 small-12 columns">
    &nbsp;
    </div>

     
</div> 
</div>
</div>
</div>       
    <div class="large-1 medium-1 small-12 columns">
    &nbsp;
    </div>
    <script src="js/script.js"></script>
<?php include("footer.php"); ?>
    