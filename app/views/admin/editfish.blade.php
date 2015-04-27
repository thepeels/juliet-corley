@extends('layoutadmin')

@section('body-class')
<body class="">
@stop

@section('content')

<div class='form-editfish'>
    
<h2>Edit a Fish</h2>

    {{Form::open(array('url' => "admin/edit",'class' => 'form-editfish', 'files' => true))}}
    {{--{{Form::open(array('url' => "fish/validateaddfish",'class' => 'form-control', 'files' => true, 'method' => 'post'))}}--}}
    
Select Species Name
	{{--{{Form::select('selected_fish_id', $fish_options,null,['class' => 'form-control'])}}--}}
	{{Form::select('selected_fish',Fish::lists('name','name'),['class' => 'form-control'])}}
</br>
Enter base price in dollars
	{{Form::input('text', 'base-price',null,['class'=>'form-control width100','placeholder' => '$'])}}
   {{--was baseprice--}}
</br>
Select primary fish image
    {{Form::file('main-image')}}
</br>
Select fish outline image
    {{Form::file('outline-image')}}
</br>
Select fish silhouette image
    {{Form::file('silhouette-image')}}
</br>
	{{form::submit('Submit',['class'=>'btn newclass cf'])}}

{{Form::close()}}
<p>Need to find way to show existing images and also edit table rather than create a new one</p>
<h4>
@include('includes.footer')
</h4>

</div>	
@stop
