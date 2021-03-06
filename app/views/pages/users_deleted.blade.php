@extends('admin.layout')
@section('title')
    <title>{{$title}}</title>
@stop
@section('content')
    <h3>Deleted Users</h3>
    <table class="text-table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>E-Mail</th>
            <th>Author Name</th>
            <th>Admin?</th>
        </tr>

        @foreach ($table_row as $user)

            <tr>
                <td>
                    {{$user->id}}
                </td>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    {{$user->email}}
                </td>
                <td>
                    {{$user->detail->author_name}}
                </td>
                <td>
                    {{$user->superuser*-1}}
                </td>
                @if (Auth::user()->superuser == 2)
                <td>
                    <a href="/user/restore/{{$user->id}}"
                       class="btn btn-default btn-xs"
                       style="margin-bottom:-1px;"
                       title="Restore this deletion">Restore Record
                    </a>
                </td>
                @endif
            </tr>

        @endforeach

    </table>
@stop