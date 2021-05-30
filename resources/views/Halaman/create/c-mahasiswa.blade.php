@extends('template.index')

@section('title','Mahasiswa')
@section('judul_atas')
<h1>Tambah Data Mahasiswa</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="invoice p-3 mb-3">
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation"></i> Data gagal disimpan</h5>
            {{ session('error') }}
        </div>
        @endif
        <div class="col-sm-4 invoice-col">
            <form action="{{ route('simpan-mahasiswa') }}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Mahasiswa" required>
                </div>
                <div class="form-group">
                    <label>NIM</label>
                    <input type="text" id="nim" name="nim" class="form-control" placeholder="NIM Mahasiswa" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email Mahasiswa" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password Mahasiswa" maxlength="8" required>
                </div>
                <div class="form-group">
                    <a href="{{url('mahasiswa')}}" class="btn btn-primary"><- Back</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
@endsection