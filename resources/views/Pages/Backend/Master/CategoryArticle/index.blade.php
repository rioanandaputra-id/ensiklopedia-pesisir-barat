@extends('Layouts.Backend.master')
@section('title', 'Halaman Master Data - Kategori Artikel')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/Backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/Backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stop

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <h5>@yield('title')</h5>
                        <div class="ml-3">
                            <button id="add" class="btn btn-success btn-sm mb-4"> <i class="fa fa-plus-circle"></i>
                                Tambah</button>
                            <button type="button" id="delete" class="btn btn-danger btn-sm mb-4"> <i
                                    class="fa fa-trash"></i>
                                Hapus</button>
                        </div>
                    </div>
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
                <div class="table-responsive">
                    <table class="table table-bordered table-hover dataTable dtr-inline" id="tbcategory"
                        style="width: 100%">
                        <thead class="bg-green">
                            <tr>
                                <th><input type="checkbox" class="checkbox_all"></th>
                                <th>NAMA KATEGORI ARTIKEL</th>
                                <th>JUMLAH ARTIKEL</th>
                                <th style="width: 80px">AKSI</th>
                            </tr>
                        </thead>
                        {{-- <tfoot class="bg-green">
                            <tr>
                                <th><input type="checkbox" class="checkbox_all"></th>
                                <th>NAMA KATEGORI ARTIKEL</th>
                                <th>JUMLAH ARTIKEL</th>
                                <th style="width: 80px">AKSI</th>
                            </tr>
                        </tfoot> --}}
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('assets/Backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/Backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/Backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/Backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#tbcategory').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ url('backend/master/category_article/read') }}",
                    type: 'GET',
                    data: {
                        '_token': "{{ csrf_token() }}"
                    },
                },
                columns: [{
                        data: 'checkbox',
                        name: 'checkbox',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                    {
                        data: 'categoryy',
                        name: 'categoryy',
                        className: 'text-left',
                    },
                    {
                        data: 'count',
                        name: 'count',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                ],
                order: [
                    [1, "asc"]
                ],
            });

            $('.checkbox_all').click(function() {
                if ($(this).is(':checked')) {
                    $('.checkbox_item').prop('checked', true);
                    $('.checkbox_all').prop('checked', true);
                } else {
                    $('.checkbox_item').prop('checked', false);
                    $('.checkbox_all').prop('checked', false);
                }
            });

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
                        if (willDelete.isConfirmed) {
                            $.ajax({
                                url: "{{ url('backend/master/category_article/delete') }}",
                                type: "DELETE",
                                data: {
                                    '_token': "{{ csrf_token() }}",
                                    'checkbox_item': id
                                },
                                success: function(data) {
                                    Swal.fire({
                                        title: "Berhasil!",
                                        text: "Data berhasil dihapus",
                                        icon: "success",
                                        button: "Tutup",
                                    });
                                    $('.checkbox_all').prop('checked', false);
                                    $('#tbcategory').DataTable().ajax.reload();
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


            $('#add').click(function() {
                Swal.fire({
                    title: 'Tambah Kategori Artikel',
                    input: 'text',
                    inputPlaceholder: 'Nama Kategori Artikel',
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Tambah',
                    inputValidator: function(value) {
                        return new Promise(function(resolve, reject) {
                            if (value == '') {
                                resolve(
                                    'Nama Kategori Artikel tidak boleh kosong!');
                            } else {
                                resolve();
                            }
                        });
                    }
                }).then(function(result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('backend/master/category_article/create') }}",
                            type: "POST",
                            data: {
                                '_token': "{{ csrf_token() }}",
                                'categoryy': result.value
                            },
                            success: function(data) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: "Data berhasil ditambahkan",
                                    icon: "success",
                                    button: "Tutup",
                                });
                                $('#tbcategory').DataTable().ajax.reload();
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



        });

        function update(id, categoryy) {
            Swal.fire({
                title: 'Ubah Kategori Artikel',
                input: 'text',
                inputValue: categoryy,
                inputPlaceholder: 'Nama Kategori Artikel',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ubah',
                inputValidator: function(value) {
                    return new Promise(function(resolve, reject) {
                        if (value == '') {
                            resolve(
                                'Nama Kategori Artikel tidak boleh kosong!');
                        } else {
                            resolve();
                        }
                    });
                }
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('backend/master/category_article/update') }}",
                        type: "PUT",
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'id': id,
                            'categoryy': result.value
                        },
                        success: function(data) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Data berhasil diubah",
                                icon: "success",
                                button: "Tutup",
                            });
                            $('#tbcategory').DataTable().ajax.reload();
                        },
                        error: function(data) {
                            Swal.fire({
                                title: "Gagal!",
                                text: "Data gagal diubah",
                                icon: "error",
                                button: "Tutup",
                            });
                        }
                    });
                }
            });
        }
    </script>
@stop
