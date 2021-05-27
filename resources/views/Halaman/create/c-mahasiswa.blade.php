@extends('template.index')

@section('title','Mahasiswa')
@section('judul_atas')
<h1>Tambah Data Mahasiswa</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('simpan-mahasiswa') }}" method="post">
                    {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <input type="text" id="nim" name="nim" class="form-control" placeholder="NIM">
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                        </div>
                    </form>
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