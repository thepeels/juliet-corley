					<ul class="menu">
					   <li class='active'><a href='/'><span>Home</span></a></li>
					   <li ><a href='shop' title = "Shop"><span style="letter-spacing:-.5px;">Merchandise/Shop</span></a></li>
					   <li ><a href='colouring' title = "Coming Soon"><span style="letter-spacing:-.5px;">Colouring pages</span></a></li>
					   <!--
					   <li><a href='#' title = "Coming Soon"><span>Craft items</span></a></li>
					   <li><a href='#' title = "Coming Soon"><span>Art Gallery</span></a></li>
					   <li><a href='#' title = "Coming Soon"><span>Fish Paintings</span></a></li>
					   <li><a href='#' ><span title = "Coming Soon">Photo Gallery</span></a></li>
					   -->
					   <li class='has-sub'><a href='#'><span>About</span></a>
					      <ul>
					         <li><a href='#' title = "Coming Soon"><span>About me</span></a></li>
					         <li><a href="mailto:juliet@julietcorley.com" target="_top" title = "Coming Soon"><span>Contact me</span></a></li>
					         <li><a href='about'><span>Policies/Site info</span></a></li>
					         <li><a href='about#copyright'><span>Copyright</span></a></li>
					         <li><a href='terms' title = "Terms and conditions"><span>Terms & Conditions</span></a></li>
					         <li class='last' title = "Coming Soon"><a href='#'><span>Site map</span></a></li>
					      </ul>
					   </li>
					   <!--
					   <li><a href='#' title = "Coming Soon"><span>Project Portfolio</span></a></li>
					   <li class='has-sub'><a href='#'><span>Illustration</span></a>
					      <ul>
					         <li><a href='info' title = "Coming Soon"><span>Portfolio</span></a></li>
					         <li class='last' title = "Coming Soon"><a href='#'><span>Testimonials</span></a></li>
					      </ul>
					   </li>
					   -->
					   <li class='has-sub'><a href='#'><span>Fish Icons</span></a>
					      <ul>
					         <li><a href='info'><span>Icon Commissions</span></a></li>
					         <li class='last'><a href='download'><span>Icon Database</span></a></li>
					      </ul>
					   </li>
					   <li><a href='#' title = "Coming Soon"><span>links</span></a></li>
					   <li class='final'><a href='../payment/stripe'><span>Card Payments</span></a></li>
					   @if(Auth::check())
		                   <li><a href="/logout">Log Out</a></li>
						   @if(Auth::user()->superuser ==TRUE)
		                   <li><a href="/admin/fish">Admin Pages</a></li>
		                   @endif
	                   @endif
					</ul>
				