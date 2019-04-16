<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;

class HomeController extends Controller

{
public function index()
    {
        if (auth()->user()->isAdmin == 1) {
            $contacts = DB::table('contacts')->get();
            $nb_users = DB::table('users')->count();
            $nb_contacts = DB::table('contacts')->count();
            $name = auth()->user()->name;
            return view('admin', ['name' => $name,'contacts' => $contacts, 'nb_contacts' => $nb_contacts, 'nb_users' => $nb_users]);
            //return view('admin');

        } 
        else {
            return view('home');
        }
    }


public function logout()
    {
        auth()-> logout();             //deconnecte admin
        return redirect('/');     //redirige sur homepage
    }
}


