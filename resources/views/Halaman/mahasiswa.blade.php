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
                        <input type="button" value="+ Mahasiswa" class="btn btn-success">
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Nim</th>
                                <th>Email</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        @foreach ($dtMahasiswa as $data)
                        <tbody>
                            <tr>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->nim }}</td>
                                <td>{{ $data->email }}</td>
                                <td></td>
                            </tr>
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