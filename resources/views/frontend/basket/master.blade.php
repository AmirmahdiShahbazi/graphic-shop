@php use Illuminate\Support\Facades\Cookie; @endphp
@extends('layouts.frontend.master')
@section('content')
    <div style="margin-right: 500px;">
        @include('errors.master')
    </div>
    <div class="content" style="border: none;">
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

        <!-- start checkout list -->
        <div class="cost" style="position: absolute;">
            <h2>پیش فاکتور</h2>

            <table class="pricing">
                <tbody>
                <tr>
                    <td>قیمت کل</td>
                    <td class="subtotal">{{array_sum(array_column(json_decode(Cookie::get('basket'),true),'price'))}} تومان</td>
                </tr>

                </tbody>
            </table>
            <a class="cta" href="#">خرید</a>
        </div><!-- end checkout list -->
    </div> <!-- End Content -->

@endsection

