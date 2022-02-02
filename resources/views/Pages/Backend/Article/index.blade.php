@extends('Layouts.Backend.master')
@section('title', 'Artikel Terbit')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/Backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/Backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@stop

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <h1>@yield('title')</h1>
                </div>
                <div class="col-sm-4 mt-1">
                    <a href="{{ route('backend.article.add') }}" class="d-inline btn btn-success btn-sm mb-4"> <i class="fa fa-plus-circle"></i> Tambah</a>
                    <a href="" class="d-inline btn btn-danger btn-sm mb-4"> <i class="fa fa-trash"></i> Hapus</a>
                    <a href="" class="d-inline btn bg-purple btn-sm mb-4"> <i class="fa fa-check-circle"></i> Persetujuan</a>
                </div>
                <div class="col-sm-5">
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
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover dataTable dtr-inline tbarticle" id="tbarticle"
                        style="width: 100%">
                        <thead class="bg-green">
                            <tr>
                                <th>#</th>
                                <th style="width: 350px">JUDUL</th>
                                <th>INDEK</th>
                                <th>KATEGORI</th>
                                <th>PENULIS</th>
                                <th>STATUS</th>
                                <th>DIPERBAHARUI</th>
                                <th style="width: 80px">AKSI</th>
                            </tr>
                        </thead>
                        <tfoot class="bg-green">
                            <tr>
                                <th>#</th>
                                <th>JUDUL</th>
                                <th>INDEK</th>
                                <th>KATEGORI</th>
                                <th>PENULIS</th>
                                <th>STATUS</th>
                                <th>DIPERBAHARUI</th>
                                <th>AKSI</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <!-- Delete Article Modal -->
    <div class="modal" id="DeleteArticleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Artikel</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h4>Apakah Anda yakin ingin menghapus Artikel ini?</h4>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="SubmitDeleteArticleForm">Hapus</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script src="{{ asset('assets/Backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/Backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/Backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/Backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/Backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/Backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/Backend/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/Backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/Backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/Backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/Backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/Backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script> --}}

    <script type="text/javascript">
        $(document).ready(function() {
            $('.tbarticle').DataTable({
                processing: true,
                serverSide: true,
                ajax: "",
                columns: [
                    {
                        data: 'checkbox',
                        name: 'checkbox',
                        orderable: false,
                        serachable: false,
                        sClass: 'text-center'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'article_index',
                        name: 'article_index.indexx'
                    },
                    {
                        data: 'article_category',
                        name: 'article_category.categoryy'
                    },
                    {
                        data: 'user',
                        name: 'user.fullname'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        serachable: false,
                        sClass: 'text-center'
                    },
                ],
                order: [
                    [6, "desc"]
                ],
            });
        });


    </script>

@stop
