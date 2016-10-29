@extends('admin.layout')
@section('title')
<title>Author List</title>
@stop
@section('content')
    
    <table class="text-table">
    	<tr>
    		<th>Author Name</th>
    		<th>Name</th>
    		<th>Notes</th>
    		<th>E-Mail</th>
    		<th>Aliases</th>
    	</tr>
    	
    	@foreach ($users_with_details as $user)
				<tr>
					<td>
						<?=$user->detail->author_name?>
					</td>
					<td>
						<?=$user->name?>
					</td>
					<td>
						<?=$user->detail->note?>
					</td>
					<td>
						<?=$user->email?>
					</td>
					<td>
						<?=$user->detail->alias?>
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
