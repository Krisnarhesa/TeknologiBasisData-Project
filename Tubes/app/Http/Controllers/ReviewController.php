<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(Request $request){
        $reviews = Review::when($request != null, function($query) use ($request) {
            return $query->where('idCustomer', Auth::user()->id);
        })->paginate(10);

        return view("review.index", ["reviews" => $reviews]);
    }

    public function adminReview(){
        $reviews = Review::all();

        return view("review.admin", ["reviews" => $reviews]);
    }

    public function add($id){
        // $review = Review::find($idPembelian);
        $pengiriman = Pengiriman::find($id);

        return view('review.add',["pengiriman"=> $pengiriman]);
    }
    public function processAdd(Request $request){
        $review = new Review();
        $review->idPengiriman = $request->input('idPengiriman');
        $review->idCustomer = $request->input('idCustomer');
        $review->review = $request->input('review');
        $review->rating = $request->input('rating');
        $review->save();

        return redirect('/review');
    }

    public function edit($id){
        $review = Review::find($id);

        return view('review.edit',["review" => $review ]);
    }

    public function processEdit(Request $request){
        $review = Review::find($request->input('id'));
        $review->idPengiriman = $request->input('idPengiriman');
        $review->idCustomer = $request->input('idCustomer');
        $review->review = $request->input('review');
        $review->rating = $request->input('rating');
        $review->save();

        return redirect('/review');
    }

    public function delete($id){
        $review = Review::find($id);
        $review->delete();

        return redirect('/review');
    }
}
