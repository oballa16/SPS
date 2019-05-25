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

}
