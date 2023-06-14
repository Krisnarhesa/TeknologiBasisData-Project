@extends('layout.app')

@section('title','Pengiriman Admin')

@section('header','Pengiriman')

@section('content')
<div class="row gy-3">
    <div class="col">
        <div class="card shadow-sm p-4">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Pembelian</th>
                            <th scope="col">Tanggal Pengiriman</th>
                            <th scope="col">Tanggal Sampai</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Status</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($semuaPengiriman as $index => $pengiriman)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pengiriman->idPembelian }}</td>
                                <td>{{ $pengiriman->tanggalKirim }}</td>
                                <td>{{ $pengiriman->tanggalSampai }}</td>
                                <td>{{ $pengiriman->alamat }}</td>
                                <td>{{ $pengiriman->status }}</td>
                                <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal{{ $index }}">
                                        Detail
                                    </button>
                                    <div class="modal fade" id="exampleModal{{ $index }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel{{ $index }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel{{ $index }}">DETAIL</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>ID Customer : {{ $pengiriman->idCustomer }}</p>
                                                    <p>ID Pembelian : {{ $pengiriman->idPembelian }}</p>
                                                    <p>Tanggal Pengiriman : {{ $pengiriman->tanggalKirim }}</p>
                                                    <p>Tanggal Sampai : {{ $pengiriman->tanggalSampai }}</p>
                                                    <p>Alamat : {{ $pengiriman->alamat }}</p>
                                                    <p>Status : {{ $pengiriman->status }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </td>
                                <td>
                                    @if($pengiriman->status != 'Sampai')
                                    <a href="{{ url('/sampai') }}/{{ $pengiriman->id }}"><button
                                        class="btn btn-success">Sampai</button></a>
                                    @endif
                                    

                                    @if($pengiriman->status == 'Sampai')
                                    <a href="{{ url('/addReview') }}/{{ $pengiriman->id }}"><button
                                        class="btn text-light" style="background: #fa6900">Review</button></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

   
@endsection