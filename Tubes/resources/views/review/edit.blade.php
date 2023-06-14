@extends('layout.app')

@section('title','Tambah Review')

@section('header', 'REVIEW')

@section('content')
<a href="/review"><button class="btn btn-lg btn-secondary" type="submit">Kembali</button></a>
<br/>
<br/>
<div class="row gy-3">
    <div class="col">
        <div class="card shadow-sm p-4">
            <form action="{{ route('processEditReview') }}" method="POST">
                @csrf

                <input type="hidden" id="id" name="id" value="{{ $review->id }}">
                <input type="hidden" id="idPengiriman" name="idPengiriman" value="{{ $review->idPengiriman }}">
                <input type="hidden" id="idCustomer" name="idCustomer" value="{{  $review->idCustomer }}">


                <div class="form-floating">
                    <textarea class="form-control" placeholder="Masukkan Review" id="review" name="review"style="height: 100px" >{{$review->review}}</textarea>
                    <label for="floatingTextarea2">Review</label>
                </div>
                {{-- <div class="form-floating mb-3">
                    <input class="form-control" placeholder="Leave a comment here" style="height: 100px" type="text" class="form-control" placeholder="review" id="review" name="review" required>
                    <label for="floatingTextarea2">Comments</label>
                    <input type="text" class="form-control" placeholder="review" id="review" name="review" required>
                    <label for="floatingInput">Review</label>
                </div> --}}

                <div class="col-md-3">
                    <label>Rating</label>
                    <select name="rating" class="form-select" placeholder="rating" id="rating" required>
                        <option value="{{$review->rating}}">{{$review->rating}}</option>
                        
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <br/>
                <br/>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection