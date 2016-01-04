<?php 
session_start();
    $page_title="| Edit Review";

    include("db_connect.php");



    
    include("header.php");
?>


 <div class="large-3 medium-3 small-12 columns">
        &nbsp;
    </div>
    <div class="large-6 medium-6 small-12 columns">
        <h3>Edit Information</h3>
       
  <?  
          //print_r($_SESSION['logged_in_user_id']  );

               	$id= $_SESSION['logged_in_user_id'];
  	  			/*$select_user = "SELECT * FROM users WHERE user_id = $id";
      			$myUser = $mysqli->query($select_user);
	 			$row = $myUser->fetch_object(); */
    
    
     if(isset($_POST['submit'])&& 
        (!empty($_POST['first_name']))&& 
        (!empty($_POST['last_name'])))
 {
         
        // die("sdasd");


     $update_user_query = "UPDATE users SET first_name = '".mysqli_real_escape_string($mysqli,$_POST['first_name'])."', 
     
     last_name = '".mysqli_real_escape_string($mysqli,$_POST['last_name'])."', 
    email = '".mysqli_real_escape_string($mysqli,$_POST['email'])."',
    phone_number = '".mysqli_real_escape_string($mysqli,$_POST['phone_number'])."', 
    password = '".sha1(mysqli_real_escape_string($mysqli,$_POST['password']))."'
    WHERE user_id = $id";
       //  die(print_r($update_user_query, true));
          $mysqli->query($update_user_query);
     }
        ?>
    	<form method="post" action="<? $_SERVER['PHP_SELF']; ?>#">
           
            
             <p class="client_info">Contact Information</p>
            <label for="first_name">First Name</label>
                <input name="first_name" 
                        id="first_name" 
                        type="text" 
                        value=" <?print $_SESSION['logged_in_first_name']; ?>" /><br />
           
               <label for="last_name">Last Name</label>
                <input name="last_name" 
                       id="last_name" 
                       type="text" 
                       value=" <?print $_SESSION['logged_in_last_name']; ?>" /><br />

            
                <label for="email">Email</label>
                <input name="email" 
                       id="email" 
                       type="text" 
                       value=" <?print $_SESSION['logged_in_email']; ?>" /><br />
             <label for="phone_number">Phone Number</label>
                <input name="phone_number" 
                       id="phone_number" 
                       type="text" 
                       value=" <?print $_SESSION['logged_in_phone_number']; ?>" /><br />
            
            <div class="large-6 medium-12 small-12 columns left_input">
                <label for="password">Password</label>
                <input name="password" id="password" type="password" /><br />
            </div>
            
            <div class="large-6 medium-12 small-12 columns left_input">
                <label for="confirm">Confirm Password</label>
                <input name="confirm" 
                       id="confirm" 
                       type="password" /><br />
            </div>
             
            
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
                                        <a class="cancel_link" href="home.php" >
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

<?php include("footer.php"); ?>