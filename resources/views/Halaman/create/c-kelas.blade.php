@extends('template.index')

@section('title','Kelas')
@section('judul_atas')
<h1>Tambah Pertemuan</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="card card-primary">
        <form action="{{route('simpan-kelas')}}" method="post">
            {{csrf_field()}}
            <div class="card-body">
                <table>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Kode Kelas</label>
                                <input type="text" class="form-control" name="kode_kelas" placeholder="Kode Kelas">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>Kode Mata Kuliah</label>
                                <input type="text" class="form-control" name="kode_matkul" placeholder="Kode MatKul">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>Nama Mata Kuliah</label>
                                <input type="text" class="form-control" min="0" name="nama_matkul" placeholder="Nama MatKul">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="text" class="form-control" min="0" name="tahun" placeholder="Tahun">
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="form-group">
                                <label>Semester</label>
                                <input type="text" class="form-control" min="0" name="semester" placeholder="Semester">
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="form-group">
                                <label>SKS</label>
                                <input type="text" class="form-control" min="0" name="sks" placeholder="sks">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</div>
@endsection