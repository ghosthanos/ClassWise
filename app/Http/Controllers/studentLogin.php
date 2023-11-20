<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Teachers;
use App\Models\Students;
use App\Models\Classinfos;

class studentLogin extends Controller
{


    

    public function index()
    {
        return view('select');
    }



// // ADMIN AUTHENTICATION------------------------------------------------------------------
    public function login()
    {
        return view('studentLogin');
    }

    public function authenticate(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $student = DB::table('students')->where('email', $email)->first();
        $password = DB::table('students')->where('password', $password)->first();
		if ($student) {
			if ($password) {
				// return response("Success");
	            $studentId = $student->s_id;
				$studentClassId = $student->c_id;
				// dd($studentId, $studentClassId);
	            return redirect()->route('student.subjects.show', ['s_id' => $studentId, 'c_id' => $studentClassId]);
				// dd($studentId);
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
        return view('studentRegister');
    }
    public function store(Request $request)
    {

        $student = new Students();

        $student->name = $request->input('Name');

		$classFound = DB::table('classinfos')->where('name',$request->classInfo)->first();

		// dd($classFound);
		if (is_null($classFound)) {
			$classInfo = new Classinfos();
			$classInfo->name = $request->classInfo;

			$classInfo->save();

			$classFound = DB::table('classinfos')->where('name', $request->classInfo)->first();
		}
		$student->c_id = $classFound->c_id;

        $student->password = $request->input('password');
        $student->email = $request->input('email');
        
        $student->save();
        return redirect()->route('student.login');
    }
}
