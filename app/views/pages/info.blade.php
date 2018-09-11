@extends('layout')
@section('stylesheets')
{{ HTML::style( asset('css/cart.css')) }}
@stop
@section('body-class')
<body class="info" style="overflow-x:hidden;">
@stop
@section('title')
<title>Info</title>
@stop

@section('content')
		<div class="fixed-menu merri">
			<h3 class="julie">JulietCorley.com</h3>
			<h5 class="julie">INFORMATION and</br> GENERAL T&Cs</h5>
			@if(strpos($previous, '/terms')===FALSE && strpos($previous,'/about')===FALSE)
				<a href="{{$previous}}/"class="btn btn-primary "><<&nbsp;&nbsp;&nbsp;Back&nbsp; </a>
			@endif
			<h5 class="julie">Quick Links</h5>			
			<ul style ="padding-left:0px">
				<li>&nbsp;</li>
				<li><a href="#01">Contact</a></li>
				<li><a href="#02">About STRIPE</a></li>
				<!--<li>&nbsp;</li>-->
				<li><a href="#03">Commissions</a></li>
				<!--<li><a href="#04">Commissioning Fish Icons</a></li>-->
				<li>&nbsp;</li>
				<li><a href="#05">Fish Icons</a></li>
				<li><a href="#06">Downloading and Registration</a></li>
				<li><a href="#07">Author Name - definition</a></li>
				<li><a href="#08">Overview T&C - Your Account</a></li>
				<li>&nbsp;</li>
				<li><a href="#09">Data Collection</a></li>
				<li><a href="#10">Colouring Pages - Downloading</a></li>
				<li><a href="#11">Your Account</a></li>
				<li>&nbsp;</li>
				<li><a href="#12">Copyright and Sharing</a></li>
				<li><a href="#13">Royalty Agreements</a></li>
				<li><a href="#14">About Me</a></li>
				<!--<li>&nbsp;</li>-->
				<li>see also</li> 
				<li><a href="about">Cookie and Privacy Policies</a></li>
				<li><a href="terms">Website Terms & Conditions</a></li>
				<li>---------------</li>
				<li><a href="/">HOME PAGE</a></li>
				<li><a href="commissions/">Fish Icons</a></li>
				<li><a href="colouring">Colouring Pages</a></li>
			</ul>
		</div>

		<div id="01" class="info-main-section merri">
			<h2 class="julie merri info-title">JulietCorley.com</h2></br>
			<div id="terms">
			<h4 class="julie">WEBSITE INFORMATION and GENERAL TERMS AND CONDITIONS</h4>
			</div>
		
		
		
			<div></br>
				<h5>CONTACT </h5>
				<p>Contact me by emailing me at 
					<a id="email"href="click:the.address.will.be.decrypted.by.javascript" title="click to Email"
   					onclick='openMailer(this);'><img src="/images/sales-link.jpg" height="20px"/></a></p>
			</div>
			<div id ="02"></br> 
				<h5>REFUNDS AND STRIPE</h5>
				<p>If you have any issues at all with any of my downloads or products, 
					please let me know as soon as possible 
					<a id="email"href="click:the.address.will.be.decrypted.by.javascript" title="click to Email"
   					onclick='openMailer(this);'><img src="/images/sales-link.jpg" height="20px"/></a></p>
				<p>We use Stripe, as an alternative to Paypal (having had too many 
					issues with Paypal in the past). As far as I understand from doing 
					test runs, when you make a purchase Stripe will hang on to your 
					purchased amount for a few days, and during those few days I can 
					very easily refund you directly, simply by going into my Stripe 
					account and pressing a refund button.</p> 
				<p>After those few days I can still refund you but it becomes much more 
					complicated. So if you have any issues with any downloads or purchases, 
					please do contact me, and the sooner the better!</p>
				<p>However please note that I don’t give refunds on successful downloads 
					(for example if you change your mind. There simply isn’t any way to do 
					this that is fair to me as well as you). Once you have downloaded 
					something, you have possession of it and it can’t be returned, so 
					please choose downloads carefully!</p> 
			</div>
			<div id="03"></br>
				<h5>COMMISSIONING AN ILLUSTRATION OR NEW FISH ICON</h5>
				<p>To commission an illustration, or ask me about the feasibility of a 
					prospective illustration, please email me at <a id="email"href="click:the.address.will.be.decrypted.by.javascript" title="click to Email"
   					onclick='openMailer(this);'><img src="/images/sales-link.jpg" height="20px"/></a>				<p>I will email back to discuss it, and if you think you still want to go 
					ahead, I will send you a quote or an estimate.</p> 
				<p>I am very happy to discuss ideas with no expectation that you will proceed with them!</p>
			</div>
			<div id="04"></br>
				<h5>COMMISSIONING FISH ICONS</h5>
				<p>Commissioned Fish Icons usually cost AUD$25 each, with the following stipulations:</p>
				<ol>
					<li>
						Completed commissions may be added into the database (or used by me in any other way).  
					</li>	
					<li>
						You must be able to email me reference photos that clearly show the colouration and 
						life-stage you prefer. This is to avoid any confusion or wasted time, since many 
						species vary between regions, or change as they mature, and individuals can often 
						also change colour/pattern, etc. 
					</li>
				</ol>
				<p>If you are not able to provide photographs for a particular species, it will cost
					 more (as I will need to hunt down and verify potential reference photos with 
					 you), and the final picture may not have the colouration you expect!</p> 
				<p> Links to photographs are sometimes acceptable, however please note that sending
					 me links or Google searches leading to a variety of different life-phases 
					 of a species is not generally an adequate substitute for a selection of 
					 deliberately chosen pictures, as it doesn’t tell me which one you want! 
					 It also tends to add extra hours to my time, which then makes the illustrations 
					 much less cheap.</p>
				<p> If you have any questions, or to commission Fish Icon images, please email me 
					at: <a id="email"href="click:the.address.will.be.decrypted.by.javascript" title="click to Email"
   					onclick='openMailer(this);'><img src="/images/sales-link.jpg" height="20px"/></a></p>
			</div>
			<div id ="05"></br>
				<h4 class ="julie">FISH ICONS</h4>
				<h5>PURPOSE of the FISH ICONS, and an OUTLINE of their CONDITIONS OF USE</h5>
				<p>The Fish Icons have been designed specifically to be used to help present 
					data from research, so they are explicitly intended to be available for scientific 
					publications and for republishing. This makes their conditions of use a bit 
					convoluted, but an outline of the conditions is as follows:</p> 
				<p>The purchase of a Fish Icon entitles you to use it for any not-for-profit purpose,
					 as many times as you wish. These images are intended for fish researchers, and so, 
					 specifically, your purchased Fish Icon images may be used in any not-for-profit 
					 publication or scientific paper in which you are named as an author. This includes 
					 where you are joint author or one of multiple authors.</p> 
				<p>Your paper containing the images (or a significant extract of your paper) 
					may then be published commercially within any scientific journal, including 
					online journals. For example, JEMBE, Journal of Fish Biology, Marine Biology, 
					Fishery Bulletin, Fisheries Research, PLoS, Ecology, Nature, New Scientist, etc.</p>
				<p>However the Fish Icon images are not intended to also be available for any 
					commercial publisher or author to reproduce in whatever manner or venture they 
					like, so please also note the following specific limitations:</p>
					<ul>
						<li>
							In order to be licensed to use a Fish Icon you must be an individual person.
						</li>
						<li>
							 No licence to use a Fish Icon image may be granted to any corporation or 
							 group of people. 
						</li>
						<li>
							You may not use the Fish Icon images for your own direct financial gain.
						</li>
					</ul> 

				<p>Since this is a website I need to keep the conditions of use fairly limited, 
					as above. If you do want to use the images in any way other than as part of a 
					research paper, please contact me to discuss!</p>
			</div>
			<div id="06"></br> 
				<h5>DOWNLOADING AND REGISTRATION</h5>
				<p>For copyright reasons I need you to be logged in to download Fish Icon images, 
					so that I have a clear record of your rights to use each image.</p> 
				<p>I realise this is an inconvenience, so I have kept registration to an absolute 
					minimum, and all you need to supply is an email and password. As you can see, 
					no other contact or personal details are required (you can add these to your 
					My Account page later if you wish).</p>
				<p>However this site was set up in response to a need for authors to have access 
					to purpose-built images that would not potentially entangle them in murky 
					copyright issues. So in order to clearly state your right to use the images, 
					I would recommend that you add an “Author Name” to your account – this should 
					be the name you usually publish under (<a href="#07">more</a>). This helps to 
					circumvent any disputes over whether or not someone is licensed to use an image, 
					as it can just be matched to the authorship of the publication in question 
					without any need to contact you.  If you publish under different names, you 
					are welcome to make a note of this in the 'Notes' section of the 'My Details' 
					page.</p>
				<p>Please note that the purpose of my Fish Icon images is to give you a 
					peace-of-mind solution, so I don’t intend to trawl the publications looking 
					for semi-imagined breaches of copyright! However I am a one-person outfit 
					with a very small and specialised clientele, so please help me keep going 
					by doing the right thing and not sharing your purchased download with people
					who are not legally entitled to use it.</p>
			</div>
			<div id="07"></br> 
				<h5>AUTHOR NAME</h5>
				<p>Author Name is your name as most published under, or that most readily 
					identifies you in a publication. For example if you have changed your name 
					but still publish under your birth name, then put your birth name here. If 
					it is more complicated than that, you are welcome to list all names in your 
					"My Account". I only need your name so that I can see that your publications 
					aren't copyright infringements.</p> 
			</div>
			<div id="08"></br>
				<h5>OVERVIEW T&C STATEMENT, WITHIN YOUR ACCOUNT</h5>
				<p>To allow you to conveniently review the general terms of use, once you have 
					downloaded an image, your account will contain a statement along the 
					following lines:</p>	
				<p>…(Your Author Name)… is entitled to use the Fish Icon images listed below, 
					with the following stipulations:</p>  
				<ul>
					<li>
						You must be an individual person. (This licence may not be granted to 
						any corporation or group of persons).
					</li>
					<li>You may not use the listed images for your own financial gain. If you 
						want to use the images in any way other than as part of a research paper, 
						please contact me.
					</li>
					<li>You may use the listed images for any not-for-profit purpose, as many 
						times as you wish. These images are intended for fish researchers, and 
						so, specifically, the listed images may be used in any not-for-profit 
						publication or scientific paper in which you are named as an author. 
						This includes where you are joint author or one of multiple authors.
					</li> 
					<li>Your paper containing the images (or a significant extract of your paper) 
						may then be published commercially within any scientific journal, 
						including online journals, such as JEMBE, Journal of Fish Biology, Marine 
						Biology, Fishery Bulletin, Fisheries Research, PLoS, Ecology, Nature, New 
						Scientist, etc.
					</li>
				</ul>
				<p>(This above applies to Fish Icon images only. All images remain copyright 
					&copy; of Juliet Corley)."</p>
			</div>
			<div id="09"></br> 
				<h5>DATA COLLECTION</h5>
				<p>I collect minimal data from you, to keep a record of who has the rights to 
					use which images. The purpose of this is in your interests and is twofold:</p>
				<ul>
					<li>Firstly, if you accidentally delete an image you can simply download 
						it again, without further cost, from your account.
					</li>
					<li>Secondly, if it is brought to my attention that an image may be being 
						used illegally, I will be able to check my records and ascertain that 
						you have unquestionably paid for and have the licence to use any 
						Fish Icon images that you downloaded.
					</li>
				</ul> 
				<p>For the purposes of linking you to each image you have the rightful use of,
					 you may wish to also add your “Author Name” to your account. I will also
					 collect details of each image you have downloaded, and the date purchased. 
					 If you wish to disclose other information that will strengthen the link, 
					 you may voluntarily do so, and I will keep a record of this information 
					 as well (for example if you have a common name that could be confused with 
					 others, you might want to send me other verifying information that singles 
					 you out, such as the organisation you work for, or your specific 
					 field of study). </p>
				<p>
					Although you must provide your email in order to download images, I will 
					not use it to send you unsolicited marketing emails or other nuisance 
					correspondence. In general I will not use it except to identify you as 
					a rightful user of an image, respond to your enquiries, or to contact 
					you about existing work you have commissioned. In other words I will 
					use your email only for reasonable communication with you, and not 
					as a marketing tool!
				</p>
				<div id ="10"></br>
					<h4 class="julie">COLOURING PAGES</h4>
					<h5>DOWNLOADING.</h5>
  					<p>Unfortunately I need you to be logged in to download colouring PDFs.
  						 Since I hate being forced to register with sites myself, 
  						 I have kept registration to an absolute minimum and you only need 
  						 to provide an email address and a password. The upside of registering 
  						 is that if you delete a colouring PDF, you can just log on and 
  						 download it again, without cost, from your account.</p> 
  				</div>
				<div id="11"></br> 
					<h5>YOUR ACCOUNT</h5>
						<p>Your account will contain standardised information about Fish Icons,
							 for the use of fish researchers. If you haven’t bought any Fish 
							 Icons, please ignore it!</p>
						<p>Your account will also contain a record of all your downloads. 
							If you accidentally delete a colouring PDF, you can just log on and 
							download it again, without cost, from your account.</p>
				</div>
				<div id="12"></br> 
					<h5>COPYRIGHT OF DOWNLOADED PICTURES, AND SHARING OF COLOURED-IN PICTURES.</h5>
						<p>You probably realise this, but everything on my website is utterly and 
							absolutely my copyright! Please be aware that any PDFs that you 
							download are still my copyright, even if you have purchased them. 
							This applies to the Free PDF downloads too. This means that it is 
							illegal to email them to other people, copy them to other people, post 
							them online, share them in any way or use them to make other products.</p> 
						<p>Put simply, if you share the PDFs in any form where they can still be 
							used as a colouring picture, to be coloured in, then this is a breach 
							of copyright. If you use your coloured-in pictures to decorate 
							something that you then put up for sale, I will also regard this as a 
							breach of my copyright, unless you have negotiated a personal written 
							<a href="#13">agreement</a> with me beforehand to be allowed to do so.</p> 
						<p>If you do want to use my pictures in this way, please contact me.</p> 
						<p>With regard to sharing: printing an extra set of pages for a friend 
							to colour with you is not going to upset me, as I do want you to get 
							enjoyment out of my pages! But emailing your PDFs to other people is 
							not ok. I have tried to keep the colouring PDFs inexpensive and give 
							a range of options, including free downloads. So please do the right 
							thing by me.</p>
						<p>Finished, coloured-in pictures, however, that are genuinely a testament 
							to your own time and skill, are a whole different scenario. Once you 
							have coloured them in for your own enjoyment, you are very welcome to 
							post your pictures online to show your work!</p> 
						<p>And if you would like to help me out (which I would be very happy about 
							<span class = "smiley">&#9786;</span> ), please credit me when you post it!</p> 
						<p>I also have a Facebook page where people can post their coloured pictures, 
							and I love to see what people have done with my pictures, so please do 
							use it, or just tag my “Colouring Pages” if you put them on your own 
							page, so that I get to see them! <span class = "smiley">&#9786;</span></p> 
				</div>
				<div id="13"></br> 
					<h5>ROYALTY AGREEMENTS</h5>
					<p>I am very open to royalty agreements, which are perfect for home businesses 
						and speculative products, as you would only pay a percentage on items
						when you actually make sales – you don’t need to pay anything up front.</p> 
				</div>
				<div id="14"></br> 
					<h5>ABOUT ME  </h5>
					<p>I am a marine biologist and illustrator currently living in Australia.</p>
					<p>I've both lived and worked in some beautiful and remote places and consequently 
						I’m interested in the visual communication of science and marine management 
						to people with no scientific background and to non-English speaking communities 
						in developing countries, particularly within the Coral Triangle.</p>  
					<p>My primary interest is in furthering conservation and sustainable management 
						by grass-roots education. Difficult concepts can be made easier with the 
						right visual aids, such as explaining the statistical requirements of research 
						methodology, and the need for reliable data collection.</p>
				</div>
			</div>
		</div> 
@stop