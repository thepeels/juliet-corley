            <ul>
                <li><a class="btn btn-default btn-sm" href="/demo">Home</a></li>
                <li><a class="btn btn-default btn-sm"href="/info">Commissions</a></li>
                <li><a class="btn btn-default btn-sm"href="/download">Icon store</a></li>
                <li><a class="btn btn-default btn-sm" href="/art/gallery">Fish gallery</a></li>
                <li><a class="btn btn-default btn-sm" href="/services">Portfolio</a></li>
                <li><a class="btn btn-default btn-sm" href="/services">Services</a></li>
                <li><a class="btn btn-default btn-sm" href="/services">Merchandise</a></li>
                <li><a class="btn btn-default btn-sm" href="/services">Contact me</a></li>
                <li><a class="btn btn-default btn-sm" href="/services">Links</a></li>
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