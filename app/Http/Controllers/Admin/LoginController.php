<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Login\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        $admin=json_decode(Cookie::get('admin'),true);
        if(!empty($admin))
        {
            $user=User::where(['email'=>$admin['email']]);
            if(!empty($user))
            {
                return redirect()->route('admin-panel.products.all');
            }

        }
        return view('admin.login.maser');
    }

    public function login(LoginRequest $request)
    {  
        
        

     
        $validatedData=$request->validated();
       
        $user=User::where(['email'=>$validatedData['email'],'role'=>'admin'])->first();
        
        if(empty($user))
        {
            return back()->with('failed','ایمیل وارد شده اشتباه است');
        }
        if(!Hash::check($validatedData['password'],$user->password))
        {
            return back()->with('failed',' پسورد وارد شده اشتباه است');
        }
        $admin=[
            'email'=>$user->email,
            'password'=>$user->password
        ];
        
        Cookie::queue('admin',json_encode($admin),200);
        return redirect()->route('admin-panel.category.all');
        
        
        
    }

}