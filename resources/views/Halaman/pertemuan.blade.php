@extends('template.index')

@section('title','Kelas')
@section('judul_atas')
<h1>Data Kelas</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">-pilih kelas--</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Kode Kelas</th>
                                <th>Mata Kuliah</th>
                                <th>Tahun</th>
                                <th>Semester</th>
                                <th>SKS</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A001</td>
                                <td>Sistem Informasi</td>
                                <td>2021</td>
                                <td>2</td>
                                <td>4</td>
                                <td><a href="{{route('tambah-pertemuan')}}">Tambah</a></td>
                            </tr>
                            <tr>
                                <td>A003</td>
                                <td>Pemrograman Web</td>
                                <td>2021</td>
                                <td>1</td>
                                <td>3</td>
                                <td><a href="{{route('tambah-pertemuan')}}">Tambah</a></td>
                            </tr>
                            <tr>
                                <td>A002</td>
                                <td>Pratikum Web</td>
                                <td>2020</td>
                                <td>2</td>
                                <td>1</td>
                                <td><a href="{{route('tambah-pertemuan')}}">Tambah</a></td>
                            </tr>
                        </tbody>
                        <!-- <tfoot>
                            <tr>
                                <th>Kode Kelas</th>
                                <th>Kode MatKul</th>
                                <th>Nama MatKul</th>
                                <th>Tahun</th>
                            </tr>
                        </tfoot> -->
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