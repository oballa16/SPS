<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Citizen;
use App\File;
use App\Task;
use App\User;
use Chumper\Zipper\Zipper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Util\Filesystem;


class CasesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $officer = User::findOrFail($id);
        abort_if($officer->id != Auth::user()->id, 403);
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
        abort_if($officer->id != Auth::user()->id, 403);
        $cases = $officer->cases()->get();
        $tasks = $officer->OfficerTasks()->get();
        $employees = User::where('role', 1)->get();
        return view('officer.task')->with('cases', $cases)->with('tasks', $tasks)->with('officer', $officer)->with('employees', $employees);

    }

    public function create()
    {
        return view('officer.addCase');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|min:25',
            'start_date' => 'required|date',
            'end_date' => 'required|after:start_date',
            'place' => 'required'
        ]);

        $case = new Cases();
        $case->title = $request['title'];
        $case->description = $request['description'];
        $case->start_date = $request['start_date'];
        $case->end_date = $request['end_date'];
        $case->place = $request['place'];
        $case->filed_by = Auth::user()->id;
        $case->status = 'open';
        $case->save();
        return redirect()->route('viewCases', ['id' => Auth::user()->id])->with('info', 'Case added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $caseid)
    {
        abort_if(Auth::user()->role == '1', 403);
        $case = Cases::findOrFail($caseid);
        $files = File::where('case_id', $caseid)->get();
//        $people = DB::query('select ')
        return view('officer.case')->with('case', $case)->with('files', $files);
    }

    public function zipFiles($id, $caseid)
    {
        abort_if(Auth::user()->role == '1', 403);
        $case = Cases::where('id', $caseid)->get()->first();
        $files = $case->files()->get();
        $title = str_replace(' ', '_', $case->title);
        $zip_file = 'Case_' . $title;

        $zipper = new Zipper();
        $headers = ["Content-Type" => "application/zip"];
        $fileName = $zip_file . ".zip"; // name of zip

        if (sizeof($files) == 0) {
            return redirect()->back()->with('info', 'No files to zip');
        } else {
//            dd($files);
            foreach ($files as $file) {
                $zipper->make(public_path('documents\\' . $zip_file . '.zip'))
                    ->add(storage_path('app/Reports/') . $file->filename)->close(); //files to be zipped
            }

            return response()
                ->download(public_path('/documents/' . $fileName), $fileName, $headers);
        }
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
        abort_unless($case->filedBy->id == Auth::user()->id or Auth::user()->role == 3, 403);
        return view('officer.uploadCaseReport')->with('case', $case);
    }

    public function deleteCaseFile($id, $fileid)
    {
        abort_unless($id != Auth::user()->id or Auth::user()->role == 3, 403);
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
        abort_unless($case->filedBy->id == Auth::user()->id or Auth::user()->role == 3, 403);
        $name = date('dmYHis', strtotime(now())) . '-' . $request->file('report')->getClientOriginalName();
//        dd($name);
        Storage::disk('reports')->putFileAs('reports', $request['report'], $name);
        $file = new File();
        $file->filename = $name;
        $file->case_id = $case->id;
        $file->employee_id = $case->filedBy->id;
        $file->task_id = null;
        $file->save();
        if (Auth::user()->role == 3) {
            return redirect()->route('viewAllCases')->with('info', 'File report uploaded successfully');

        } else {
            return redirect()->route('viewCases', ['id' => $case->filedBy->id])->with('info', 'File report uploaded successfully');
        }
    }

    public function showEditForm($id)
    {
        $case = Cases::findOrFail($id);
        abort_unless($case->filedBy->id != Auth::user()->id or Auth::user()->role == 3, 403);
        return view('officer.editCase')->with('case', $case);
    }

    public function showPeopleForm($id)
    {
        $case = Cases::findOrFail($id);
        abort_unless($case->filedBy->id != Auth::user()->id or Auth::user()->role == 3, 403);
        $citizens = [];
        return view('officer.addPeople')->with('case', $case)->with('citizens', $citizens);
    }

    public function editCase(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|min:25',
            'start_date' => 'required|date',
            'end_date' => 'required|after:start_date',
            'place' => 'required'
        ]);

        $case = Cases::findOrFail($id);
        abort_unless($case->filedBy->id != Auth::user()->id or Auth::user()->role == 3, 403);
        $case->title = $request['title'];
        $case->description = $request['description'];
        $case->start_date = $request['start_date'];
        $case->end_date = $request['end_date'];
        $case->place = $request['place'];
        $case->save();
        if (Auth::user()->role == 3) {
            return redirect()->route('viewAllCases')->with('info', 'Case edited successfully');

        } else {
            return redirect()->route('viewCases', ['id' => $case->filedBy->id])->with('info', 'Case edited successfully');
        }
    }

    public function closeCase(Request $request, $id)
    {
        $case = Cases::findOrFail($id);
        abort_unless($case->filedBy->id != Auth::user()->id or Auth::user()->role == 3, 403);
        $case->status = "Closed";
        $case->save();
        if (Auth::user()->role == 3) {
            return redirect()->route('viewAllCases')->with('info', 'Case closed successfully');

        } else {
            return redirect()->route('viewCases', ['id' => $case->filedBy->id])->with('info', 'Case closed successfully');
        }
    }

    public function addPeople(Request $request, $id)
    {
        $citizen = Citizen::findOrFail($request['id']);
        $case = Cases::findOrFail($id);
        abort_unless($case->filedBy->id != Auth::user()->id or Auth::user()->role == 3, 403);
        $case->people()->attach($citizen);
        $case->save();
        if (Auth::user()->role == 3) {
            return redirect()->route('viewAllCases')->with('info', 'Citizen added successfully to case');

        } else {
            return redirect()->route('viewCases', ['id' => $case->filedBy->id])->with('info', 'Citizen added successfully to case');
        }
    }

    public function citizenSearch(Request $request, $id)
    {
        $case = Cases::findOrFail($id);
        abort_unless($case->filedBy->id != Auth::user()->id or Auth::user()->role == 3, 403);
        $citizens = Citizen::where($request['search'], $request['searchValue'])->get();
        return view('officer.addPeople')->with('citizens', $citizens)->with('case', $case);
    }

    public function deletePeople(Request $request, $id)
    {
        $citizen = Citizen::findOrFail($request['id']);
        $case = Cases::findOrFail($id);
        abort_unless($case->filedBy->id != Auth::user()->id or Auth::user()->role == 3, 403);
        $case->people()->detach($citizen);
        $case->save();
        if (Auth::user()->role == 3) {
            return redirect()->route('viewAllCases')->with('info', 'Citizen removed successfully from case');

        } else {
            return redirect()->route('viewCases', ['id' => $case->filedBy->id])->with('info', 'Citizen removed successfully from case');
        }
    }
}
