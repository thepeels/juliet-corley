<script>
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
        });
    });
});
</script>