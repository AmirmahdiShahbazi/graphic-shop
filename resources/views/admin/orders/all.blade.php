@extends('layouts.admin.master')
@section('content')
    <div style="margin-right: 300px; margin-top: 50px;">
        <h3 style="display: inline-block">محصولات</h3>
{{--        <a href="{{route('admin-panel.products.create')}}">--}}
{{--            <button class="btn-style">افزودن محصول</button>--}}
{{--        </a>--}}
    </div>


    @include('errors.master')
    <div style="margin-right: 300px; margin-left: 50px;margin-top: 20px;
     box-shadow: 0px 0px 10px #dcdcdc; border-radius: 5px;">

        <div style="padding: 10px;">
            <h5>لیست سفارشات</h5>

        </div>

        <table class="table">
            <thead>
            <tr style="background-color:#EFF1F9">
                <th scope="col">کاربر</th>
                <th scope="col">مبلغ</th>
                <th scope="col">کد رهگیری</th>
                <th scope="col">وضعیت</th>
                <th scope="col">تاریخ</th>
                <th scope="col">مشاهده سفارش</th>

            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->amount}}</td>
                    <td>{{$order->ref_code}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>
                        <a href="" class="btn btn-default " title="محصولات">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
        <div style="padding-right: 200px;" class="d-flex justify-content-center">
            {{$orders->links()}}
        </div>
@endsection
