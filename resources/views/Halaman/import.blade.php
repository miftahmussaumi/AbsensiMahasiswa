<form action="{{route('save-import')}}" method="post" name="import" id="import" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="card-body">
        <div class="form-group">
            <label>Kode Kelas</label>
            <input type="text" class="form-control" name="kode_kelas">
        </div>
        <div class="form-group">
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