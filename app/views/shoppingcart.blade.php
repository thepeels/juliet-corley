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
Session::flash('previous_url',$previous);
if(Auth::check()){
	if  	(Auth::user()->email)		$owner = Auth::user()->email;
	elseif	(Auth::user()->oauth_email)	$owner = Auth::user()->oauth_email;/*isset(Auth::user()->oauth_email)?*/
	}else    							$owner = "guest";?>
<div class="cart">
    
    <h2 class="julie merri">JulietCorley.com</h2>
    <!--<h2 class= "caption h3">Cart for {{Session::get('dest_email')}}</h2>-->
    <h2 class= "caption h3 merri">Cart for {{$owner}}</h2>
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
    {{Form::open(array('url' => '/cardpay','class'=>'form-inline'))}}
    <br>
        {{Form::label('text','Name of Licensee:')}}
        {{Form::input('text','licensee',null,['class'=>'newclass','placeholder'=>'name','size'=>'35'])}}<br>
        {{$errors->first('licensee','<small class="red-error">:message</small>')}}
        </br>
    	@if(Cart::instance('main')->total()!=0)
	        {{'</br>'}}
            {{Form::submit('Pay by Card',['class'=>'btn btn-primary'])}}
    	@endif

    	{{Form::close()}}    <h3><a href="{{$back}}"class="btn btn-info">Continue Shopping</a></h3>
</div>
@endsection