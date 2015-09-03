@extends('layout')
@section('stylesheets')
{{ HTML::style( asset('css/grid24.css'))}}
{{ HTML::style( asset('css/info.css') ) }}
@stop

@section('body-class')
<body class="fish-table">
@stop
@section('title')
<title>Commissions</title>
@stop
@section('content')


<div class="shading-container">
<div class="container-24">
  <div class = "left-edge"></div>
  <div class = "right-edge"></div>
    <div class="grid-24">
    	<div class="grid-3 push-4 alpha"> <!------------------------ first column ----------------------->
	    	<div class="grid-3  logo">
	                <p>&nbsp;</p>
	        </div>
	        <div class="grid-3  side-menu bt-group-sm">
	            @include('includes.side_menu')  
	        </div>
        </div>
        <div class="grid-6 push-5 links"> <!-------------------------centre column ---------------------->
        	<div class="grid-6 fish-icons segoe blue">
            <h3>&nbsp;</h3>
        	</div>
        	   	<p class="intro">   
        		These icons are designed to display well, even at small size,
                for graphical presentation of data. <span>(Try the test samples below).</span>
            	</p>
            <div class="grid-6 alpha samples">
	            <div class="grid-3 test-fish one">
		            <a href="/download/freedownload/free-icon3cm.jpg"
		            	onclick="this.addEventListener('click', doubleClickStopper, false);">
		            	<img src="/images/bg-images/test-fish.jpg" />
		            </a>
		            <div class="grid-3 alpha">
		                <p>
		                    3cm free test sample
		                </p>
		            </div>
		        </div>
		        <div class="grid-2 test-fish two">
		            <a href="/download/freedownload/free-icon5cm.jpg"
		            	onclick="this.addEventListener('click', doubleClickStopper, false);">
		            	<img src="/images/bg-images/test-fish.jpg" />
		        	</a>
		            <div class="grid-3">
		                <p>
		                    5cm free test sample
		                </p>
		            </div>
		        </div>
		        <div class="grid-6">
		            <p class="intro note">
		            	Click on the images above to download free test samples. </br> 
		            	<span>The 3cm icon should be sufficient for most figures and
		            		visual representations of data, diagrams, graphs etc.</span>
		            </p>
		        </div> 
	        </div>
	        <div class="grid-6 ">
		        <div class="grid-6 alpha">
		        	<p class ="how-works grow">
			        	How this site works: Purchased icons are intended for multiple
			        	use by the purchaser, in scientific publications. <a href="#">(more).</a>
			        	The Downloadable Icon Database on the right contains a small stock
			        	of existing images. &nbsp;These can be downloaded for a one-off licence fee, 
	        		<img src="/images/bg-images/image-of-pdf.jpg" class=" grow"/>
			        	while all other species can be commissioned directly by contacting me 
			        	for a quote. <a href="#">(See details).</a>
		       		</p>
		        </div> 
	        </div>
	        <div class="grid-4 alpha" style="margin-top:-80px">
        	<p class="contact">
                Please {{HTML::mailto('juliet@julietcorley.com?Subject=Commission%20species%20enquiry',' 
                contact me')}} to commission new species. <span>Please note that completed
                commissions will be added to this Downloadable Icon database
                as well as emailed directly to you.</span>
            </p>
	        </div>  	
            <div class="grid-6 margin-left alpha">
            	<p class="contact double-box">
            		Commission Service:&nbsp;<span>if you e-mail me a list of the species you want,
            		I will check the database for existing images, and send you a quote 
            		for the remainder.</span>
            	</p>
            </div> 
        </div>
        <div class="grid-6 push-5 omega">  <!---------------- RH column ------------------------------------>
	        <div class="grid-1 grey-icon1 grey-icon">
	            <img src="/images/bg-images/grey-icon.jpg" width="100px"/>
	        </div>
	        <div class="grid-1 push-1 grey-icon2 grey-icon">
	            <img src="/images/bg-images/grey-icon.jpg" width="77px"/>
	        </div>
	        <div class="grid-1 push-2 grey-icon3 grey-icon">
	            <img src="/images/bg-images/grey-icon.jpg" width="54px"/>
	        </div>
	        <div class="grid-1 push-3 grey-icon4 grey-icon">
	            <img src="/images/bg-images/grey-icon.jpg" width="34px"/>
	        </div>
	        <div class="grid-6 second-box ">
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
	        <div class="grid-6 top-box">
	            <h5>DOWNLOADABLE ICONS</h5>
	            <h6>The icons below are available for download, 
	                for a fee of up to $18 each. <a href="#">(see details)</a></h6>
	        </div>
	        <div class="grid-3 third-box">
	        	<h4>View All <span>→</span></h4>
	    	</div>
	        <div class="grid-5 push-2 third-box">
	            <a href="/download"><img src="/images/bg-images/view-all.jpg" width="160px" Height="125px" /></a>
	        </div>
	        <div class="grid-6 search-area">
	            <h4>&nbsp;Or search by Latin Name</h4>
	            <h4 class="search-strip">@include('includes.alphabetical_remote')</h4>
	            <h4>Or by Typing:</h4>
	            {{Form::open(array('url' => "/icon/seek",'class' => 'form-addfish', 'method' => 'GET'))}}
			        <fieldset>
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
        </div>
        
	</div>
</div>{{--container-24 end--}}
</div>{{--shading-container end--}}
@stop  