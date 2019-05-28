<?php
/**
 * Created by PhpStorm.
 * User: Kristian
 * Date: 5/27/2019
 * Time: 7:21 PM
 */

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;


class TasksController
{
    public function indexTasks(){
        return view('employee.employeeTasks');
    }

}