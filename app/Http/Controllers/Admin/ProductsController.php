<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\Products\StoreRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Utilities\ImageUploader;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class ProductsController extends Controller
{
    public function create()
    {
        $categories=Category::all();
        return view('admin.products.create',compact('categories'));
    }

    public function store(StoreRequest $request )
    {
        try{
            $validatedData = $request->validated();
            $admin = User::where('email', 'admin@gmail.com')->first();
            $created = Product::create([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'category_id' => $validatedData['category_id'],
                'thumbnail_url' => $validatedData['thumbnail_url'],
                'demo_url' => $validatedData['demo_url'],
                'source_url' => $validatedData['source_url'],
                'owner_id' => $admin->id,
            ]);
            $basePath = 'products/' . $created->id . '/';
            $sourcePath=$basePath.'source_url_'.$validatedData['source_url']->getClientOriginalName();
            $images = [
                'thumbnail_url' => $validatedData['thumbnail_url'],
                'demo_url' => $validatedData['demo_url'],
            ];
            $imagePaths=ImageUploader::multipleUpload($images, $basePath);
            ImageUploader::upload($validatedData['source_url'],$sourcePath,'local_storage');
            $updated=$created->update([
                'thumbnail_url'=>$imagePaths['thumbnail_url'],
                'demo_url'=>$imagePaths['demo_url'],
                'source_url'=>$sourcePath
            ]);
            if(!$updated){
                throw new \Exception('محصول ساخته نشد');
            }
            return back()->with('success','محصول ساخته شد');
        }catch (Exception $e){
            return back()->with('failed',$e->getMessage());
        }
    }
}
