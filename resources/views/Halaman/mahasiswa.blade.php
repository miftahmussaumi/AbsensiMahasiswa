@extends('template.index')

@section('title','Mahasiswa')
@section('judul_atas')
<h1>Data Mahasiswa</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success</h5>
                {{ session('success') }}
            </div>
            @elseif(session('delete'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-trash-alt"></i> Succes</h5>
                {{ session('delete') }}
            </div>
            @elseif(session('edit'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Succes</h5>
                {{ session('edit') }}
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <a href="{{route('tambah-mahasiswa')}}">
                        <input type="button" value="+ Mahasiswa" class="btn btn-success">
                    </a>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th style="width: 40px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($dtMahasiswa as $data)
                        <tr>
                            <td>{{ $data->nim }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->email }}</td> 
                            <td>
                                <a href="{{ url('edit-mahasiswa',$data->id) }}"><i class="fas fa-edit"></i></a>
                                |
                                <a href="{{ url('delete-mahasiswa',$data->id) }}" onclick="return confirm('Apakah Yakin Hapus Data Mahasiswa Ini?')"><i class="fas fa-trash-alt" style="color:#dc3545"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
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