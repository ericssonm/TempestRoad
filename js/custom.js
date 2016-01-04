/* JS File */

// Start Ready
$(document).ready(function() {  

	// Icon Click Focus
	$('div.icon').click(function(){
		$('input#search').focus();
	});

	// Live Search
	// On Search Submit and Get Results
	function search() {
		var query_value = $('input#search').val();
		$('b#search-string').text(query_value);
		if(query_value !== ''){
			$.ajax({
				type: "POST",
				url: "search.php",
				data: { query: query_value },
				cache: false,
				success: function(html){
					$("ul#results").html(html);
				}
			});
		}return false;    
	}
    $(document).on("keyup","input#search", function(l) {

	//$("input").on("keyup", "#search",function(l) {
		// Set Timeout
		clearTimeout($.data(this, 'timer'));

		// Set Search String
		var search_string = $(this).val();

		// Do Search
		if (search_string == '') {
			$("ul#results").fadeOut();
			$('p#results-text').fadeOut();
		}else{
			$("ul#results").fadeIn();
			$('p#results-text').fadeIn();
			$(this).data('timer', setTimeout(search, 100));
		};
	});

});