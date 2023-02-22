@extends('layouts.admin.master')
@section('content')
    <div style="margin-right: 300px; margin-top: 50px;">
        <h3 style="display: inline-block">دسته بندی ها</h3>
        <a href="{{route('admin-panel.category.create')}}">
            <button class="btn-style">افزودن دسته بندی</button>
        </a>
    </div>
    <div style="margin-right: 300px; margin-left: 50px;margin-top: 20px;
     box-shadow: 0px 0px 10px #dcdcdc; border-radius: 5px;">
        <div style="padding: 10px;">
            <h5>لیست دسته بندی ها</h5>

        </div>
        <table class="table">
            <thead>
            <tr style="background-color:#EFF1F9">
                <th scope="col">ایدی</th>
                <th scope="col">نامک</th>
                <th scope="col">تاریخ ایجاد</th>
                <th scope="col">عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->slug}}</td>
                <td>{{$category->title}}</td>
                <td>
                    <button class="operation"  style="border: 1px solid #dcdcdc;">
                    <i class="fa fa-trash"></i>
                    </button>
                    <button class="operation" style="border: 1px solid #dcdcdc;" >
                        <i class="fa fa-edit"></i>
                    </button>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
