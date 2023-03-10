@php use Illuminate\Support\Facades\Cookie; @endphp
@extends('layouts.frontend.master')
@section('content')

    <div style="margin-right: 500px;">
        @include('errors.master')
    </div>
                             

    <div class="content" style="border: none; background-color:#FBFBFB;">
     @if(is_null(json_decode(Cookie::get('basket'),true)))
    <div class="alert alert-warning" style="margin-left: 200px;margin-bottom:30px;">سبد خرید شما خالی است</div> 
    @else 
        <h1>سبد خرید</h1>


        <table class="items">
            <thead>
            <!-- start table head -->
            <tr>
                <th>نام محصول</th>
                <th>قیمت</th>
                <th>عملیات</th>

            </tr>
            <!-- end table head -->
            </thead>

            <tbody>
            <!-- start table body --> 
            @foreach(json_decode(Cookie::get('basket'),true) as $id =>$value)
                <tr>
                    <!-- start item one -->
                    <td>
                        <div class="item">
                            <a href="{{route('home.show',$id)}}">
                            <div class="item-front">
                                <img src="/{{$value['demo_url']}}"/>
                            </div>
                            <div class="item-back">
                                <img src="/{{$value['demo_url']}}"/>
                            </div>
                            </a>
                        </div>
                        <p style="width: 0;float: bottom;display: block">{{$value['title']}}<br/></p>

                    </td>
                    <td><p style="float: inherit">{{$value['price']}}</p></td>
                    <td>
                        <a href="{{route('home.basket.removeFromBasket',$id)}}" class="remove">حذف</a>
                    </td>
                    <!-- end item one -->
                </tr>
            @endforeach

            
            <!-- end table body -->
        </tbody>
        </table>
        <div class="cost" style="position: absolute; top:250px;">
            <h2>مشصخات کاربر</h2>
            <input type="text" placeholder="نام و نام خانوادگی" style="margin-left: 42px;  margin-top: 10px;">
            <input type="text" placeholder="شماره تلفن" style="margin-left: 42px;  margin-top: 10px;">
            <input type="text" placeholder="ایمیل" style="margin-left: 42px;  margin-top: 10px;">

            <table class="pricing">
                <tbody>
                <tr>
                    <td>قیمت کل</td>
                    <td class="subtotal">
                        @if (is_null(json_decode(Cookie::get('basket'),true)))
                        0 تومان
                        @else
                        {{array_sum(array_column(json_decode(Cookie::get('basket'),true),'price'))}} تومان
                        @endif
                    </td>
                </tr>

                </tbody>
            </table>
            <a class="cta" href="#">خرید</a>
        </div>
        @endif

        <!-- start checkout list -->
 <!-- end checkout list -->
    </div> <!-- End Content -->

@endsection
