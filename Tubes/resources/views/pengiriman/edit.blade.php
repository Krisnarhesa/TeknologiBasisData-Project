@extends('adminLayout.app')

@section('title','Edit User')

@section('content')
<a href="/admin/pengiriman"><button class="btn btn-lg btn-secondary" type="submit">Kembali</button></a>
<br/>
<br/>
<div class="row gy-3">
    <div class="col">
        <div class="card shadow-sm p-4">
            <form action="{{ route('processEditPengiriman') }}" method="POST">
                @csrf

                <input type="hidden" id="id" name="id" value="{{ $pengiriman->id }}">

                <div class="col mb-3">
                    <label>Customer</label>
                    <select name="idCustomer" class="form-select" placeholder="idCustomer" id="idCustomer" required>
                        <option value="{{$pengiriman->idCustomer}}">{{$pengiriman->idCustomer}}</option>
                        @foreach($semuaCustomer as $satuCustomer)
                            <option value="{{$satuCustomer->id}}">{{$satuCustomer->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="idPembelian" id="idPembelian" name="idPembelian"
                    value="{{ $pengiriman->idPembelian }}" required>
                    <label for="floatingInput">ID Pembelian</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="alamat" id="alamat" name="alamat"
                    value="{{ $pengiriman->alamat }}" required>
                    <label for="floatingInput">Alamat Pengiriman</label>
                </div>

                <div class="col-md-3">
                    <label>Tanggal Kirim</label>
                    <input type="date" class="form-control" name="tanggalKirim" id="tanggalKirim"
                        value="{{ $pengiriman->tanggalKirim }}" />
                </div>

                <div class="col-md-3">
                    <label>Tanggal Sampai</label>
                    <input type="date" class="form-control" name="tanggalSampai" id="tanggalSampai"
                    value="" />
                </div>

                {{-- <br /> --}}

                <div class="col-md-3">
                    <label>Status</label>
                    <select name="status" class="form-select" placeholder="status" id="status" required>
                        <option value="{{$pengiriman->status}}">{{$pengiriman->status}}</option>
                        <option value="Diproses">Diproses</option>
                        <option value="Dalam Perjalanan">Dalam Perjalanan</option>
                        <option value="Sampai">Sampai</option>

                    </select>
                </div>
                <br />
                <br />

                <button class="w-100 btn btn-lg btn-success" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection