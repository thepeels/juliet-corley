@extends('admin.layout')

@section('content')

    <p>
        <a href="/admin/art/add" class="btn btn-primary">Add Art Image</a>
        @include('../includes.alphabetical')
    </p>
    <div class="scrollable">
        
    <table class="table table-striped table-hover table-bordered ">
        <tr>
            <th>Art Image Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        
    @foreach ($art as $art)
        <tr id="<?=$art->name[0]?>">
            <td>{{ $art->name }}</td>
            <td>{{ $art->price_dollars }}</td>
            <td><img src="{{ $art->thumbnail->image_url }}"></td>
            <td><a href="/admin/art/delete/{{ $art->id }}" 
                    class="btn btn-info btn-xs"
                    title="Delete Artwork and all associated images">Delete
                </a>
            </td>
        </tr>
    @endforeach
    </table>
    </div>

@stop