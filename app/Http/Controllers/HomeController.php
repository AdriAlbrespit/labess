<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller

{
public function index()
    {
        if (auth()->user()->isAdmin == 1) {
            $contacts = DB::table('contacts')->get();
            return view('admin', ['contacts' => $contacts]);
            //return view('admin');

        } 
        else {
            return view('home');
        }
    }


public function logout()
    {
        auth()-> logout();             //deconnecte admin
        return redirect('/login');     //redirige sur homepage
    }
}


