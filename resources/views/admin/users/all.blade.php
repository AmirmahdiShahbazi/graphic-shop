@extends('layouts.admin.master')
@section('content')
    <div style="margin-right: 300px; margin-top: 50px;">
        <h3 style="display: inline-block">کاربران</h3>
        <a href="{{route('admin-panel.category.create')}}">
            <button class="btn-style">افزودن کاربر جدید</button>
        </a>
    </div>
    @include('errors.master')
    <div style="margin-right: 300px; margin-left: 50px;margin-top: 20px;
     box-shadow: 0px 0px 10px #dcdcdc; border-radius: 5px;">
        <div style="padding: 10px;">
            <h5>لیست کاربران</h5>

        </div>
        <table class="table">
            <thead>
            <tr style="background-color:#EFF1F9">
                <th scope="col">ایدی</th>
                <th scope="col">نام و نام خانوادگی</th>
                <th scope="col">ایمیمل</th>
                <th scope="col">موبایل</th>
                <th scope="col">نقش</th>
                <th scope="col">تاریخ عضویت</th>
                <th scope="col">عملیات </th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->mobile}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>

                        <form action=""
                              style="display: inline-block" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="operation" style="border: 1px solid #dcdcdc;">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        <form action=""
                              style="display: inline-block" method="GET">
                            <button type="submit" class="operation" style="border: 1px solid #dcdcdc;">
                                <i class="fa fa-edit"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
    <div style="padding-right: 200px;" class="d-flex justify-content-center">
        {{$users->links()}}
    </div>
@endsection
