@extends('template.index')

@section('title','Kelas')
@section('judul_atas')
<h1>Tambah Pertemuan</h1>
@endsection

@section('container')
<div class="container-fluid">
    <form action="{{route('simpan-pertemuan')}}" method="post">
        {{csrf_field()}}
        <table>
            <tr>
                <td>
                    <div class="form-group">
                        <label>Id Kelas</label>
                        <input type="text" class="form-control" min="0" name="kelas_id" placeholder="kelas id">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label>Pertemuan Ke-</label>
                        <input type="number" class="form-control" min="0" name="pertemuan_ke" placeholder="Pertemuan ke-">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label>Tanggal:</label>
                        <input type="date" class="form-control" min="0" name="tanggal" placeholder="Enter email">
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="form-group">
                        <label>Materi</label>
                        <textarea class="form-control" name="materi" placeholder="Enter ..."></textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection