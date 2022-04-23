@extends('Layouts.Backend.master')
@section('title', 'Halaman Artikel - Ubah')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/Backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/Backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Backend/plugins/summernote/summernote-bs4.min.css') }}">
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

    @include('Layouts.Backend.alert')

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-body">

                        <form action="{{ url('backend/article/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $posts->slug }}" name="slug" id="slug">
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul Artikel: <i
                                        class="text-danger">*</i></label>
                                <input type="text" class="form-control" id="title" name="title" required
                                    value="{{ $posts->title }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Kategori Artikel:
                                    <i class="text-danger">*</i></label>
                                <select class="form-control" id="category" name="category_id" required>
                                    <option></option>
                                    @foreach ($categorys as $category)
                                        @php
                                            $selected = $category->id == $posts->article_category_id ? 'selected' : '';
                                        @endphp
                                        <option {{ $selected }} value="{{ $category->id }}">
                                            {{ $category->categoryy }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="file">Foto Artikel: <i class="text-danger">*</i></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type='file' id="fotofile" class="btn btn-success mr-2" name="fotofile">
                                        <input type="text" name="fotourl" id="fotourl" hidden>

                                        <button class="btn btn-warning p-2" id="btnurl" type="button" style="width: 430px">
                                            <i class="fa fa-link"></i> Via URL</button>
                                    </div>
                                    <div class="input-group-append">
                                        <img src="{{ url($posts->article_image) }}" alt="Foto Artikel"
                                            class="img-thumbnail" id="imgPreview" width="300">
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="body" class="form-label">Isi Artikel: <i
                                        class="text-danger">*</i></label>
                                <textarea id="body" name="body" required>{{ $posts->body }}</textarea>
                                @error('body')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="d-inline btn btn-success mb-4"> <i class="fa fa-edit"></i>
                                    Ubah Data</button>
                                <button type="reset" class="d-inline btn btn-danger mb-4"> <i class="fa fa-arrow-left"></i>
                                    Kembali</button>
                            </div>
                        </form>

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
    <script>
        $(document).ready(function() {

            $('#fotofile').change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imgPreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#btnurl').click(function() {
                swal.fire({
                    title: 'Masukkan URL Foto',
                    input: 'text',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    showLoaderOnConfirm: true,
                    preConfirm: (url) => {
                        return fetch(url)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error(response.statusText)
                                }
                                return response.url
                            })
                            .catch(error => {
                                swal.showValidationMessage(
                                    `Gagal Mengambil URL Foto. coba dari sumber lain!`
                                )
                            })
                    },
                    allowOutsideClick: () => !swal.isLoading()
                }).then((result) => {
                    if (result.value) {
                        $('#imgPreview').attr('src', result.value);
                        $('#fotourl').val(result.value);
                    }
                })
            });
        });
    </script>
    <script src="{{ asset('assets/Backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            $('#body').summernote({
                height: 200,
            })
        });
        $('.select2').select2();
    </script>
@stop
