<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Citizen;
use App\File;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        $tasks = $officer->OfficerTasks()->orderBy('created_at', 'desc')->get();
        $employees = User::where('role', 1)->get();
        $messages = $officer->messages()->orderBy('created_at', 'desc')->get();
        return view('officer.cases')->with('cases', $cases)->with('tasks', $tasks)->with('officer', $officer)->with('employees', $employees)->with('messages', $messages);
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
        $task->date = date(now());
        $task->description = $request['description'];
        $task->employee_id = $request['employee'];
        $task->officer_id = $id;
        $task->case_id = $request['case'];
        $task->status = 'Open';
        $task->save();

        return redirect()->route('viewCases', ['id' => $id])->with('info', 'Task added successfully');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTask($id)
    {
        $officer = User::findOrFail($id);
        $cases = $officer->cases()->get();
        $tasks = $officer->OfficerTasks()->get();
        $employees = User::where('role', 1)->get();
        return view('officer.task')->with('cases', $cases)->with('tasks', $tasks)->with('officer', $officer)->with('employees', $employees);

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
    public function show($id, $caseid)
    {
        $case = Cases::findOrFail($caseid);
        $files = File::where('case_id', $case->id)->get();
//        $people = DB::query('select ')
        return view('officer.case')->with('case', $case)->with('files', $files);
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
