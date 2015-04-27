@extends('layout')
{{ HTML::style( asset('css/grid16.css'))}}
{{ HTML::style( asset('css/services.css') ) }}
@section('body-class')
<body class="fish-table">
    
@stop
@section('content')
<div class="container-16">
    <div class="grid-13 push-2">
        <h1 class="juliet">Juliet Corley</h1>
    </div>
    <div class="grid-9 push-3">
        <h3 class="title">Scientific illustration, Artwork, Technical drawings</h3>
    </div>
    <div class="grid-16">
        <div class="grid-3  side-menu">
            @include('includes.side_menu')    
        </div>
        <div class="grid-4 para">
            <p>
                I am a marine biologist and a scuba diver,
sidelining as a professional illustrator for
scientists. I can be a visual communicator
between your research and the world who
will read it. I specialise in clarifying complex
text with straightforward diagrams.
Even a simple drawing will enhance a graph.
See the fish icon store for an example.
Note that I am not limited to fish! … please
contact me for other designs.
            </p>
        </div>
        <div class="grid-5 push-1 para ">
            <p>
                Illustration styles:
                <ul>
                    <li>Line Drawings</li>
                    <li>Shaded or traditionally stippled</li>
                    <li>Black and white</li>
                    <li>Full colour</li>
                    <li>Taxonomically descriptive icons –<em>
                            designed to retain their distinguishing
                            features when reduced</em></li>
                    <li>Digital</li>
                </ul>
            </p>
        </div>
        <div class="grid-13 ">
            <div class="grid-5">
                    <h1 title="how to style this pop-up?  
- after all I am a marine biologist and a scuba diver,
sidelining as a professional illustrator for
scientists. I can be a visual communicator
between your research and the world who
will read it. I specialise in clarifying complex
text with straightforward diagrams.">Technical drawing</h1>
                
                    <h1>Technical drawing</h1>
                    <p class="boxed">
                I am a marine biologist and a scuba diver,
sidelining as a professional illustrator for
scientists. I can be a visual communicator
between your research and the world who
will read it. I specialise in clarifying complex
text with straightforward diagrams.
Even a simple drawing will enhance a graph.
See the fish icon store for an example.
Note that I am not limited to fish! … please
contact me for other designs.
            </p>
            </div>
            <div class="grid-6 para push-1 boxed">
                <p>
                   Previous projects and commissions:
                </p>
                <ul class="no-style">
                    <li>Field guides</li>
                    <li>Academic texts</li>
                    <li>Key identification icons for CD-ROM</li>
                    <li>Scientific papers</li>
                    <li>Boardwalk sign</li>
                    <li>Snorkel trail</li>
                    <li>Shore walk</li>
                </ul>
                <p class="boxed smaller">
                    I also do non-scientific
                    work on request, eg logos,
                    diagrams, fine art, maps, etc
                </p>
            </div>
        </div>
    </div>
    <div class="grid-16">
        <div class="grid-4 push-4">
            
            
       
       
       <h2>Search for Fish</h2>
    {{Form::open(array('url' => "/icon/seek",'class' => 'form-addfish', 'method' => 'GET'))}}
        <fieldset>
            {{--{{Form::open(array('url' => "fish/validateaddfish",'class' => 'form-addfish', 'files' => true, 'method' => 'post'))}}--}}
            <div class="form-group">
                {{ Form::label('name', 'Search by Genus') }}
                {{ Form::input('text', 'genus', null, ['class' => 'form-control col-6', 'id' => 'name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Search by Species') }}
                {{Form::input('text', 'species', null, ['class' => 'form-control '])}}
            </div>
            
            <div class="form-group">
                {{ Form::submit('Submit', ['class' => 'btn btn-primary btn-sm']) }}
                <a href="/back" class="btn btn-default btn-sm">Back</a>
            </div>
        </fieldset>
    {{form::close()}}

        </div>
    </div>
</div>