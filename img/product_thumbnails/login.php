<?

    $page_title="| Login";
	session_start();
    include("db_connect.php");

    if(isset($_POST['submit']) && (!isset($_SESSION['logged_in']))) {

            $select_query = "SELECT * FROM users"; // query to select all users/passwords
            $select_result = $mysqli->query($select_query);
            while($row = $select_result->fetch_object()) {
                if (($_POST['username'] == $row->username) && sha1($_POST['password']) == $row->password) { // check if user input = a record in the database
                    $_SESSION['logged_in'] = true;
                    $_SESSION['logged_in_user'] = $row->username;
                    $_SESSION['logged_in_user_id'] = $row->user_id;
                    $_SESSION['logged_in_first_name'] = $row->first_name;
                    $_SESSION['logged_in_phone_number'] = $row->phone_number;
                    $_SESSION['logged_in_email'] = $row->email;
                    $_SESSION['logged_in_last_name'] = $row->last_name;
                    $_SESSION['logged_in_user_access'] = $row->access_level;
                }
            }
        }
            
	if (isset($_SESSION['logged_in'])) {
		header("Location: client.php");
	}

       
    include("header.php");

                 if((($_POST['username']) !== ($row->username)) && (sha1($_POST['password']) !== ($row->password))){

        ?>
        <div class="red">
            <p class="large-1 medium-2 small-3 columns icon_wrong ">
                <i class="fa fa-exclamation-circle"></i>
            </p>
            
            <p class="large-11 medium-10 small-9 columns wrong">
                <span class="text-alert">
                    Sorry, Invalid username or password
                </span>    
            </p>
        </div>
        <?php
                    }
                
            

        ?>

        <div class="row">
            <div class="large-3 medium-3 small-12 columns">
            &nbsp;
           </div>
            
            <div class="large-6 medium-6 small-12 columns">
                <h2 class="login">
                    Login to your account
                </h2>
           </div> 
                
            <div class="large-3 medium-3 small-12 columns">
            &nbsp;
           </div>
        </div>

       <div class="row">
           <div class="large-3 medium-3 small-12 columns">
            &nbsp;
           </div>
           <div class="large-6 medium-6 small-12 columns">
                	<form method="post" action="<? $_SERVER['PHP_SELF']; ?>">
        	<label for="username">Username:</label>
            <input name="username" id="username" type="text" /><br />
            <label for="password">Password:</label>
            <input name="password" id="password" type="password" /><br />
            
            
          
           </div>
           
           <div class="large-3 medium-3 small-12 columns">
            &nbsp;
           </div>

        </div>


        <div class="row">

                <div class="large-3 medium-3 small-12 columns">
                    &nbsp;
                   </div>


                        <div class="large-6 medium-6 small-12 columns">  
                            <ul class="button-group login_group">
                                <li>
                                     <button name="submit" id="submit" type="submit" class="btn primary">
                                        Login  
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
    </body>
</html>

<?php include("footer.php"); ?>