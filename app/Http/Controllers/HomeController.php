<?php

namespace MONITORING\Http\Controllers;

use Illuminate\Http\Request;

use MONITORING\Http\Requests;
use MONITORING\Http\Controllers\Controller;
use MONITORING\Table;
class HomeController extends Controller
{
    public function index(){
        // \App::setLocale('kh');
        $tables = Table::all();
        return response()
        ->view('home',['tables'=>$tables]);
    }
}
