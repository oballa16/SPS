<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Citizen;
use App\File;
use App\Task;
use App\User;
use Chumper\Zipper\Zipper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Util\Filesystem;


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
        $files = File::where('case_id', $caseid)->get();
//        $people = DB::query('select ')
        return view('officer.case')->with('case', $case)->with('files', $files);
    }

    public function zipFiles($id, $caseid)
    {
        $case = Cases::where('id', $caseid)->get()->first();
        $files = $case->files()->get();
        $zip_file = 'Case_' . $case->title;
        $zipper = new Zipper();
        $headers = ["Content-Type" => "application/zip"];
        $fileName = $zip_file . ".zip"; // name of zip

        foreach ($files as $file) {
            $zipper->make(public_path('/documents/' . $zip_file . '.zip'))
                ->add(storage_path('app\Reports\\') . $file->filename)->close(); //files to be zipped
        }
        return response()
            ->download(public_path('/documents/' . $fileName), $fileName, $headers);
    }

    public function openArchive()
    {
        return view('officer.archiveSearch');
    }

    public function searchArchive()
    {
        $search = Input::get('search');
        if ($search != null) {
            $cases = Cases::search($search)->get();
        } else {
            abort(404);
        }

        return view('officer.archiveResults')->with('cases', $cases);
    }

    public function showCaseFileUpload($id)
    {
        $case = Cases::findOrFail($id);
        return view('officer.uploadCaseReport')->with('case', $case);
    }

    public function deleteCaseFile($id, $fileid)
    {
        $file = File::findOrFail($fileid);
        $filename = $file->filename;
        $path = Storage::disk('reports')->path($filename);
        Storage::delete($path);
        $file->delete();
        return redirect()->back()->with('info', 'File report deleted successfully');
    }

    public function uploadCaseFile(Request $request, $id)
    {
        $this->validate($request,
            ['report' => 'required|mimes:pdf']);
        $case = Cases::findOrFail($id);
        $path = $request->file('report')->store('Reports');
//        dd($path);
        $name = substr($path, 8, strlen($path));
        $file = new File();
        $file->filename = $name;
        $file->case_id = $case->id;
        $file->employee_id = $case->filedBy->id;
        $file->task_id = null;
        $file->save();
        return redirect()->route('viewCases', ['id' => $case->filedBy->id])->with('info', 'File report uploaded successfully');
    }

    public function showEditForm($id)
    {
        $case = Cases::findOrFail($id);
        return view('officer.editCase')->with('case', $case);
    }

    public function showPeopleForm($id)
    {
        $case = Cases::findOrFail($id);
        $citizens = Citizen::all();
        return view('officer.addPeople')->with('case', $case)->with('citizens', $citizens);
    }

}
