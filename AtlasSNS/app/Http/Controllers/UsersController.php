<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(Request $request)
    {

        $search = $request->input('search');
        $username = $request->input('username');
        $query = User::query();

         if(!empty($search)) {
            $query->where('username', 'LIKE', "%{$search}%");

         $username = $query->get();
        return view('users.search');
    }
}
    public function alluser(){
        $username = User::latest()->get();
        return view('users.search',compact('username'));
    }
}
