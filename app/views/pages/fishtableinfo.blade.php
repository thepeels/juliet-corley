@extends('layout')
@section('stylesheets')
{{ HTML::style( asset('css/grid24.css'))}}
{{ HTML::style( asset('css/info.css') ) }}
@stop
@section('title')
<title>Commissions</title>
@stop
@section('body-class')
<body class="fish-table">
@stop
@section('content')




<div class="container-24">
    <div class = "left-edge"></div>
    <div class = "right-edge"></div>
<div class="shading-container">
    <div class="grid-24">
        <div class="grid-3 push-4 logo">
                <p>&nbsp;</p>
        </div>
        <div class="push-5 grid-8 fish-icons segoe blue">
            <h3>&nbsp;</h3>
        </div>
        <div class="grid-1 push-3 grey-icon1 grey-icon">
            <img src="/images/bg-images/grey-icon.jpg" width="100px"/>
        </div>
        <div class="grid-1 push-4 grey-icon2 grey-icon">
            <img src="/images/bg-images/grey-icon.jpg" width="77px"/>
        </div>
        <div class="grid-1 push-5 grey-icon3 grey-icon">
            <img src="/images/bg-images/grey-icon.jpg" width="54px"/>
        </div>
        <div class="grid-1 push-6 grey-icon4 grey-icon">
            <img src="/images/bg-images/grey-icon.jpg" width="34px"/>
        </div>
        
        <div class="grid-16 push-5">
            <div class="grid-6 intro">
                <h4>
                    <p>
                        These icons are designed to display well, even at small size,
                        for graphical presentation of data. <span>(Try the test samples below).</span>
                    </p>
                </h4>
            </div> 
            <div class="grid-6 top-box">
                <h5>DOWNLOADABLE ICONS</h5>
                <h6>The icons below are available for download, 
                    for a fee of $15 or $18 each. <a href="#">(see details)</a></h6>
            </div>
        </div>
    </div>
    <div class="grid-17">
        <div class="grid-3 push-4 side-menu bt-group-sm">
            @include('includes.side_menu')  
        </div> 
        <div class="grid-6 push-5 left-para">
            <p>
                Please <a href="#">contact me</a> to commission new species. Please note that completed
                commissions will be added to this Downloadable Icon database (see right <span>&#8594;</span>),
                as well as emailed directly to you.
            </p>
            <p>
                Commissioned icons cost AUD$25 each, with the following stipulations:
            </p>
            <p>
                1) Completed commissions may be added into my database. (or used by me
                in any other way). 
                <a href="#">See details</a>
            </p>
            <p>
                2) You must be able to to email me reference photos which show the 
                colouration and life-stage you prefer.&nbsp;&nbsp;
                <!--<a href="#" class="hover-to-display">
                    <img src="/images/bg-images/question.png"/>
                </a>-->
                <span class="hover-to-display">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Here are the instructions 
                    mmmmmmmmmmmmm ddddddddddd jj lllllllllll m m jkslfslj
                    hsjdlfsl <a href="/download">here</a>fhdjslhfudl hufdsl yuds guyd fsdd sus
                </span>
            </p>
        </div> 
        <div class="grid-6 push-5 second-box ">
            <p class="segoe blue">
                Since I have a small and very specialised clientele, 
                I don't make a lot from these pictures, so please only use 
                the downloads as legally permitted (ie in your own work - 
                don't distribute your paid-for download for everyone to use!) 
                It would also help me if you would credit me for the icons in 
                your work (Juliet Corley)
            </p>
            <p class="segoe blue">
                Crediting me will help me keep going. </br>So will paying me!&nbsp;&nbsp;<span>&#128522;</span>
            </p>
        </div>
        <div class="grid-2 push-5 test-fish one">
            <a href="/download/freedownload/free-icon3cm.jpg"><img src="/images/bg-images/test-fish.jpg" /></a>
            <div class="grid-3">
                <p>
                    3cm free test sample
                </p>
            </div>
        </div>
        <div class="grid-2 push-6 test-fish two">
            <a href="/download/freedownload/free-icon5cm.jpg"><img src="/images/bg-images/test-fish.jpg" /></a>
            <div class="grid-3">
                <p>
                    5cm free test sample
                </p>
            </div>
        </div>
        <div class="grid-3 push-7 third-box">
            <h4>View All <span>→</span></h4>
        </div>
        <div class="grid-5 push-6 third-box">
            <a href="/download"><img src="/images/bg-images/view-all.jpg" width="160px" Height="125px" /></a>
        </div>
        <div class="grid-3 push-5 fourth">
            <p class = "fourth-box">
                Before commissioning, please look through the downloadable icons,
                as I may have already drawn the species you want.
            </p>
            <p class = "fifth-box">
                To commission a list of species: <a href="#">click here.</a>
                I will email you in response.
            </p>
        </div> 
        <div class="grid-3 push-5 grow">
            <img src="/images/bg-images/image-of-pdf.jpg"/>
        </div>
        <div class="grid-6 push-5 search-area">
            <h4>Or search by Latin Name</h4>
            <h4 class="search-strip">@include('includes.alphabetical_remote')</h4>
            <h4>Or by Typing:</h4>
            {{Form::open(array('url' => "/icon/seek",'class' => 'form-addfish', 'method' => 'GET'))}}
        <fieldset>
            {{--{{Form::open(array('url' => "fish/validateaddfish",'class' => 'form-addfish', 'files' => true, 'method' => 'post'))}}--}}
            
            <div class="grid-3 push-1">
                
            <div class="form-group">
                {{ Form::input('text', 'genus', null, ['placeholder' => 'Genus name', 'class'=>'searchbox']) }}
            </div>
            <div class="form-group">
                {{ Form::input('text', 'species', null, ['placeholder' => 'Species name', 'class'=>'searchbox']) }}
            </div>
            </div>
            <div>
                
                {{ Form::submit('&nbsp;&nbsp;&nbsp;&nbsp;', ['class' => ' input btn btn-default btn-xs magnifier']) }}
            </div>
            
            
        </fieldset>
    {{form::close() }}
        </div> 
        <div class="grid-3 push-5">
        </div>     
    </div>
</div>{{--shading-container end--}}
</div>{{--container-24 end--}}
@stop    