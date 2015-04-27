@extends('layout')

@section('stylesheets')
{{ HTML::style( asset('css/grid24.css'))}}
{{ HTML::style( asset('css/imagetable.css') ) }}
@stop

@section('body')

@section('content')

<div class="container-24" style = "background:inherit">
<div class="push-3 grid-21 preview fish-name">
    <h2>{{ $fish_name }}</h2>
</div>    
<div class="push-3 grid-21 preview">
    <img src="/images/{{ $preview_url }}" alt="image preview" />
</div>
<div class="push-4 grid-4">
    <a href="{{ $back }}" class="btn btn-default btn-sm">Close Preview</a>
</div>
</div>    



@stop


@stop