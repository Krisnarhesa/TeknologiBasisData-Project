@extends('layout.app')

@section('title','List Pembelian')

@section('content')
<div class="row gy-3">
    <div class="col">
        <div class="card shadow-sm p-4">
            <div class="col-md-12 mb-4">
                <a href="{{ url('/add') }}"><button class="btn btn-primary text-end">Add</button></a>
            </div>
            <div class="col-md-12">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Customer</th>
                            <th scope="col">Total Produk</th>
                            <th scope="col">Total Pembelian</th>
                            <th scope="col">ID Admin</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $index => $user)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $user->ID Customer }}</td>
                            <td>{{ $user->Total Produk }}</td>
                            <td>{{ $user->Total Pembelian }}</td>
                            <td>{{ $user->ID Admin }}</td>
                            <td>{{ $user->Tanggal }}</td>
                            <td>{{ $user->Status }}</td>
                            <td>
                                <a href="{{ url('/edit') }}/{{ $user->id }}"><button
                                        class="btn btn-success">Edit</button></a>
                                <a href="{{ route('processDeleteUser',$user->id) }}"><button
                                        class="btn btn-warning">Delete</button></a>

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