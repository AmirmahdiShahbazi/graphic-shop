@extends('layouts.admin.master')
@section('content')

    <div style="margin-right: 300px; margin-top: 50px;">
        <h3 style="display: inline-block">دسته بندی ها / افزودن</h3>
        <a href="{{route('admin-panel.category.all')}}">
            <button class="btn-style">بازگشت به صفحه دسته بندی ها</button>
        </a>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger" style="margin-right: 300px;margin-left: 50px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div style="margin-right: 300px;margin-left: 50px;" class="alert alert-success">{{session('success')}}</div>
    @endif
    @if(session('failed'))
        <div class="alert alert-success">{{session('failed')}}</div>
    @endif

    <form class="category-form" action="{{route('admin-panel.categories.store')}}" method="post"
          style="margin: 20px 290px 10px 50px;">
        @csrf
        <div style="display: inline-block">
            <label>نامک</label>
            <input type="text" name="slug" class="form-control" placeholder="نامک را وارد کنید"
                   style="width: 500px">
        </div>
        <div style="display: inline-block" ;>
            <label>عنوان</label>
            <input type="text" name="title" class="form-control" placeholder="عنوان را وارد کنید"
                   style="width: 500px">
        </div>
        <div class="submit-btn" style=" margin-top: 20px; ">
            <input type="submit" value="ذخیره کردن" style=" ">
        </div>

    </form>

@endsection
