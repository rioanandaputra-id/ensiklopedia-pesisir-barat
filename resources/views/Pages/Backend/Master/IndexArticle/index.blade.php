@extends('Layouts.Backend.master')
@section('title', 'Halaman Master Data - Indek Artikel')

@section('css')
@stop

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <h5>@yield('title')</h5>
            </div>
            <div class="col-sm-4">
                <a href="{{ url('backend/article/add') }}" class="btn btn-success btn-sm mb-4"> <i
                        class="fa fa-plus-circle"></i> Tambah</a>
                <button type="button" id="delete" class="btn btn-danger btn-sm mb-4"> <i class="fa fa-trash"></i>
                    Hapus</button>
                {{-- <button type="button" id="update_status" class="btn bg-purple btn-sm mb-4"> <i
                        class="fa fa-check-circle"></i> Persetujuan</button> --}}
            </div>
            <div class="col-sm-4">
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
            <div class="table-responsive">
                <table class="table table-bordered table-hover dataTable dtr-inline" id="tbarticle" style="width: 100%">
                    <thead class="bg-green">
                        <tr>
                            <th><input type="checkbox" class="checkbox_all"></th>
                            <th>NAMA INDEK ARTIKEL</th>
                            <th>JUMLAH ARTIKEL</th>
                            <th style="width: 80px">AKSI</th>
                        </tr>
                    </thead>
                    <tfoot class="bg-green">
                        <tr>
                            <th><input type="checkbox" class="checkbox_all"></th>
                            <th>NAMA INDEK ARTIKEL</th>
                            <th>JUMLAH ARTIKEL</th>
                            <th style="width: 80px">AKSI</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
@stop
