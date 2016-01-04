<?
    
    $currency = '&#36;'; //Currency Character or code
    $shipping_cost      = 5.89; //shipping cost
    $taxes              = array( //List your Taxes percent here. 
                            '' => .065
                            );  
    $shipping              = array( //List your Taxes percent here.
                            '' => 4.50, 
                            );

    $PayPalMode         = 'sandbox'; // sandbox or live
    $PayPalApiUsername  = 'trav1030-facilitator_api1.knights.ucf.edu'; //PayPal API Username
    $PayPalApiPassword  = 'UB7C4ZLGNZXPR75F'; //Paypal API password
    $PayPalApiSignature     = 'AFcWxV21C7fd0v3bYYYRCpSSRl31AbK-8kJ8qTXcPY.PIAkGtPDDlnKe'; //Paypal API Signature
    $PayPalCurrencyCode     = 'USD'; //Paypal Currency Code
    $PayPalReturnURL    = 'http://sulley.cah.ucf.edu/~dig4530c_group006/A/process.php'; //Point to process.php page
    $PayPalCancelURL    = 'http://sulley.cah.ucf.edu/~dig4530c_group006/A/home.php'; //Cancel URL if user clicks cancel
    //$PayPalReturnURL    = 'http://sulley.cah.ucf.edu/~ma513269/A/process.php'; //Point to process.php page
    //$PayPalCancelURL    = 'http://sulley.cah.ucf.edu/~ma513269/A/home.php'; //Cancel URL if user clicks cancel
    error_reporting(E_ALL ^ E_NOTICE);

    
	$mysqli = new mysqli("localhost" /*host*/,"ma578143" /*username*/,"Newport1" /*password*/,"ma578143" /*database*/);
    mysqli_set_charset($mysqli, "utf8");

?>