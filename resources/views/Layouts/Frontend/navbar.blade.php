<div class="navbar navbar-menu navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="{{url('/')}}">
                <div class="sitename">Ensiklopedia</div>
                <div class="subname">Kabupaten Pesisir Barat</div>
            </a>
            <div class="nav-collapse collapse">
                <ul class="nav nav-pills pull-right">
                    <li><a href="{{url('/')}}" style="{{ (request()->is('/')) ? 'color:yellow;' : '' }}">BERANDA</a></li>
                    <li><a href="{{url('/gallery/photo')}}" style="{{ (request()->is('gallery/photo')) ? 'color:yellow;' : '' }}">GALERI FOTO</a></li>
                    <li><a href="{{url('/gallery/video')}}" style="{{ (request()->is('gallery/video')) ? 'color:yellow;' : '' }}">GALERI VIDEO</a></li>
                    <li><a href="{{url('/auth/login')}}" style="{{ (request()->is('auth/login')) ? 'color:yellow;' : '' }}">TULIS ARTIKEL</a></li>
                    <li><a href="{{url('/about')}}" style="{{ (request()->is('about')) ? 'color:yellow;' : '' }}">TENTANG</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
