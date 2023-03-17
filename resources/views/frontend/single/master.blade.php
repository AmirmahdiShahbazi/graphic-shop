@extends('layouts.frontend.master')
@section('content')

    @include('errors.master')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="single-box">
                    <div class="row">
                        <div class="col-md-7">
                            <h4 >{{$product->title}}</h4>

                            <hr>
                            <div class="row" style="font-size: 15px;alignment: right">
                                {{$product->description}}
                            </div>
                            <hr>
                            <h3>{{$product->price}} تومان</h3>
                            <div class="btn-single">
                                <a href="{{route('home.addToBasket',$product->id)}}"><i class="fa fa-cart-plus"></i>خرید</a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="single-img">
                                <figure>
                                    <img src="/{{$product->thumbnail_url}}" class="w-100 s-img"
                                         data-zoom-image="/frontend/img/single-tablet.jpg">
                                </figure>
                            </div>
                            <div class="single-img-slider">
                                <div class="owl-carousel owl-theme ov-single">
                                    <div class="item">
                                        <a data-fancybox="gallery" href="/frontend/img/single-tablet.jpg"><img
                                                src="//single-tablet.jpg" class="w-100"></a>
                                    </div>
                                    <div class="item">
                                        <a data-fancybox="gallery" href="/img/single-tablet.jpg"><img
                                                src="/frontend/img/single-tablet.jpg" class="w-100"></a>
                                    </div>
                                    <div class="item">
                                        <a data-fancybox="gallery" href="/img/single-tablet.jpg"><img
                                                src="/frontend/img/single-tablet.jpg" class="w-100"></a>
                                    </div>
                                    <div class="item">
                                        <a data-fancybox="gallery" href="/img/single-tablet.jpg"><img
                                                src="/frontend/img/single-tablet.jpg" class="w-100"></a>
                                    </div>
                                    <div class="item">
                                        <a data-fancybox="gallery" href="/img/single-tablet.jpg"><img
                                                src="/frontend/img/single-tablet.jpg" class="w-100"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">

        @foreach($similarProducts as $similarProduct)
    <div class="col-md-4" >
        <div class="blog-content">
            <figure>
                <img src="/{{$similarProduct->thumbnail_url}}" class="w-100">
            </figure>
            <h5><i class="fa fa-title"></i>{{$product->title}}</h5>
            <p>{{substr($similarProduct->description,0,50)}}...</p>
            <ul>
                <li><i class="fa fa-bars"></i>دسته بندی :{{$similarProduct->category->title}}</li>
                <li><i class="fa fa-calendar-o"></i>ایجاد شده در : {{$similarProduct->created_at}}</li>
            </ul>
            <a href="{{route('home.show',$product->id)}}" class="mybtn"><i class="fa fa-continuous"></i>ادامه مطلب&raquo;</a>
        </div>
    </div>
    @endforeach

    </div>


@endsection
