<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\Citizen;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{


    public function index()
    {
        $complaints = Complaint::where('institution', 'police')->get();
        return view('employee.viewComplaints')->with('complaints', $complaints);

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

        return view('employee.viewComplaint')->with('complaint', $complaint);
    }

}
