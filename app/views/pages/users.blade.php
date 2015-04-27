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
    		<th>Password</th>
    		<th>Admin?</th>
    	</tr>
    	<? foreach ($table_row as $user) : ?>
    	
    		<tr>
    			<td>
    				<?=$user->id?>
    			</td>
    			<td>
    				<?=$user->name?>
    			</td>
    			<td>
    				<?=$user->email?>
    			</td>
    			<td>
    				<?=$user->password?>
    			</td>
    			<td>
    			    <?=$user->superuser*-1?>
    			</td>
    		</tr>
    	
    	<? endforeach; ?>

  	</table>
@stop
{{--
@section('footer') 	
<h3>@include('includes.footer')</h3>
    <p><a href="user/addusers">Add a User</a></p>
    <p><a href="/icon/icons">Go to Icons</a></p>
@stop
    --}}
