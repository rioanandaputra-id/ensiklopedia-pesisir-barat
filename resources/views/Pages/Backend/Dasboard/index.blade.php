@extends('Layouts.Backend.master')
@section('title', 'Halaman Beranda')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/Backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/Backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@stop

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0">Beranda</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-newspaper"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text text-bold">Artikel</span>
                            <span style="font-size: 12px">
                                <a class="text-white" href="{{ url('backend/article?status=terbit') }}">
                                    {{ $article['terbit'] }} Terbit
                                </a>
                            </span>
                            <span style="font-size: 12px">
                                <a class="text-white" href="{{ url('backend/article?status=arsip') }}">
                                    {{ $article['arsip'] }} Arsip
                                </a>
                            </span>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-image"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text text-bold">Galleri Foto</span>
                            <span style="font-size: 12px">
                                <a class="text-white" href="{{ url('backend/gallery/photo?status=terbit') }}">
                                    {{ $albumPhoto['terbit'] }} Album Terbit ({{ $photo['terbit'] }} Foto)
                                </a>
                            </span>
                            <span style="font-size: 12px">
                                <a class="text-white" href="{{ url('backend/gallery/photo?status=arsip') }}">
                                    {{ $albumPhoto['arsip'] }} Album Arsip ({{ $photo['arsip'] }} Foto)
                                </a>
                            </span>
                        </div>

                    </div>
                </div> --}}

                {{-- <div class="clearfix hidden-md-up"></div> --}}
                {{-- <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-video"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text text-bold">Galleri Video</span>
                            <span style="font-size: 12px">
                                <a class="text-white" href="{{ url('backend/gallery/video?status=terbit') }}">
                                    {{ $albumVideo['terbit'] }} Album Terbit ({{ $video['terbit'] }} Video)
                                </a>
                            </span>
                            <span style="font-size: 12px">
                                <a class="text-white" href="{{ url('backend/gallery/video?status=arsip') }}">
                                    {{ $albumVideo['arsip'] }} Album Arsip ({{ $video['arsip'] }} Video)
                                </a>
                            </span>
                        </div>
                    </div>
                </div> --}}

                <div class="col-12 col-sm-12 col-md-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text text-bold">Pengguna Sistem</span>
                            <span style="font-size: 12px">
                                <a class="text-white" href="{{ url('backend/master/user') }}">
                                    {{ $user['active'] }} Aktif
                                </a>
                            </span>
                            <span style="font-size: 12px">
                                <a class="text-white" href="{{ url('backend/master/user') }}">
                                    {{ $user['nonActive'] }} Tidak Aktif
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h5 class="d-inline">Grafik Pengunjung Website</h5><br>
                                {{-- <img src="{{ asset('online.ico') }}" alt="Logo" width="20" height="20">
                                <small class="d-inline">1 Orang Online</small> --}}
                            </div>
                            <div class="card-tools">
                                <form>
                                    {{-- @csrf --}}
                                    <div class="btn-group">
                                        <input type="date" name="dateFrom" id="dateFrom"
                                            class="mr-3 form-control text-white d-line"
                                            value="{{ request('dateFrom') }}" />
                                        <p class="mt-1">s.d</p>
                                        <input type="date" name="dateTo" id="dateTo"
                                            class="ml-3 form-control text-white d-line"
                                            value="{{ request('dateTo') }}" />

                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary ml-2 p-2 mb-1">
                                        <i class="fas fa-search"></i>
                                </form>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="chart">
                                        {{-- <canvas id="visitorchart" height="180" style="height: 180px;"></canvas> --}}
                                        <div id="visitorchart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-6 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-primary">
                                            {{ $visitor['article'] }}x dilihat</span>
                                        <h5 class="description-header">Halaman</h5>
                                        <span class="description-text">Artikel</span>
                                    </div>
                                </div> --}}

                        {{-- <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-danger">
                                            {{ $visitor['photo'] }}x dilihat</span>
                                        <h5 class="description-header">Halaman</h5>
                                        <span class="description-text">Gallery Foto</span>
                                    </div>
                                </div>

                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success">
                                            {{ $visitor['video'] }}x dilihat</span>
                                        <h5 class="description-header">Halaman</h5>
                                        <span class="description-text">Gallery Video</span>
                                    </div>
                                </div> --}}

                        {{-- <div class="col-sm-6 col-6">
                                    <div class="description-block">
                                        <span class="description-percentage text-warning">
                                            {{ $visitor['other'] }}x dilihat</span>
                                        <h5 class="description-header">Halaman</h5>
                                        <span class="description-text">Lainnya</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Detail Kunjungan Website</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover dataTable dtr-inline" id="visitors"
                                    style="width: 100%">
                                    <thead class="bg-success">
                                        <tr>
                                            <th>ALAMAT IP</th>
                                            <th>HALAMAN</th>
                                            <th>WAKTU</th>
                                        </tr>
                                    </thead>
                                    {{-- <tfoot class="bg-green">
                                        <tr>
                                            <th>ALAMAT IP</th>
                                            <th>HALAMAN</th>
                                            <th>WAKTU</th>
                                        </tr>
                                    </tfoot> --}}
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Aktivitas Pengguna Sistem</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover dataTable dtr-inline" id="activitys" style="width: 100%">
                                    <thead class="bg-success">
                                        <tr>
                                            <th>PENGGUNA</th>
                                            <th>AKTIFITAS</th>
                                            <th>WAKTU</th>
                                            <th>TARGET</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="bg-green">
                                        <tr>
                                            <th>PENGGUNA</th>
                                            <th>AKTIFITAS</th>
                                            <th>WAKTU</th>
                                            <th>TARGET</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </section>


@endsection

@section('js')
    <script src="{{ asset('assets/Backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/Backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/Backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/Backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        var userData = <?php echo json_encode($Dchart); ?>;
        Highcharts.chart('visitorchart', {
            title: {
                text: 'Grafik Pengunjung Website'
            },
            subtitle: {
                text: $('#dateFrom').val() + ' s.d ' + $('#dateTo').val()
            },
            xAxis: {
                categories: <?php echo json_encode($Lchart); ?>

            },
            yAxis: {
                title: {
                    text: 'Jumlah kunjungan per hari'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Pengunjung',
                data: userData
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#visitors').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    // url: "{{ url('backend/read_visitor') }}",
                    type: 'GET',
                    data: {
                        '_token': "{{ csrf_token() }}",
                    },
                },
                columns: [
                    // {
                    //     data: 'checkbox',
                    //     name: 'checkbox',
                    //     orderable: false,
                    //     searchable: false,
                    //     className: 'text-center',
                    // },
                    {
                        data: 'ip_address',
                        name: 'ip_address',
                        className: 'text-left',
                    },
                    // {
                    //     data: 'category',
                    //     name: 'category',
                    //     className: 'text-left',
                    // },
                    {
                        data: 'url',
                        name: 'url',
                        className: 'text-left',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        className: 'text-left',
                    },
                    // {
                    //     data: 'action',
                    //     name: 'action',
                    //     orderable: false,
                    //     searchable: false,
                    //     className: 'text-center',
                    // },
                ],
                order: [
                    [2, "desc"]
                ],
            });

            // $('#activitys').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     responsive: true,
            //     ajax: {
            //         url: "{{ url('backend/read_activity') }}",
            //         type: 'GET',
            //         data: {
            //             '_token': "{{ csrf_token() }}",
            //         },
            //     },
            //     columns: [
            //         // {
            //         //     data: 'checkbox',
            //         //     name: 'checkbox',
            //         //     orderable: false,
            //         //     searchable: false,
            //         //     className: 'text-center',
            //         // },
            //         {
            //             data: 'user_created[0].username',
            //             name: 'username',
            //             className: 'text-left',
            //         },
            //         {
            //             data: 'activity',
            //             name: 'activity',
            //             className: 'text-left',
            //         },
            //         {
            //             data: 'created_at',
            //             name: 'created_at',
            //             className: 'text-left',
            //         },
            //         {
            //             data: 'user_target[0].username',
            //             name: 'username',
            //             className: 'text-left',
            //         },
            //         // {
            //         //     data: 'action',
            //         //     name: 'action',
            //         //     orderable: false,
            //         //     searchable: false,
            //         //     className: 'text-center',
            //         // },
            //     ],
            //     order: [
            //         [2, "desc"]
            //     ],
            // });
        });
    </script>
@stop
