<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();

        return view("user.index", ["users" => $users]);
    }
    public function add(){
        return view('user.add');
    }
    public function processAdd(Request $request){
        $user = new User();
        $user->nama = $request->input('nama');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->alamat = $request->input('alamat');
        $user->notelp = $request->input('notelp');
        $user->save();

        return redirect('/');
    }

    public function edit($id){
        $user = User::find($id);

        return view('user.edit',["user" => $user ]);
    }

    public function processEdit(Request $request){
        $user = User::find($request->input('id'));
        $user->nama = $request->input('nama');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->alamat = $request->input('alamat');
        $user->notelp = $request->input('notelp');
        $user->save();

        return redirect('/');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();

        return redirect('/');
    }
}
