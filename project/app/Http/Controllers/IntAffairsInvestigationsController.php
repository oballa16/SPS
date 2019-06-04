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
use Illuminate\Support\Facades\Auth;


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


}