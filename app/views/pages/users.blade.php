@extends('admin.layout')
@section('title')
<title>User List</title>
@stop
@section('content')
    
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
				<td>
					<a href="/user/delete/{{$user->id}}"
					   class="btn btn-default btn-xs"
					   style="margin-bottom:-1px;"
					   title="Delete this user">Delete User
					</a>
				</td>
    		</tr>
    	
    	@endforeach

  	</table>
@stop
{{--
@section('footer') 	
<h3>@include('includes.footer')</h3>
    <p><a href="user/addusers">Add a User</a></p>
    <p><a href="/icon/icons">Go to Icons</a></p>
@stop
    --}}
