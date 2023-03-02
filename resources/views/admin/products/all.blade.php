@extends('layouts.admin.master')
@section('content')
    <div style="margin-right: 300px; margin-top: 50px;">
        <h3 style="display: inline-block">محصولات</h3>
        <a href="{{route('admin-panel.products.create')}}">
            <button class="btn-style">افزودن محصول</button>
        </a>
    </div>


    @include('errors.master')
    <div style="margin-right: 300px; margin-left: 50px;margin-top: 20px;
     box-shadow: 0px 0px 10px #dcdcdc; border-radius: 5px;">

        <div style="padding: 10px;">
            <h5>لیست محصولات</h5>

        </div>

        <table class="table">
            <thead>
            <tr style="background-color:#EFF1F9">
                <th scope="col">ایدی</th>
                <th scope="col">عنوان</th>
                <th scope="col">دسته بندی</th>
                <th scope="col">مالک طرح</th>
                <th scope="col">توضیحات</th>
                <th scope="col">لینک دمو</th>
                <th scope="col">لینک دانلود</th>
                <th scope="col">قیمت</th>
                <th scope="col">تاریخ ایجاد</th>
                <th scope="col">عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>
                        <img src="/{{$product->thumbnail_url}}" class="product-img" style="width: 50px;height: 50px;display: block">
                        {{$product->title}}
                    </td>
                    <td>{{$product->category->title}}</td>
                    <td>{{$product->owner->name}}</td>
                    <td>{!! substr($product->description,0,30) !!}</td>
                    <td>
                        <a href="{{route('admin-panel.products.downloadDemo',$product->id)}}" class="btn btn-default " title="لینک دمو">
                            <i class="fa fa-link"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{route('admin-panel.products.downloadSource',$product->id)}}" class="btn btn-default " title="لینک دانلود">
                            <i class="fa fa-link"></i>
                        </a>
                    </td>
                    <td>{{$product->price}}تومان</td>
                    <td>{{$product->created_at}}</td>
                    <td>

                        <a href="{{route('admin-panel.products.edit',$product->id)}}" class="btn btn-default">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{route('admin-panel.products.delete',$product->id)}}"method="post">
                            @csrf
                            @method('delete')
                            <button href="#" class="btn btn-default">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>


                    </td>

                    {{--                            <form action="{{route('admin-panel.categories.delete',$category->id)}}"--}}
                    {{--                                  style="display: inline-block" method="POST">--}}
                    {{--                                @csrf--}}
                    {{--                                @method('delete')--}}
                    {{--                                <button type="submit" class="operation" style="border: 1px solid #dcdcdc;">--}}
                    {{--                                    <i class="fa fa-trash"></i>--}}
                    {{--                                </button>--}}
                    {{--                            </form>--}}
                    {{--                            <form action="{{route('admin-panel.categories.edit',$category->id)}}"--}}
                    {{--                                  style="display: inline-block" method="GET">--}}
                    {{--                                <button type="submit" class="operation" style="border: 1px solid #dcdcdc;">--}}
                    {{--                                    <i class="fa fa-edit"></i>--}}
                    {{--                                </button>--}}
                    {{--                            </form>--}}

                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
        <div style="padding-right: 200px;" class="d-flex justify-content-center">
            {{$products->links()}}
        </div>
@endsection
