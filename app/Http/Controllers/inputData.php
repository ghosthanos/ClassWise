<?php

namespace App\Http\Controllers;
use App\Models\Events;
use App\Models\Users;
use App\Models\Data;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\ClassInfo;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
// namespace App\Http\Controllers\inputData;

class inputData extends Controller
{
    //
	public function index()
    {
		return view('inputData');
    }

	public function upload(Request $request) {
		// $comment = $request->input('comment');
		// console.log($comment);
		// dd(ini_get('upload_max_filesize'), ini_get('post_max_size'));
		ini_set('memory_limit', '1024M'); // Set the memory limit to 256 megabytes (adjust as needed)

		$data = new Data();
		$data->msg = $request->input('comment');
		$data->file = $request->input('file');
		// $data->file_content = $request->
		// dd($request->all());
		if ($request->hasFile('file') && $request->file('file')->isValid()) {
			$file = $request->file('file');
			// dd($file);
			$data->file = $file->getClientOriginalName();
			$data->file_content = file_get_contents($file->getRealPath());
			// dd($data);
			// $file->storeAs('uploads', $file->getClientOriginalName());
		}
		$data->save();

		return redirect()->route('inputData.index');
	}

	public function dataDisplay() {
		$datas = DB::table('data')->get();
		$studentDatas = DB::table('student')->get();
		$teacherDatas = DB::table('teacher')->get();
		// dd($studentDatas);
	    return view('inputData', compact('datas', 'studentDatas', 'teacherDatas'));
		// return redirect()->route('inputData.display', ['datas' => $datas]);	
	}
}
