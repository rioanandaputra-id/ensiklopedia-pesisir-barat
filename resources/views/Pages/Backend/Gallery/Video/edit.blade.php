@php
function getYoutubeEmbedUrl($url)
{
    $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
    $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

    if (preg_match($longUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }

    if (preg_match($shortUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }

    if (!empty($youtube_id)) {
        return 'https://www.youtube.com/embed/' . $youtube_id;
    } else {
         return $url;
    }
}
@endphp

@extends('Layouts.Backend.master')
@section('title', 'Halaman Galleri Video - Unggah')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/Backend/plugins/dropzone/min/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Backend/plugins/ekko-lightbox/ekko-lightbox.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stop

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5>@yield('title')</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">

                                <div class="mb-3">
                                    <label for="body" class="form-label">Nama Album Video: <i
                                            class="text-danger">*</i></label>
                                    <input type="text" class="form-control" value="{{ $albums->name }}" readonly>
                                </div>

                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Pilih Video untuk diunggah atau seret dan jatuhkan Video
                                            pada area kolom dibawah</h3>
                                    </div>
                                    <div class="card-body">
                                        <div id="actions" class="row">
                                            <div class="col-lg-8">
                                                <div class="btn-group w-100">
                                                    <span class="btn btn-success col fileinput-button">
                                                        <i class="fas fa-plus"></i>
                                                        <span>Pilih Video</span>
                                                    </span>
                                                    <button type="submit" class="btn btn-primary col start">
                                                        <i class="fas fa-upload"></i>
                                                        <span>Mulai unggah</span>
                                                    </button>
                                                    <button type="reset" class="btn btn-warning col cancel">
                                                        <i class="fas fa-times-circle"></i>
                                                        <span>Batal unggah</span>
                                                    </button>
                                                    <button type="button" class="btn bg-purple col" id="btnurl">
                                                        <i class="fas fa-link"></i>
                                                        <span>Video Via URL</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 d-flex align-items-center">
                                                <div class="fileupload-process w-100">
                                                    <div id="total-progress" class="progress progress-striped active"
                                                        role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                                        aria-valuenow="0">
                                                        <div class="progress-bar progress-bar-success" style="width:0%;"
                                                            data-dz-uploadprogress></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table table-striped files" id="previews">
                                            <div id="template" class="row mt-2">
                                                <div class="col-auto">
                                                    <span class="preview"><img src="data:," alt=""
                                                            data-dz-thumbnail /></span>
                                                </div>
                                                <div class="col d-flex align-items-center">
                                                    <p class="mb-0">
                                                        <span class="lead" data-dz-name></span>
                                                        (<span data-dz-size></span>)
                                                    </p>
                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                </div>
                                                <div class="col-4 d-flex align-items-center">
                                                    <div class="progress progress-striped active w-100" role="progressbar"
                                                        aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                        <div class="progress-bar progress-bar-success" style="width:0%;"
                                                            data-dz-uploadprogress></div>
                                                    </div>
                                                </div>
                                                <div class="col-auto d-flex align-items-center">
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary start">
                                                            <i class="fas fa-upload"></i>
                                                            <span>Mulai</span>
                                                        </button>
                                                        <button data-dz-remove class="btn btn-warning cancel">
                                                            <i class="fas fa-times-circle"></i>
                                                            <span>Batal</span>
                                                        </button>
                                                        <button data-dz-remove class="btn btn-danger delete">
                                                            <i class="fas fa-trash"></i>
                                                            <span>Hapus</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer" style="margin-top: 100px;">
                                        Ukuran maksimal (5MB) dan format yang didukung: jpg | jpeg | png | gif | bmp | svg |
                                        tiff
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4 class="card-title">Video Tersimpan</h4>
                                        <button type="button" class="btn btn-danger btn-sm float-right" id="delete"> <i
                                                class="fa fa-trash"></i> Hapus</button>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($videos as $video)
                                                <div class="col-sm-3">
                                                    @if ($video->document->uploaded != 0)
                                                        <input type="checkbox" name="checkbox_item[]" class="checkbox_item"
                                                            value="{{ $video->document->id }}">
                                                            {{-- Video {{ $i }} - {{ $video->document->title }} --}}
                                                            <iframe width="200" width="150"
                                                                src="{{ url($video->document->path) }}"
                                                                title="{{ $video->document->title }}" frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                allowfullscreen></iframe>
                                                        </a>
                                                    @else
                                                        <input type="checkbox" name="checkbox_item[]" class="checkbox_item"
                                                            value="{{ $video->document->id }}">
                                                            {{-- Video {{ $i }} - {{ $video->document->title }} --}}
                                                            <iframe width="200" width="150"
                                                                src="{{ getYoutubeEmbedUrl($video->document->path) }}"
                                                                title="{{ $video->document->title }}" frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                allowfullscreen></iframe>
                                                        </a>
                                                    @endif
                                                </div>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer">
                        <i class="text-danger">*</i>) Input harus diisi.
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('assets/Backend/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/Backend/plugins/dropzone/min/dropzone.min.js') }}"></script>
    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });
        })

        Dropzone.autoDiscover = false
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, {
            url: "{{ url('backend/gallery/upload') }}",
            method: 'POST',
            params: {
                '_token': "{{ csrf_token() }}",
                'id': "{{ $albums->id }}",
                'type': 'video',
                'uploaded': 1,
            },
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false,
            previewsContainer: "#previews",
            clickable: ".fileinput-button",
        })

        myDropzone.on("addedfile", function(file) {
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file)
            }
        })

        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            document.querySelector("#total-progress").style.opacity = "1"
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
            location.reload();
        })
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
        }

        $('#delete').click(function() {
            var id = [];
            $('.checkbox_item:checked').each(function() {
                id.push($(this).val());
            });
            if (id.length > 0) {
                Swal.fire({
                    title: "Apakah anda yakin?",
                    text: "Data yang sudah dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    buttons: true,
                    showCancelButton: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ url('backend/gallery/unlink') }}",
                            type: "DELETE",
                            data: {
                                '_token': "{{ csrf_token() }}",
                                'id': id,
                                'type': 'video',
                            },
                            success: function(data) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: "Data berhasil dihapus",
                                    icon: "success",
                                    button: "Tutup",
                                });
                                $('.checkbox_all').prop('checked', false);
                                location.reload();
                            },
                            error: function(data) {
                                Swal.fire({
                                    title: "Gagal!",
                                    text: "Data gagal dihapus",
                                    icon: "error",
                                    button: "Tutup",
                                });
                            }
                        });
                    }
                });
            } else {
                Swal.fire({
                    title: "Pilih data yang ingin dihapus!",
                    icon: "warning",
                    button: "Tutup",
                });
            }
        });

        $('#btnurl').click(function() {
            Swal.fire({
                title: 'Tambah URL',
                html: '<input id="swal-input1" class="swal2-input" placeholder="URL">' +
                    '<input id="swal-input2" class="swal2-input" placeholder="Judul Video">',
                focusConfirm: false,
                preConfirm: () => {
                    return [
                        $('#swal-input1').val(),
                        $('#swal-input2').val()
                    ]
                }
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ url('backend/gallery/upload') }}",
                        type: "POST",
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'id': "{{ $albums->id }}",
                            'type': 'video',
                            'uploaded': 0,
                            'url': result.value[0],
                            'title': result.value[1],
                        },
                        success: function(data) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Data berhasil ditambahkan",
                                icon: "success",
                                button: "Tutup",
                            });
                            location.reload();
                        },
                        error: function(data) {
                            Swal.fire({
                                title: "Gagal!",
                                text: "Data gagal ditambahkan",
                                icon: "error",
                                button: "Tutup",
                            });
                        }
                    });
                }
            });
        });
    </script>
@stop
