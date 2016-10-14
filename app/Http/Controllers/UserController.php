<?php

namespace MONITORING\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MONITORING\Http\Requests;
use MONITORING\Http\Controllers\Controller;

use MONITORING\User;
use View;

class UserController extends Controller
{
    public function index() {
        $users = User::where('user_id', '=', Auth::user()->id)->get();

//        return View::make('users.index', compact('users'));

        return response()->view('users.index', ['users' => $users]);
    }

    public function create() {
        return View::make('users.create');
    }

    public function edit($id) {
        $user = User::findOrFail($id);

//        dd($user->name);

        return View::make('users.edit', compact('user'));
    }
}
