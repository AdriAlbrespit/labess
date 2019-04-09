<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller

{
public function index()
    {
        if (auth()->user()->isAdmin == 1) {
            return view('admin');    
        } 

        else {
            return view('home');
        }

    }

public function logout()
    {
        auth()-> logout();      //deconnecte admin
        return redirect('/login');       //redirige sur homepage
    }
/*        return view('home');
    }
    public function admin()
    {
        return view('admin');
    }
*/
}