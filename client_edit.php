<?php
    $page_title="| Edit User";
    session_start();
    include("db_connect.php");
    



               	$id= $_SESSION['logged_in_user_id'];
        //die($id);   

     if(isset($_POST['submit'])&& 
        (!empty($_POST['first_name']))&& 
        (!empty($_POST['last_name'])) &&
        
         preg_match("/^([A-Za-z])([a-z]+)$/",$_POST['first_name'])&&
         preg_match("/^([A-Za-z])([a-z]+)$/",$_POST['last_name'])&&
         preg_match("/^([A-Za-z0-9]+)(@)([A-Za-z0-9]+)(.)([a-z]+)$/",$_POST['email'])  &&
         preg_match("/[0-9]{3}-?[0-9]{3}-?[0-9]{4}/",$_POST['phone_number']))
     {
          
        $update_user_query = "UPDATE users SET 
        first_name= '".mysqli_real_escape_string($mysqli,$_POST['first_name'])."',
        last_name = '".mysqli_real_escape_string($mysqli,$_POST['last_name'])."',
        email = '".mysqli_real_escape_string($mysqli,$_POST['email'])."',
        phone_number = '".mysqli_real_escape_string($mysqli,$_POST['phone_number'])."'
        WHERE user_id = $id";
                        //die(print_r($update_user_query, true));                       
                        $mysqli->query($update_user_query);
                        header("Location: client.php");
    }
    include("header.php");

if($_SESSION['logged_in_user_access'] == ('Privileged'||'Administrator')){



                  if(!empty($_POST['first_name'])&&!preg_match("/^([A-Za-z])([a-z]+)$/",$_POST['first_name'])){
                    
                    print " <div class='red'>
            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                <i class='fa fa-exclamation-circle'></i>
            </p>
            
            <p class='large-11 medium-10 small-9 columns wrong'>
                <span class='text-alert'>
                    Please enter a valid first name. First names must be capitalized.
                </span>    
            </p>
        </div>";
                    }
                 if(!empty($_POST['last_name'])&&!preg_match("/^([A-Za-z])([a-z]+)$/",$_POST['last_name'])){

                                    print " <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    Please enter a valid last name. Last names must be capitalized.
                                </span>    
                            </p>
                        </div>";
                                    }
               
                if(!empty($_POST['email'])&&!preg_match("/^([A-Za-z0-9]+)(@)([A-Za-z0-9]+)(.)([a-z]+)$/",$_POST['email'])){

                                    print " <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    Please enter a valid email. Emails must contain the '@' symbol.
                                </span>    
                            </p>
                        </div>";
                                    }

                if(!empty($_POST['phone_number'])&&!preg_match("/[0-9]{3}-?[0-9]{3}-?[0-9]{4}/",$_POST['phone_number'])){

                                    print " <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    Please enter a valid phone numbers. Phone numbers must be a 10 digit number.
                                </span>    
                            </p>
                        </div>";
                                    }

?>

<div class="large-3 medium-3 small-12 columns">
                <a class="back" href="client.php"><i class="fa fa-arrow-left"></i> Return to Account Details</a>
    </div>
    <div class="large-6 medium-6 small-12 columns">

        <h3>Edit Information</h3>
       

        
       
    	<form method="post" action="<? $_SERVER['PHP_SELF']; ?>#">
        	<label for="first_name">First Name</label>
            <input name="first_name" id="first_name" type="text" value="<?print $_SESSION['logged_in_first_name']; ?>" /><br />
            <label for="last_name">Last Name</label>
            <input name="last_name" id="last_name" type="text" value="<?print $_SESSION['logged_in_last_name']; ?>" /><br />
           
            <label for="email">Email</label>
                <input name="email" 
                       id="email" 
                       type="text" 
                       value="<?print $_SESSION['logged_in_email']; ?>" /><br />
             <label for="phone_number">Phone Number</label>
                <input name="phone_number" 
                       id="phone_number" 
                       type="text" 
                       value="<?print $_SESSION['logged_in_phone_number']; ?>" /><br />
            
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