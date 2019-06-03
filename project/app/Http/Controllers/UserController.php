<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showPass($id)
    {
        $user = User::findOrFail($id);
        return view('auth.passwords.change', compact('user'));
    }

    public function changePass(Request $request)
    {
        $this->validate($request, [
            'old-password' => 'required',
            'password' => 'required|min:8|different:old-password',
            'password-confirm' => 'required|same:password'
        ]);

        $user = User::where('id', $request->input('id'))->get()->first();
        abort_if($user->id !== auth()->id(), 404);

        if (!Hash::check($request->input('old-password'), $user->password)) {
            $errors = new MessageBag(['old-password' => ['Invalid Password']]);
            return Redirect::back()->withErrors($errors)->withInput(Input::expect('password'));
        } else {

            $password = $request->input('password');
            $hashed = Hash::make($password);
            $user->password = $hashed;
            $user->save();
            return redirect()->route('home')->with('info', 'Password updated successfully');
        }
    }
    public function index()
    {
        $userS = [];
        return view('users.usersIndex')->with('users', $userS);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index2(Request $request)
    {

        $userS = User::where($request['search'], $request['searchValue'])->get();
        return view('users.usersIndex')->with('users', $userS);
    }
    public function show($id)
    {
        $userS = User::findOrFail($id);
        return view('users.usersProfile')->with('users', $userS);
    }
}
