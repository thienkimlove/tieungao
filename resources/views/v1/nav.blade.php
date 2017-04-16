<div class="mainmenu-wrapper">
    <div class="container">
        <div class="menuextras">
            <div class="extras">
                <ul>
                    <li class="shopping-cart-items"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> <a href="{{url('gio-hang')}}"><b>{{count(session()->get('cart'))}} sản phẩm</b></a></li>
                    <li>
                        <div class="dropdown choose-country">
                            <a class="#" data-toggle="dropdown" href="#"><img src="{{url('v1/img/flags/gb.png')}}" alt="Great Britain"> UK</a>
                          {{--  <ul class="dropdown-menu" role="menu">
                                <li role="menuitem"><a href="#"><img src="{{url('v1/img/flags/us.png')}}" alt="United States"> US</a></li>
                                <li role="menuitem"><a href="#"><img src="{{url('v1/img/flags/de.png')}}" alt="Germany"> DE</a></li>
                                <li role="menuitem"><a href="#"><img src="{{url('v1/img/flags/es.png')}}" alt="Spain"> ES</a></li>
                            </ul>--}}
                        </div>
                    </li>
                   {{-- <li><a href="{{url('dang-nhap')}}">Đăng nhập</a></li>--}}
                </ul>
            </div>
        </div>
        <nav id="mainmenu" class="mainmenu">
            <ul>
                <li class="logo-wrapper"><a href="{{url('/')}}">
                        <img src="{{url('v1/img/mPurpose-logo.png')}}" alt="Multipurpose Twitter Bootstrap Template"></a></li>
                <li class="active">
                    <a href="{{url('/')}}">Trang chủ</a>
                </li>
                <li class="has-submenu">
                    <a href="#">Pages +</a>
                    <div class="mainmenu-submenu">
                        <div class="mainmenu-submenu-inner">
                            <div>
                                <h4>Trang chủ</h4>
                                <ul>
                                    <li><a href="{{url('/')}}">Trang chủ</a></li>
                                </ul>
                                <h4>Chuyên mục</h4>
                                <ul>
                                    @foreach (App\Category::where('status', true)->get() as $headCategory)
                                    <li><a href="{{url(\Illuminate\Support\Str::slug($headCategory->name).'-'.$headCategory->id)}}">{{$headCategory->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div>
                                <h4>General Pages</h4>
                                <ul>
                                    <li><a href="{{url('lien-he')}}">Liên hệ</a></li>
                                </ul>
                            </div>
                            <div>
                                <h4>Sản phẩm</h4>
                                <ul>
                                    <li><a href="{{url('san-pham')}}">Sản phẩm</a></li>
                                    <li><a href="{{url('gio-hang')}}">Giỏ hàng</a></li>
                                </ul>
                            </div>
                        </div><!-- /mainmenu-submenu-inner -->
                    </div><!-- /mainmenu-submenu -->
                </li>

            </ul>
        </nav>
    </div>
</div>