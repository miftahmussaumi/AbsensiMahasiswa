@extends('template.index')

@section('title','Mahasiswa')
@section('judul_atas')
<h1>Welcome !</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="invoice p-3 mb-3">
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header border-bottom-0">
                        @foreach($kode as $code)
                        <p class="text-sm"><b>KELAS {{$code->kode_kelas}}</b></p>
                        <h2 class="lead"><b></b></h2>
                        <p class="text-sm"><b>Mata Kuliah : </b>{{$code->nama_matkul}}</p>
                        <p class="text-sm"><b>Semester : </b>{{$code->semester}}</p>
                        <p class="text-sm"><b>Tahun : </b>{{$code->tahun}}</p>
                        <p class="text-sm"><b>SKS : </b>{{$code->sks}}</p>
                    </div>
                    @endforeach
                </div>
                <!-- </div> -->
            </div>
            <div class="col-sm-1 invoice-col">
            </div>
            <div class="col-sm-5 invoice-col">
                <h4 style="text-align: center;">Daftar Kelas</h4>
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="100">Pertemuan ke-</th>
                            <th width="100">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pert as $pt)
                        <tr>
                            <td>{{$pt->pertemuan_ke}}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection