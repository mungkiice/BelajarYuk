<nav class="fh5co-nav-style-1" role="navigation" data-offcanvass-position="fh5co-offcanvass-left">
    <div class="container">
        <div class="col-lg-5 col-md-5 col-sm-5 fh5co-link-wrap">
            <ul data-offcanvass="yes">
                <li class=""><a href="/pengajar">Belajar</a></li>
                <li><a href="/diskusi">Diskusi</a></li>
                <li><a href="/kampanye">Donasi</a></li>
                <li><a href="/kegiatan">Kesini</a></li>
                <li><a href="/berita">Berita</a></li>
            </ul>
        </div> 
        <div class="col-lg-0 col-md-2 col-sm-5 text-center fh5co-link-wrap">
            <ul data-offcanvass="yes">
                <a href="/diskusi" id="gambarlogo"><img src="/images/logo.png" alt="logo" height="50px"></a>                    
            </ul>
        </div> 
        <div class="col-lg-5 col-md-5 col-sm-5 fh5co-link-wrap">
            <ul class="fh5co-special" data-offcanvass="yes">
                <div class="navbar navbar-right">

                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Bantuan</a></li>
                    @if(Auth::guard('web_user')->check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::guard('web_user')->user()->nama }} 
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu" style="background-color: #303030">
                            <li>
                                <a href="/profil/{{Auth::guard('web_user')->id()}}">My Profile</a>
                            </li>
                            <li>
                                <a href="{{ route('user.logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </li>
                        </ul>
                    </li>
                    @elseif(Auth::guard('web_pengajar')->check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::guard('web_pengajar')->user()->nama }} 
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu" style="background-color: #303030">
                            <li>
                                <a href="/profil/{{Auth::guard('web_pengajar')->id()}}">My Profile</a>
                            </li>
                            <li>
                                <a href="{{ route('pengajar.logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('pengajar.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </li>
                        </ul>    
                    </li>
                    @else
                    <li><a href="#" class="call-to-action" data-toggle="modal" data-target="#login-modal" id="login">Login</a></li>
                    @endif
                </div>
            </ul>
        </div>
    </div>
</nav>