@extends('layouts.admin.master')
@section('content')
    <div style="margin-right: 300px; margin-top: 50px;">
        <h3 style="display: inline-block">محصولات/افزودن</h3>
        <a href="{{route('admin-panel.products.all')}}">
            <button class="btn-style">بازگشت به صفحه محصولات</button>
        </a>
    </div >
    @include('errors.master')
    <div style="margin-right: 300px;margin-left: 50px;margin-top: 30px;background-color:#F0F6FF;box-shadow: 0px 0px  10px #dcdcdc; border-radius: 7px;">
        <form action="{{route('admin-panel.products.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>عنوان</label>
                            <input type="text" name="title" class="form-control" placeholder="عنوان را وارد کنید">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>دسته بندی</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>قیمت</label>
                            <input type="text" name="price" class="form-control" placeholder="قیمت را وارد کنید">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>تصویر شاخص</label>
                            <input type="file" name="thumbnail_url" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>تصویر محصول</label>
                            <input type="file" name="demo_url" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>سورس اصلی محصول</label>
                            <input type="file" name="source_url" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label style="display: block">توضیحات</label>
                    <textarea name="description" id="editor" > لطفا متن مورد نظر خود را وارد کنید</textarea>
                </div>
                <button type="submit" class="btn btn-primary float-left">ذخیره کردن</button>
            </div>
        </form>
    </div>

@endsection
