@extends('template.index')

@section('title','Kelas')
@section('judul_atas')
<h1>Edit Data Kelas</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{url('update-kelas',$kls->id)}}" method="post">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label>Kode Kelas</label>
                            <input type="text" id="kode_kelas" name="kode_kelas" class="form-control" placeholder="Kode Kelas" value="{{ $kls->kode_kelas }}" required>
                        </div>
                        <div class="form-group">
                            <label>Kode Matkul</label>
                            <input type="text" id="kode_matkul" name=kode_matkul" class="form-control" placeholder="Kode Matkul" value="{{ $kls->kode_matkul }}" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Matkul</label>
                            <input type="text" id=nama_matkul"" name="nama_matkul" class="form-control" placeholder="Nama Matkul" value="{{ $kls->nama_matkul }}" required>
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="text" id=tahun"" name="tahun" class="form-control" placeholder="Tahun" value="{{ $kls->tahun }}" required>
                        </div>
                        <div class="form-group">
                            <label>Semester</label>
                            <input type="text" id="semester" name="semester" class="form-control" placeholder="Semester" value="{{ $kls->semester }}" required>
                        </div>
                        <div class="form-group">
                            <label>SKS</label>
                            <input type="text" id="sks" name="sks" class="form-control" placeholder="SKS" value="{{ $kls->sks }}" required>
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