@extends('template.index')

@section('title','Detail')
@section('judul_atas')
<h1>Detail Kelas</h1>
@endsection

@section('container')
<div class="container-fluid">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Success</h5>
        {{ session('success') }}
    </div>
    @elseif(session('delete'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-trash-alt"></i> Success!</h5>
        {{session('delete')}}
    </div>
    @endif
    <div class="invoice p-3 mb-3">
        <div class="row invoice-info">
            <div class="col-sm-5 invoice-col">
                <b>Kode Kelas {{$kelas->kode_kelas}}</b><br>
                <br>
                <b>Kode MatKul : </b> {{$kelas->kode_matkul}}<br>
                <b>Mata Kuliah : </b> {{$kelas->nama_matkul}}<br>
                <b>Tahun : </b> {{$kelas->tahun}} <br>
                <b>Semester : </b> {{$kelas->semester}} <br>
                <b>Jumlah SKS : </b> {{$kelas->sks}} <br>
                <b>Pertemuan :</b><br>
                @foreach($pert as $dt)
                @if($dt->pertemuan_ke > 0)
                <a href="{{url('detail-pertemuan',$dt->pertemuan_id)}}">Pertemuan ke-{{$dt->pertemuan_ke}}</a>
                @else <p>Pertemuan Masih Kosong</p>
                @endif
                @endforeach
                <br><br>
                <a href="{{url('tambah-pertemuan',$dt->kelas_id)}}"><input type="button" value="+ Pertemuan" class="btn btn-danger"></a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    + Mahasiswa
                </button>
            </div>
            <div class="col-sm-7 invoice-col">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 100px">Nim</th>
                            <th>Nama</th>
                            <th style="width: 30px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($krs as $mhs)
                        <tr>
                            <td>{{$mhs->nim}}</td>
                            <td>{{$mhs->nama}}</td>
                            <td>
                                <a href="{{ url('delete-mhs',$mhs->krs_id) }}" onclick="return confirm('Apakah Yakin Menghapus Mahasiswa Ini?')"><i class="icon fas fa-trash-alt" style="color:#dc3545"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <form action="{{route('simpan-mhs')}}" method="post">
                            {{csrf_field()}}
                            <div class="modal-header">
                                <h4 class="modal-title">Kelas {{$kelas->id}} </h4>
                                <input type="text" hidden value="{{ $kelas->id }}" name="kelas_id">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label>Tambah Mahasiswa</label>
                                <select class="form-control" name="id_mhs">
                                    <option disabled selected>- Pilih Mahasiswa -</option>
                                    @foreach ($datamhs as $tb)
                                    <option value="{{ $tb->id_mhs }}">{{$tb->nama_mhs}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection