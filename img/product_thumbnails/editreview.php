<?
    $page_title="| Edit Review";
    session_start();
    include("db_connect.php");


               	$id= $_GET['id'];
  	  			$select_user = "SELECT * FROM reviews WHERE review_id = $id";
      			$myUser = $mysqli->query($select_user);
	 			$row = $myUser->fetch_object();

     if(isset($_POST['submit'])&& 
        ((!empty($_POST['review_title']))&& 
        (!empty($_POST['product_review'])))) {
         
        $update_user_query = "UPDATE reviews SET 
        recommend= '".mysqli_real_escape_string($mysqli,$_POST['recommend'])."',
        review_title = '".mysqli_real_escape_string($mysqli,$_POST['review_title'])."',
        product_review = '".mysqli_real_escape_string($mysqli,$_POST['product_review'])."'
        WHERE review_id = $id";
                                                 
                        $mysqli->query($update_user_query);
                        header("Location: view_products.php#reviews");
    }
    include("header.php");

if($_SESSION['logged_in_user_access'] == ('Privileged'||'Administrator')){



                  if((isset($_POST['submit']))&&((empty($_POST['review_title']) || empty($_POST['product_review'])))){
                      print "<p class='red'>Please fill out all the fields.</p>\n";
                  }
        

?>
        <h3>Update Review</h3>
       
    	<form method="post" action="<? $_SERVER['PHP_SELF']; ?>#">
        	<label>Recommend</label>
            Yes
            <input <? if ($row->recommend==Yes){echo 'checked="checked"' ;} ?>  type="radio" name="recommend" value="Yes"> 
            No
            <input <? if ($row->recommend==No){echo 'checked="checked"' ;} ?> type="radio" name="recommend" value="No">
                        <br />
            <label for="review_title">Title</label>
            <input name="review_title" id="review_title" type="text" value="<? print $row->review_title; ?>" />
            <br />
            <label for="product_review">Review</label>
            <textarea name="product_review" id="product_review"><? print $row->product_review; ?></textarea>
            <br />
            <div class="row collapse">
                <div class="large-12 medium-12 small-12 columns">  
                    <ul class="button-group">
                        <li>
                             <button name="submit" id="submit" type="submit" class="primary">
                                Update Review 
                             </button>  

                        </li>
                        <li>
                            <button type="submit" class="secondary" formaction="view_products.php#reviews" >
                                Cancel  
                            </button> 
                        </li>
                    </ul>
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