<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class eventController extends Controller
{


//CREATING EVENT------------------------------------------------------------------
    public function create()
    {
        return view('eventcreate');
    }
    public function store( $id, Request $request)
    {

        $event = new Events();
        $event ->title = $request->input('eventName');
        $event ->start_time = $request->input('eventDate');
        $event ->venue = $request->input('venue');
        $event ->description = $request->input('description');
        $event ->ticket_price = $request->input('price');

        $user = Users::find($id);

        $event->user_id = $user->id;
        $event->save();

        return redirect()->route('admin.event', ['id' => $id]);
    }

//DISPLAY----------------------------------------------------------------------------------------
    public function show(string $id)
    {
        $events = DB::table('events')->where('user_id', $id)->get();
        return view('viewevent', compact('events','id'));
    }


//EDITING--------------------------------------------------------------------------------------------------------------
    public function edit($id, $eid)
    {
    $events = DB::table('events')->where('id', $eid)->first();
    return view('editEvent', compact('events'));
    }

    public function update($id, Request $request, $eid)
    {
        DB::table('events')
        ->where('id', $eid)
        ->update([
            'title' => $request->input('eventName'),
            'start_time' => $request->input('eventDate'),
            'venue' => $request->input('venue'),
            'description' => $request->input('description'),
            'ticket_price' => $request->input('price'),
            'user_id' => $id,
        ]);
    return redirect()->route('admin.event', ['id' => $id]);
    }




//DELETING--------------------------------------------------------------------------------------------------------------
    public function destroy($id, $eid)
    {
        
        $deleted = DB::table('events')->where('id', $eid)->delete();
    
        
        if ($deleted) {
            return redirect()->route('admin.event', ['id' => $id])->with('success', 'Event deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete the event.');
        }
    }
}
