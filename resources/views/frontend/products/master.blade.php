@extends('layouts.frontend.master')
@section('content')
     <!---------------------------------->
          <div class="container">
             <div class="row">
                 @foreach($products as $product)
                <div class="col-md-4">
                   <div class="blog-content">
                      <figure>
                         <img src="{{$product->thumbnail_url}}" class="w-100">
                      </figure>
                      <h5><i class="fa fa-title"></i>{{$product->title}}</h5>
                      <p>{{substr($product->description,0,50)}}...</p>
                      <ul>
                         <li><i class="fa fa-bars"></i>دسته بندی :{{$product->category->title}}</li>
                         <li><i class="fa fa-calendar-o"></i>ایجاد شده در : {{$product->created_at}}</li>
                      </ul>
                      <a href="#" class="mybtn"><i class="fa fa-continuous"></i>ادامه مطلب&raquo;</a>
                   </div>
                </div>

                 @endforeach
             </div>
          </div>
@endsection
