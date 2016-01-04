<?php
    $page_title="| Sign Up";
    session_start();
    include("db_connect.php");
   
    



      if(isset($_POST['submit'])&& (!empty($_POST['first_name']))&& (!empty($_POST['last_name']))&& (!empty($_POST['username']))&& (!empty($_POST['email']))&& (!empty($_POST['phone_number']))&& (!empty($_POST['password']))&& (!empty($_POST['confirm'])) &&($_POST['password'] == $_POST['confirm'])&& preg_match("/^([A-Za-z])([a-z]+)$/",$_POST['first_name'])) {
         // die("dead");
        $insert_user_query = "INSERT INTO users(first_name, last_name, username, email, phone_number, password, access_level)
                                                 VALUES ('".mysqli_real_escape_string($mysqli,$_POST['first_name'])."', '".mysqli_real_escape_string($mysqli,$_POST['last_name'])."', '".mysqli_real_escape_string($mysqli,$_POST['username'])."',
'".mysqli_real_escape_string($mysqli,$_POST['email'])."', 
'".mysqli_real_escape_string($mysqli,$_POST['phone_number'])."', '".mysqli_real_escape_string($mysqli,sha1($_POST['password']))."', 'Normal User');
                                                 ";
          //die(print_r($insert_user_query));
           $mysqli->query($insert_user_query);
          
            header("Location: login.php");
    }


	

    include("header.php");
                  

?>
    <div class="large-3 medium-3 small-12 columns">
        &nbsp;
    </div>
    <div class="large-6 medium-6 small-12 columns">
        <h3>Sign Up</h3>
        
        <p>
            <em>*All fields are required for registration</em>
        </p>
       
    	<form method="post" action="<? $_SERVER['PHP_SELF']; ?>#" >
            <div class="large-6 medium-12 small-12 columns left_input">
            <label for="first_name">First Name</label>
                <input name="first_name" 
                        id="first_name" 
                        type="text" 
                        value="<? print $_POST['first_name']; ?>" /><br />
            </div>
            <div class="large-6 medium-12 small-12 columns left_input">
               <label for="last_name">Last Name</label>
                <input name="last_name" 
                       id="last_name" 
                       type="text" 
                       value="<? print $_POST['last_name']; ?>" /><br />
            </div>
            
                <label for="username">Username</label>
                <input name="username" 
                       id="username" 
                       type="text" 
                       value="<? print $_POST['username']; ?>" /><br />
            
             <label for="email">Email</label>
                <input name="email" 
                       id="email" 
                       type="text" 
                       value="<? print $_POST['email']; ?>" /><br />
            
             <label for="phone_number">Phone Number</label>
                <input name="phone_number" 
                       id="phone_number" 
                       type="text" 
                       value="<? print $_POST['phone_number']; ?>" /><br />
            
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
                                            Sign Up  
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
        
            <? 
                $username = $mysqli->real_escape_string($_POST['username']);
                $password = $mysqli->real_escape_string($_POST['password']); 
    
            ?>

<?php include("footer.php"); ?>