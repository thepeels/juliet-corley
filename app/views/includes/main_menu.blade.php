					<ul class="menu">
					   <li class='active'><a href='/'><span>Home</span></a></li>
					   <li ><a href='shop'><span style="letter-spacing:-.5px;">Merchandise/Shop</span></a></li>
					   <li ><a href='colouring'><span style="letter-spacing:-.5px;">Colouring pages</span></a></li>
					   <!--
					   <li><a href='#' title = "Coming Soon"><span>Craft items</span></a></li>
					   <li><a href='#' title = "Coming Soon"><span>Art Gallery</span></a></li>
					   <li><a href='#' title = "Coming Soon"><span>Fish Paintings</span></a></li>
					   <li><a href='#' ><span title = "Coming Soon">Photo Gallery</span></a></li>
					   -->
					   <li class='has-sub'><a href='#'><span>About</span></a>
					      <ul>
					         <li><a href='info#14'><span>About me</span></a></li>
					         <li><a href="info#01"><span>Contact me</span></a></li>
					         <li><a href='about'><span>Policies</span></a></li>
					         <li><a href='info'><span>Site info</span></a></li>
					         <li><a href='about#copyright'><span>Copyright</span></a></li>
					         <li><a href='terms'><span>Terms & Conditions</span></a></li>
					         <li class='last'><a href='sitemap'><span>Site map</span></a></li>
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
					         <li><a href='commissions'><span>Icon Commissions</span></a></li>
					         <li class='last'><a href='download'><span>Icon Database</span></a></li>
					      </ul>
					   </li>
					   <li><a href='#' title = "Coming Soon"><span>Links</span></a></li>
					   <li class='final'><a href='../payment/stripe'><span>Card Payments</span></a></li>
					   @if(Auth::check())
		                   <li><a href="/logout">Log Out</a></li>
		                   <li><a href="/user/myaccount">My account</a></li>
						   @if(Auth::user()->superuser ==TRUE)
		                   <li><a href="/admin/fish">Admin Pages</a></li>
		                   @endif
		               @else
		               <li><a href="/login">Log In</a></li>
	                   @endif
					</ul>
				