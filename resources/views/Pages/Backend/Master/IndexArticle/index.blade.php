@extends('Layouts.Backend.master')
@section('title', 'Halaman Master Data - Indek Artikel')

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
                <div class="col-sm-4">
                    <h5>@yield('title')</h5>
                </div>
                <div class="col-sm-4">
                    <button type="button" id="delete" class="btn btn-danger btn-sm mb-4"> <i class="fa fa-trash"></i>
                        Hapus</button>
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
                    <table class="table table-bordered table-hover dataTable dtr-inline" id="tbindex"
                        style="width: 100%">
                        <thead class="bg-green">
                            <tr>
                                <th><input type="checkbox" class="checkbox_all"></th>
                                <th>NAMA INDEK ARTIKEL</th>
                                <th>JUMLAH ARTIKEL</th>
                            </tr>
                        </thead>
                        <tfoot class="bg-green">
                            <tr>
                                <th><input type="checkbox" class="checkbox_all"></th>
                                <th>NAMA INDEK ARTIKEL</th>
                                <th>JUMLAH ARTIKEL</th>
                            </tr>
                        </tfoot>
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
            $('#tbindex').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ url('backend/master/index_article/read') }}",
                    type: 'GET',
                    data: {
                        '_token': "{{ csrf_token() }}",
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
                        data: 'indexx',
                        name: 'indexx',
                        className: 'text-left',
                    },
                    {
                        data: 'count',
                        name: 'count',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    }
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
                                url: "{{ url('backend/master/index_article/delete') }}",
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
                                    $('#tbindex').DataTable().ajax.reload();
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
        });
    </script>
@stop
