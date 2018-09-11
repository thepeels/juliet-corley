@extends('layout')
{{ HTML::style( asset('css/grid16.css'))}}
{{ HTML::style( asset('css/imagetable.css') ) }}
@section('body-class')
<body class="fish-table">
@stop
@section('content')
<div class="container-16">
    <div class="grid-16">
         
            <div class="grid-4 ">
                <h1>Juliet Corley Art</h1>
            </div>
            <div class=" push-6 grid-5 ">
                <div class="cart">
                    <h5> Cart Summary: {{Carthelper::cartResume()}} </h5>
                    <h3><a href="/icon/makecart" class="btn btn-primary btn-xs">View Cart / Checkout</a>&nbsp;&nbsp;
                        <a href="/icon/dumpcart" class= "btn btn-info btn-xs">Empty Cart</a></h3>
                </div>
            </div>
    </div>
    <div class="push-2 grid-14">
        @include('includes.alphabetical')
    </div>
    <div class="push-3 grid-7" >
        <h3>Click on images to select your download:</h3>
    </div>

    <div class="grid-16">
    
    

        <div class="grid-3 side-menu">
            @include('includes.side_menu')    
        </div>
       
             
            
        <div class="grid-11  captions">
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
        <div class="grid-11 main-table scrolling">
                <table class="separated data" style = "padding:0px">
                @foreach ($arts as $art)
                    <tr id="{{$art->name[0]}}" style= "border:1px solid #777">
                        <td>{{ $art->name }}</td>
                        <td>${{ $art->price_dollars }}</td>
                        <td>
                            {{--<a href="/icon/addtocart/'.$key->id.'">--}}
                            <a href="/icon/addtocart/{{ $art->full_size_image_id }} / {{ $art->name }}">
                                <img src="{{ $art->thumbnail->image_url }}"style="overflow:hidden"class="grow">
                            </a>
                        </td>
                    </tr>
                @endforeach 
                </table>
        </div>
        <div class="grid-16">
            <div class=" grid-5 push-6 footer">
                <h4>
                    @include('includes.footer')
                </h4>    
            </div>    
        </div>
    </div>
</div> {{--container-16 end--}}
@stop