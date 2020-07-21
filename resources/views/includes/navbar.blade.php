<!-- Navbar -->
    <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light bg-white">
            <a class="navbar-brand" href="#">
                <img src="{{ url('frontend/images/logo.png') }}">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navb">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse font-weight-light" id="navb">
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="#pengurus" class="nav-link" id="pengurus_a">Kepengurusan</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="#divisi" class="nav-link" id="divisi_a">Divisi</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="{{url('dokumentasi')}}" class="nav-link" id="doku_a">Dok. Kegiatan</a>
                    </li>
                </ul>
                @guest
                <!-- Mobile Button -->
                <form class="form-inline d-sm-block d-md-none">
                    <button class="btn btn-login my-2 my-sm-0" onclick="event.preventDefault(); location.href='{{ url('admin') }}';">
                        Masuk
                    </button>
                </form>
                <!-- Desktop Button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" onclick="event.preventDefault(); location.href='{{ url('admin') }}';">
                        Masuk
                    </button>
                </form>
                @endguest
                
                @auth
                <!-- Mobile Button -->
                <form class="form-inline d-sm-block d-md-none" action="{{ url('logout') }}" method="POST">
                        @csrf
                    <button class="btn btn-login my-2 my-sm-0">
                        Keluar
                    </button>
                </form>
                <!-- Desktop Button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout') }}" method="POST">
                        @csrf
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                        Keluar
                    </button>
                </form>
                @endauth
            </div>
        </nav>
    </div>
    <!-- End Navbar -->