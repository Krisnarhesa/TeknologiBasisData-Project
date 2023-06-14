@extends('adminLayout.app')

@section('title', 'Add Pengiriman')

@section('header', 'PENGIRIMAN')

@section('content')
<a href="/admin/pengiriman"><button class="btn btn-lg btn-secondary" type="submit">Kembali</button></a>
<br/>
<br/>
    <div class="row gy-3">
        <div class="col">
            <div class="card shadow-sm p-4">
                <form action="{{ route('processAddPengiriman') }}" method="POST">
                    @csrf

                    <div class="col mb-3">
                        <label>Customer</label>
                        <select name="idCustomer" class="form-select" placeholder="idCustomer" id="idCustomer" required>
                            @foreach($semuaCustomer as $customer)
                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="idPembelian" id="idPembelian" name="idPembelian"
                            required>
                        <label for="floatingInput">ID Pembelian</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="alamat" id="alamat" name="alamat"
                            required>
                        <label for="floatingInput">Alamat Pengiriman</label>
                    </div>

                    <div class="col-md-3">
                        <label>Tanggal Kirim</label>
                        <input type="date" class="form-control" name="tanggalKirim" id="tanggalKirim"
                            value="{{ date('Y-m-d') }}" />
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
                            <option value="">Status</option>

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
