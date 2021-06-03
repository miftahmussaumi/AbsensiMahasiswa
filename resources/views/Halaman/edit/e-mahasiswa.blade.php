@extends('template.index')

@section('title','Mahasiswa')
@section('judul_atas')
<h1>Edit Data Mahasiswa</h1>
@endsection

@section('container')
<div class="container-fluid">
        <div class="invoice p-3 mb-3">  
                <div class="col-sm-4 invoice-col">
                    <form action="{{ url('update-mahasiswa',$mhs->id) }}" method="post">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Mahasiswa" value="{{ old('nama', $mhs->nama) }}">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" id="nim" name="nim" class="form-control @error('nim') is-invalid @enderror" placeholder="NIM Mahasiswa" readonly value="{{ old('nim', $mhs->nim) }}">
                            @error('nim')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Mahasiswa" value="{{ old('email', $mhs->email) }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password Mahasiswa" value="{{ old('password', $mhs->password) }}" maxlength="8">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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