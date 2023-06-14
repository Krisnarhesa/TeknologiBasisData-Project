@extends('layout.app')

@section('title','Edit Pembelian')

@section('content')
<div class="row gy-3">
    <div class="col">
        <div class="card shadow-sm p-4">
            <form action="{{ route('processEditPembelian') }}" method="POST">
                @csrf

                <h1 class="mb-3 text-center">Edit Pembelian</h1>

                <input type="hidden" id="id" name="id" value="{{ $user->id }}">

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" placeholder="ID Customer" id="ID Customer"
                        name="ID Customer" value="{{ $user->ID Customer}}" required>
                    <label for="floatingInput">ID Customer</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" placeholder="total produk" id="total produk"
                        name="total produk" value="{{ $user->total produk}}" required>
                    <label for="floatingInput">Total Produk</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" placeholder="total pembelian" id="total pembelian"
                        name="total pembelian" value="{{ $user->total pembelian }}" required>
                    <label for="floatingInput">Total Pembelian</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" placeholder="ID Admin" id="ID Admin" name="ID Admin"
                        value="{{ $user->ID Admin }}" required>
                    <label for="floatingInput">ID Admin</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="date" class="form-control" placeholder="tanggal" id="tanggal" name="tanggal"
                        value="{{ $user->tanggal }}" required>
                    <label for="floatingInput">Tanggal</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="status" id="tstatus" name="status"
                        value="{{ $user->status }}" required>
                    <label for="floatingInput">Status</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection