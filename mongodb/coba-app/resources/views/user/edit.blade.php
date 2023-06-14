@extends('layout.app')

@section('title','Edit Produk')

@section('content')
<div class="row gy-3">
    <div class="col">
        <div class="card shadow-sm p-4">
            <form action="{{ route('processEditUser') }}" method="POST">
                @csrf

                <h1 class="mb-3 text-center">Edit Produk</h1>

                <input type="hidden" id="id" name="id" value="{{ $user->id }}">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="produk" id="produk" name="produk" value="{{ $user->produk}}" required>
                    <label for="floatingInput">Produk</label>
                </div>    

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="stok" id="stok" name="stok" value="{{ $user->stok }}"  required>
                    <label for="floatingInput">Stok</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="harga" id="harga" name="harga" value="{{ $user->harga }}"  required>
                    <label for="floatingInput">Harga</label>
                </div> 

                <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
            </form>    
        </div>    
    </div>    
</div>    
@endsection