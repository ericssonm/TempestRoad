<?php
    $page_title="| Edit User";
    session_start();
    include("db_connect.php");
    



               	$id= $_GET['id'];
  	  			$select_user = "SELECT * FROM users WHERE user_id = $id";
      			$myUser = $mysqli->query($select_user);
	 			$row = $myUser->fetch_object(); 

     if(isset($_POST['submit'])&& 
        (!empty($_POST['first_name']))&& 
        (!empty($_POST['last_name']))&& 
        (!empty($_POST['username']))&& 
         preg_match("/^([A-Za-z])([a-z]+)$/",$_POST['first_name'])&&
         preg_match("/^([A-Za-z])([a-z]+)$/",$_POST['last_name'])&&
         preg_match("/^[a-zA-Z0-9]+$/",$_POST['username'])) {
         
        $update_user_query = "UPDATE users SET 
        first_name= '".mysqli_real_escape_string($mysqli,$_POST['first_name'])."',
        last_name = '".mysqli_real_escape_string($mysqli,$_POST['last_name'])."',
        username = '".mysqli_real_escape_string($mysqli,$_POST['username'])."',
        access_level = '".mysqli_real_escape_string($mysqli,$_POST['sort'])."'
        WHERE user_id = $id";
                                                 
                        $mysqli->query($update_user_query);
                        header("Location: view_products.php#users");
    }
    include("header.php");

if($_SESSION['logged_in_user_access'] == ('Privileged'||'Administrator')){



                  if((isset($_POST['submit']))&&((empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['username'])))){
                      print "<p class='red'>Please fill out all the fields.</p>\n";
                  }
        
                if(!empty($_POST['first_name'])&&!preg_match("/^([A-Za-z])([a-z]+)$/",$_POST['first_name'])){
                    
                    print "<p class='red'>Please enter a valid first name. Names must start with a capital letter.</p>";
                    }
                if(!empty($_POST['last_name'])&&!preg_match("/^([A-Za-z])([a-z]+)$/",$_POST['last_name'])){
                    
                    print "<p class='red'>Please enter a valid last name. Names must start with a capital letter.</p>";
                    }
                if(!empty($_POST['username'])&&!preg_match("/^[a-zA-Z0-9]+$/",$_POST['username'])){
                    
                    print "<p class='red'>Please enter a valid username. Usernames must contain only letters and numbers.</p>";
                    }

?>

<div class="large-3 medium-3 small-12 columns">
                <a class="back" href="client.php"><i class="fa fa-arrow-left"></i> Return to Account Details</a>
    </div>
    <div class="large-6 medium-6 small-12 columns">

        <h3>Edit Information</h3>
       

       
    	<form method="post" action="<? $_SERVER['PHP_SELF']; ?>#">
        	<label for="first_name">First Name</label>
            <input name="first_name" id="first_name" type="text" value="<? print $row->first_name; ?>" /><br />
            <label for="last_name">Last Name</label>
            <input name="last_name" id="last_name" type="text" value="<? print $row->last_name; ?>" /><br />
            <label for="username">Username</label>
            <input name="username" id="username" type="text" value="<? print $row->username; ?>" /><br />
            <label for="sort">Access Level</label>
            <select id="sort" name="sort">
                <option <? if ($row->access_level=="Normal User"){echo 'selected' ;} ?> value="Normal User">Normal User</option>
                  <option <? if ($row->access_level==Administrator){echo 'selected' ;} ?>  value="Administrator">Administrator</option>
                <? if($_SESSION['logged_in_user_access'] == 'Privileged'){ ?>
                  <option <? if ($row->access_level==Privileged){echo 'selected' ;} ?> value="Privileged">Privileged</option>
                <? } ?>
            </select>
             </div>
                
            <div class="large-3 medium-3 small-12 columns">
                &nbsp;
            </div>

          
            <div class="row">

                    <div class="large-3 medium-3 small-12 columns">
                        &nbsp;
                       </div>


                            <div class="large-6 medium-6 small-12 columns">  
                                <ul class="button-group login_group">
                                    <li>
                                         <button name="submit" 
                                                 id="submit" 
                                                 type="submit" 
                                                 class="btn primary">
                                            Save Changes 
                                         </button>  

                                    </li>
                                    <li>
                                        <a class="cancel_link" href="client.php" >
                                            Cancel  
                                        </a> 
                                    </li>
                                </ul>
                            </div>

                <div class="large-3 medium-3 small-12 columns">
                        &nbsp;
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