<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Events;
use App\Models\Ticket;

class eventUser extends Controller
{
    /// USER AUTHENTICATION------------------------------------------------------------------
    public function login()
    {
        return view('userLogin');
    }

    public function authenticate(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = DB::table('users')->where('email', $email)->first();
        $password = DB::table('users')->where('password', $password)->first();

        if ($user && $password) {
            $userId = $user->id;
            return redirect()->route('user.event', ['id' => $userId]);
        }

        else{
            return response('User not found', 404);
        }
        
    }

    //DISPLAY----------------------------------------------------------------------------------------
    public function show(string $id)
    {
        $events = DB::table('events')->get();
        $user = DB::table('users')->where('id', $id)->first();
        return view('userView', compact('events','user'));
    }



// RESISTER----------------------------------------------------------------------------------------
    public function register()
    {
        return view('userRegester');
    }
    public function store(Request $request)
    {

        $user = new Users();
        $user->name = $request->input('Name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role_id = "2";
        
        $user->save();
        return redirect()->route('user.login');
    }


//BOOKING
    public function viewbook($id,$eid)
        {
            $event1 = DB::table('events')->where('id', $eid)->first();
            return view('bookEvents', compact('event1'));
        }
    public function book(Request $request, $id ,$eid)
        {

            // Retrieve the event by ID
            $event = DB::table('events')->where('id', $eid)->first();

            // Perform additional validation or checks if needed

            // Create a new ticket
            $ticket = new Ticket();
            $ticket ->amount = $request->input('amount');
            $ticket ->price = $ticket->price = $event->ticket_price * $ticket->amount;;
            $ticket ->event_id = $eid;
            $ticket ->user_id = $id;

            // Associate the ticket with the event
            $ticket->save();

            // You can also associate the ticket with the user who made the booking
            // $ticket->user_id = auth()->id(); // Example if using Laravel's built-in authentication
            // $ticket->save();

            // Redirect or return a response as needed
            return redirect()->route('user.event', ['id' => $id])->with('success', 'Ticket booked successfully');
    }
//TICKET VIEWING--------------------------------------------------------------------------------------------------

    public function viewticket($id)
    {
        $tickets = DB::table('tickets')
        ->join('events', 'tickets.event_id', '=', 'events.id')
        ->select('tickets.*', 'events.title as event_title')
        ->get();

// Now, $tickets should contain the event title in each ticket object.

        return view('showTicket', ['tickets' => $tickets]);
    }



//TICKET cancelling--------------------------------------------------------------------------------------------------
    public function destroy1($id,$tid)
    {
        
        $deleted = DB::table('tickets')->where('id', $tid)->delete();

        
        if ($deleted) {
            return redirect()->route('user.ticket', ['id' => $id])->with('success', 'Event deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete the event.');
        }
    }
}



//TICKET cancelling--------------------------------------------------------------------------------------------------
