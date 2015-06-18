@extends('layout')
@section('stylesheets')<link href='/css/cart.css' rel='stylesheet' type='text/css'>@endsection
@section('content')
<?$url = Request::url();
$return_url=urlencode($url);
Session::put('return_url',$url);?>
<div class="cart">
    
    <h2 class="julie">JulietCorley.com</h2>
    <h2 class= "caption h3">Your Cart</h2>
        
    <h3><a href="/icon/dumpcart" class="btn btn-custom-danger btn-sm">Empty Cart</a></h3>
    
        <table class="cart">
            <tr>
                <th>Image</th>
                <th>Price</th>
                <th>No.</th>
                <th></th><!-- empty <td> required for border in webkit browsers-->
            </tr>
        
            {{cartTabulate()}}   
        
            <tr>
                {{cartSummary()}}
                <td></td>
            </tr>
        </table>
    
        {{showPayButtonProxy()}}
    
    <h3><a href="{{ $back }}"class="btn btn-info">Continue Shopping</a></h3>
</div>
@endsection
<script>
$(document).ready(function(proxy){
    $(".proxyajax").click(function(e){
        e.preventDefault();
        $.ajax(this.href,{
        	success:function(data){
	        	$("#proxyemail").html(data.proxy);
        	}
        });
    });
});
</script>