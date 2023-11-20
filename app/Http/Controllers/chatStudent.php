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

class chatStudent extends Controller
{
    //
	// public function index()
    // {
	// 	return view('inputData');
    // }

	public function upload($s_id, $c_id, $sub_id, Request $request) {
		// $comment = $request->input('comment');
		// console.log($comment);
		// dd(ini_get('upload_max_filesize'), ini_get('post_max_size'));
		// ini_set('memory_limit', '1024M'); // Set the memory limit to 256 megabytes (adjust as needed)
		// dd("hello");
		// dd($sub_id);
		// dd("hello");
		$data = new Data();
		$data->msg = $request->input('comment');
		// $data->file = $request->input('file');
		// $data->file_content = $request->
		// dd($request->all());
		// if ($request->hasFile('file') && $request->file('file')->isValid()) {
		// 	$file = $request->file('file');
			// dd($file);
			// $data->file = $file->getClientOriginalName();
			// $data->file_content = file_get_contents($file->getRealPath());
			// dd($data);
			// $file->storeAs('uploads', $file->getClientOriginalName());
		// }
		$data->sub_id = $sub_id;
		$data->s_id = $s_id;
		$data->save();

		return redirect()->route('student.subject.chat', ['s_id' => $s_id, 'c_id' => $c_id, 'sub_id' => $sub_id]);
	}

	public function chatDisplay($s_id, $c_id, $sub_id) {
		// dd("hello");
		// dd($s_id, $c_id, $sub_id);
		$datas = DB::table('data')->where('sub_id', $sub_id)->get();
		$studentDatas = DB::table('students')->get();
		$teacherDatas = DB::table('teachers')->get();
		// dd($studentDatas);
	    return view('studentChatData', compact('datas', 'studentDatas', 'teacherDatas', 's_id', 'c_id', 'sub_id'));
		// return redirect()->route('inputData.display', ['datas' => $datas]);	
	}


	// public function destroy($t_id, $sub_id) {
	// 	// dd($t_id, $sub_id);
	// 	// $datas = DB::table('data')->where('sub_id', $sub_id)->get();
	// 	$deletedDatas = DB::table('data')->where('sub_id', $sub_id)->delete();
	// 	// dd($deletedDatas);
        
    //     if ($deletedDatas) {
	// 		$deletedSubject = DB::table('subjects')->where('sub_id', $sub_id)->delete();
	//         if ($deletedSubject) {
	//             return redirect()->route('teacher.classRooms', ['t_id' => $t_id])->with('success', 'Event deleted successfully');
	//         } else {
	//             return redirect()->back()->with('error', 'Failed to delete the subject.');
	//         }
    //     } else {
    //         return redirect()->back()->with('error', 'Failed to delete the datas of subject.');
    //     }
		// $studentDatas = DB::table('students')->get();
		// $teacherDatas = DB::table('teachers')->get();
		// // dd($studentDatas);
	    // return view('teacherChatData', compact('datas', 'studentDatas', 'teacherDatas', 't_id', 'sub_id'));
		// // return redirect()->route('inputData.display', ['datas' => $datas]);	
	// }
}
