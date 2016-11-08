@extends('admin.layout')
@section('title')
<title>{{$title}}</title>
@stop
<?
$list = \User::lists('email','email');
$list_oauth_email = \User::lists('oauth_email','oauth_email');
$emails = [null => 'Select'] + $list;
$oauth_emails = [null => 'Select'] + $list_oauth_email;
?>
@section('content')
    
<h2 >List Purchases for User</h2></br>
{{Form::open(array('url' => '/user/userpurchases','class'=>'form-signup'))}}
{{--<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error}}</li>
    @endforeach
</ul>--}}
    
        <div class="form-group">
    		{{ Form::label('email', 'Select E-mail') }}
            {{ Form::select('email', $emails) }}
			<p>or if not present try</p>
			{{ Form::label('oauth_email', 'Select OAuth_E-mail') }}
			{{ Form::select('oauth_email', $oauth_emails) }}
    	</div>
    	<div class="form-group">
    		{{Form::submit('Show purchases',['class'=>'btn btn-sm btn-primary'])}}
    	</div>
	{{form::close()}}
            @if(Session::has('notselected'))
        		<p>{{Session::get('notselected')}}</p>
    		@endif
@stop