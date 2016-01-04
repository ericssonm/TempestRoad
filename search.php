<?php
/************************************************
	The Search PHP File
************************************************/


/************************************************
	MySQL Connect
************************************************/

// Credentials Please steal my account.
$dbhost = "sulley.cah.ucf.edu";
$dbname = 'ma578143';
$dbuser = 'ma578143';
$dbpass = 'Newport1';

//	Connection
global $tempest_road;

$tempest_road = new mysqli();
$tempest_road->connect($dbhost, $dbuser, $dbpass, $dbname);
$tempest_road->set_charset("utf8");
//echo "connected";
//	Check Connection
if ($tempest_road->connect_errno) {
    printf("Connect failed: %s\n", $tempest_road->connect_error);
    exit();
}

/************************************************
	Search Functionality
************************************************/

// Define Output HTML Formating
$html = '';
$html .= '<li class="result">';
$html .= '<a target="_blank" href="urlString">';
$html .= '<p>nameString</p>';
//$html .= '<p>functionString</p>';
$html .= '</a>';
$html .= '</li>';

// Get Search
$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_POST['query']);
$search_string = $tempest_road->real_escape_string($search_string);

// Check Length More Than One Character
if (strlen($search_string) >= 1 && $search_string !== ' ') {
	// Build Query
	$query = 'SELECT * FROM products WHERE product_name LIKE "%'.$search_string.'%" OR category LIKE "%'.$search_string.'%"';

	// Do Search
	$result = $tempest_road->query($query);
	while($results = $result->fetch_array()) {
		$result_array[] = $results;
	}

	// Check If We Have Results
	if (isset($result_array)) {
		foreach ($result_array as $result) {

			// Format Output Strings And Hightlight Matches
			$display_function = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result['product_name']);
			$display_name = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result['product_name']);
			//product page prob goes here...
				//$display_url = 'https://www.google.com/#q='.urlencode($result['product_name']).'&lang=en';
			$display_url = 'http://sulley.cah.ucf.edu/~dig4530c_006/A/product.php?id='.urlencode($result['product_id']);



			// Insert Name
			$output = str_replace('nameString', $display_name, $html);

			// Insert Function
			//$output = str_replace('functionString', $display_function, $output);

			// Insert URL
			$output = str_replace('urlString', $display_url, $output);

			// Output
			echo($output);
		}
	}else{

		// Format No Results Output
		//UrlString here..?
		$output = str_replace('urlString', 'javascript:void(0);', $html);
		$output = str_replace('nameString', '<b>No Results Found :(</b>', $output);
		$output = str_replace('functionString', 'Sorry ', $output);

		// Output
		echo($output);
	}
}


/*
// Build Function List (Insert All Functions Into DB - From PHP)

// Compile Functions Array
$functions = get_defined_functions();
$functions = $functions['internal'];

// Loop, Format and Insert
foreach ($functions as $function) {
	$function_name = str_replace("_", " ", $function);
	$function_name = ucwords($function_name);

	$query = '';
	$query = 'INSERT INTO search SET id = "", function = "'.$function.'", name = "'.$function_name.'"';

	$tempest_road->query($query);
}
*/
?>