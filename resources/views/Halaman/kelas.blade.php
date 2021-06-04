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
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                Data Kelas Berhasil Ditambahkan
            </div>
            @elseif(session('fail'))
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                Kode Kelas Sudah Ada
            </div>
            @elseif(session('delete'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-trash-alt"></i> Success!</h5>
                {{session('delete')}}
            </div>
            @elseif(session('edit'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                {{session('edit')}}
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <a href="{{route('tambah-kelas')}}">
                        <input type="button" value="+ Kelas" class="btn btn-success">
                    </a>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 100px">Kode Kelas</th>
                                <th style="width: 50px">Tahun</th>
                                <th style="width: 40px">Semester</th>
                                <th style="width: 100px">Kode MatKul</th>
                                <th>Nama MatKul</th>
                                <th style="width: 40px">SKS</th>
                                <th style="width: 40px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dtKelas as $data)
                            <tr>
                                <td><a href="{{url('detail',$data->id)}}">{{$data->kode_kelas}}</a> </td>
                                <td>{{$data->tahun}} </td>
                                <td>{{$data->semester}} </td>
                                <td>{{$data->kode_matkul}} </td>
                                <td>{{$data->nama_matkul}} </td>
                                <td>{{$data->sks}} </td>
                                <td>
                                    <a href="{{url('edit-kelas',$data->id)}}"><i class="fas fa-edit"></i></a>
                                    |
                                    <a href="{{url('delete-kelas',$data->id)}}" onclick="return confirm('Apakah Yakin Hapus Data Kelas Ini?')"><i class="fas fa-trash-alt" style="color:#dc3545"></i></a>
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