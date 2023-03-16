@extends('layouts.frontend.master')
@section('content')

    <div class="main-menu" style="margin-bottom: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li>
                            <a href="{{route('home.products.all')}}" class="category-btn {{!isset($category_id)?'selected':''}}">همه ی دسته بندی ها</a>
                        </li>
                        @foreach($categories as $category)
                        <li>
                            <a href="{{route('home.filterByCategory',$category->id)}}" class="category-btn {{isset($category_id)&&$category->id==$category_id?'selected':''}}" >{{$category->title}}</a>
                        </li>
                        @endforeach
                        <ul style="float: left">
                            <li>
                                <a href="#" style="margin-left: 20px;">مرتب سازی بر اساس</a>
                                <ul >
                                    <li><a href="?filter=orderby&action=default"> پیش فرض</a></li>
                                    <li><a href="?filter=orderby&action=newest">جدید ترین</a></li>
                                    <li><a href="?filter=orderby&action=lowtohigh">قیمت: کم به زیاد</a></li>
                                    <li><a href="?filter=orderby&action=hightolow">قیمت: زیاد به کم</a></li>

                                </ul>
                            </li>
                        </ul>
                        <ul style="float: left">
                            <li>
                                <a href="#" style="margin-left: 20px;">قیمت</a>
                                <ul >
                                    <li><a href="?filter=price&action=all">همه</a></li>
                                    <li><a href="?filter=price&action=filter&value=10to100">10الی 100 هزار تومان</a></li>
                                    <li><a href="?filter=price&action=filter&value=101to200">101الی 200 هزار تومان</a></li>
                                    <li><a href="?filter=price&action=filter&value=201to300">201الی 300 هزار تومان</a></li>

                                    <li><a href="#">سایر</a></li>
                                </ul>
                            </li>
                        </ul>
                            
                        </ul>

                    </ul>

                </div>

            </div>

        </div>

    </div>
    </div>

    <!---------------------------------->
    @include('errors.master')
          <div class="container">
             <div class="row">
                 @foreach($products as $product)
                <div class="col-md-4 category{{$product->category_id}}" >
                   <div class="blog-content">
                      <figure>
                         <img src="/{{$product->thumbnail_url}}" class="w-100">
                      </figure>
                      <h5><i class="fa fa-title"></i>{{$product->title}}</h5>
                      <p>{{substr($product->description,0,50)}}...</p>
                      <ul>
                         <li><i class="fa fa-bars"></i>دسته بندی :{{$product->category->title}}</li>
                         <li><i class="fa fa-calendar-o"></i>ایجاد شده در : {{$product->created_at}}</li>
                      </ul>
                      <a href="{{route('home.show',$product->id)}}" class="mybtn"><i class="fa fa-continuous"></i>ادامه مطلب&raquo;</a>
                   </div>
                </div>

                 @endforeach
             </div>
          </div>
@endsection
