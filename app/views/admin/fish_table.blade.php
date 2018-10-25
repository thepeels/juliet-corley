@extends('admin.layout')

@section('title')
<title>Fish Table</title>
@stop
<?php
$table_row_index = 1;
?>
@section('attached-nav')
    <p class="attached-nav">
        <a href="/admin/fish/add" class="btn btn-primary">Add Fish</a>
        
        @include('../includes.alphabetical')
    </p>
@stop
@section('content')
    <div class="scrollable-container">
        <div class="scrolling-area">
        
    <table class="table table-striped table-hover table-bordered table-fish">
        <thead>
            <tr>
                <th><div class="names">Fish Names</div></th>

                <th><div class="main-icons">Main Icons&nbsp;&nbsp;&nbsp;${{ $prices->first_price/100 }} / ${{ $prices->second_price/100 }}</div></th>
                <th><div class="silhouettes">Silhouettes&nbsp;&nbsp;&nbsp;${{ $prices->third_price/100 }}</div></th>
                <th><div class="outlines">Outlines&nbsp;&nbsp;&nbsp;${{ $prices->fourth_price/100 }}</div></th>
                <th><div class="actions">Actions</div></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($fishs as $fish)
            <tr id="{{$table_row_index}}">
                <td id="{{ $fish->name[0] }}"><div class="names">{{ $fish->name }}</div></td>

                <td><div class="main-icons"><img src="{{ $fish->image_thumb->image_url }}"></div></td>
                <td><div class="silhouettes"><img src="{{ $fish->silhouette_thumb->image_url }}"></div></td>
                <td><div class="outlines"><img src="{{ $fish->outline_thumb->image_url }}"></div></td>
                <td><div class="actions">
                    <ul style="list-style-type: none">
                        <li style="float:left;margin-right:5px">
                            <a href="/admin/fish/preview{{ $fish->large_image_watermarked->image_url }} / {{ $fish->name }}/{{$table_row_index}}"
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
                    </div></td>
            </tr>
            <?php $table_row_index ++;?>
        @endforeach
        </tbody>
    </table>
        </div>
    </div>

@stop