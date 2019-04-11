<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contacts;

class contactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $request->validate([
        'name'=>'required',
        'email' => 'required',
        'message' => 'required'
      ]);

      $Contacts = new contacts([
        'name' => $request->name,
        'tel'=> $request->tel,
        'email'=> $request->email,
        'message'=> $request->message
      ]);
      $Contacts->save();

      $name=$request->input('name');
      $email=$request->input('email');
      $tel = $request->input('tel');
      $msg = $request->input('message');
      $insert= DB::insert('insert into contacts(name,email,tel,message) values(?, ?)',[$name,$email,$tel,$message]);
      //DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);
      //return 'yo';
      return $name;
      //return redirect('/')->with('success', 'Message envoyé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
