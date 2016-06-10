<!------------ for Proxy email purchases ------------->
<script>
$(document).ready(function(proxy){
	$('.ajaxit').click(function(event){
		event.preventDefault();
		$.ajax({
			type : "POST",
			url: "/icon/ajaxemail",
			data:$('#proxyemail').serialize(),
			success:function(data){
				//alert(data.current_email);
				$("#themailaddress").html(data.current_email);
			}
		});
	});
});
</script></br>
