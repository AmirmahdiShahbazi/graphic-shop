@extends('layouts.admin.master')
@section('content')
    <div style="margin-right: 300px; margin-top: 50px;">
        <h3 style="display: inline-block">پرداخت ها</h3>
{{--        <a href="{{route('admin-panel.products.create')}}">--}}
{{--            <button class="btn-style">افزودن محصول</button>--}}
{{--        </a>--}}
    </div>


    @include('errors.master')
    <div style="margin-right: 300px; margin-left: 50px;margin-top: 20px;
     box-shadow: 0px 0px 10px #dcdcdc; border-radius: 5px;">

        <div style="padding: 10px;">
            <h5>لیست پرداخت ها</h5>

        </div>

        <table class="table">
            <thead>
            <tr style="background-color:#EFF1F9">
                <th scope="col">تاریخ</th>
                <th scope="col">قیمت</th>
                <th scope="col">ایدی سفارش</th>
                <th scope="col">کاربر</th>
                <th scope="col">درگاه پرداخت</th>
                <th scope="col">تراکنش</th>
                <th scope="col">کد رهگیری</th>

            </tr>
            </thead>
            <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{$payment->created_at}}</td>
                    <td>{{$payment->order->amount}}</td>
                    <td>{{$payment->order_id}}</td>
                    <td>{{$payment->status}}</td>
                    <td>{{$payment->oder->user->name}}</td>
                    <td>{{$payment->gateway}}</td>
                    <td>{{$payment->status}}</td>
                    <td>{{$payment->res_id}}</td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
        <div style="padding-right: 200px;" class="d-flex justify-content-center">
            {{$payments->links()}}
        </div>
@endsection
