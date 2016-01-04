/*
$(".add").click(function(){

        $.post($("#add_featured").attr("action"),$("#add_featured :input").serializeArray(), function(info){$("#result1").html(info); });
        clearinput();
    });

    $("#add_featured,#add_featured_banner").submit(function(){
        return false;
    });

    function clearinput()
    {
        $("#add_featured,#add_featured_banner :input").each(function(){
            $(this).val('');
        });
    }


$('.add').submit(function () {
    $.post('cart_update.php', $('.add').serialize(), function (data, textStatus) {
         $('.add').append(data);
    });
    return false;
});

*/
/*
// magic.js
$(document).ready(function() {

    // process the form
    $('form').submit(function(event) {

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
          
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'update_cart.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'Intelligent Guess', // what type of data do we expect back from the server
                        encode          : true
        })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data); 

                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});
 */
// magic.js
$(document).ready(function() {

    // process the form
    $('#add_featured').submit(function(event) {

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'sku': $('input[name=product_code]').val(),
            'qty': $('input[name=product_qty]').val(),
            'type': $('input[name=type]').val(),
            'rtnUrl':$('input[name=return_url]').val()
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'cart_update.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'Intelligent Guess', // what type of data do we expect back from the server
                        encode          : true
        })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data); 

                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});



