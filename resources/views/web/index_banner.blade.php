<div class="banner">
    <div class="container">
        <script src="{{url('web/js/responsiveslides.min.js')}}"></script>
        <script>
            $(function () {
                $("#slider").responsiveSlides({
                    auto: true,
                    nav: true,
                    speed: 500,
                    namespace: "callbacks",
                    pager: true,
                });
            });
        </script>
        <div  id="top" class="callbacks_container">
            <ul class="rslides" id="slider">
                @foreach (App\Product::where('status', true)->latest('created_at')->limit(3)->get() as $bannerProduct)
                <li>
                    <div class="banner-text">
                        <h3>{{$bannerProduct->name}}</h3>
                        <p>{{$bannerProduct->desc}}</p>
                        <a href="{{url(\Illuminate\Support\Str::slug($bannerProduct->name).'-'.$bannerProduct->id.'.html')}}">Learn More</a>
                    </div>

                </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>