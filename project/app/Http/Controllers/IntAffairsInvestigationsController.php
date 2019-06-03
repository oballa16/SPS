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


class IntAffairsInvestigationsController
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5|max:25',
            'description' => 'required',
            'SelectLm' => 'required'
        ]);

        $investigation = new Investigations();
        $investigation->title = $request['title'];
        $investigation->description = $request['description'];
        $investigation->category = $request['SelectLm'];


        $investigation->save();

        return redirect()->back()->with('status', 'Investigation Recorded Succesfully');

    }


}