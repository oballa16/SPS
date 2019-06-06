<?php
/**
 * Created by PhpStorm.
 * User: Kristian
 * Date: 5/27/2019
 * Time: 7:21 PM
 */

namespace App\Http\Controllers;

use App\File;
use App\Task;
use App\User;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
Use Illuminate\Validation\ValidationException;


class TasksController extends Controller
{
    public function indexTasks()
    {
        $user = User::where('id', Auth::id())->get()->first();
//        dd($user);
        $tasks = $user->EmployeeTasks()->get();
//        dd($tasks);
        return view('employee.employeeTasks')->with('tasks', $tasks);
    }


    public function showTask($id)
    {
        $task = Task::findOrFail($id);
        return view('employee.taskView')->with('task', $task);
    }

    public function completeTask($id)
    {
        $task = Task::findOrFail($id);
        $task->status = 'Completed';

        $message = new \App\Message();
        $message->subject = 'Task completed';
        $message->body = 'Task ' . $task->title . ' has been completed by ' . $task->employee->name . ' for ' . $task->caseRelated->title . ' case';
        $message->case_id = $task->case_id;
        $message->officer_id = $task->officer->id;
        $message->save();
        $task->save();
        return redirect()->back()->with('info', 'Task completed successfully');
    }

    public function showFileUpload($id)
    {
        $task = Task::findOrFail($id);
        $files = File::where('task_id', $task->id)->get();
        return view('employee.fileUpload')->with('task', $task)->with('files', $files);
    }

    public function uploadFileReport(Request $request, $id)
    {
        $this->validate($request,
            ['report' => 'required|mimes:pdf']);
        $task = Task::findOrFail($id);
        $name = date('dmY', strtotime(now())) . '-' . $request->file('report')->getClientOriginalName();
        Storage::disk('reports')->put($name,$request['report']);
        $file = new File();
        $file->filename = $name;
        $file->case_id = $task->caseRelated->id;
        $file->employee_id = $task->employee->id;
        $file->task_id = $task->id;
        $file->save();
        return redirect()->route('tasks')->with('info', 'File report uploaded successfully');
    }

    public function showFile($fileid)
    {
        $file = File::findOrFail($fileid);
        $filePath = $file->filename;
        if ($filePath == null)
            abort(404);
        $path = Storage::disk('reports')->path($filePath);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline;filename="' . $filePath . '"'
        ]);
    }

    public function deleteFile($id, $fileid)
    {
        $file = File::findOrFail($fileid);
        $filename = $file->filename;
        $path = Storage::disk('reports')->path($filename);
        Storage::delete($path);
        $file->delete();
        return redirect()->back()->with('info', 'File report deleted successfully');
    }
}