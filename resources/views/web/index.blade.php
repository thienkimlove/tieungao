@extends('web.frontend')

@section('content')
    <div class="content">
        <div class="container">
            <div class="content-top">
                <h1>NEW RELEASED</h1>

                @foreach (\App\Site::latestReleases()->chunk(2) as $releaseProducts)
                <div class="grid-in">
                    @foreach ($releaseProducts as $releaseProduct)
                    <div class="col-md-4 grid-top">
                        <a href="{{url(\App\Site::getProductUrl($releaseProduct))}}" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="{{url('web/images/pi.jpg')}}" alt="">
                            <div class="b-wrapper">
                                <h3 class="b-animate b-from-left b-delay03 ">
                                    <span>{{$releaseProduct->name}}</span>
                                </h3>
                            </div>
                        </a>
                        <p><a href="{{url(\App\Site::getProductUrl($releaseProduct))}}">Contrary to popular</a></p>
                    </div>
                    @endforeach
                    <div class="clearfix"> </div>
                </div>
                @endforeach
            </div>
            <!----->

            <div class="content-top-bottom">
                <h2>Featured Collections</h2>
                <div class="col-md-6 men">
                    <a href="single.html" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="{{url('web/images/t1.jpg')}}" alt="">
                        <div class="b-wrapper">
                            <h3 class="b-animate b-from-top top-in   b-delay03 ">
                                <span>Lorem</span>
                            </h3>
                        </div>
                    </a>


                </div>
                <div class="col-md-6">
                    <div class="col-md1 ">
                        <a href="single.html" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="{{url('web/images/t2.jpg')}}" alt="">
                            <div class="b-wrapper">
                                <h3 class="b-animate b-from-top top-in1   b-delay03 ">
                                    <span>Lorem</span>
                                </h3>
                            </div>
                        </a>

                    </div>
                    <div class="col-md2">
                        <div class="col-md-6 men1">
                            <a href="single.html" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="{{url('web/images/t3.jpg')}}" alt="">
                                <div class="b-wrapper">
                                    <h3 class="b-animate b-from-top top-in2   b-delay03 ">
                                        <span>Lorem</span>
                                    </h3>
                                </div>
                            </a>

                        </div>
                        <div class="col-md-6 men2">
                            <a href="single.html" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="{{url('web/images/t4.jpg')}}" alt="">
                                <div class="b-wrapper">
                                    <h3 class="b-animate b-from-top top-in2   b-delay03 ">
                                        <span>Lorem</span>
                                    </h3>
                                </div>
                            </a>

                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!---->
        <div class="content-bottom">
            <ul>
                <li><a href="#"><img class="img-responsive" src="{{url('web/images/lo.png')}}" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="{{url('web/images/lo1.png')}}" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="{{url('web/images/lo2.png')}}" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="{{url('web/images/lo3.png')}}" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="{{url('web/images/lo4.png')}}" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="{{url('web/images/lo5.png')}}" alt=""></a></li>
                <div class="clearfix"> </div>
            </ul>
        </div>
    </div>
@endsection