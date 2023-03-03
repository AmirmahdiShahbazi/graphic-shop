<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\StoreRequest;
use App\Models\User;

class UsersController extends Controller
{
    public function all()
    {
        $users=User::paginate(7);
        return view('admin.users.all',compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');

    }

    public function store(StoreRequest $request)
    {

    }
}
