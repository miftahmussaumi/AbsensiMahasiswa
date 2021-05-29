@extends('template.index')

@section('title','Mahasiswa')
@section('judul_atas')
<h1>Data Mahasiswa</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <a href="{{route('tambah-mahasiswa')}}">
                        <input type="button" value="+ Mahasiswa" class="btn btn-danger">
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($dtMahasiswa as $data)
                        <tbody>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->nim }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->password }}</td>
                                <td>
                                    <a href="{{ url('edit-mahasiswa',$data->id) }}"><i class="fas fa-edit"></i></a> 
                                    |  
                                    <a href="{{ url('delete-mahasiswa',$data->id) }}" onclick="return confirm('Apakah Yakin Hapus Data Mahasiswa Ini?')"><i class="fas fa-trash-alt" style="color:orange"></i></a>
                                </td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
@endsection