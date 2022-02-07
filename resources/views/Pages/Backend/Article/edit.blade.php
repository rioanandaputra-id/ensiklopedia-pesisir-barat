@extends('Layouts.Backend.master')
@section('title', 'Halaman Artikel - Ubah')

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

    @include('Layouts.Backend.alert')

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-body">

                            <form action="{{ url('backend/article/update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{$posts->slug}}" name="slug" id="slug">
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
                                        $selected = ($category->id == $posts->article_category_id) ? 'selected' : '';
                                    @endphp
                                        <option {{$selected}} value="{{ $category->id }}">{{ $category->categoryy }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
