@extends('admin.layout')
@section('title')
<title>User Notes</title>
@stop

@section('content')
    
<h2 >List Notes for User</h2><br>
{{Form::open(array('url' => '/user/usernotes','class'=>'form-signup'))}}
{{--<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error}}</li>
    @endforeach
</ul>--}}
    
        <div class="form-group">
    		{{ Form::label('email', 'Select E-mail') }}
            {{ Form::select('email', $emails) }}<br>
            <p>or if not present try</p>
    		{{ Form::label('oauth_email', 'Select OAuth_E-mail') }}
            {{ Form::select('oauth_email', $oauth_emails) }}
            
    	</div>
    	<div class="form-group">
    		{{Form::submit('Show Notes',['class'=>'btn btn-sm btn-primary'])}}
    	</div>
	{{Form::close()}}
            @if(Session::has('notselected'))
        		<p>{{Session::get('notselected')}}</p>
    		@endif
@stop