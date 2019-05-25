<?php

namespace App\Http\Controllers;

use App\Citizen;
use Illuminate\Http\Request;

class CitizensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citizens = [];
        return view('citizens.citizensIndex')->with('citizens', $citizens);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2(Request $request)
    {

//        dd($request);
//        $this->validate($request, ['
//        searchValue' => 'required',
//            'search' => 'required']);
//        dd($request);
        $citizens = Citizen::where($request['search'], $request['searchValue'])->get();
        return view('citizens.citizensIndex')->with('citizens', $citizens);
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
     * @param  \App\Citizen $citizen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $citizen = Citizen::findOrFail($id);
        return view('citizens.citizenProfile')->with('citizen', $citizen);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Citizen $citizen
     * @return \Illuminate\Http\Response
     */
    public function edit(Citizen $citizen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Citizen $citizen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citizen $citizen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Citizen $citizen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citizen $citizen)
    {
        //
    }
}
