@extends('layout')
@section('stylesheets')
{{ HTML::style( asset('css/grid24.css'))}}{{ HTML::style( asset('css/imagetable.css') ) }}
@stop

@section('body-class')
<body class="fish-table">
@stop
@section('title')
<title>Icon Store</title>
@stop
@section('content')


<?php
$genus = Input::get('genus');
$species = Input::get('species');

if(null!=Session::get('cart_instance'))
	{$placeholder = (string)Session::get('cart_instance');}
else 
	{$placeholder = "enter e-mail";}
	


?>
<?php
$table_row_index = 1;

?>

<div class="container-24">
<div class="shading-container">
    <div class="grid-24">
         
            <div class="grid-3 push-3 logo">
                <p>&nbsp;</p>
            </div>
            <div class="push-4 grid-8 fish-icons segoe blue">
                <h2>Fish Ico<span class="letter-space">ns</span></h2>
                <h3>&nbsp;&nbsp;&nbsp;for graphs and data</h3>
            </div>
            <div class=" push-5 grid-11 ">
                <div class="cart">
                    <h5> Cart Summary: <span id="cartresume">{{cartResume()}} </span></h5>
                   
                   <h3><a href="/icon/makecart"
                            class="btn btn-primary btn-xs" id="the-mail-address">View Cart / Checkout
                        </a>
                            &nbsp;&nbsp;
                        <a href="/icon/ajaxdumpcart" 
                            class="byajax btn btn-info btn-xs">Empty Cart
                        </a>
                    </h3>
                </div>
            </div>

            <div class="push-4 grid-15 second-row">
                <div class="grid-7">
                    @include('includes.alphabetical')
                </div>
                <div class="grid-6   segoe note blue">
                    <p>This database is a work-in-progress and is still very small. 
                        If species you want are not shown here, please 
                        <a id="email" href="Commission%20species%20enquiry"
   					onclick='subjectMailer(this);'>e-mail me</a> to commission them.
                    </p>
                </div>
            </div>
    </div>
    
    <div class="push-7 grid-17 third">
            
        <h5><a href="../download" class= "btn btn-default btn-xs show-all">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Show all species&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Click on fish images to select your download.
            <em>(Click on fish name to preview full size image)</em>
        </h5>
    </div>

    <div class="grid-24">
        
        <div class="push-3 grid-3 side-menu bt-group-sm">
            @include('includes.side_menu')    
        </div>
            
        <div class="grid-14 push-2 captions">
                <table class="separated captions" style = "padding:0px">
                    <tr>
                        <th></th>
                        <th>3cm ${{ $prices->second_price/100 }}</th>
                        <th>5cm ${{ $prices->first_price/100 }}</th>
                        
                        <th>Silhouette ${{ $prices->third_price/100 }}</th>
                        <th>Outline ${{ $prices->fourth_price/100 }}</th>
                    </tr>
                </table>
        </div>
        
        <div id="data" class="push-4 grid-14 main-table scrolling" style="transform:translateX(-30px)">
            
            <div class="inner-shadow">
                
                <table class="separated data row">
                @foreach ($fishs as $fish)
                    
                    <tr id="{{$table_row_index}}">
                        <td id="{{ $fish->name[0] }}"><a href="/icon/preview{{ $fish->large_image_watermarked->image_url }}/{{ $fish->name }}/{{$table_row_index}}" 
                        	class="btn btn-default btn-lg" title="Click to Preview">{{ $fish->name }}    
                            </a></td>
                        <td>
                            <a class="byajax" href="/icon/addtocart/{{ $fish->small_image_id }}/{{$fish->name }}/{{ $prices->second_price }}/{{$table_row_index }}">
                                <img src="{{ $fish->image_thumb->image_url }}" class="cell">
                            </a>
                        </td>
                        <td>
                            <a class="byajax" href="/icon/addtocart/{{ $fish->small_image_flipped_id }}/{{ $fish->name }}/{{ $prices->second_price }}/{{$table_row_index }}">
                                <img src="{{ $fish->image_thumb_flipped->image_url }}" class="cell">
                            </a>
                        </td>
                        <td>
                            <a class="byajax" href="/icon/addtocart/{{ $fish->large_image_id }}/{{ $fish->name }}/{{ $prices->first_price }}/{{$table_row_index }}">
                                <img src="{{ $fish->image_thumb->image_url }}" class="cell">
                            </a>
                        </td>
                        <td>
                            <a class="byajax" href="/icon/addtocart/{{ $fish->large_image_flipped_id }}/{{ $fish->name }}/{{ $prices->first_price }}/{{$table_row_index }}">
                                <img src="{{ $fish->image_thumb_flipped->image_url }}" class="cell">
                            </a>
                        </td>
                        
                        <td>
                            <a class="byajax" href="/icon/addtocart/{{ $fish->silhouette_image_id }}/{{ $fish->name }}/{{ $prices->third_price }}/{{$table_row_index }}">
                                <img src="{{ $fish->silhouette_thumb->image_url }}" class="cell">
                            </a>
                        </td>
                        <td>
                            <a class="byajax" href="/icon/addtocart/{{ $fish->outline_image_id }}/{{ $fish->name }}/{{ $prices->fourth_price }}/{{$table_row_index }}">
                                <img src="{{ $fish->outline_thumb->image_url }}" class="cell">
                            </a>
                        </td>
                       	
                    </tr>
                    <?php $table_row_index ++;?>
                @endforeach 
               
                </table>
            </div>    
        </div>
    </div>
</div> {{--container-24 end--}}
</div> {{--shading-container--}}
@stop
@section('footer')

@stop
