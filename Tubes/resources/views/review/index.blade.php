@extends('layout.app')

@section('title', 'Review Admin')

@section('header', 'Review')

@section('content')
    <div class="row gy-3">
        <div class="col">
            <div class="card shadow-sm p-4">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Pengiriman</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $index => $review)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    {{-- <td>{{ $review->idPemesanan }}</td> --}}
                                    <td>{{ $review->idPengiriman }}</td>
                                    <td>{{ $review->rating }}</td>
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
                                                        <h5 class="modal-title" id="exampleModalLabel{{ $index }}">
                                                            DETAIL</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <p>ID Pengiriman : {{ $review->idPengiriman }}</p>
                                                        <p>ID Customer : {{ $review->idCustomer }}</p>
                                                        <p>Review : {{ $review->review }}</p>
                                                        <p>Rating : {{ $review->rating }}</p>
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
                                        <a href="{{ url('/editReview') }}/{{ $review->id }}"><button
                                                class="btn btn-success">Edit</button></a>
                                        <a href="{{ route('processDeleteReview', $review->id) }}"><button
                                                class="btn btn-danger">Delete</button></a>
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
