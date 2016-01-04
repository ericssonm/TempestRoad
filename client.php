
    
 <?php
$page_title="| Account";
include("header.php");
$numberOfProducts = mysqli_num_rows($mysqli->query('SELECT * FROM products'));
$numberOfThree = mysqli_num_rows($mysqli->query('SELECT * FROM products WHERE recommended_age="3"'));
$numberOfEight = mysqli_num_rows($mysqli->query('SELECT * FROM products WHERE recommended_age="8"'));
$numberOfTwelve = mysqli_num_rows($mysqli->query('SELECT * FROM products WHERE recommended_age="12"'));
$numberOfSixteen = mysqli_num_rows($mysqli->query('SELECT * FROM products WHERE recommended_age="16"'));



//_________________________________NORMAL USER______________________  

if(($_SESSION['logged_in_user_access'] == "Normal User")) { 
    
?>  
       
        <div class="sidebar large-2 medium-2 small-2 columns">
          &nbsp;
        </div>
       
        <div class="client_body large-8 medium-8 small-8 columns">
            <div class="dashboard_text">
                <h2 class="h2">My Dashboard</h2>
            </div>
            <div class="dashboard_name">
                <? print "<p> Hello, <strong> ".$_SESSION['logged_in_first_name']." ".$_SESSION['logged_in_last_name'].
        "</strong>\n"?>
            </div>
            <div class="dashboard_description">
                <p><em>From your Dashboard you have the ability to see your account and contact information. Click the 'Edit Information' button below to modify any personal user information.</em></p>
            </div>
            
             
            
            <div class="client_account_information" id="account">
                <h3>Account Information</h3>
            </div>
            
              <div class="client_content_right">
                <div class="row">
                    <div class=" large-12 medium-12 small-12 columns">
                    
                       <p class="client_info">Contact Information</p>     
                        <ul class="client_information">
                            <li>
                                <p>
                                    <span class="label ">NAME</span> 
                            <br>
                            <?print $_SESSION['logged_in_first_name']." " .$_SESSION['logged_in_last_name']; ?>
                                    </p>
                            </li>
                             <li>
                                <p>
                                   <span class="label ">USERNAME</span>
                                    <br>
                                 <?print $_SESSION['logged_in_user']; ?>
                                </p>
                            </li>
                            <li>
                        <p>
                            <span class="label ">EMAIL</span>
                            <br>
                    <?print $_SESSION['logged_in_email']; 
                            if 
(!$_SESSION['logged_in_email']) {
                            print ('--');
                            }?>
                            </p>
                    </li>
                    <li>
                    </li>
                    <li>
                        <p>
                            <span class="label ">PHONE NUMBER</span>
                            <br>
                         <?print $_SESSION['logged_in_phone_number']; 
                            if 
(!$_SESSION['logged_in_phone_number']) {
                            print ('--');}?>
                        </p>
                    </li>

                   

                </ul>    
                    
                    
            </div>           
                </div>  
                <div class="row">
                    <div class="large-12 medium-12 small-12 columns">
                    <form action="client_edit.php">
                        <button class="btn primary edit">
                            Edit Information
                        </button>
                    </form>
                </div> 
            </div>
        </div>       
            
<? }
//_________________________________ADMINISTRATOR______________________  
elseif(($_SESSION['logged_in_user_access'] == "Administrator")){
    
?>
           
           
<div class="sidebar_admin large-2 medium-2 small-2 columns">
            <ul>
                <li>
                    <p>Dashboard</p>
                </li>
               
                 <li>
                    <a href='view_products.php'>Manage Content</a>
                </li>
            </ul>
        </div>
            
            
            
        <div class="client_body large-8 medium-8 small-8 columns">
            <div class="dashboard_text">
                <h2 class="h2">Administrator  Dashboard</h2>
            </div>
            <div class="dashboard_name">
                <? print "<p> Hello, <strong> ".$_SESSION['logged_in_first_name']." ".$_SESSION['logged_in_last_name']."</strong>\n"?>
            </div>
            <div class="dashboard_description">
                <p>From the Administrator Dashboard, you have the ability to insert, edit, and delete products, and modify reviews by clicking 'Manage Content' in the sidebar to the left. You do not have the sufficient access level to modify user information. Click the 'Edit Information' button below to modify any personal user information.
                </p>
            </div>
            <div class="client_content_right">
                <div class="row">
                    <div class=" large-12 medium-12 small-12 columns">
                    
                       <p class="client_info">Contact Information</p>     
                        <ul class="client_information">
                            <li>
                                <p>
                                    <span class="label ">NAME</span> 
                            <br>
                            <?print $_SESSION['logged_in_first_name']." " .$_SESSION['logged_in_last_name']; ?>
                                    </p>
                            </li>
                             <li>
                                <p>
                                   <span class="label ">USERNAME</span>
                                    <br>
                                 <?print $_SESSION['logged_in_user']; ?>
                                </p>
                            </li>
                            <li>
                        <p>
                            <span class="label ">EMAIL</span>
                            <br>
                    <?print $_SESSION['logged_in_email']; 
                            if 
(!$_SESSION['logged_in_email']) {
                            print ('--');
                            }?>
                            </p>
                    </li>
                    <li>
                    </li>
                    <li>
                        <p>
                            <span class="label ">PHONE NUMBER</span>
                            <br>
                         <?print $_SESSION['logged_in_phone_number']; 
                            if 
(!$_SESSION['logged_in_phone_number']) {
                            print ('--');}?>
                        </p>
                    </li>

                   

                </ul>    
                    
                    
            </div>           
                </div>  
                <div class="row">
                    <div class="large-12 medium-12 small-12 columns">
                    <form action="client_edit.php">
                        <button class="btn primary edit">
                            Edit Information
                        </button>
                    </form>
                </div> 
            </div>
        </div>       
    <div class=" large-4 medium-12 small-12 columns ">
     <p class="card">
         Number of Products
         <br>
         <br>
         <span class="admin_info">
             <? print $numberOfProducts; ?>
         </span>
        </p>
    </div>
     <div class=" large-4 medium-12 small-12 columns ">
     <p class="card">
         Products ages 3+ 
         <br>
         <br>
         <span class="admin_info">
             <? print $numberOfThree; ?>
         </span>
         </p>
     </div>
      <div class=" large-4 medium-12 small-12 columns ">
     <p class="card">
         Products ages 8+ 
         <br>
         <br>
         <span class="admin_info">
            <? print $numberOfEight; ?>
         </span>
      </p>
    </div>
      <div class=" large-4 medium-12 small-12 columns ">
     <p class="card">
         Products ages 12+ 
         <br>
         <br>
         <span class="admin_info">
             <? print $numberOfTwelve; ?>
         </span>
      </p>
    </div>
    <div class=" large-4 medium-12 small-12 columns ">
     <p class="card">
         Products ages 16+ 
         <br>
         <br>
         <span class="admin_info">
             <? print $numberOfSixteen; ?>
         </span>
        </p>
    </div>
</div>

            
       
        </div>
           
<? }
//_________________________________PRIVILEGED______________________  
elseif(($_SESSION['logged_in_user_access'] == "Privileged")){
    
?>
           
       <div class="sidebar_admin large-2 medium-2 small-2 columns">
              
            <ul>
                <li>
                    <p>Dashboard</p>
                </li> 
                <li>
                    <a href='view_products.php'>Manage Content</a>
                </li>
            </ul>
        </div>
        <div class="client_body large-8 medium-8 small-8 columns">
            <div class="dashboard_text">
                <h2 class="h2">Privileged  Dashboard</h2>
            </div>
            <div class="dashboard_name">
                <? print "<p> Hello,
<strong>                ".$_SESSION['logged_in_first_name']." ".$_SESSION['logged_in_last_name']."
</strong>\n"?>
            </div>
            <div class="dashboard_description">
                <p><em>
                    From the Privileged Dashboard, you have the ability to insert, edit, and delete products and users, and modify reviews by clicking 'Manage Content' in the sidebar to the left. Click the 'Edit Information' button below to modify any personal user information.
                    </em></p>
            </div>
            <div class="admin_overview" id="overview">
                <h3>Overview</h3>
            </div>

            <div class="client_content_right">
                <div class="row">
                    <div class=" large-12 medium-12 small-12 columns">
                    
                       <p class="client_info">Contact Information</p>     
                        <ul class="client_information">
                            <li>
                                <p>
                                    <span class="label ">NAME</span> 
                            <br>
                            <?print $_SESSION['logged_in_first_name']." " .$_SESSION['logged_in_last_name']; ?>
                                    </p>
                            </li>
                             <li>
                                <p>
                                   <span class="label ">USERNAME</span>
                                    <br>
                                 <?print $_SESSION['logged_in_user']; ?>
                                </p>
                            </li>
                            <li>
                        <p>
                            <span class="label ">EMAIL</span>
                            <br>
                    <?print $_SESSION['logged_in_email']; 
                            if 
(!$_SESSION['logged_in_email']) {
                            print ('--');
                            }?>
                            </p>
                    </li>
                    <li>
                    </li>
                    <li>
                        <p>
                            <span class="label ">PHONE NUMBER</span>
                            <br>
                         <?print $_SESSION['logged_in_phone_number']; 
                            if 
(!$_SESSION['logged_in_phone_number']) {
                            print ('--');}?>
                        </p>
                    </li>

                   

                </ul>    
                    
                    
            </div>           
                </div>  
                <div class="row">
                    <div class="large-12 medium-12 small-12 columns">
                    <form action="client_edit.php">
                        <button class="btn primary edit">
                            Edit Information
                        </button>
                    </form>
                </div> 
            </div>
        </div>       
                
    <div class=" large-4 medium-12 small-12 columns ">
     <p class="card">
         Number of Products
         <br>
         <br>
         <span class="admin_info">
             <? print $numberOfProducts; ?>
         </span>
        </p>
    </div>
     <div class=" large-4 medium-12 small-12 columns ">
     <p class="card">
         Products ages 3+ 
         <br>
         <br>
         <span class="admin_info">
             <? print $numberOfThree; ?>
         </span>
         </p>
     </div>
      <div class=" large-4 medium-12 small-12 columns ">
     <p class="card">
         Products ages 8+ 
         <br>
         <br>
         <span class="admin_info">
            <? print $numberOfEight; ?>
         </span>
      </p>
    </div>
      <div class=" large-4 medium-12 small-12 columns ">
     <p class="card">
         Products ages 12+ 
         <br>
         <br>
         <span class="admin_info">
             <? print $numberOfTwelve; ?>
         </span>
      </p>
    </div>
    <div class=" large-4 medium-12 small-12 columns ">
     <p class="card">
         Products ages 16+ 
         <br>
         <br>
         <span class="admin_info">
             <? print $numberOfSixteen; ?>
         </span>
        </p>
    </div>
</div>
</div>
</div>
           
<? }
//_________________________________None______________________  
else{

 print "<div class='red'>
                            <p class='large-1 medium-2 small-3 columns icon_wrong'>
                                <i class='fa fa-exclamation-circle'></i>
                            </p>

                            <p class='large-11 medium-10 small-9 columns wrong'>
                                <span class='text-alert'>Please log in
                                </span>    
                            </p>
                        </div>
                     \n";
    
    
}
?>      
            
            
            
    </div> <!-- End Body Wrap -->
            
        
   <?php include("footer.php"); ?>