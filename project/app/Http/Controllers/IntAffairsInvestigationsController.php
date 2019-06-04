<?php
/**
 * Created by PhpStorm.
 * User: Kristian
 * Date: 6/3/2019
 * Time: 9:52 PM
 */

namespace App\Http\Controllers;

use App\User;
use App\Investigations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class IntAffairsInvestigationsController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'SelectLm' => 'required'
        ]);

        $investigation = new Investigations();
        $investigation->title = $request['title'];
        $investigation->description = $request['description'];
        $investigation->category = $request['SelectLm'];
        $investigation->emp_id = $request['empID'];


        $investigation->save();

        return redirect()->back()->with('status', 'Investigation Recorded Succesfully');

    }


}