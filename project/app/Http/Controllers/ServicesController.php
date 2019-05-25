<?php

namespace App\Http\Controllers;

use App\Citizen;
use App\Complaint;
use App\Tickets;
use Illuminate\Http\Request;
use Stevebauman\Location\Location;

class ServicesController extends Controller
{

    public function indexTickets()
    {

        return view('services.tickets');
    }
    public function showTickets()
    {
        $tickets = Tickets::where([
           ['license_number','searchValue'],
           ['chassis_number','searchValue1']
       ])->get();
        return view('services.tickets')->with('tickets', $tickets);
    }
    public function indexPeople()
    {
        $people = Citizen::where('wanted', 1)->paginate(9);
        return view('services.people')->with('people', $people);
    }

    public function indexComplaint()
    {
        return view('services.complaints');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5|max:25',
            'message' => 'required',
            'institution' => 'required',
            'priority' => 'required'
        ]);

        $complaint = new Complaint();
        $complaint->title = $request['title'];
        $complaint->message = $request['message'];
        $complaint->institution = $request['institution'];
        $complaint->priority = $request['priority'];
        if ($request['anonymous'] == 0) {
            $complaint->name = $request['name'];
            $complaint->surname = $request['surname'];
            $complaint->email = $request['email'];
        }

        $complaint->save();

        return redirect()->back()->with('status', 'Complaint filed successfully');

    }

    public function indexPatrols()
    {
//        $location = new Location();
//        $ip = \Illuminate\Support\Facades\Request::ip();
//        dd($ip);
//        $position = $location->get($ip);
//        dd($position);
        return view('services.patrols');
    }
}
