@extends('layout')
@section('stylesheets')<link href='/css/cart.css' rel='stylesheet' type='text/css'>@endsection
@section('content')
<?$url = Request::url();
$return_url=urlencode($url);
Session::put('return_url',$url);//where to go back to from cart view
Session::put('cart_instance','shop');//carried into cartstriper
Session::put('dest_email',isset($dest_email)?$dest_email:Session::get('dest_email'));
$owner = (isset(Auth::user()->email)?Auth::user()->email:"guest user");//for title of cart
?>
<div class="cart">
    <h2 class="julie merri">JulietCorley.com</h2>
    <!--<h2 class= "caption h3">Cart for {{Session::get('dest_email')}}</h2>-->
    <h2 class= "caption h3 merri">Cart for {{$owner}}</h2>
        
    <h3><a href="/icon/dumpshopcart" class="btn btn-custom-danger btn-sm">Empty Cart</a></h3>
    
        <table class="cart">
            <tr>
                <th>Image</th>
                <th>Price</th>
                <th>No.</th>
                <th></th><!-- empty <td> required for border in webkit browsers-->
            </tr>
        
            {{shopCartTabulate()}}   
        
            <tr>
                {{shopCartSummary()}}
                <td></td>
            </tr>
        </table>
    
        {{shopShowPayButton(Session::get('dest_email'))}}
    
    <h3><a href="{{ $back }}"class="btn btn-info">Continue Shopping</a></h3>
</div>
@endsection