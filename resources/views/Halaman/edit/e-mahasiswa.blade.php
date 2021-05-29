@extends('template.index')

@section('title','Mahasiswa')
@section('judul_atas')
<h1>Edit Data Mahasiswa</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('update-mahasiswa',$mhs->id) }}" method="post">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Mahasiswa" value="{{ $mhs->nama }}" required>
                        </div>
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" id="nim" name="nim" class="form-control" placeholder="NIM Mahasiswa" value="{{ $mhs->nim }}" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email Mahasiswa" value="{{ $mhs->email }}" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password Mahasiswa" value="{{ $mhs->password }}" maxlength="8" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
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