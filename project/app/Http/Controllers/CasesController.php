<?php

namespace App\Http\Controllers;

use App\Citizen;
use App\Task;
use App\User;
use Illuminate\Http\Request;


class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $officer = User::findOrFail($id);

        $cases = $officer->cases()->get();
        $tasks = $officer->tasks()->get();
        $employees = User::where('role', 1)->get();
        return view('officer.cases')->with('cases', $cases)->with('tasks', $tasks)->with('officer', $officer)->with('employees', $employees);
    }

    public function addTask(Request $request, $id)
    {
        $this->validate($request,
            ['title' => 'required',
                'description' => 'required',
                'employee' => 'required',
                'case' => 'required']);

        $task = new Task();

        $task->title = $request['title'];
        $task->description = $request['description'];
        $task->employee_id = $request['employee'];
        $task->officer_id = $id;
        $task->case_id = $request['case'];
        $task->save();

        return redirect()->back()->with('info', 'Task added successfully');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
