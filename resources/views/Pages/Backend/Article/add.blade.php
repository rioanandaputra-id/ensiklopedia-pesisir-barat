@extends('Layouts.Backend.master')
@section('title', 'Halaman Artikel - Tambah')

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Backend/plugins/summernote/summernote-bs4.min.css') }}">
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
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="bg-white close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-error alert-dismissible fade show" role="alert">
                        <strong>{{ session('error') }}</strong>
                        <button type="button" class="bg-white close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-body">

                        <form method="POST" action="{{ url('backend/article/create') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul Artikel: <i
                                        class="text-danger">*</i></label>
                                <input type="text" class="form-control" id="title" name="title" required>
                                <!-- error message untuk title -->
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
                                        <option value="{{ $category->id }}">{{ $category->categoryy }}</option>
                                    @endforeach
                                </select>
                                <!-- error message untuk title -->
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="mb-3">
                                <label for="body" class="form-label">Isi Artikel: <i
                                        class="text-danger">*</i></label>
                                <textarea id="body" name="body" required></textarea>
                                <!-- error message untuk title -->
                                @error('body')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>




                            <div class="mb-3">
                                <button type="submit" class="d-inline btn btn-success mb-4"> <i
                                        class="fa fa-plus-circle"></i> Tambah Data</button>
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
    <script src="{{ asset('assets/Backend/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/Backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            $('#body').summernote({
                height: 200,
            })
        });
    </script>
@stop
