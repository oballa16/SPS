<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ComplaintsController extends Controller
{


    public function index()
    {
        $complaints = Complaint::where('institution', 'police')->orderBy('status', 'desc')->get();
        $complaints2 = Complaint::where('institution', 'internal affairs')->orderBy('status', 'desc')->get();

        if (Auth::user()->role == 4) {
            return view('internal.viewComplaints')->with('complaints', $complaints2);
        } else {
            return view('employee.viewComplaints')->with('complaints', $complaints);
        }

    }

    public function update($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->status = "Closed";
        $complaint->save();

        return redirect()->back()->with('status', 'Complaint closed successfully');
    }

    public function show($id)
    {
        $complaint = Complaint::findOrFail($id);
        if ($complaint->institution == 'internal affairs') {
            return view('internal.viewComplaint')->with('complaint', $complaint);
        } else {
            return view('employee.viewComplaint')->with('complaint', $complaint);
        }
    }

    public function handle(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->status = "Closed";
        $complaint->save();
        if ($complaint->email != null) {
            $request['to'] = $complaint->email;
            Mail::send([], [], function ($message) use ($request) {
                $message->from($request['from']);
                $message->to($request['to']);
                $message->subject($request['subject']);
                $message->setBody($request['emailBody'], 'text/html');
            });
        }
        return redirect()->route('viewComplaints')->with('status', 'Complaint handled successfully');
    }

}
