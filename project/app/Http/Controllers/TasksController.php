<?php
/**
 * Created by PhpStorm.
 * User: Kristian
 * Date: 5/27/2019
 * Time: 7:21 PM
 */

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TasksController
{
    public function indexTasks()
    {
        $user = User::where('id', Auth::id())->get()->first();
//        dd($user);
        $tasks = $user->EmployeeTasks()->get();
//        dd($tasks);
        return view('employee.employeeTasks')->with('tasks',$tasks);
    }

}