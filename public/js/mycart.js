$(".form-item").submit(function(e){ //user clicks form submit button
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var form_data = $(this).serialize(); //prepare form data for Ajax post
    var button_content = $(this).find('button[type=submit]'); //get clicked button info
    button_content.html('Adding...'); //Loading button text //change button text 
	var count=$("#cart-info").text();
	count=count + 1;
	$("#cart-info").text(count);
    $.ajax({ //make ajax request
        url: "/add_to_cart",
        type: "POST",
        //dataType:"json", //expect json value from server
        data: form_data,
		success:function(data){
			//var count=$( "#cart-bo").innerText;
			
			button_content.html('Add to Cart'); //reset button text to original text
			if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
				$(".cart-box").trigger( "click" ); //trigger click to update the cart box.
			}
		}	
		
    })
    e.preventDefault();
});

$( "#cart-bo").click(function(e) { //when user clicks on cart box
    e.preventDefault(); 
	//alert('clicked');
    //$(".shopping-cart-box").fadeIn(); //display cart box
   // $("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //show loading image
    $("#cart-content" ).load( "/cart"); //Make ajax request using jQuery Load() & update results
});

$(".empty-cart").click(function(e) {
     $.ajax({ //make ajax request
        url: "/empty_cart",
        type: "GET",
		success:function(data){
			if(data=="success"){
				$("#cart-content" ).load("Shopping Cart is empty"); 
			//if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
				$("#cart-bo").trigger( "click" ); //trigger click to update the cart box.
			}
		}	
		
    })
});

$(".check-out").click(function(e) {
     window.location.href = '/cart_summary'; 
});

$("#proceed_check_out").click(function(e) {
     window.location.href = '/order_page'; 
});

$("#continue_shopping").click(function(e) {
     window.location.href = '/'; 
});

