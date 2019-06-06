<?php

namespace App\Http\Controllers;

use App\Cases;
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
        $max = 0;
        foreach ($employees as $employee) {
            $completed2 = $employee->EmployeeTasks->filter(function ($item) {
                return $item->status == 'Completed';
            })->count();
            if (count($employee->EmployeeTasks) == 0) {
                $score = 0;
            } else {
                $score = $completed2 / count($employee->EmployeeTasks) * 100;
            }
            if ($score > $max) {
                $max = $score;
                $winner = $employee;
            }
        }
        return view('chief.employees')->with('employees', $employees)->with('notcompleted', $notcompleted)->with('completed', $completed)
            ->with('winner', $winner)->with('score', $score);
    }

    public function indexOfficers()
    {
        $officers = User::where('role', 2)->get();
        $notcompleted = Cases::where('status', 'open')->get();
        $completed = Cases::where('status', 'Closed')->get();
        $max = -1;

        foreach ($officers as $officer) {
            $completed2 = $officer->cases->filter(function ($item) {
                return $item->status == 'Closed';
            })->count();

            if (count($officer->cases) == 0) {
                $score = 0;
            } else {
                $score = $completed2 / count($officer->cases) * 100;
            }


            if ($score > $max) {
                $max = $score;
                $winner = $officer;
            }
        }

        return view('chief.officers')->with('officers', $officers)->with('notcompleted', $notcompleted)->with('completed', $completed)
            ->with('winner', $winner)->with('score', $score);
    }


    public function allcases()
    {
        $cases = Cases::all();
        return view('chief.allcases')->with('cases', $cases);
    }
}
