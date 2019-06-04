<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{

    public function index()
    {
        $employees = User::where('role', 1)->get();
        $notcompleted = Task::where('status', 'Open')->get();
        $completed = Task::where('status', 'Completed')->get();
        return view('chief.employees')->with('employees', $employees)->with('notcompleted', $notcompleted)->with('completed', $completed);;
    }

    public function indexOfficers()
    {
        $officers = User::where('role', 2)->get();
        return view('chief.officers')->with('officers', $officers);
    }

}
