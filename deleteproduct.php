<?php
    $page_title="| Delete Product";
    session_start();


    include("db_connect.php");



	if( ($_SESSION['logged_in_user_access'] != ('Privileged'||'Administrator'))) {
		?>
    	This page is for administrators and privileged users only, please sign in to view content.
<?php
	}else if($_SESSION['logged_in_user_access'] == ('Privileged'||'Administrator')) {
        
        $id= $_GET['id'];
  	  	$select_product = "SELECT * FROM products WHERE product_id = $id";
      	$myProduct = $mysqli->query($select_product);
	 	$row = $myProduct->fetch_object();
        
         if(isset($_POST['submit'])) {
		$delete_product_query = "DELETE FROM products WHERE product_id='".$id."'";
		$mysqli->query($delete_product_query);
		header('Location: view_products.php');
		}
        
        include("header.php");
	?>

        
    <h1 id="products">Delete Product</h1>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Sku</th>
                <th>Stock</th>
                <th>Cost</th>
                <th>Price</th>
                <th>Image</th>
                <th>Weight</th>
                <th>Origin</th>
                <th>Age</th>
                <th>Featured</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $select_products = "SELECT * FROM products
                                    ORDER BY product_name ASC";
                $myProducts = $mysqli->query($select_products);
            echo "<tr>\n";
            echo "\t\t\t\t<td>" .$row->product_name."</td>\n";
            echo "\t\t\t\t<td>" .$row->description. "</td>\n";
            echo "\t\t\t\t<td>" .$row->category. "</td>\n";
            echo "\t\t\t\t<td>" .$row->sku. "</td>\n";
            echo "\t\t\t\t<td>" .$row->stock. "</td>\n";
            echo "\t\t\t\t<td>$" .$row->cost."</td>\n";
            echo "\t\t\t\t<td>$" .$row->price."</td>\n";
            echo "\t\t\t\t<td><img src=\"".$row->image_tn."\" alt=\"".$row->product_name." Image\"></td>\n";
            echo "\t\t\t\t<td>" .$row->weight." pounds</td>\n";
            echo "\t\t\t\t<td>" .$row->origin."</td>\n";
            echo "\t\t\t\t<td>" .$row->recommended_age."</td>\n";
            echo "\t\t\t\t<td>" .$row->featured."</td>\n";
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
                            Delete Product
                        </button>

                    </li>
                    <li>
                        <button type="submit" class="secondary" formaction="view_products.php">
                            Cancel
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </form>
          <br>
<? } include('footer.php'); ?>