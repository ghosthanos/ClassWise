<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Subjects;
use App\Models\Users;
use App\Models\Classinfos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class classRooms extends Controller
{


//CREATING EVENT------------------------------------------------------------------
    public function create($t_id)
    {
        return view('classRoomCreate', compact('t_id'));
    } 
    public function store($t_id, Request $request)
    {

		$subject = new Subjects();
		$subject->t_id = $t_id;
		$subject->name = $request->input('subjectName');

		$c_name = $request->input('className');

		$classFound = DB::table('classinfos')->where('name', $c_name)->first();
			// dd($classFound);
		if (is_null($classFound)) {
			$classInfo = new Classinfos();
			$classInfo->name = $c_name;

			$classInfo->save();

			$classFound = DB::table('classinfos')->where('name', $c_name)->first();
		}
		// dd($classFound);
		$subject->c_id = $classFound->c_id;				// we need to change later 

		// $subject->c_id = 1;


		$subject->save();

        // $event = new Events();
        // $event ->title = $request->input('eventName');
        // $event ->start_time = $request->input('eventDate');
        // $event ->venue = $request->input('venue');
        // $event ->description = $request->input('description');
        // $event ->ticket_price = $request->input('price');

        // $user = Users::find($id);

        // $event->user_id = $user->id;
        // $event->save();
		// dd($subject);
        return redirect()->route('teacher.classRooms', ['t_id' => $t_id]);
    }

//DISPLAY----------------------------------------------------------------------------------------
    public function show($t_id)
    {
        $classRooms = DB::table('subjects')->where('t_id', $t_id)->get();
        $classinfos = DB::table('classinfos')->get();
		// dd($classRooms);
        return view('viewClassRooms', compact('classRooms','classinfos','t_id'));
    }


//EDITING--------------------------------------------------------------------------------------------------------------
    // public function edit($id, $eid)
    // {
    // $events = DB::table('events')->where('id', $eid)->first();
    // return view('editEvent', compact('events'));
    // }

    // public function update($id, Request $request, $eid)
    // {
    //     DB::table('events')
    //     ->where('id', $eid)
    //     ->update([
    //         'title' => $request->input('eventName'),
    //         'start_time' => $request->input('eventDate'),
    //         'venue' => $request->input('venue'),
    //         'description' => $request->input('description'),
    //         'ticket_price' => $request->input('price'),
    //         'user_id' => $id,
    //     ]);
    // return redirect()->route('admin.event', ['id' => $id]);
    // }




//DELETING--------------------------------------------------------------------------------------------------------------
    // public function destroy($t_id, $sub_id)
    // {
        
    //     $deleted = DB::table('events')->where('id', $eid)->delete();
    
        
    //     if ($deleted) {
    //         return redirect()->route('admin.event', ['id' => $id])->with('success', 'Event deleted successfully');
    //     } else {
    //         return redirect()->back()->with('error', 'Failed to delete the event.');
    //     }
    // }

/* show chat of respective rooms */
// public function showChats($t_id)
// {
// 	$chats = DB::table('data')->where('t_id', $t_id)->get();
// 	// dd($classRooms);
// 	return view('viewClassRooms', compact('classRooms','classinfos','t_id'));
// }

}

