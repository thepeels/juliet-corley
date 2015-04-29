@extends('admin.layout')

@section('title')
<title>Deliver Commission</title>
@stop
<?
$fish = \Fish::find($id);
/*dd($fish->name);*/
$list = \User::lists('email','email');
$placeholder = [null=>'Select'];
$emails = array_merge($placeholder, $list);
/*dd($emails);*/
?>
@section('content')
    
    <h2>Deliver <em>{{$fish->name}} </em></h2>
    <h3>to:</h3>
    {{Form::open(array('url' => "admin/fish/deliver",'class' => 'form-addfish'))}}
        <fieldset>
            <div class="form-group">
                {{ Form::label('email', 'Select E-mail') }}
                {{ Form::select('email', $emails) }}
            </div>
                {{ Form::hidden('fish-name',$fish->name)}}
            <div class="form-group">
                {{ Form::submit('Load Commission to Purchase table', ['class' => 'btn btn-primary btn-sm']) }}
                <a href="/admin/fish" class="btn btn-default btn-sm">Back</a>
            </div>
        </fieldset>
    {{form::close()}}
    @if(Session::has('delivered'))
        <p>{{Session::get('delivered')}}</p>
    @endif
@stop