<?php

    $page_title="| Delete Review";
    session_start();
    include("db_connect.php");
    




	if( ($_SESSION['logged_in_user_access'] != ('Privileged'||'Administrator'))) {
		?>
    	This page is for administrators and privileged users only, please sign in to view content.
<?php
	}else if($_SESSION['logged_in_user_access'] == ('Privileged'||'Administrator')) {
        
        $id= $_GET['id'];
  	  	$select_review = "SELECT * FROM reviews WHERE review_id = $id";
      	$myProduct = $mysqli->query($select_review);
	 	$row = $myProduct->fetch_object();
        
         if(isset($_POST['submit'])) {
		$delete_review_query = "DELETE FROM reviews WHERE review_id='".$id."'";
		$mysqli->query($delete_review_query);
		header('Location: view_products.php#reviews');
		}
        
        include("header.php");
	?>

        
    <h1>Delete Review</h1>

    <table>
        <thead>
           <tr>
                <th>Username</th>
                <th>Date</th>
                <th>Product</th>
                <th>Recommend</th>
                <th>Title</th>
                <th>Review</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $select_users = "SELECT * FROM reviews
                                ORDER BY product_name ASC";
            $myProducts = $mysqli->query($select_users);
        echo "\t<tr>\n";
        echo "\t\t\t\t<td>" .$row->username. "</td>\n";
        echo "\t\t\t\t<td>" .$row->review_creation_date."</td>\n";
        echo "\t\t\t\t<td>" .$row->product_name."</td>\n";
        echo "\t\t\t\t<td>" .$row->recommend."</td>\n";
        echo "\t\t\t\t<td>" .$row->review_title. "</td>\n";
        echo "\t\t\t\t<td>" .$row->product_review. "</td>\n";
        echo "\t\t\t</tr>\n";
        ?>
        </tbody>
    </table>
    <form method="post" action="<? $_SERVER['PHP_SELF']; ?>#">
        <div class="row collapse">
            <div class="large-12 medium-12 small-12 columns">
                <ul class="button-group">
                    <li>
                        <button name="submit" id="submit" type="submit" class="primary">
                            Delete Review
                        </button>

                    </li>
                    <li>
                        <button type="submit" class="secondary" formaction="view_products.php#reviews">
                            Cancel
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </form>
          <br>
<? } include('footer.php'); ?>