@extends('admin.layout')

@section('title')
<title>Pricing</title>
@stop
<?
$prices = getPrice('icons');
foreach ($prices as $price){}
?>
@section('content')
    
    <h2>Set Prices <span> currently active prices shown</span></h2>
    {{Form::open(array('url' => "admin/fish/prices",'class' => 'form-addfish'))}}
        <fieldset>
            <div class="form-group">
                {{ Form::label('name', '5cm Icon Price (dollars)') }}
                {{ Form::input('text', 'first_price', $price->first_price/100, ['class' => 'form-control col-4',
                 'id' => 'name' ,'placeholder'=> 'currently = '.$price->first_price/100]) }}
            </div>
           <div class="form-group">
                {{ Form::label('name', '3cm Icon Price (dollars)') }}
                {{ Form::input('text', 'second_price', $price->second_price/100, ['class' => 'form-control col-4', 
                'id' => 'name' ,'placeholder'=> 'currently = '.$price->second_price/100]) }}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Silhouette Icon Price (dollars)') }}
                {{ Form::input('text', 'third_price', $price->third_price/100, ['class' => 'form-control col-4', 
                'id' => 'name' ,'placeholder'=> 'currently = '.$price->third_price/100]) }}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Outline Icon Price (dollars)') }}
                {{ Form::input('text', 'fourth_price', $price->fourth_price/100, ['class' => 'form-control col-4', 
                'id' => 'name' ,'placeholder'=> 'currently = '.$price->fourth_price/100]) }}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Special Price (dollars)') }}
                {{ Form::input('text', 'fifth_price', $price->special_price/100, ['class' => 'form-control col-4', 
                'id' => 'name' ,'placeholder'=> 'currently = '.$price->special_price/100]) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                <a href="/admin/fish" class="btn btn-default">Back</a>
            </div>
        </fieldset>
    {{form::close()}}

@stop