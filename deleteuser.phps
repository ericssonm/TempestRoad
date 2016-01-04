<?php
    $page_title="| Delete User";
    session_start();
    include("db_connect.php");



	if( ($_SESSION['logged_in_user_access'] != ('Privileged'||'Administrator'))) {
		?>
    	This page is for administrators and privileged users only, please sign in to view content.
<?php
	}else if($_SESSION['logged_in_user_access'] == ('Privileged'||'Administrator')) {
        
        $id= $_GET['id'];
  	  	$select_product = "SELECT * FROM users WHERE user_id = $id";
      	$myProduct = $mysqli->query($select_product);
	 	$row = $myProduct->fetch_object();
        
         if(isset($_POST['submit'])) {
		$delete_product_query = "DELETE FROM users WHERE user_id='".$id."'";
		$mysqli->query($delete_product_query);
		header('Location: view_products.php#users');
		}
        
        include("header.php");
	?>

        
    <h1>Delete User</h1>

    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Access Level</th>
            </tr>
        </thead>
    <tbody>
    <?php
        $select_users = "SELECT * FROM users
                            ORDER BY access_level ASC";
        $myProducts = $mysqli->query($select_users);
    echo "\t<tr>\n";
    echo "\t\t\t<td>" .$row->username."</td>\n";
    echo "\t\t\t<td>" .$row->first_name. "</td>\n";
    echo "\t\t\t<td>" .$row->last_name. "</td>\n";
    echo "\t\t\t<td>" .$row->access_level. "</td>\n";
    echo "\t\t</tr>\n";
    ?>
    </tbody>
    </table>
    <form method="post" action="<? $_SERVER['PHP_SELF']; ?>#">
        <div class="row collapse">
            <div class="large-12 medium-12 small-12 columns">
                <ul class="button-group">
                    <li>
                        <button name="submit" id="submit" type="submit" class="primary">
                            Delete User
                        </button>

                    </li>
                    <li>
                        <button type="submit" class="secondary" formaction="view_products.php#users">
                            Cancel
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </form>
    <br>
<? } include('footer.php'); ?>