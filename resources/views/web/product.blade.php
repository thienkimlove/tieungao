@extends('web.frontend')

@section('content')
    <div class="product">
        <div class="container">
            <div class="col-md-3 product-price">

                <div class=" rsidebar span_1_of_left">
                    <div class="of-left">
                        <h3 class="cate">Danh mục</h3>
                    </div>
                    <ul class="menu">
                        @foreach (\App\Site::headerCategory() as $listCategory)
                            <li class="item4"><a href="{{url(\App\Site::getCategoryUrl($listCategory))}}">{{$listCategory->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!--initiate accordion-->
                <script type="text/javascript">
                    $(function() {
                        var menu_ul = $('.menu > li > ul'),
                            menu_a  = $('.menu > li > a');
                        menu_ul.hide();
                        menu_a.click(function(e) {
                            e.preventDefault();
                            if(!$(this).hasClass('active')) {
                                menu_a.removeClass('active');
                                menu_ul.filter(':visible').slideUp('normal');
                                $(this).addClass('active').next().stop(true,true).slideDown('normal');
                            } else {
                                $(this).removeClass('active');
                                $(this).next().stop(true,true).slideUp('normal');
                            }
                        });

                    });
                </script>
                <!---->
                <div class="product-middle">
                    <div class="fit-top">
                        <h6 class="shop-top">Lorem Ipsum</h6>
                        <a href="#" class="shop-now">SHOP NOW</a>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="sellers">
                    <div class="of-left-in">
                        <h3 class="tag">Tags</h3>
                    </div>
                    <div class="tags">
                        <ul>
                            <li><a href="#">design</a></li>
                            <li><a href="#">fashion</a></li>
                            <li><a href="#">lorem</a></li>
                            <li><a href="#">dress</a></li>
                            <li><a href="#">fashion</a></li>
                            <li><a href="#">dress</a></li>
                            <li><a href="#">design</a></li>
                            <li><a href="#">dress</a></li>
                            <li><a href="#">design</a></li>
                            <li><a href="#">fashion</a></li>
                            <li><a href="#">lorem</a></li>
                            <li><a href="#">dress</a></li>

                            <div class="clearfix"> </div>
                        </ul>

                    </div>

                </div>
                <!---->
                <div class="product-bottom">
                    <div class="of-left-in">
                        <h3 class="best">Best Sellers</h3>
                    </div>
                    <div class="product-go">
                        <div class=" fashion-grid">
                            <a href="#"><img class="img-responsive " src="{{url('web/images/p1.jpg')}}" alt=""></a>

                        </div>
                        <div class=" fashion-grid1">
                            <h6 class="best2"><a href="#" >Lorem ipsum dolor sit
                                    amet consectetuer  </a></h6>

                            <span class=" price-in1"> $40.00</span>
                        </div>

                        <div class="clearfix"> </div>
                    </div>
                    <div class="product-go">
                        <div class=" fashion-grid">
                            <a href="#"><img class="img-responsive " src="{{url('web/images/p2.jpg')}}" alt=""></a>

                        </div>
                        <div class="fashion-grid1">
                            <h6 class="best2"><a href="#" >Lorem ipsum dolor sit
                                    amet consectetuer </a></h6>

                            <span class=" price-in1"> $40.00</span>
                        </div>

                        <div class="clearfix"> </div>
                    </div>

                </div>
                <div class=" per1">
                    <a href="#" ><img class="img-responsive" src="{{url('web/images/pro.jpg')}}" alt="">
                        <div class="six1">
                            <h4>DISCOUNT</h4>
                            <p>Up to</p>
                            <span>60%</span>
                        </div></a>
                </div>
            </div>
            <div class="col-md-9 product-price1">
                <div class="col-md-5 single-top">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="{{url('web/images/si.jpg')}}">
                                <img src="{{url('web/images/si.jpg')}}" />
                            </li>
                            <li data-thumb="{{url('web/images/si1.jpg')}}">
                                <img src="{{url('web/images/si1.jpg')}}" />
                            </li>
                            <li data-thumb="{{url('web/images/si2.jpg')}}">
                                <img src="{{url('web/images/si2.jpg')}}" />
                            </li>
                            <li data-thumb="{{url('web/images/si.jpg')}}">
                                <img src="{{url('web/images/si.jpg')}}" />
                            </li>
                        </ul>
                    </div>
                    <!-- FlexSlider -->
                    <script defer src="{{url('web/js/jquery.flexslider.js')}}"></script>
                    <link rel="stylesheet" href="{{url('web/css/flexslider.css')}}" type="text/css" media="screen" />

                    <script>
                        // Can also be used with $(document).ready()
                        $(window).load(function() {
                            $('.flexslider').flexslider({
                                animation: "slide",
                                controlNav: "thumbnails"
                            });
                        });
                    </script>
                </div>
                <div class="col-md-7 single-top-in simpleCart_shelfItem">
                    <div class="single-para ">
                        <h4>{{$product->name}}</h4>
                        <div class="star-on">
                            <ul class="star-footer">
                                <li><a href="#"><i> </i></a></li>
                                <li><a href="#"><i> </i></a></li>
                                <li><a href="#"><i> </i></a></li>
                                <li><a href="#"><i> </i></a></li>
                                <li><a href="#"><i> </i></a></li>
                            </ul>
                            <div class="review">
                                <a href="#"> 1 customer review </a>

                            </div>
                            <div class="clearfix"> </div>
                        </div>

                        <h5 class="item_price">{{\App\Site::price($product->price)}}</h5>
                        <p>{{$product->desc}}</p>

                        <ul class="tag-men">
                            <li><span>TAG</span>
                                <span class="women1">: Women,</span></li>
                            <li><span>SKU</span>
                                <span class="women1">: CK09</span></li>
                        </ul>
                        <a href="#" class="add-cart item_add">ADD TO CART</a>

                    </div>
                </div>
                <div class="clearfix"> </div>
                <!---->
                <div class="cd-tabs">
                    <nav>
                        <ul class="cd-tabs-navigation">
                            <li><a data-content="fashion"  href="#0">Description </a></li>
                            <li><a data-content="cinema" href="#0" >Addtional Informatioan</a></li>
                            <li><a data-content="television" href="#0" class="selected ">Reviews (1)</a></li>

                        </ul>
                    </nav>
                    <ul class="cd-tabs-content">
                        <li data-content="fashion" >
                            <div class="facts">
                            {!! $product->detail !!}
                            </div>

                        </li>
                        <li data-content="cinema" >
                            <div class="facts1">

                                <div class="color"><p>Color</p>
                                    <span >Blue, Black, Red</span>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="color">
                                    <p>Size</p>
                                    <span >S, M, L, XL</span>
                                    <div class="clearfix"></div>
                                </div>

                            </div>

                        </li>
                        <li data-content="television" class="selected">
                            <div class="comments-top-top">
                                <div class="top-comment-left">
                                    <img class="img-responsive" src="{{url('web/images/co.png')}}" alt="">
                                </div>
                                <div class="top-comment-right">
                                    <h6><a href="#">Hendri</a> - September 3, 2014</h6>
                                    <ul class="star-footer">
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                    </ul>
                                    <p>Wow nice!</p>
                                </div>
                                <div class="clearfix"> </div>
                                <a class="add-re" href="#">ADD REVIEW</a>
                            </div>

                        </li>
                        <div class="clearfix"></div>
                    </ul>
                </div>
                <div class=" bottom-product">
                    <div class="col-md-4 bottom-cd simpleCart_shelfItem">
                        <div class="product-at ">
                            <a href="#"><img class="img-responsive" src="{{url('web/images/pi3.jpg')}}" alt="">
                                <div class="pro-grid">
                                    <span class="buy-in">Buy Now</span>
                                </div>
                            </a>
                        </div>
                        <p class="tun">It is a long established fact that a reader</p>
                        <a href="#" class="item_add"><p class="number item_price"><i> </i>$500.00</p></a>
                    </div>
                    <div class="col-md-4 bottom-cd simpleCart_shelfItem">
                        <div class="product-at ">
                            <a href="#"><img class="img-responsive" src="{{url('web/images/pi1.jpg')}}" alt="">
                                <div class="pro-grid">
                                    <span class="buy-in">Buy Now</span>
                                </div>
                            </a>
                        </div>
                        <p class="tun">It is a long established fact that a reader</p>
                        <a href="#" class="item_add"><p class="number item_price"><i> </i>$500.00</p></a>					</div>
                    <div class="col-md-4 bottom-cd simpleCart_shelfItem">
                        <div class="product-at ">
                            <a href="#"><img class="img-responsive" src="{{url('web/images/pi4.jpg')}}" alt="">
                                <div class="pro-grid">
                                    <span class="buy-in">Buy Now</span>
                                </div>
                            </a>
                        </div>
                        <p class="tun">It is a long established fact that a reader</p>
                        <a href="#" class="item_add"><p class="number item_price"><i> </i>$500.00</p></a>					</div>
                    <div class="clearfix"> </div>
                </div>
            </div>

            <div class="clearfix"> </div>
        </div>
    </div>
@endsection