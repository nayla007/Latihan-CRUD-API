@extends('adminlte::page')

@section('title', 'Materials')

@section('content_header')
    <h1>Materials</h1>
@stop

@section('content')
    <!-- Tampilkan Pesan Sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol untuk Tambah Material Baru -->
    <a href="{{ route('master-data.create_material') }}" class="btn btn-primary mb-3">Create New Material</a>

    <!-- Tabel Daftar Material -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Materials</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name Material</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Brand</th>
                        <th>Part Number</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materials as $material)
                        <tr>
                            <td>{{ $material->id }}</td>
                            <td>{{ $material->nama_material }}</td>
                            <td>{{ $material->unit }}</td>
                            <td>{{ number_format($material->harga, 0, ',', '.') }}</td>
                            <td>{{ $material->brand }}</td>
                            <td>{{ $material->part_number }}</td>
                            <td>{{ Str::limit($material->deskripsi, 50) }}</td>
                            <td>
                                <a href="{{ route('master-data.edit_material', $material->id) }}" class="btn btn-warning">Edit</a>
                                
                                <form action="{{ route('master-data.delete_material', $material->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop