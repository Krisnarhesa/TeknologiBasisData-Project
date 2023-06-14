@extends('layout.app')

@section('title','List Users')

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
                            <th scope="col">Produk</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Harga</th>
                        </tr>    
                    </thead>   
                    <tbody>
                        @foreach($users as $index => $user)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $user->produk }}</td>
                                <td>{{ $user->stok }}</td>
                                <td>{{ $user->harga }}</td>
                                <td>
                                    <a href="{{ url('/edit') }}/{{ $user->id }}"><button class="btn btn-success">Edit</button></a>
                                    <a href="{{ route('processDeleteUser',$user->id) }}"><button class="btn btn-warning">Delete</button></a>

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