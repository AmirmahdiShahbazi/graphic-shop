<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\StoreRequest;
use App\Http\Requests\Admin\Categories\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{


    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreRequest $request)
    {
        $validatedData=$request->validated();
        $result = Category::create([
            'slug' => $validatedData['slug'],
            'title' => $validatedData['title'],
        ]);
        if (!$result) {
            return back()->with('failed', 'دسته بندی ایجاد نشد');
        }
        return back()->with('success', 'دسته بندی با موفقیت ایجاد شد');

    }

    public function all()
    {
        $categories=Category::paginate(5);
        return view('admin.categories.all',compact('categories'));

    }

    public function delete($category_id)
    {



        $category=Category::find($category_id);
        $result=$category->delete();
        if(!$result)
            return back()->with('failed','');
        return back()->with('success','دسته بندی با موفقیت حذف شد');
    }

    public function edit($category_id)
    {
        $category=Category::find($category_id);
        return view('admin.categories.edit',compact('category'));
    }

    public function update(UpdateRequest $request,$category_id)
    {
        $validatedData=$request->validated();
        $category=Category::find($category_id);
        $result = $category->update([
            'slug' => $validatedData['slug'],
            'title' => $validatedData['title'],
        ]);
        if (!$result) {
            return back()->with('failed', 'دسته بندی بروزرسانی نشد');
        }
        return back()->with('success', 'دسته بندی با موفقیت بروزرسانی شد');

    }


}
