<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\Products\StoreRequest;
use App\Http\Requests\Admin\Products\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Utilities\ImageUploader;
use Egulias\EmailValidator\Warning\IPV6MaxGroups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class ProductsController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        try {

            $validatedData = $request->validated();
            $adminCookie=json_decode(Cookie::get('admin'),true);
            $admin = User::where('email', $adminCookie['email'])->first();
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
            if (!$this->uploadImage($created, $validatedData)) {
                throw new \Exception('محصول ساخته نشد');
            }
            return back()->with('success', 'محصول ساخته شد');
        } catch (Exception $e) {
            return back()->with('failed', $e->getMessage());
        }

    }


    private function uploadImage($createdProduct, $validatedData)
    {

        $basePath = 'products/' . $createdProduct->id . '/';
        $data = [];
        if (isset($validatedData['demo_url'])) {
            $demoPath = $basePath . 'demo_url' . '_' . $validatedData['demo_url']->getClientOriginalName();
            ImageUploader::upload($validatedData['demo_url'], $demoPath);
            $data += ['demo_url' => $demoPath];


        }

        if (isset($validatedData['thumbnail_url'])) {
            $thumbnailPath = $basePath . 'demo_url' . '_' . $validatedData['thumbnail_url']->getClientOriginalName();
            ImageUploader::upload($validatedData['thumbnail_url'], $thumbnailPath);
            $data += ['thumbnail_url' => $thumbnailPath];
        }


        if (isset($validatedData['source_url'])) {
            $sourcePath = $basePath . 'source_url' . '_' . $validatedData['source_url']->getClientOriginalName();
            ImageUploader::upload($validatedData['source_url'], $sourcePath, 'local_storage');
            $data += ['source_url' => $sourcePath];
        }
        $updated = $createdProduct->update($data);
        if (!$updated) {
            return false;
        }
        return true;


    }

    public function update(UpdateRequest $request, $product_id)
    {
        try {
            $validatedData = $request->validated();

            $product = Product::find($product_id);
            $product->update([
                'title' => $validatedData['title'],
                'price' => $validatedData['price'],
                'description' => $validatedData['description'],
                'category_id' => $validatedData['category_id'],
            ]);
            if (!$this->uploadImage($product, $validatedData)) {
                throw new \Exception('محصول به روز رسانی نشد');
            }
            return back()->with('success', 'محصول به روز رسانی شد');
        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }


    }

    public function all()
    {
        $products = Product::paginate(7);
        return view('admin.products.all', compact('products'));
    }

    public function downloadDemo($demo_id)
    {
        $product = Product::find($demo_id);
        return response()->download(public_path($product->demo_url));

    }

    public function downloadSource($source_id)
    {
        $product = Product::find($source_id);
        return response()->download(storage_path('app/local_storage/' . $product->source_url));

    }

    public function delete($product_id)
    {
        $deleted = Product::where(['id' => $product_id])->delete();
        if (!$deleted) {
            return back()->with('failed', 'محصول حذف نشد');
        }
        return back()->with('success', 'محصول حذف شد');
    }

    public function edit($product_id)
    {
        $categories = Category::all();
        $product = Product::find($product_id);
        return view('admin.products.edit', compact('product', 'categories'));


    }


}
