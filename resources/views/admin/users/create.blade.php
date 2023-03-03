@extends('layouts.admin.master')
@section('content')

    <div style="margin-right: 300px; margin-top: 50px;">
        <h3 style="display: inline-block">کاربران / افزودن</h3>
        <a href="{{route('admin-panel.users.all')}}">
            <button class="btn-style">بازگشت به صفحه کاربران</button>
        </a>
    </div>
    @include('errors.master')
    <div
        style="margin-right: 300px;margin-left: 50px;margin-top: 30px;background-color:#F0F6FF;box-shadow: 0px 0px  10px #dcdcdc; border-radius: 7px;">
        <form action="{{route('admin-panel.users.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>نام و نام خانوادگی</label>
                            <input type="text" name="name" class="form-control"
                                   placeholder="نام و نام خانوادگی را وارد کنید">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ایمیل</label>
                            <input type="text" name="email" class="form-control" placeholder="ایمیل را وارد کنید">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>شماره تلفن</label>
                            <input type="text" name="mobile" class="form-control" placeholder="شماره تلفن را وارد کنید">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>نقش</label>
                            <select class="form-control" name="role">

                                <option value="user">کاربر</option>
                                <option value="admin">ادمین</option>


                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-left">ذخیره کردن</button>
            </div>
        </form>
    </div>

@endsection
