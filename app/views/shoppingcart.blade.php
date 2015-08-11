@extends('layout')
@section('stylesheets')<link href='/css/cart.css' rel='stylesheet' type='text/css'>@endsection
@section('content')
<?$url = Request::url();
$previous = URL::previous();
//dd($url);
$return_url=urlencode($url);
Session::put('return_url',$url);
Session::put('cart_instance','main');
Session::put('dest_email',isset($dest_email)?$dest_email:Session::get('dest_email'));
Session::flash('previous_url',$previous);?>
<div class="cart">
    
    <h2 class="julie merri">JulietCorley.com</h2>
    <!--<h2 class= "caption h3">Cart for {{Session::get('dest_email')}}</h2>-->
    <h2 class= "caption h3 merri">Cart for {{--Auth::user()->email--}}</h2>
        
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
    
        {{showPayButton(Session::get('dest_email'))}}
    
    <h3><a href="{{ Session::get('previous_url') }}"class="btn btn-info">Continue Shopping</a></h3>
</div>
@endsection