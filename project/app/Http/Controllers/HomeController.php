<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::guest())
            abort(403);
        if (Auth::user()->role == 1) {
            return view('employee.home');
        }
        if (Auth::user()->role == 2) {
            return view('officer.home');
        }
        if (Auth::user()->role == 3) {
            return view('chief.home');
        }
        if (Auth::user()->role == 4) {
            return view('internal.home');
        }
    }
    public function mail($id)
    {
        $user = User::where('id', $request->input('id'))->get()->first();
        Mail::to('krunal@appdividend.com')->send(new SendMailable($name));

        return 'Email was sent';
    }
}
