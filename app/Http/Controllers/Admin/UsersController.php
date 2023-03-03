<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\StoreRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Models\User;

class UsersController extends Controller
{
    public function all()
    {
        $users = User::paginate(7);
        return view('admin.users.all', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');

    }

    public function store(StoreRequest $request)
    {
        $validatedDate = $request->validated();


        $created = User::create([
                'name' => $validatedDate['name'],
                'mobile' => $validatedDate['mobile'],
                'email' => $validatedDate['email'],
                'role' => $validatedDate['role'],
            ]
        );
        if (!$created) {
            return back()->with('failed', 'محصول ساخته نشد');
        }
        return back()->with('success', 'محصول ساخته شد');


    }

    public function delete($user_id)
    {
        $user = User::find($user_id)->delete();
        if (!$user) {
            return back()->with('failed', 'محصول حذف نشد');
        }
        return back()->with('success', 'محصول حذف شد');


    }

    public function update(UpdateRequest $request,$user_id)
    {
        $validatedData=$request->validated();
        $updated=User::find($user_id)->update([
            'name'=>$validatedData['name'],
            'email'=>$validatedData['email'],
            'mobile'=>$validatedData['mobile'],
            'role'=>$validatedData['role'],
        ]);
        if(!$updated){
            return back()->with('failed','محصول بروزرسانی نشد');
        }
        return back()->with('success','محصول بروزرسانی شد');


    }

    public function edit($user_id)
    {
        $user=User::find($user_id);
        return view('admin.users.edit',compact('user'));

    }
}
