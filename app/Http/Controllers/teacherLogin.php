<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Teachers;

class teacherLogin extends Controller
{


    

    public function index()
    {
        return view('select');
    }



// // ADMIN AUTHENTICATION------------------------------------------------------------------
    public function login()
    {
        return view('teacherLogin');
    }

    public function authenticate(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $teacher = DB::table('teachers')->where('email', $email)->first();
        $password = DB::table('teachers')->where('password', $password)->first();

		if ($teacher) {
			if ($password) {
				// return response("Success");
	            $teacherId = $teacher->t_id;
				// dd($teacher);
				// dd($teacherId);
	            return redirect()->route('teacher.classRooms', ['t_id' => $teacherId]);
			} else 
				return response("Incorrect Password");

        }

        else{
            return response('User not found', 404);
        }
        
    }



// // RESISTER----------------------------------------------------------------------------------------
    public function register()
    {
        return view('teacherRegister');
    }
    public function store(Request $request)
    {

        $teacher = new Teachers();
        $teacher->name = $request->input('Name');
        $teacher->password = $request->input('password');
        $teacher->email = $request->input('email');
        
        $teacher->save();
        return redirect()->route('teacher.login');
    }
}
