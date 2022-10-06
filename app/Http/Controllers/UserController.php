<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        //
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
            'name'=>['required','string'],
            'email'=>['required','email'],
            'password'=>['required','string'],
            'image'=>['nullable','image'],
            'profile'=>['required','array'],
            'profile.age'=>['nullable','numeric'],
            'profile.birth_date'=>['nullable','date'],
        ]);

        $password = Hash::make($request->password);
        $email = $request->email;
        $name = $request->name;
      $user =  User::create(compact('password','email','name'));

      $profile = $request->profile;
      
      $image_id = null;
      if($request->file('image')){
        $img = $this->imageUpload($request->file('image'),'public');
        $image_id = $img->id;
      }

      $user->profile()->create(array_merge($profile,compact('image_id')));

      $user->load('profile');

      return response()->json($user);
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
