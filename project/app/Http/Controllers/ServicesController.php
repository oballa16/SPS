<?php

namespace App\Http\Controllers;

use App\Citizen;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function indexTickets()
    {

        return view('services.tickets');
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

    public function indexPatrols()
    {
        return view('services.patrols');
    }
}
