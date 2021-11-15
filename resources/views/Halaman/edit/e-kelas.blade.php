@extends('template.index')

@section('title','Edit Kelas')
@section('judul_atas')
<h1>Edit Data Kelas</h1>
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
    <div class="card card-primary">
        <form action="{{ url('update-kelas',$kls->id) }}" method="post">
            {{csrf_field()}}
            <div class="card-body">
                <table>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Kode Kelas</label>
                                <input type="text" class="form-control @error('kode_kelas') is-invalid @enderror" value="{{ old('kode_kelas', $kls->kode_kelas) }}" readonly name="kode_kelas" placeholder="Kode Kelas">
                                @error('kode_kelas')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>Kode Mata Kuliah</label>
                                <input type="text" class="form-control @error('kode_matkul') is-invalid @enderror" value="{{ old('kode_matkul', $kls->kode_matkul) }}" name="kode_matkul" placeholder="Kode MatKul">
                                @error('kode_matkul')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>Nama Mata Kuliah</label>
                                <input type="text" class="form-control @error('nama_matkul') is-invalid @enderror" value="{{ old('nama_matkul', $kls->nama_matkul) }}" min="0" name="nama_matkul" placeholder="Nama Mata Kuliah">
                                @error('nama_matkul')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="text" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun', $kls->tahun) }}" min="0" name="tahun" placeholder="Tahun" maxlength="4">
                                @error('tahun')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="form-group">
                                <label>Semester</label>
                                <input type="text" class="form-control @error('semester') is-invalid @enderror" value="{{ old('semester', $kls->semester) }}" min="0" name="semester" placeholder="Semester" maxlength="2">
                                @error('semester')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror   
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="form-group">
                                <label>SKS</label>
                                <input type="text" class="form-control @error('sks') is-invalid @enderror" value="{{ old('sks', $kls->sks) }}" min="0" name="sks" placeholder="sks" maxlength="1">
                                @error('sks')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{url('kelas')}}" class="btn btn-primary"><- Back</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection