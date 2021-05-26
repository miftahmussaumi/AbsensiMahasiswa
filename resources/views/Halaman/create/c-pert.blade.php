@extends('template.index')

@section('title','Kelas')
@section('judul_atas')
<h1>Tambah Pertemuan</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="invoice p-3 mb-3">
        <form action="{{route('simpan-pertemuan')}}" method="post">
            <div class="row invoice-info">
                <div class="col-sm-5 invoice-col">
                    {{csrf_field()}}
                    <table>
                    <input type="hidden" name="kelas_id" value="{{$kelas_id->id}}">
                        <tr>
                            <div class="form-group">
                                <label>Kode Kelas</label>
                                <input type="text" class="form-control" name="kode_kelas" value="{{$kelas_id->kode_kelas}}" readonly>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <label>Pertemuan Ke-</label>
                                <input type="number" class="form-control" min="0" name="pertemuan_ke" placeholder="Pertemuan ke-" required>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <label>Tanggal:</label>
                                <input type="date" class="form-control" name="tanggal" placeholder="Enter email" required>
                            </div>
                        </tr>
                        <tr>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-7 invoice-col">
                    <table>
                        <tr>
                            <label>Materi</label>
                            <textarea class="form-control" name="materi" placeholder="Enter ..." required></textarea>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection