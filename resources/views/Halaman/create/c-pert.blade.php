@extends('template.index')

@section('title','Kelas')
@section('judul_atas')
<h1>Tambah Pertemuan</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="invoice p-3 mb-3">
        <form action="{{route('simpan-pertemuan',$kelas_id->id)}}" method="post">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Succes!</h5>
                Pertemuan Berhasil Ditambahkan!
            </div>
            @elseif(session('fail'))
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                Pilih Tanggal dengan Benar!
            </div>
            @endif
            <div class="row invoice-info">
                <div class="col-sm-3 invoice-col">
                    {{csrf_field()}}
                    <table>
                        <input type="hidden" name="kelas_id" value="{{$kelas_id->id}}">
                        <tr>
                            <td colspan="2" style="width: 50px">
                                <div class="form-group">
                                    <label>Kode Kelas</label>
                                    <input type="text" class="form-control" name="kode_kelas" value="{{$kelas_id->kode_kelas}}" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="form-group">
                                    <label>Pertemuan Ke-</label>
                                    <input type="number" class="form-control" min="0" name="pertemuan_ke" placeholder="Pertemuan ke-" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="form-group">
                                    <label>Tanggal:</label>
                                    <input type="date" class="form-control" name="tanggal" placeholder="Enter email" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{url('detail',$kelas_id->id)}}" class="btn btn-primary"><- Back</a>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-success"><b>Submit</b></button>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-4 invoice-col">
                    <table>
                        <tr>
                            <label>Materi</label>
                            <textarea style="height: 230px" class="form-control" name="materi" placeholder="Enter ..." required></textarea>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection