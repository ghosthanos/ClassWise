<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;

class eventCreator extends Controller
{


    

    public function index()
    {
        return view('select');
    }



// ADMIN AUTHENTICATION------------------------------------------------------------------
    public function login()
    {
        return view('adminLogin');
    }

    public function authenticate(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = DB::table('users')->where('email', $email)->first();
        $password = DB::table('users')->where('password', $password)->first();

        if ($user && $password) {
            $userId = $user->id;
            return redirect()->route('admin.event', ['id' => $userId]);
        }

        else{
            return response('User not found', 404);
        }
        
    }



// RESISTER----------------------------------------------------------------------------------------
    public function register()
    {
        return view('adminRegester');
    }
    public function store(Request $request)
    {

        $user = new Users();
        $user->name = $request->input('Name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role_id = "1";
        
        $user->save();
        return redirect()->route('admin.login');
    }
}
