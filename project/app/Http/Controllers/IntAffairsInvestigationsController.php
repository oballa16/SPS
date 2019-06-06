<?php
/**
 * Created by PhpStorm.
 * User: Kristian
 * Date: 6/3/2019
 * Time: 9:52 PM
 */

namespace App\Http\Controllers;

use App\InvestigationFile;
use App\User;
use App\Investigations;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class IntAffairsInvestigationsController extends Controller
{

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category' => 'required'
        ]);
        $user = User::findOrFail($request['empID']);

        $investigation = new Investigations();
        $investigation->title = $request['title'];
        $investigation->description = $request['description'];
        $investigation->category = $request['category'];
        $investigation->emp_id = $request['empID'];
        $investigation->save();
        $user->status = 2;
        $user->save();

        if ($request->has('files')) {
            $files = $request['files'];

            foreach ($files as $file) {
                $name = date('dmY', strtotime(now())) . '-' . $file->getClientOriginalName();
                $path = $file->store('Internal', $name);
                $file = new InvestigationFile();
                $file->filename = $name;
                $file->agent_id = Auth::user()->id;
                $file->investigation_id = $investigation->id;
                $file->save();
            }
        }
        return redirect()->route('openUser', ['id' => $user->id])->with('info', 'Investigation recorded successfully');

    }

    public function index()
    {
        $investigations = Investigations::all();
        return view('internal.viewInvestigations')->with('investigations', $investigations);
    }

    public function showFileUpload($id)
    {
        $investigation = Investigations::findOrFail($id);
        return view('internal.showFileUpload')->with('investigation', $investigation);
    }

    public function showFile($id)
    {
        $file = InvestigationFile::findOrFail($id);
        $filePath = $file->filename;
        if ($filePath == null)
            abort(404);
        $path = Storage::disk('internal')->path($filePath);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline;filename="' . $filePath . '"'
        ]);
    }

    public function deleteFile($id)
    {
        $file = InvestigationFile::findOrFail($id);
        $filename = $file->filename;
        $path = Storage::disk('internal')->path($filename);
        Storage::delete($path);
        $file->delete();
        return redirect()->back()->with('info', 'File report deleted successfully');
    }

    public function uploadFile(Request $request, $id)
    {
//        dd($request);
        $this->validate($request,
            ['report' => 'required|mimes:pdf']);

//        dd($request);
        $investigation = Investigations::findOrFail($id);
        $name = date('dmY', strtotime(now())) . '-' . $request->file('report')->getClientOriginalName();

        Storage::disk('internal')->put($name, $request['report']);
//        $path = $request->file('report')->store(storage_path('app/Internal/'), $name);
        $file = new InvestigationFile();
        $file->filename = $name;
        $file->investigation_id = $investigation->id;
        $file->save();
        return redirect()->route('viewInvestigations')->with('info', 'File report uploaded successfully');
    }

    public function closeInvestigation($id)
    {
        $investigation = Investigations::findOrFail($id);
        $investigation->status = 1;
        $investigation->save();
        return redirect()->route('viewInvestigations')->with('info', 'Investigation closed successfully');
    }

    public function suspendEmployee($id)
    {
        $investigation = Investigations::findOrFail($id);
        $user = User::findOrFail($investigation->emp_id);
        $user->suspended = 1;
        $user->save();
        $investigation->status = 1;
        $investigation->save();
        return redirect()->route('viewInvestigations')->with('info', 'Employee suspended successfully and investigation closed');
    }
}