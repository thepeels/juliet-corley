@extends('admin.layout')

@section('title')
<title>Fish Table</title>
@stop
<?
$prices = getPrice('icons');
foreach ($prices as $price){}
?>
@section('attached-nav')
    <p class="attached-nav">
        <a href="/admin/fish/add" class="btn btn-primary">Add Fish</a>
        
        @include('../includes.alphabetical')
    </p>
@stop
@section('content')
    <div >
        
    <table class="table table-striped table-hover table-bordered ">
        <tr>
            <th>Fish Names</th>
            
            <th>Main Icons&nbsp;&nbsp;&nbsp;${{ $price->first_price/100 }} / ${{ $price->second_price/100 }}</th>
            <th>Silhouettes&nbsp;&nbsp;&nbsp;${{ $price->third_price/100 }}</th>
            <th>Outlines&nbsp;&nbsp;&nbsp;${{ $price->fourth_price/100 }}</th>
            <th>Actions</th>
        </tr>
        
    @foreach ($fishs as $fish)
        <tr id="<?=$fish->name[0]?>">
            <td>{{ $fish->name }}</td>
            
            <td><img src="{{ $fish->image_thumb->image_url }}"></td>
            <td><img src="{{ $fish->silhouette_thumb->image_url }}"></td>
            <td><img src="{{ $fish->outline_thumb->image_url }}"></td>
            <td>
                <ul style="list-style-type: none">
                    <li style="float:left;margin-right:5px">
                        <a href="/icon/preview{{ $fish->large_image_watermarked->image_url }} / {{ $fish->name }}" 
                            class="btn btn-info btn-xs"
                            style="width:55px"
                            title="Preview large image">Preview
                        </a>
                    </li>
                    <li>
                        <a href="/admin/fish/delete/{{ $fish->id }}" 
                            class="btn btn-danger btn-xs"
                            style="width:55px"
                            title="Delete Fish and all associated images">Delete
                        </a>
                    </li>
                    <li>
                        <a href="/admin/fish/deliver/{{ $fish->id }}" 
                            class="btn btn-warning btn-xs"
                            style="margin-top:5px;margin-bottom:-10px"
                            title="Add Fish and all associated images to a Users purchases">Deliver Commission
                        </a>
                    </li>
                </ul>
            </td>
        </tr>
    @endforeach
    </table>
    </div>

@stop