@extends('layout.app')

@section('title','Edit Pengiriman')

@section('content')
<div class="row gy-3">
    <div class="col">
        <div class="card shadow-sm p-4">
            <form action="{{ route('processEditPengiriman') }}" method="POST">
                @csrf

                <h1 class="mb-3 text-center">Edit Pengiriman</h1>

                <input type="hidden" id="id" name="id" value="{{ $user->id }}">

                <div class="form-floating mb-3">
                    <input type="date" class="form-control" placeholder="tanggal kirim" id="tanggal kirim"
                        name="tanggal kirim" value="{{ $user->tanggal kirim}}" required>
                    <label for="floatingInput">Tanggal Kirim</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="date" class="form-control" placeholder="tanggal sampai" id="tanggal sampai"
                        name="tanggal sampai" value="{{ $user->tanggal sampai}}" required>
                    <label for="floatingInput">Tanggal Sampai</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="status" id="status" name="status"
                        value="{{ $user->status }}" required>
                    <label for="floatingInput">Status</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" placeholder="ID Pembelian" id="ID Pembelian"
                        name="ID Pembelian" value="{{ $user->ID Pembelian }}" required>
                    <label for="floatingInput">ID Pembelian</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection