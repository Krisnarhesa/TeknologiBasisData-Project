<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengirimanController extends Controller
{
    public function index(Request $request){
        $semuaPengiriman = Pengiriman::when($request != null, function($query) use ($request) {

            return $query->where('idCustomer', Auth::user()->id);
        })->paginate(10);

        return view("pengiriman.index", ["semuaPengiriman" => $semuaPengiriman]);
    }

    public function adminPengiriman(){
        $semuaPengiriman = Pengiriman::latest()->paginate(10);

        return view("pengiriman.admin", ["semuaPengiriman" => $semuaPengiriman]);
    }

    public function add(){
        $semuaCustomer = User::all();

        return view('pengiriman.add', ["semuaCustomer" => $semuaCustomer]);
    }

    public function detail($id){
        $pengiriman = Pengiriman::find($id);

        return view("pengiriman.detail", ["pengiriman" => $pengiriman]);
    }

    public function processAdd(Request $request){
        $pengiriman = new Pengiriman();
        $pengiriman->idCustomer = $request->input('idCustomer');
        $pengiriman->idPembelian = $request->input('idPembelian');
        $pengiriman->tanggalKirim = $request->input('tanggalKirim');
        $pengiriman->tanggalSampai = $request->input('tanggalSampai');
        $pengiriman->alamat = $request->input('alamat');
        $pengiriman->status = $request->input('status');
        $pengiriman->save();

        return redirect('/admin/pengiriman');
    }

    public function edit($id){
        $pengiriman = Pengiriman::find($id);
        $semuaCustomer = User::all();

        return view('pengiriman.edit',["pengiriman" => $pengiriman ],["semuaCustomer" => $semuaCustomer]);
    }

    public function sampai($id){
        $pengiriman = Pengiriman::find($id);

        return view('pengiriman.sampai',["pengiriman" => $pengiriman ]);
    }

    public function processSampai(Request $request){
        $pengiriman = Pengiriman::find($request->input('id'));
        $pengiriman->idCustomer = $request->input('idCustomer');
        $pengiriman->idPembelian = $request->input('idPembelian');
        $pengiriman->tanggalKirim = $request->input('tanggalKirim');
        $pengiriman->tanggalSampai = $request->input('tanggalSampai');
        $pengiriman->alamat = $request->input('alamat');
        $pengiriman->status = $request->input('status');
        $pengiriman->save();

        return redirect('/pengiriman');
    }

    public function processEdit(Request $request){
        $pengiriman = Pengiriman::find($request->input('id'));
        $pengiriman->idCustomer = $request->input('idCustomer');
        $pengiriman->idPembelian = $request->input('idPembelian');
        $pengiriman->tanggalKirim = $request->input('tanggalKirim');
        $pengiriman->tanggalSampai = $request->input('tanggalSampai');
        $pengiriman->alamat = $request->input('alamat');
        $pengiriman->status = $request->input('status');
        $pengiriman->save();

        return redirect('/admin/pengiriman');
    }
    public function delete($id){
        $pengiriman = Pengiriman::find($id);
        $pengiriman->delete();

        return redirect('/admin/pengiriman');
    }
}
