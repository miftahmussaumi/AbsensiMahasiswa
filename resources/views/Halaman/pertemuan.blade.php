@extends('template.index')

@section('title','Pertemuan')
@section('judul_atas')
<h1>Detail Pertemuan</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('img/kelas.png')}}">
                    </div>
                    @foreach($kls as $dt1)
                    <h1 class="profile-username text-center">Kelas {{$dt1->kode_kelas}}</h1>
                    <p class="text-center">{{$dt1->nama_matkul}}</p>
                    <p class="text-muted text-center">Pertemuan ke- {{$dt1->pertemuan_ke}}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Tahun</b> <a class="float-right">{{$dt1->tahun}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Semester</b> <a class="float-right">{{$dt1->semester}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Jumlah SKS</b> <a class="float-right">{{$dt1->sks}}</a>
                        </li>
                    </ul>
                    <a href="{{url('detail',$dt1->kelas_id)}}" class="btn btn-primary btn-block"><b>Back</b></a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-times"></i> Alert!</h5>
                {{session('error')}}
            </div>
            @elseif(session('import'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                {{session('import')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#mahasiswa" data-toggle="tab">Data Mahasiswa</a></li>
                        <li class="nav-item"><a class="nav-link" href="#materi" data-toggle="tab">Materi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#upload" data-toggle="tab">Upload File</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="mahasiswa">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Nim</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Durasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <!-- PertemuanController@showDetail -->
                                    @foreach($pert as $dt)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$dt->nim}}</td>
                                        <td>{{$dt->nama}}</td>
                                        <td>Hadir</td>
                                        <td>{{$dt->jam_masuk}}</td>
                                        <td>{{$dt->jam_keluar}}</td>
                                        <td>{{$dt->durasi}}</td>
                                    </tr>
                                    @endforeach
                                    @foreach($krs as $absen)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$absen->nim}}</td>
                                        <td>{{$absen->nama}}</td>
                                        <td><u>Absen</u></td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="materi">
                            @foreach($kls as $dt2)
                            Ringkasan Materi Kelas <b>{{$dt1->nama_matkul}} </b> Pertemuan ke-<b>{{$dt1->pertemuan_ke}}</b><br>
                            Tanggal Pertemuan : <b>{{$dt1->tanggal}}</b>
                            <br><br>
                            {{$dt1->materi}}
                            @endforeach
                        </div>
                        <div class="tab-pane" id="upload">
                            <form action="{{route('save-import')}}" method="post" name="import" id="import" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="form-group">
                                        <!-- PertemuanController@showDetail -->
                                        @foreach($kls as $data)
                                        <div class="input-group">
                                            <input type="text" hidden name="kelas_id" value="{{ $data->kelas_id }}">
                                            <input type="text" hidden name="pertemuan_id" value="{{ $data->pertemuan_id }}">
                                        </div>
                                        @endforeach
                                        <label>File Absensi .csv</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file" name="file">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-primary" id="submit" name="import">Import</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection