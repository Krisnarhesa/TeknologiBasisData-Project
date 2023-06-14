<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengiriman;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    function index(Request $request){
        $semuaPengiriman = Pengiriman::when($request != null, function($query) use ($request) {
            return $query->where('idCustomer', Auth::user()->id);
        })->when($request->date != null, function($query) use ($request) {
                                        
            return $query->whereDate('tanggalSampai', $request->date);
        })
        ->when($request->status != null, function($query) use ($request) {

            return $query->where('rating', $request->rating);
        })
        ->when($request->search != null, function($query) use ($request) {
            
            return $query->where('id', $request->search);
        })
        ->paginate(10);
    
        $reviews = Review::all(); // Mendapatkan data review berdasarkan idPengiriman
    
        return view("report.index", ["semuaPengiriman" => $semuaPengiriman], ["reviews" => $reviews]);
    }

    function admin(Request $request){
        $semuaPengiriman = Pengiriman::when($request->date != null, function($query) use ($request) {
                                        
            return $query->whereDate('tanggalSampai', $request->date);
        })
        ->when($request->status != null, function($query) use ($request) {

            return $query->where('rating', $request->rating);
        })
        ->when($request->search != null, function($query) use ($request) {
            
            return $query->where('_id',  $request->search );
        })
        ->paginate(10);
    
        $reviews = Review::all(); // Mendapatkan data review berdasarkan idPengiriman
    
        return view("report.admin", ["semuaPengiriman" => $semuaPengiriman], ["reviews" => $reviews]);
    }
}
