@extends('layout')
@section('stylesheets')
{{ HTML::style( asset('css/cart.css'))}}
@stop
@section('body-class')
<body class="info" style="overflow-x:hidden;">
@stop
@section('title')
<title>Terms</title>
@stop
<?
$previous = Session::get('previous_url');
?>
@section('content')
<div class="fixed-menu merri">
	<h3 id="01" class="julie">JulietCorley.com</h3>
	<h5 class="julie">TERMS AND CONDITIONS</h5>
	@if(($previous != "https://julietcorley.com/info") && ($previous != "https://julietcorley.com/about"))
			<a href="{{$previous}}/"class="btn btn-primary "><<&nbsp;&nbsp;&nbsp;Back&nbsp; </a>
	@endif
	<h5 class="julie">Quick Links</h5>			
	<ul style ="padding-left:0px">
		<li><a href="#terms">Introduction</a></li>
		<li><a href="#02">Website Licence</a></li>
		<li><a href="#03">Acceptable Use</a></li>
		<li><a href="#04">Restricted Access</a></li>
		<li><a href="#05">User Content</a></li>
		<li>&nbsp;</li>
		<li><a href="#06">No Warranties</a></li>
		<li><a href="#07">Limitations of Liability</a></li>
		<li><a href="#08">Exceptions</a></li>
		<li><a href="#09">More Disclaimers</a></li>
		<li>&nbsp;</li>
		<li><a href="#10">Contact</a></li>
		<li>&nbsp;</li>
		<li>see also</li> 
		<li><a href="about">Cookie and Privacy Policies</a></li>
		<li><a href="info">Information and General T&Cs</a></li>
		<li>---------------</li>
		<li><a href="/">HOME PAGE</a></li>
		<li><a href="commissions/">Fish Icons</a></li>
		<li><a href="colouring">Colouring Pages</a></li>
		
	</ul>
</div>
<div id="terms" class="info-main-section merri">
	<h2 class="julie merri">JulietCorley.com</h2></br>
	<h4 class="julie">WEBSITE TERMS AND CONDITIONS</h4>

	<h5>INTRODUCTION</h5>
	
	These terms and conditions govern your use of this website; 
	by using this website, you accept these terms and conditions in full.</br> 
	If you disagree with these terms and conditions or any part of these 
	terms and conditions, you must not use this website.</br>  
	
	This website uses cookies.  By using this website and agreeing 
	to these terms and conditions, you consent to JulietCorley.com's 
	use of cookies in accordance with the terms of JulietCorley.com's 
	<a href="about#cookies">cookies policy.</a>
<div id="02"></br>	
	<h5>LICENSE TO USE WEBSITE</h5>
	
	<p>Unless otherwise stated, JulietCorley.com and/or its licensors own 
	the intellectual property rights in the website and material on the 
	website.</p>   
	<p>Subject to the license below, all these intellectual property rights 
	are reserved.</p> 
	
	<p>You are specifically prohibited from downloading, printing, copying, 
	or re-transmitting any or all of the website or material from the 
	website without, or in violation of, a written license or 
	agreement with Juliet Corley or JulietCorley.com.</p>
	
	<p>You may view, download for caching purposes only, and print 
	pages from the website for your own personal use upon payment of 
	the appropriate fee (if applicable), subject to the restrictions set 
	out below and elsewhere in these terms and conditions, and furthermore 
	subject to any additional restrictions set out in any written license
	 or agreement with Juliet Corley or JulietCorley.com.</p> 
	<p>
	You must not:
	<ul>
		<li>sell, rent or sub-license material from the website;</li>
		<li>edit or otherwise modify any material on the website; or</li>
		<li>redistribute material from this website,</li>
	</ul>
	</p>
	Unless otherwise stated within a specific written agreement with Juliet Corley 
	or JulietCorley.com, you must not:
	<ul>
	<li>republish material from this website (including republication on another 
		website);</li>
	<li>show any material from the website in public;</li>
	<li>reproduce, duplicate, copy or otherwise exploit material on this website 
		for a commercial purpose;</li>
	</ul>
</div>
<div id="03"></br>	
	<h5>ACCEPTABLE USE</h5>
	
	You must not use this website in any way that causes, or may cause, damage to 
	the website or impairment of the availability or accessibility of the website; 
	or in any way which is unlawful, illegal, fraudulent or harmful, or in 
	connection with any unlawful, illegal, fraudulent or harmful purpose or 
	activity.</br> 
	
	You must not use this website to copy, store, host, transmit, send, 
	use, publish or distribute any material which consists of (or is linked 
	to) any spyware, computer virus, Trojan horse, worm, keystroke logger, 
	rootkit or other malicious computer software.</br> 
	
	You must not conduct any systematic or automated data collection 
	activities (including without limitation scraping, data mining, data 
	extraction and data harvesting) on or in relation to this website 
	without JulietCorley.com’s express written consent.</br> 
	
	You must not use this website to transmit or send unsolicited 
	commercial communications.</br> 
	
	You must not use this website for any purposes related to marketing 
	without JulietCorley.com’s express written consent.
</div>
<div id="04"></br>	
	<h5>RESTRICTED ACCESS</h5>
	
	<p>Access to certain areas of this website is restricted.  JulietCorley.com 
	reserves the right to restrict access to other areas of this website, 
	or indeed this entire website, at JulietCorley.com’s discretion.</br> 
	
	If JulietCorley.com provides you with a user ID and password to enable 
	you to access restricted areas of this website or other content or 
	services, you must ensure that the user ID and password are kept confidential.</br>   
	
	JulietCorley.com may disable your user ID and password in 
	JulietCorley.com’s sole discretion without notice or explanation.</p> 
</div>
<div id="05"></br>	
	<h5>USER CONTENT</h5>
	
	<p>In these terms and conditions, “your user content” means material 
	(including without limitation text, images, audio material, video 
	material and audio-visual material) that you submit to this website, 
	for whatever purpose.</br> 
	
	You grant to JulietCorley.com a worldwide, irrevocable, non-exclusive, 
	royalty-free license to use, reproduce, adapt, publish, translate and 
	distribute your user content in any existing or future media.</br> 
	You also grant to JulietCorley.com the right to sub-license these 
	rights, and the right to bring an action for infringement of these rights.</br> 
	
	Your user content must not be illegal or unlawful, must not infringe 
	any third party's legal rights, and must not be capable of giving 
	rise to legal action whether against you or JulietCorley.com or a 
	third party (in each case under any applicable law).</br>   
	
	You must not submit any user content to the website that is or has ever 
	been the subject of any threatened or actual legal proceedings or other 
	similar complaint.</br>  
	
	JulietCorley.com reserves the right to edit or remove any material 
	submitted to this website, or stored on JulietCorley.com’s servers, 
	or hosted or published upon this website.</br> 
	
	Notwithstanding JulietCorley.com’s rights under these terms and 
	conditions in relation to user content, JulietCorley.com does not 
	undertake to monitor the submission of such content to, or the 
	publication of such content on, this website.</p>
</div>
<div id="06"></br>	
	<h5>NO WARRANTIES</h5>
	
	<p>This website is provided “as is” without any representations or 
	warranties, express or implied.  JulietCorley.com makes no representations 
	or warranties in relation to this website or the information and materials 
	provided on this website. </br>  
	
	Without prejudice to the generality of the foregoing paragraph, 
	JulietCorley.com does not warrant that:
	<ul>
	<li>this website will be constantly available, or available at all; or</li>
	<li>the information on this website is complete, true, accurate or 
		non-misleading; or</li>
	<li>this website or it’s materials will suit your intended purposes.</li>
	</ul>
	
	Nothing on this website constitutes, or is meant to constitute, advice 
	of any kind.  If you require advice in relation to any matter you should 
	consult an appropriate professional.</p>
</div>
<div id="07"></br>	
	<h5>LIMITATIONS OF LIABILITY</h5>
	
	<p>JulietCorley.com will not be liable to you (whether under the law of 
	contract, the law of torts or otherwise) in relation to the contents of, 
	or use of, or otherwise in connection with, this website:
	<ul>
	<li>to the extent that the website is provided free-of-charge, 
		for any direct loss;</li>
	<li>for any indirect, special or consequential loss; or</li>
	<li>for any business losses, loss of revenue, income, profits or 
		anticipated savings, loss of contracts or business relationships, 
		loss of reputation or goodwill, or loss or corruption of 
		information or data.</li>
	</ul>
	
	These limitations of liability apply even if JulietCorley.com has been 
	expressly advised of the potential loss.</p>
</div>
<div id="08"></br>	
	<h5>EXCEPTIONS</h5>
	
	<p>Nothing in this website disclaimer will exclude or limit any warranty 
	implied by law that it would be unlawful to exclude or limit; and 
	nothing in this website disclaimer will exclude or limit 
	JulietCorley.com’s liability in respect of any:
	<ul>
	<li>death or personal injury caused by JulietCorley.com’s negligence;</li>
	<li>fraud or fraudulent misrepresentation on the part of 
		JulietCorley.com; or</li>
	<li>matter which it would be illegal or unlawful for JulietCorley.com 
		to exclude or limit, or to attempt or purport to exclude or limit, 
		its liability.</li> 
	</ul></p></br> 
</div>
<div id="09"></br>	
	<h5>REASONABLENESS</h5>
	
	<p>By using this website, you agree that the exclusions and limitations 
	of liability set out in this website disclaimer are reasonable.</br>   
	
	If you do not think they are reasonable, you must not use this website.</p></br> 
	
	<h5>OTHER PARTIES</h5>
	
	<p>You accept that, as a limited liability entity, JulietCorley.com has 
	an interest in limiting the personal liability of its officers 
	and employees.  You agree that you will not bring any claim personally
	 against JulietCorley.com’s officers or employees in respect of any 
	 losses you suffer in connection with the website.</br> 
	
	Without prejudice to the foregoing paragraph, you agree that the 
	limitations of warranties and liability set out in this website 
	disclaimer will protect JulietCorley.com’s officers, employees, 
	agents, subsidiaries, successors, assigns and sub-contractors as 
	well as JulietCorley.com.</p></br>  
	
	<h5>UNENFORCEABLE PROVISIONS</h5>
	
	<p>If any provision of this website disclaimer is, or is found to be, 
	unenforceable under applicable law, that will not affect the 
	enforceability of the other provisions of this website disclaimer.</p></br> 
	
	<h5>INDEMNITY</h5>
	
	<p>You hereby indemnify Juliet Corley and JulietCorley.com and undertake 
	to keep Juliet Corley and JulietCorley.com indemnified against any 
	losses, damages, costs, liabilities and expenses (including 
	without limitation legal expenses and any amounts paid by Juliet 
	Corley or JulietCorley.com to a third party in settlement of a 
	claim or dispute on the advice of Juliet Corley or JulietCorley.com’s 
	legal advisers) incurred or suffered by Juliet Corley or 
	JulietCorley.com arising out of any breach by you of any provision 
	of these terms and conditions, or arising out of any claim that 
	you have breached any provision of these terms and conditions.</p></br> 
	
	<h5>BREACHES OF THESE TERMS AND CONDITIONS</h5>
	
	<p>Without prejudice to JulietCorley.com’s other rights under these 
	terms and conditions, if you breach these terms and conditions in 
	any way, JulietCorley.com may take such action as JulietCorley.com 
	deems appropriate to deal with the breach, including suspending 
	your access to the website, prohibiting you from accessing the 
	website, blocking computers using your IP address from accessing 
	the website, contacting your internet service provider to request 
	that they block your access to the website and/or bringing court 
	proceedings against you.</p></br> 
	
	<h5>VARIATION</h5>
	
	<p>JulietCorley.com may revise these terms and conditions from 
	time-to-time.  Revised terms and conditions will apply to the use 
	of this website from the date of the publication of the revised 
	terms and conditions on this website.  Please check this page regularly 
	to ensure you are familiar with the current version.</p></br> 
	
	<h5>ASSIGNMENT</h5>
	
	<p></p>JulietCorley.com may transfer, sub-contract or otherwise deal with 
	JulietCorley.com’s rights and/or obligations under these terms and 
	conditions without notifying you or obtaining your consent.</br> 
	
	You may not transfer, sub-contract or otherwise deal with your 
	rights and/or obligations under these terms and conditions.<p/></br>   
	
	<h5>SEVERABILITY</h5>
	
	<p>If a provision of these terms and conditions is determined by any court 
	or other competent authority to be unlawful and/or unenforceable, 
	the other provisions will continue in effect.  If any unlawful and/or 
	unenforceable provision would be lawful or enforceable if part of it 
	were deleted, that part will be deemed to be deleted, and the rest 
	of the provision will continue in effect.</p></br>  
	
	<h5>LAW AND JURISDICTION</h5>
	
	<p>These terms and conditions will be governed by and construed in 
	accordance with Australian Law and any disputes relating to these 
	terms and conditions will be subject to the exclusive jurisdiction 
	of the courts of Queensland.</p> 
</div>
<div id="10"></br>	
	
	<h5>JULIETCORLEY.COM’S DETAILS</h5>
	
	<p>The full name of JulietCorley.com is JulietCorley.com.</br> 
	
	JulietCorley.com’s address is “Juliet Corley, Care GPO, 
	38 Sheridan St, Cairns. Qld, Australia 4870”.</br> 
	
	You can contact JulietCorley.com by email to <a id="email" 
   	href="click:the.address.will.be.decrypted.by.javascript" title="click to Email"
   	onclick='openMailer(this);'><img src="/images/sales-link.jpg" height="20px"/></a></p></br> 
</div>
<div id="credit">
	<h4 class="julie">CREDIT</h4>
	This document was created using a Contractology template available at 
	http://www.freenetlaw.com
</div>
</div>
@stop