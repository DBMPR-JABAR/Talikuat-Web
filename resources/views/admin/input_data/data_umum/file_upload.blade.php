@extends('layout.index') @section('title','Data Umum') @section('header')
@endsection @section('page-header')
<div class="page-header">
    <h3 class="page-title">Upload File Kontrak</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('dataumum.index') }}">Data Umum</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('edit.dataumum',$data->id) }}"
                    >Edit Data Umum</a
                >
            </li>
            <li class="breadcrumb-item active" aria-current="page">Upload</li>
        </ol>
    </nav>
</div>
@endsection @section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Upload File</h4>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        {{--
                        <li><i class="feather icon-maximize full-card"></i></li>
                        --}}
                        <li>
                            <i class="feather icon-minus minimize-card"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="card-block">
                    @csrf @foreach($file_init as $file)

                    <div class="row">
                        <div class="col">
                            <label for="file">{{$file->label}}</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        class="custom-file-input"
                                        name="{{$file->name}}"
                                        accept="application/pdf"
                                        onchange="fileValidation(this)"
                                        id="{{$file->name}}"
                                    />
                                    <label
                                        class="custom-file-label"
                                        for="{{$file->name}}"
                                        >{{$file->file ? $file->file : 'Choose file'}}</label
                                    >
                                </div>
                                @if($file->file)
                                <div class="input-group-append">
                                    <a
                                        class="btn btn-primary"
                                        type="button"
                                        href="{{ route('show.file.dataumum',['id'=>$data->id,'file'=>$file->file] ) }}"
                                        target="_blank"
                                    >
                                        <i class="mdi mdi-file-document"></i>
                                    </a>
                                </div>
                                @endif
                                <div class="input-group-append">
                                    <button
                                        class="btn btn-success"
                                        type="button"
                                        id="{{$file->name.'_upload'}}"
                                        onclick="handleSumbit(this)"
                                    >
                                        Upload
                                    </button>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="text-danger">
                                    <strong
                                        id="{{
                                                $file->name . '_'
                                            }}file_error"
                                    ></strong>
                                </span>
                            </div>

                            <div class="form-group">
                                <div
                                    class="progress"
                                    id="{{$file->name.'_progress'}}"
                                ></div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('script')
<script>
    function fileValidation(file) {
        var fileId = file.id;
        var fileInput = document.getElementById(file.id);
        var filePath = fileInput.value;
        var allowedExtensions = /(\.pdf)$/i;

        if (!allowedExtensions.exec(filePath)) {
            $("#" + fileId + "_file_error").html(
                "File type Hanya diperbolehkan PDF"
            );
            return false;
        } else {
            $("label[for='" + fileId + "']").html(fileInput.files[0].name);
            $("#" + fileId + "_file_error").html("");
            return true;
        }
    }

    function sleep(ms) {
        return new Promise((resolve) => setTimeout(resolve, ms));
    }

    function handleSumbit(el) {
        var fileId = el.id.replace("_upload", "");
        var fileInput = document.getElementById(fileId);
        if (fileValidation(fileInput)) {
            var formData = new FormData();
            formData.append("file", fileInput.files[0]);
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("file_name", fileId);
            $.ajax({
                url: "{{ route('store.file.dataumum',$data->id) }}",
                type: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $("#" + fileId + "_progress").show();
                    $("#" + fileId + "_progress").html(
                        '<div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>'
                    );
                },
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (e) {
                        if (e.lengthComputable) {
                            var percentComplete = (e.loaded / e.total) * 100;
                            $("#" + fileId + "_progress .progress-bar").css(
                                "width",
                                percentComplete + "%"
                            );
                            $("#" + fileId + "_progress .progress-bar").html(
                                percentComplete + "%"
                            );
                        }
                    });
                    return xhr;
                },

                success: async function (data) {
                    $("#" + fileId + "_progress").html(
                        '<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>'
                    );
                    $("#" + fileId + "_progress").hide();
                    $("#" + fileId + "_upload").hide();
                    $("#" + fileId + "_file_error").html("");
                    $("#" + fileId + "_file_error").html(
                        '<div class="alert alert-success" role="alert">' +
                            data.message +
                            "</div>"
                    );
                    await sleep(1000);
                    location.reload();
                },
                error: function (data) {
                    $("#" + fileId + "_file_error").html(
                        "Terjadi kesalahan, silahkan coba lagi atau hubungi admin"
                    );
                },
            });
        }
    }

    $(document).ready(function () {
        $(".progress").hide();
    });
</script>

@endsection
