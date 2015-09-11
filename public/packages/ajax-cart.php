<!---------------- Cart Ajax Sections ----------->
<script> //------------ Icon Page -------------
$(document).ready(function(cart){
    $(".byajax").click(function(e){
        e.preventDefault();
        $.ajax(this.href,{
        	success:function(data){
	        	if (data.notloggedin){
	        		alert(data.notloggedin);
	        	}
        		$("#cartresume").html(data.cart_description + data.cart_amount);
        	}
        },"json");
    });
});
</script>
<script> //-----------------Shop Page -------------
$(document).ready(function(shopcart){
    $(".shopajax").click(function(e){
        e.preventDefault();
        //var form = $(this);
        $.ajax({
        	type	:"POST",
        	url		:"/shop/cartadd",
        	data 	: $(this).parent().serialize(),
        
        	success:function(data){
	        	//if (data.notloggedin){
	        	//	alert(data.notloggedin);
	        	//}
        		$("#cartresume").html(data.cart_description + data.cart_amount);
        		$(".quantity").val("1");
        		
        	}
        },"json");
    });
});
</script>
<script> // ------------- Colouring Page -----------
$(document).ready(function(colouringcart){
    $(".colouringajax").click(function(e){
        e.preventDefault();
        //var form = $(this);
        $.ajax({
        	type	:"POST",
        	url		:"/shop/cartadd",
        	data 	: $(this).parent().serialize(),
        
        	success:function(data){
	        	//if (data.notloggedin){
	        	//	alert(data.notloggedin);
	        	//}
        		$("#cartresume").html(data.cart_description + data.cart_amount);
        		$(".quantity").val("1");
        		
        	}
        },"json");
    });
});
</script></br> 
