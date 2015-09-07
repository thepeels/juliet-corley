@extends('layout')
@section('stylesheets')
{{ HTML::style( asset('css/cart.css'))}}
@stop
@section('body-class')
<body class="info" style="overflow-x:hidden;">
@stop
@section('title')
<title>About</title>
@stop
<?
$previous = Session::get('previous_url');
?>
@section('content')
<div class="fixed-menu merri">
	<h3 id="01" class="julie">JulietCorley.com</h3>
	<h5 class="julie">POLICIES</h5>
		@if(($previous != "https://julietcorley.com/terms") && ($previous != "https://julietcorley.com/info"))
			<a href="{{$previous}}/"class="btn btn-primary "><!--&#10094;--><<&nbsp;&nbsp;&nbsp;Back&nbsp; </a>
		@endif
	<h5 class="julie">Quick Links</h5>			
	<ul style ="padding-left:0px">
		<li><a href="#privacy">Privacy</a></li>
		<li><a href="#02">Personal Information Collection</a></li>
		<li><a href="#03">Using Personal Information</a></li>
		<li><a href="#04">Securing Your Data</a></li>
		<li><a href="#06">Contact</a></li>
		<li>&nbsp;</li>
		<li><a href="#cookies">Cookie Policy</a></li>
		<li><a href="#07">Refusing Cookies</a></li>
		<li>&nbsp;</li>
		<li><a href="#linking">Linking Policy</a></li>
		<li><a href="#copyright">Copyright</a></li>
		<li><a href="#08">Copyright Licence</a></li>
		<li>&nbsp;</li>
		<li><a href="#disclaimer">Disclaimer</a></li>
		<li>&nbsp;</li>
		<li>see also</li> 
		<li><a href="info">Information and General T&Cs</a></li>
		<li><a href="terms">Website Terms & Conditions</a></li>
		<li>---------------</li>
		<li><a href="/">HOME PAGE</a></li>
		<li><a href="commissions/">Fish Icons</a></li>
		<li><a href="colouring">Colouring Pages</a></li>
	</ul>
</div>
<div id="privacy" class="info-main-section merri"> 	
	<h2 class="julie merri">JulietCorley.com</h2></br>
	

	<h4 class="julie">PRIVACY</h4> 

	<p>Your privacy is important to JulietCorley.com.  This privacy statement provides 
	information about the personal information that JulietCorley.com collects, 
	and the ways in which JulietCorley.com uses that personal information.
	</p> 

<div id="02"></br> 
	<h5>PERSONAL INFORMATION COLLECTION</h5>

	<p>JulietCorley.com may collect and use the following kinds of personal information: 
	<ul>
		<li>information about your use of this website (including purchases 
			and downloads);	</li>
		<li>information that you provide for the purpose of registering with 
			the website;</li>	
		<li>information about transactions carried out over this website;</li>
		<li>any other information that you send to JulietCorley.com.</li>	
	</ul>
	</p> 
</div>
<div id="03"></br> 
	<h5>USING PERSONAL INFORMATION</h5>

	<p>JulietCorley.com may use your personal information to: 
	<ul>
		<li>administer this website;</li>		
		<li>personalize the website for you;</li>
		<li>enable your access to and use of the website services;</li>
		<li>publish information on the website about you that you submit 
			for publication;</li>
		<li>send to you products that you purchase;</li>
		<li>supply to you services that you purchase;</li>
		<li>send to you statements and invoices;</li>
		<li>collect payments from you; and</li>
		<li>communicate with you about products or services that you wish
			to purchase	or that you indicate an interest in.</li>
	</ul>
	</p>
	<p>Where JulietCorley.com discloses your personal information to its 
	agents or sub-contractors for these purposes, the agent or sub-contractor 
	in question will be obligated to use that personal information in 
	accordance with the terms of this privacy statement. </p>
	
	<p>In addition to the disclosures reasonably necessary for the purposes 
	identified elsewhere above, JulietCorley.com may disclose your 
	personal information to the extent that it is required to do so by 
	law, in connection with any legal proceedings or prospective legal 
	proceedings, and in order to establish, exercise or defend its legal 
	rights.</p> 
</div>
<div id="04"></br> 
	<h5>SECURING YOUR DATA</h5>
	
	<p>JulietCorley.com will take reasonable technical and organisational 
	precautions to prevent the loss, misuse or alteration of your 
	personal information.</p>  
	
	<p>JulietCorley.com will store all the personal information you provide.</p> 
	
	<h5>CROSS-BORDER DATA TRANSFERS</h5>
	
	<p>Information that JulietCorley.com collects may be stored and processed 
	in and transferred between any of the countries in which JulietCorley.com 
	operates to enable the use of the information in accordance with this 
	privacy policy.</p> 
	
	<p>In addition, personal information that you submit for publication on 
	the website will be published on the internet and may be available 
	around the world.</p> 
	
	<p>You agree to such cross-border transfers of personal information.</p> 
</div>
<div id="05"></br> 	
	<h5>UPDATING THIS STATEMENT</h5>
	
	<p>JulietCorley.com may update this privacy policy by posting a new 
	version on this website.</p>   
	
	<p>You should check this page occasionally to ensure you are familiar 
	with any changes.</p>   
	
	<h5>OTHER WEBSITES</h5>
	<p>This website contains links to other websites.</p>   
	
	<p>JulietCorley.com is not responsible for the privacy policies or 
	practices of any third party. </p>
	
</div>
<div id="06"></br> 	
	<h5>CONTACT JULIETCORLEY.COM</h5>
	
	If you have any questions about this privacy policy or JulietCorley.com’s treatment of your personal information, please write:
	<ul>
		<li>by email to <a id="email"href="click:the.address.will.be.decrypted.by.javascript" title="click to Email"
   					onclick='openMailer(this);'><img src="/images/sales-link.jpg" height="20px"/></a> or</li> 
		<li>by post to “Juliet Corley, Care GPO, 38 Sheridan St, Cairns. Qld, Australia 4870”</li>
	</ul>

</div> 
<div id="cookies"></br> 
	<h4 class = "julie merri">COOKIES POLICY</h4>
	
	<h5>ABOUT COOKIES</h5>
	
	<p>This website uses cookies.  By using this website and agreeing to this policy, 
	you consent to JulietCorley.com's use of cookies in accordance with the terms 
	of this policy.</p>
	
	<p>Cookies are files sent by web servers to web browsers, and stored by the web 
	browsers.The information is then sent back to the server each time the browser 
	requests a page from the server.  This enables a web server to identify and 
	track web browsers.</p> 
	
	<p>There are two main kinds of cookies: session cookies and persistent 
	cookies.  Session cookies are deleted from your computer when you close your 
	browser, whereas persistent cookies remain stored on your computer until deleted, 
	or until they reach their expiry date.</p>
	
	<p>JulietCorley.com uses the cookies to assist navigation and 
	manage the shopping cart.</p>
</div>
<div id="07"></br>	
	<h5>REFUSING COOKIES</h5>
	
	<p>Most browsers allow you to refuse to accept cookies.</p>  
	
	<p>For example,</br>In Internet Explorer, you can refuse all cookies by clicking “Tools”, 
	“Internet Options”, “Privacy”, and selecting “Block all cookies” using
	 the sliding selector.</br>
	In Firefox, you can adjust your cookies settings by clicking “Tools”, 
	“Options” and “Privacy”.</p>
	<p>Blocking cookies will have a negative impact upon the usability 
	of some websites.</p>
</div>
<div id="linking"></br> 
	<h4 class="julie">LINKING POLICY</h4>

	<h5>STATUS OF LINKING POLICY</h5>
	
	<p>JulietCorley.com welcomes links to this website made in accordance 
	with the terms of this linking policy.</br>
	By using this website you agree to be bound by the terms and conditions of this 
	linking policy.</p>
	
	<h5>LINKS TO THIS WEBSITE</h5>
	
	Links pointing to this website should not be misleading.  
	Appropriate link text should be always be used.
	You must not use the JulietCorley.com logo to link to this website (or otherwise) 
	without Juliet Corley’s express written permission.</br>
	You must not link to this website using any inline linking technique.</br>
	You must not frame the content of this website or use any similar 
	technology in relation to the content of this website.
	
	<h5>LINKS FROM THIS WEBSITE</h5>
	
	This website includes links to other websites owned and operated by third parties.</br>
	These links are not endorsements or recommendations.</br>  
	JulietCorley.com has no control over the contents of third party websites, 
	and JulietCorley.com accepts no responsibility for them or for 
	any loss or damage that may arise from your use of them.
	
	<h5>REMOVAL OF LINKS</h5>
	
	You agree that, should JulietCorley.com request the deletion of a link to our 
	website that is within your control, you will delete the link promptly.</br>
	If you would like JulietCorley.com to remove a link to your website that is 
	included on this website, please contact JulietCorley.com using the contact 
	details below.</br>
	Note that unless you have a legal right to demand removal, 
	such removal will be at our discretion.
	<h5>CHANGES TO THIS LINKING POLICY</h5>
	JulietCorley.com may amend this linking policy at any time by publishing a 
	new version on this website. 
	
	<h5>CONTACT US</h5>
	
	Should you have any questions about this linking policy, please contact 
	JulietCorley.com using the details set out below:
</div> 
<div id="copyright"></br> 
	<h4 class="julie">COPYRIGHT NOTICE</h4>
	
	<p>Copyright &copy; 1996-{{date("Y")}} Juliet Corley</p>
	
	<h5>OWNERSHIP OF COPYRIGHT</h5>
	
	The copyright in this website and the material on this website 
	(including without limitation the text, computer code, artwork, photographs, 
	images, music, audio material, video material and audio-visual material 
	on this website) is owned by Juliet Corley.
</div>
<div id="08"></br>	
	<h5>COPYRIGHT LICENSE</h5>
	
	Juliet Corley grants to you a worldwide non-exclusive royalty-free 
	revocable license to:
	<ul>
	<li>view this website and the material on this website on a computer or mobile 
		device via a web browser; and</li>
	<li>copy and store this website and the material on this website in your web 
		browser cache memory;</li> 
	</ul>
	Juliet Corley does not grant you any other rights in relation to this website 
	or the material on this website. In other words, all other rights are reserved.</br>
	
	For the avoidance of doubt, you must not adapt, edit, change, transform, publish,
	republish, distribute, redistribute, broadcast, rebroadcast or show or play in 
	public this website or the material on this website (in any form or media) 
	without Juliet Corley’s prior written permission.   
	
	<h5>DATA MINING</h5>
	
	The automated and/or systematic collection of data from this website is prohibited.
	
	<h5>PERMISSIONS</h5>
	
	You may request permission to use the copyright materials on this website by 
	writing to <a id="email"href="click:the.address.will.be.decrypted.by.javascript" title="click to Email"
   	onclick='openMailer(this);'><img src="/images/sales-link.jpg" height="20px"/></a></br> 
	Materials made available on this website for printing or downloading may only 
	be used after payment of the appropriate fee, and their use is subject to the 
	additional restrictions set out in their individual copyright or licensing terms 
	and conditions as stated at the time of download in writing by Juliet Corley or 
	by JulietCorley.com. </br> 
	Juliet Corley owns and retains all copyright of all materials available for 
	downloading and printing, and of all other materials on this website </br> 
	
	<h5>ENFORCEMENT OF COPYRIGHT</h5>
	
	Juliet Corley takes the protection of her copyright very seriously.</br> 
	
	If Juliet Corley discovers that you have used her copyright materials in 
	contravention of the license above, Juliet Corley or JulietCorley.com may 
	bring legal proceedings against you seeking monetary damages and an 
	injunction to stop you using those materials.  You could also be ordered 
	to pay legal costs.</br> 
	
	If you become aware of any use of Juliet Corley’s copyright materials that 
	contravenes or may contravene the license above, please report this by email to <a id="email" 
   	href="click:the.address.will.be.decrypted.by.javascript" title="click to Email"
   	onclick='openMailer(this);'><img src="/images/sales-link.jpg" height="20px"/></a></br>
	
	<h5>INFRINGING MATERIAL</h5>
	
	If you become aware of any material on the website that you believe 
	infringes your or any other person's copyright, please report this by email to
	<a id="email"href="click:the.address.will.be.decrypted.by.javascript" title="click to Email"
   					onclick='openMailer(this);'><img src="/images/sales-link.jpg" height="20px"/></a></br> 
	or by post to “Juliet Corley, Care GPO, 38 Sheridan St, Cairns. Qld, Australia 4870”.

</div> 
<div id = "disclaimer"></br> 
	<h4 class="julie">WEBSITE DISCLAIMER</h4>
	
	<h5>NO WARRANTIES</h5>
	
	This website is provided “as is” without any representations or 
	warranties, express or implied.</br>   
	JulietCorley.com makes no representations or warranties in relation 
	to this website or the information and materials provided on this website. </br>  
	
	Without prejudice to the generality of the foregoing paragraph, 
	JulietCorley.com does not warrant that:
	<ul>
	<li>this website will be constantly available, or available at all; or</li>
	<li>the information on this website is complete, true, accurate or 
		non-misleading; or</li>
	<li>this website and materials will not cause damage or are free from 
		any computer virus or other malicious or damaging programs or files.</li>
	</ul>
	
	Nothing on this website constitutes, or is meant to constitute, advice 
	of any kind. If you require advice in relation to any matter you should 
	consult an appropriate professional.</br> 
	
	<h5>LIMITATIONS OF LIABILITY</h5>
	
	JulietCorley.com will not be liable to you (whether under the law of 
	contract, the law of torts or otherwise) in relation to the contents 
	of, or use of, or otherwise in connection with, this website:
	<ul>
	<li>to the extent that the website is provided free-of-charge, for any 
		direct loss;</li>
	<li>for any indirect, special or consequential loss; or</li>
	<li>for any business losses, loss of revenue, income, profits or 
		anticipated savings, 	loss of contracts or business relationships, 
		loss of reputation or goodwill, or loss or corruption of 
		information or data.</li>
	</ul>
	
	These limitations of liability apply even if JulietCorley.com has been 
	expressly advised of the potential loss.</br> 
	For avoidance of doubt, to the maximum extent permitted by law, 
	JulietCorley.com shall not be responsible or liable to any person for 
	any loss or damage (however caused, including by negligence) relating 
	in any way to or arising from any use of this website or from 
	downloading of any of the materials on this website.</br>  
	This includes, but is not limited to, the transmission of any computer 
	virus or other malicious or damaging programs or files.</br> 
	JulietCorley.com recommends that you install appropriate anti-virus 
	or other protective software.
	
	<h5>EXCEPTIONS</h5>
	
	Nothing in this website disclaimer will exclude or limit any 
	warranty implied by law that it would be unlawful to exclude 
	or limit; and nothing in this website disclaimer will exclude or 
	limit JulietCorley.com’s liability in respect of any:
	<ul>
	<li>death or personal injury caused by JulietCorley.com’s negligence;</li>
	<li>fraud or fraudulent misrepresentation on the part of JulietCorley.com; or</li>
		<li>matter which it would be illegal or unlawful for JulietCorley.com 
			to exclude or limit, or to attempt or purport to exclude or limit, its liability.</li> 
	</ul>
	
	<h5>REASONABLENESS</h5>
	
	By using this website, you agree that the exclusions and limitations 
	of liability set out in this website disclaimer are reasonable.</br>    
	
	If you do not think they are reasonable, you must not use this website.
	
	<h5>OTHER PARTIES</h5>
	
	<p>You accept that, as a limited liability entity, JulietCorley.com has 
	an interest in limiting the personal liability of its officers and 
	employees.</br>   You agree that you will not bring any claim personally 
	against JulietCorley.com’s officers or employees in respect of any 
	losses you suffer in connection with the website.</p>
	
	Without prejudice to the foregoing paragraph, you agree that the 
	limitations of warranties and liability set out in this website 
	disclaimer will protect JulietCorley.com’s officers, employees, 
	agents, subsidiaries, successors, assigns and sub-contractors as 
	well as JulietCorley.com. 
	
	<h5>UNENFORCEABLE PROVISIONS</h5>
	
	If any provision of this website disclaimer is, or is found to be, 
	unenforceable under applicable law, that will not affect the 
	enforceability of the other provisions of this website disclaimer.

</div></br> 
<div id="credit">
<h4 class="julie">CREDIT</h4>
This document was created using a Contractology template available at 
http://www.freenetlaw.com
</div>
</div>	
@stop
