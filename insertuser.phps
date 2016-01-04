<?
    session_start();
$page_title="| New Users";

    include("db_connect.php");

     if(isset($_POST['submit'])&& (!empty($_POST['first_name']))&& (!empty($_POST['last_name']))&& (!empty($_POST['username']))&& (!empty($_POST['password']))&& (!empty($_POST['confirm'])) &&($_POST['password'] == $_POST['confirm'])&&(!empty($_POST['first_name'])&& preg_match("/^([A-Za-z])([a-z]+)$/",$_POST['first_name']))&&!empty($_POST['last_name'])&& preg_match("/^([A-Za-z])([a-z]+)$/",$_POST['last_name'])&&!empty($_POST['username'])&& preg_match("/^[a-zA-Z0-9]+$/",$_POST['username'])) {
        $insert_user_query = "INSERT INTO users(first_name, last_name, username, password, access_level)
                                                 VALUES ('".mysqli_real_escape_string($mysqli,$_POST['first_name'])."',
                                                         '".mysqli_real_escape_string($mysqli,$_POST['last_name'])."',                                                              '".mysqli_real_escape_string($mysqli,$_POST['username'])."',                                                             '".mysqli_real_escape_string($mysqli,sha1($_POST['password']))."',                                                         '".mysqli_real_escape_string($mysqli,$_POST['sort'])."')";
                        $mysqli->query($insert_user_query);
                        header("Location: view_products.php");
    }
    include("header.php");

if($_SESSION['logged_in_user_access'] == ('Privileged'||'Administrator')){



                  if((isset($_POST['submit']))&&((empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['username']) ||empty($_POST['password']) || empty($_POST['confirm'])))){
                      print "
                      <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    Please fill out all the fields.\n
                                </span>    
                            </p>
                        </div>
                     \n";
                      
                      
                      
                  }
                  elseif((isset($_POST['submit']))&&((!empty($_POST['first_name']) || !empty($_POST['last_name']) || !empty($_POST['username']) ||!empty($_POST['password']) || !empty($_POST['confirm'])) && ($_POST['password'] !== $_POST['confirm']) )){
                      print "
                                            <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    Please fill out all the fields.\n
                                </span>    
                            </p>
                        </div>
                     \n";
                      
                  }
        
                if(!empty($_POST['first_name'])&&!preg_match("/^([A-Za-z])([a-z]+)$/",$_POST['first_name'])){
                    
                    print "
                     <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    Please enter a valid first name. Names must start with a capital letter.\n
                                </span>    
                            </p>
                        </div>
                     \n";
                    
                    }
                if(!empty($_POST['last_name'])&&!preg_match("/^([A-Za-z])([a-z]+)$/",$_POST['last_name'])){
                    
                    print "
                    <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    Please enter a valid last name. Names must start with a capital letter.\n
                                </span>    
                            </p>
                        </div>
                     \n";
                 
                    }
                if(!empty($_POST['username'])&&!preg_match("/^[a-zA-Z0-9]+$/",$_POST['username'])){
                    
                    print "
                     <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    Please enter a valid username. Usernames must contain only letters and numbers.\n
                                </span>    
                            </p>
                        </div>
                     \n";
                  
        
                    }

?>
<div class="large-3 medium-3 small-12 columns">
        &nbsp;
    </div>
    <div class="large-6 medium-6 small-12 columns">

        <h3>New User Account</h3>
       
    	<form method="post" action="<? $_SERVER['PHP_SELF']; ?>#">
        	
            <label for="first_name">First Name</label>
                <input name="first_name" 
                        id="first_name" 
                        type="text" 
                        value="<? print $_POST['first_name']; ?>" /><br />
           
               <label for="last_name">Last Name</label>
                <input name="last_name" 
                       id="last_name" 
                       type="text" 
                       value="<? print $_POST['last_name']; ?>" /><br />

            
                <label for="username">Username</label>
                <input name="username" 
                       id="username" 
                       type="text" 
                       value="<? print $_POST['username']; ?>" /><br />
            
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

            <br />
            <label for="sort">Access Level</label>
            <select id="sort" name="sort">
                  <option value="Normal User">Normal User</option>
                  <option value="Administrator">Administrator</option>
                <? if($_SESSION['logged_in_user_access'] == 'Privileged'){ ?>
                  <option value="Privileged">Privileged</option>
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
                                            CREATE ACCOUNT  
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
    }
else{
    print "
     <div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>
                                    This page is for administrators and privileged users only, please sign in to view content.\n
                                </span>    
                            </p>
                        </div>
                     \n";
    
   
}
            ?>

<?php include("footer.php"); ?>