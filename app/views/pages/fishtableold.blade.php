@extends('layout')
{{ HTML::style( asset('css/imagetable.css') ) }}
@section('body-class')
<body class="fish-table">
@stop
@section('content')
<div class="container-fluid">
<div class="row toprow">
    <div class="col-md-3">
        
        <h1>Juliet Corley Art</h1>
    </div>
    
</div>
<div class="row second-row">
    <div class="col-md-5 col-md-offset-2">
        @include('includes.alphabetical')
    </div>  
    <div class="col-md-4 cart">
    
        <p>
        Cart Summary: {{Carthelper::cartResume()}}
        </p>
        
        <h4><a href="/icon/makecart">View Cart / Checkout</a></h4>
    </div>    
</div>
<div class="row third-row" >
    <div class="col-md-3 col-md-offset-1">
        <h3>Select your download:</h3>
    </div>    
</div>

<div class="row">
    <div class="col-md-2 col-md-offset-1 side-menu">
            
        <ul>
            <li>Home</li>
            <li>Fish icon store</li>
            <li>Fish gallery</li>
            <li>Portfolio</li>
            <li>Services</li>
            <li>Merchandise</li>
            <li>Contact me</li>
            <li>Links</li>
        </ul>
    </div>
   
         
        
    <div class="col-md-8  captions">
            <table class="separated captions" style = "padding:0px">
                <tr>
                    <th style="width:270px"></th>
                    <th>Price</th>
                    <th>5cm Left</th>
                    <th>5cm Right</th>
                    <th>3cm Left</th>
                    <th>3cm Right</th>
                    <th>Silhouette</th>
                    <th>Outline</th>
                </tr>
            </table>
    </div>
    <div class="col-md-8  main-table scrolling">
            <table class="separated data" style = "padding:0px">
            @foreach ($fishs as $fish)
                <tr id="<?=$fish->name[0]?>" style= "border:1px solid #777">
                    <td>{{ $fish->name }}</td>
                    <td>${{ $fish->base_price_dollars }}</td>
                    <td>
                        {{--<a href="/icon/addtocart/'.$key->id.'">--}}
                        <a href="/icon/addtocart/{{ $fish->large_image_id }} / {{ $fish->name }}">
                            <img src="{{ $fish->image_thumb->image_url }}">
                        </a>
                    </td>
                    <td>
                        <a href="/icon/addtocart/{{ $fish->large_image_flipped_id }} / {{ $fish->name }}">
                            <img src="{{ $fish->image_thumb_flipped->image_url }}">
                        </a>
                    </td>
                    <td>
                        <a href="/icon/addtocart/{{ $fish->small_image_id }} / {{ $fish->name }}">
                            <img src="{{ $fish->image_thumb->image_url }}">
                        </a>
                    </td>
                    <td>
                        <a href="/icon/addtocart/{{ $fish->small_image_flipped_id }} / {{ $fish->name }}">
                            <img src="{{ $fish->image_thumb_flipped->image_url }}">
                        </a>
                    </td>
                    <td>
                        <a href="/icon/addtocart/{{ $fish->silhouette_image_id }} / {{ $fish->name }}">
                            <img src="{{ $fish->silhouette_thumb->image_url }}">
                        </a>
                    </td>
                    <td>
                        <a href="/icon/addtocart/{{ $fish->outline_image_id }} / {{ $fish->name }}">
                            <img src="{{ $fish->outline_thumb->image_url }}">
                        </a>
                    </td>
                </tr>
            @endforeach 
            </table>
    </div>
</div>
@include('includes.footer')
</div>
@stop