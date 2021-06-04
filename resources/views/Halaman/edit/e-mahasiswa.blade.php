@extends('template.index')

@section('title','Mahasiswa')
@section('judul_atas')
<h1>Edit Data Mahasiswa</h1>
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
                            <input type="text" id="nim" name="nim" class="form-control @error('nim') is-invalid @enderror" placeholder="NIM Mahasiswa" value="{{ old('nim', $mhs->nim) }}">
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
                            <a href="{{url('mahasiswa')}}" class="btn btn-primary"><- Back</a>
                            <button type="submit" class="btn btn-success">Submit</button>
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