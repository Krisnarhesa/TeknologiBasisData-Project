@extends('layout.app')

@section('title','Edit User')

@section('header','KONFIRMASI BARANG SAMPAI')

@section('content')
<a href="/pengiriman"><button class="btn btn-lg btn-secondary" type="submit">Kembali</button></a>
<br/>
<br/>
<div class="row gy-3">
    <div class="col">
        <div class="card shadow-sm p-4">
            <form action="{{ route('processSampai') }}" method="POST">
                @csrf

                <input type="hidden" id="id" name="id" value="{{ $pengiriman->id }}">
                <input type="hidden" id="idCustomer" name="idCustomer" value="{{$pengiriman->idCustomer}}">
                <input type="hidden" id="idPembelian" name="idPembelian" value="{{ $pengiriman->idPembelian }}">
                <input type="hidden" id="alamat" name="alamat" value="{{ $pengiriman->alamat }}">
                <input type="hidden" id="tanggalKirim" name="tanggalKirim" value="{{ $pengiriman->tanggalKirim }}">
                <input type="hidden" id="tanggalSampai" name="tanggalSampai" value="{{ date('Y-m-d') }}">
                <input type="hidden" id="status" name="status" value="Sampai">

                <div class="col mb-3">
                    <label>Customer</label>
                    <select name="idCustomer" class="form-select" placeholder="idCustomer" id="idCustomer" disabled>
                        <option value="{{$pengiriman->idCustomer}}">{{$pengiriman->idCustomer}}</option>
                    </select>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="idPembelian" id="idPembelian" name="idPembelian"
                    value="{{ $pengiriman->idPembelian }}" disabled>
                    <label for="floatingInput">ID Pembelian</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="alamat" id="alamat" name="alamat"
                    value="{{ $pengiriman->alamat }}" disabled>
                    <label for="floatingInput">Alamat Pengiriman</label>
                </div>

                <div class="col-md-3">
                    <label>Tanggal Kirim</label>
                    <input type="date" class="form-control " name="tanggalKirim" id="tanggalKirim"
                        value="{{ $pengiriman->tanggalKirim }}" disabled/>
                </div>

                <div class="col-md-3">
                    <label>Tanggal Sampai</label>
                    <input type="date" class="form-control " name="tanggalSampai" id="tanggalSampai"
                    value="{{ date('Y-m-d') }}" disabled/>
                </div>

                {{-- <br /> --}}

                <div class="col-md-3">
                    <label>Status</label>
                    <select name="status" class="form-select " placeholder="status" id="status" disabled>
                        <option value="Sampai">Sampai</option>
                    </select>
                </div>
                <br />
                <br />

                <button class="w-100 btn btn-lg btn-success" type="submit">Konfirmasi</button>
            </form>
        </div>
    </div>
</div>
@endsection