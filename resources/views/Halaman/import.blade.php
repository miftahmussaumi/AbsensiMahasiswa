<form class="form-horizontal" method="post" action="{{url('save-import')}}" enctype="multipart/form-data">
{{csrf_field()}}
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputFile">File Absensi .csv</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" id="file" name="file">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
            </div>
        </div>
        <div class="input-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>