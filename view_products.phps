<?php
$page_title="| View Products";
include("header.php");

	if( ($_SESSION['logged_in_user_access'] != ('Privileged'||'Administrator'))) {
		?>
    	This page is for administrators and privileged users only, please sign in to view content.
<?php
	}else if($_SESSION['logged_in_user_access'] == ('Privileged'||'Administrator')) {
        
        $page = (int) $_GET['page'];
        if ($page < 1) $page = 1;
        $startResults = ($page - 1) * 10;
        $numberOfRows = mysqli_num_rows($mysqli->query('SELECT * FROM products'));
        $totalPages = ceil($numberOfRows / 10);
	?>

 <div class="row">
    <div class="large-12 medium-12 small-12 columns">       
        <h2 id="products" class="h2_center">Modify Products</h2>
        <div>
        <form>
            <button class="btn primary" id="insert_product" formaction="insertproduct.php">
             <i class="fa fa-plus"></i>   
                Insert New Product
            
            </button>
        </form>
        </div>
     </div>
</div>     

<div class="row">
    <div class="large-12 medium-12 small-12 columns">
    

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
                    <th></th>
                    <th></th>
                </tr>
            </thead >
            <tbody id="view_product_table">
            <?php
                $select_products = "SELECT * FROM products
                                    ORDER BY product_name ASC
                                    LIMIT $startResults, 10";
                $myProducts = $mysqli->query($select_products);
            while($row = $myProducts->fetch_object()){
            echo "\t\t\t<tr>\n";
            
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
            echo "\t\t\t\t<td><a href='editproduct.php?id=".$row->product_id."'>Edit</a></td>\n";
            echo "\t\t\t\t<td><a href='deleteproduct.php?id=".$row->product_id."'>Delete</a></td>\n";    
            echo "\t\t\t</tr>\n";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="large-12 medium-12 small-12 columns">
    
    <div class="page_number">
        <ul>
<?
                if($page > 1){
                    print "<li>\n"; 
                    print "\t\t\t\t\t\t<a href='?page=".($page - 1)."'><</a>\n"; 
                    print "\t\t\t\t\t</li>\n";      
                }

                for($i = 1; $i <= $totalPages; $i++)
                    {   print "\t\t\t\t\t<li>\n";
                    if($i == $page){
                        print "\t\t\t\t\t\t<strong>".$i."</strong>\n";
                    }
                else{
                        print "\t\t\t\t\t\t<a href='?page=".$i."'>".$i."</a>\n";
                }
                print "\t\t\t\t\t</li>\n";
                } 
            ?>
            <li id="users">
                <?  if($startResults > 10){
                        print "<a href='?page=".($page + 1)."'>></a>\n"; 
                    }
                ?>
            </li>
        </ul>
     </div>
        
    </div>
</div>
        
    <br>
<? if ($_SESSION['logged_in_user_access'] == ('Privileged')) {
?>

<div class="row">
    <div class="large-12 medium-12 small-12 columns">
    
    <h2 class="h2_center">Modify Users</h2>
        <div>
        <form>
            <button class="btn primary" id="insert_product" formaction="insertuser.php">
             <i class="fa fa-plus"></i>   
                Insert New User
            
            </button>
        </form>    
        </div>
        <table>
            <thead>
        <?php
        echo "\t\t\t<tr>\n";
        
        echo"\t\t\t\t<th>Username</th>\n";
        echo"\t\t\t\t<th>First Name</th>\n";
        echo"\t\t\t\t<th>Last Name</th>\n";
        echo"\t\t\t\t<th>Access Level</th>\n";
        echo"\t\t\t\t<th></th>\n";
        echo"\t\t\t\t<th></th>\n";
        echo "\t\t\t</tr>\n";
        echo "\t\t\t</thead>\n";
        echo "\t\t\t<tbody>\n";
            $select_users = "SELECT * FROM users";
            $myUsers = $mysqli->query($select_users);
        while($row = $myUsers->fetch_object()){
        echo "\t\t\t<tr>\n";
        
        echo "\t\t\t\t<td>" .$row->username."</td>\n";
        echo "\t\t\t\t<td>" .$row->first_name. "</td>\n";
        echo "\t\t\t\t<td>" .$row->last_name. "</td>\n";
        echo "\t\t\t\t<td>" .$row->access_level. "</td>\n";
       echo "\t\t\t\t<td><a href='edituser.php?id=".$row->user_id."'>Edit</a></td>\n";
        echo "\t\t\t\t<td><a href='deleteuser.php?id=".$row->user_id."'>Delete</a></td>\n";
        echo "\t\t\t</tr>\n";
        }
        ?>
            </tbody>
        </table>
    </div>
</div>

<? } ?>

<div class="row">
    <div class="large-12 medium-12 small-12 columns">
    
        <h2 id="reviews" class="h2_center">Modify Reviews</h2>
        <table>
            <thead>
        <?php
        echo "\t\t<tr>\n";
       
        echo"\t\t\t\t<th>Username</th>\n";
        echo"\t\t\t\t<th>Date</th>\n";
        echo"\t\t\t\t<th>Product</th>\n";
        echo"\t\t\t\t<th>Recommend</th>\n";
        echo"\t\t\t\t<th>Title</th>\n";
        echo"\t\t\t\t<th>Review</th>\n";
         echo"\t\t\t\t<th></th>\n";
        echo"\t\t\t\t<th></th>\n";
        echo "\t\t\t</tr>\n";
        echo "\t</thead>\n";
        echo "\t<tbody>\n";
            $select_reviews = "SELECT product_id, product_name, username, review_id, user_id, product_review, review_title, recommend, DATE_FORMAT( review_creation_date,  '%M %d, %Y') AS review_creation_date
            FROM reviews";
            $myReviews = $mysqli->query($select_reviews);
        while($row = $myReviews->fetch_object()){
        echo "\t\t<tr>\n";
       
        echo "\t\t\t<td>" .$row->username. "</td>";
        echo "\t\t\t<td>" .$row->review_creation_date."</td>\n";
        echo "\t\t\t<td>" .$row->product_name."</td>\n";
        echo "\t\t\t<td>" .$row->recommend."</td>\n";
        echo "\t\t\t<td>" .$row->review_title. "</td>\n";
        echo "\t\t\t<td>" .$row->product_review. "</td>\n";
         echo "\t\t\t<td><a href='editreview.php?id=".$row->review_id."'>Edit</a></td>\n";
        echo "\t\t\t<td><a href='deletereview.php?id=".$row->review_id."'>Delete</a></td>\n";
        echo "\t\t</tr>\n";
        }
        ?>
        </tbody>
        </table>
    </div>
</div>
        <br>
<? } include('footer.php'); ?>