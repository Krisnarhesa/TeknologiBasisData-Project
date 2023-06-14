@extends('layout.app')

@section('title', 'report')

@section('header', 'REPORT')

@section('content')
    <div class="row gy-3">
        
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <form action="" method="GET">
                        <div class="row">
                             <div class="col-md-3">
                                <label>Filter data berdasarkan tanggal sampai</label>
                                <input type="date" name="date" value="{{ Request::get('date')}}" class="form-control"/>                     
                            </div>
                            <div class="col-md-3">
                                <label>Filter data berdasarkan rating</label>
                                <select name="status" class="form-select">
                                     <option value="" >Rating</option>
                                     <option value="1" {{ Request::get('rating') == '1'}}>1</option>
                                     <option value="2" {{ Request::get('rating') == '2'}}>2</option>
                                     <option value="3" {{ Request::get('rating') == '3'}}>3</option>
                                     <option value="4" {{ Request::get('rating') == '4'}}>4</option>
                                     <option value="5" {{ Request::get('rating') == '5'}}>5</option>
                                 </select>                     
                            </div>
                        </div>
                       <div class="col-md-6">
                            <br/>
                            <button type="submit" class="btn btn-primary">Filter</button>
                       </div>
                    </form>
                </div>
    
                <div class="card-body">
                    <form action="" method="get">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control rounded" placeholder="Cari" aria-label="Search" aria-describedby="search-addon" value="{{ Request::get('search') }}"/>
                            <button type="submit" class="btn btn-outline-primary">cari</button>
                        </div>
                    </form>
                </div>
            </div>
            <br/>

            <div class="card shadow-sm p-4">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Pengiriman</th>
                                <th scope="col">Tanggal Sampai</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($semuaPengiriman as $index => $pengiriman)
                                @if ($pengiriman->status == ("Sampai"))
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $pengiriman->id }}</td>
                                        <td>{{ $pengiriman->tanggalSampai }}</td>
                                        @foreach ($reviews as $no => $review)
                                            @if ($pengiriman->id == $review->idPengiriman)
                                                <td>{{ $review->rating }}</td>
                                            @endif
                                        @endforeach
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal{{ $index }}">
                                                Detail
                                            </button>
                                            <div class="modal fade" id="exampleModal{{ $index }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel{{ $index }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel{{ $index }}">
                                                                DETAIL</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <p>ID Customer : {{ $pengiriman->idCustomer }}</p>
                                                            <p>ID Pengiriman : {{ $review->idPengiriman }}</p>
                                                            <p>ID Pembelian : {{ $pengiriman->idPembelian }}</p>
                                                            <p>Tanggal Pengiriman : {{ $pengiriman->tanggalKirim }}</p>
                                                            <p>Tanggal Sampai : {{ $pengiriman->tanggalSampai }}</p>
                                                            <p>Alamat : {{ $pengiriman->alamat }}</p>
                                                            <p>Status : {{ $pengiriman->status }}</p>
                                                            @foreach ($reviews as $no => $review)
                                                                @if ($pengiriman->id == $review->idPengiriman)
                                                                    <p>Review : {{ $review->review }}</p>
                                                                    <p>Rating : {{ $review->rating }}</p>
                                                                @endif
                                                            @endforeach

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
