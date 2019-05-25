<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\Citizen;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{


    public function indexComplaint()
    {
        $complaints = Complaint::all();
        return view('viewComplaints')->with('complaints', $complaints);

    }

}
