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
        $user->produk = $request->input('produk');
        $user->stok = $request->input('stok');
        $user->harga = $request->input('harga');
        $user->save();

        return redirect('/');
    }

    public function edit($id){
        $user = User::find($id);

        return view('user.edit',["user" => $user ]);
    }

    public function processEdit(Request $request){
        $user = User::find($request->input('id'));
        $user->produk = $request->input('produk');
        $user->stok = $request->input('stok');
        $user->harga = $request->input('harga');
        $user->save();

        return redirect('/');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();

        return redirect('/');
    }
}
