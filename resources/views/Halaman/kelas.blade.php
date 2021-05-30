@extends('template.index')

@section('title','Kelas')
@section('judul_atas')
<h1>Data Kelas</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Succes!</h5>
                Data Kelas Berhasi Ditambahkan
            </div>
            @elseif(session('fail'))
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                Kode Kelas Sudah Ada
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <a href="{{route('tambah-kelas')}}">
                        <input type="button" value="+ Kelas" class="btn btn-danger">
                    </a>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 100px">Kode Kelas</th>
                                <th style="width: 100px">Kode MatKul</th>
                                <th>Nama MatKul</th>
                                <th style="width: 50px">Tahun</th>
                                <th style="width: 40px">Semester</th>
                                <th style="width: 40px">SKS</th>
                                <th style="width: 40px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dtKelas as $data)
                            <tr>
                                <td><a href="{{ url('detail',$data->id) }}">{{$data->kode_kelas}}</a> </td>
                                <td>{{$data->kode_matkul}} </td>
                                <td>{{$data->nama_matkul}} </td>
                                <td>{{$data->tahun}} </td>
                                <td>{{$data->semester}} </td>
                                <td>{{$data->sks}} </td>
                                <td>
                                    <a href="#"><i class="fas fa-edit"></i></a>
                                    |
                                    <a href="#" onclick="return confirm('Apakah Yakin Hapus Data Kelas Ini?')"><i class="fas fa-trash-alt" style="color:orange"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
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