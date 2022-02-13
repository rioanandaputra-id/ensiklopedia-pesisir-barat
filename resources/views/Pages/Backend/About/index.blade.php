@extends('Layouts.Backend.master')
@section('title', 'Halaman Tentang Kami')

@section('css')
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
                        <li class="breadcrumb-item"><a href="{{ url('backend') }}">Beranda</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    @include('Layouts.Backend.alert')

    <section class="content">
        <div class="card">
            <div class="card-body">

                @can('isContributor')
                    @php
                        if (!empty($about->body)) {
                            echo $about->body;
                        }
                    @endphp
                @endcan

                @can('isAdministrator')
                    <form method="POST" action="{{ url('backend/about') }}">
                        @method('PUT')
                        @csrf
                        <textarea id="body" name="body" required>{{ !empty($about->body) ? $about->body : '' }}</textarea>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>
                @endcan

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
    </script>
@stop
