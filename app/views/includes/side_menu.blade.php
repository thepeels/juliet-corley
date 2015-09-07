            <ul>
                <li><a class="btn btn-default btn-sm" href="/">Home</a></li>
                <li><a class="btn btn-default btn-sm" href="/commissions">Commissions</a></li>
                <li><a class="btn btn-default btn-sm" href="/download">Icon store</a></li>
                <!--<li><a class="btn btn-default btn-sm" href="/download#B">Fish gallery</a></li>
                <li><a class="btn btn-default btn-sm" href="/download#C">Portfolio</a></li>
                <li><a class="btn btn-default btn-sm" href="/services">Services</a></li>
                <li><a class="btn btn-default btn-sm" href="/shop">Merchandise</a></li>-->
                <li>{{HTML::mailto('juliet@julietcorley.com','Contact me',['class'=>'btn btn-default btn-sm'])}}</li>
                <li><a class="btn btn-default btn-sm" href="shop">Merchandise</a></li>
                <li><a class="btn btn-default btn-sm" href="colouring">Colouring pages</a></li>
                <li><a class="btn btn-default btn-sm" href="/payment/stripe">Pay for Drawings</a></li>
                @if(Auth::check())
                <li><a class="btn btn-default btn-sm" href="/user/myaccount" title="Previous Downloads">My account</a></li>
                <li><a class="btn btn-default btn-sm" href="/logout">Logout</a></li>
                    @if(Auth::user()->superuser ==TRUE)
                    <li><a class="btn btn-default btn-sm" href="/admin/fish">Admin Pages</a></li>
                    @endif
                @else
                        <li><a class="btn btn-default btn-sm" href="/login">Login/Register</a></li>
                @endif
            </ul>