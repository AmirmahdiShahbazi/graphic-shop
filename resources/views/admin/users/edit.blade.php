@extends('layouts.admin.master')
@section('content')

    <div style="margin-right: 300px; margin-top: 50px;">
        <h3 style="display: inline-block">کاربران / ویرایش</h3>
        <a href="{{route('admin-panel.users.all')}}">
            <button class="btn-style">بازگشت به صفحه کاربران</button>
        </a>
    </div>
    @include('errors.master')
    <div
        style="margin-right: 300px;margin-left: 50px;margin-top: 30px;background-color:#F0F6FF;box-shadow: 0px 0px  10px #dcdcdc; border-radius: 7px;">
        <form action="{{route('admin-panel.users.update',$user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>نام و نام خانوادگی</label>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control"
                                   placeholder="نام و نام خانوادگی را وارد کنید">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ایمیل</label>
                            <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="ایمیل را وارد کنید">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>شماره تلفن</label>
                            <input type="text" name="mobile" value="{{$user->mobile}}" class="form-control" placeholder="شماره تلفن را وارد کنید">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>نقش</label>
                            <select class="form-control" name="role">
                                <option value="user" {{$user->role=='user'?'selected':''}}>کاربر</option>
                                <option value="admin" {{$user->role=='admin'?'selected':''}}>ادمین</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-left">ذخیره کردن</button>
            </div>
        </form>
    </div>

@endsection
