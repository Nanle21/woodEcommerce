function addtocart(p_id,action){
	var p_id = p_id;
	var action = action;
	dataString = {
		p_id: p_id, action: action
	}

	$.ajax({
		type: "post",
		url: "processes/cart_operator.php",
		data: dataString,
		cache: false,
		success: function(html){
			$('#cart_view').load("cartview.php", function(){
				$('#loading').fadeOut("fast", function(){
					$('#cart_view').fadeIn("slow");
				})
			})
		},
		error: function(html){
			
		}
	})
}

function addtocartwithqty(p_id,action){
	var p_id = p_id;

	var action = action;
	var qty = document.getElementById('qtynanle').value;
	//alert(qty);
	dataString = {
		p_id: p_id, action: action, qty:qty
	}

	$.ajax({
		type: "post",
		url: "processes/cart_operator.php",
		data: dataString,
		cache: false,
		success: function(html){
			alert("Product has been succefully added to cart");
			$('#cart_view').load("cartview.php", function(){
				$('#loading').fadeOut("fast", function(){
					$('#cart_view').fadeIn("slow");
				})
			})
		},
		error: function(html){
			
		}
	})
}

$(document).ready(function(){
	$('#cart_view').load("cartview.php", function(){
		$('#loading').fadeOut("fast", function(){
			$('#cart_view').fadeIn("slow");
		})
	})

	$('#shop_view').load("show_view.php", function(){
		$('#loading').fadeOut("fast", function(){
			$('#shop_view').fadeIn("slow");
		})
	})
});






function view_show(_id){
    $('#shop_view').fadeIn();
    $('#loading').hide();
    $('#shop_view').load("show_view.php",{category_id:_id},
        function(){
            $('#loading').fadeOut("slow",
                    function(){
                        $('#show_view').fadeIn("slow");
                    }
                )
        
    })
}


function contact(){
	$('#loader').fadeIn("fast");
    $('#contact_form').fadeOut("fast");
	var email = document.getElementById('email').value;
	var mobile_num = document.getElementById('mobile_num').value;
	var order_ref = document.getElementById('order_ref').value;
	var message = document.getElementById('message').value;

	var dataString = {email:email, mobile_num:mobile_num, order_ref:order_ref, message:message};

	$.ajax({
		type: "post",
		url: "processes/contact_process.php",
		data: dataString,
		cache:false,
		success: function(html){
			alert(html);
			 $('#loader').fadeOut("slow");
             $('#contact_form').fadeIn("slow");
             $('input[type="text"],textarea,input[type="email"],select,input[type="file"]').val('');
		},
		error: function(){
			alert(html);
		}
	})
	
}

function decreasecart(){

}
$('#loader').hide();
function updatecart(){
	var inps = document.getElementsByName('pro1_qunt[]');
	for( var i = 0; i < inps.length; i++) {
		var inp=inps[i];
    

	}
	
	$('#cartviews').fadeOut();
	$('#loader').fadeIn();
	$('#cartviews').load("processes/test.php", {},
		function(){
			$('#loader').fadeOut("slow",
				function(){
					$('#cartviews').fadeIn("slow")
				})
		})
	

	
}


function removecart(action,product_id){
    var action = action;
    var product_id = product_id;

    dataString = {
        action:action, p_id:product_id
    }

    $.ajax({
        type: "POST",
        url: "processes/cart_operator.php",
        data: dataString,
        cache: false,
        success: function(html){
            alert(html);
            $('#cart_view').load("cartview.php", function(){
				$('#loading').fadeOut("fast", function(){
					$('#cart_view').fadeIn("slow");
				})
			})
        },
        error: function(html){
            alert("Item can not be deducted from cart");
        }
    })
}