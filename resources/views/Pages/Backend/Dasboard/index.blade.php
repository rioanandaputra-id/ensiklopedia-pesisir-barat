@extends('Layouts.Backend.master')
@section('title', 'Halaman Beranda')

@section('css')
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
                <div class="col-12 col-sm-6 col-md-3">
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

                <div class="col-12 col-sm-6 col-md-3">
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
                </div>

                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
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
                </div>

                <div class="col-12 col-sm-6 col-md-3">
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
                                <div class="btn-group">
                                    <input type="date" class="mr-3 form-control text-white d-line"
                                        value="{{ date('Y-m-d', strtotime('-30 days')) }}" timezone="Asia/Jakarta" />
                                    <p class="mt-1">s.d</p>
                                    <input type="date" class="ml-3 form-control text-white d-line"
                                        value="{{ date('Y-m-d') }}" timezone="Asia/Jakarta" />

                                </div>
                                <button type="button" class="btn btn-sm btn-primary ml-2 p-2 mb-1">
                                    <i class="fas fa-search"></i>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="chart">
                                        <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-primary">
                                            17x dilihat</span>
                                        <h5 class="description-header">Halaman</h5>
                                        <span class="description-text">Artikel</span>
                                    </div>
                                </div>

                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-danger">
                                            0x dilihat</span>
                                        <h5 class="description-header">Halaman</h5>
                                        <span class="description-text">Gallery Foto</span>
                                    </div>
                                </div>

                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success">
                                            20x dilihat</span>
                                        <h5 class="description-header">Halaman</h5>
                                        <span class="description-text">Gallery Video</span>
                                    </div>
                                </div>

                                <div class="col-sm-3 col-6">
                                    <div class="description-block">
                                        <span class="description-percentage text-warning">
                                            18x dilihat</span>
                                        <h5 class="description-header">Halaman</h5>
                                        <span class="description-text">Lainnya</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Detail Kunjungan Website</h3>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead class="bg-success">
                                        <tr>
                                            <th>ALAMAT IP</th>
                                            <th>KATEGORI</th>
                                            <th>HALAMAN</th>
                                            <th>WAKTU</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>192.168.03.12</td>
                                            <td><span class="badge badge-primary">ARTIKEL</span></td>
                                            <td style="max-width: 300px"><a href="https://ensiklopedia-pesbar.test/article/id-libero-veniam-et-culpa-animi-cumque-architecto-quia-cupiditate" target="_blank">/article/id-libero-veniam-et-culpa-animi-cumque-...</a></td>
                                            <td>19-02-2022 11:24:04</td>
                                        </tr>
                                        <tr>
                                            <td>192.99.45.22</td>
                                            <td><span class="badge badge-danger">GALLERY FOTO</span></td>
                                            <td style="max-width: 300px"><a href="https://ensiklopedia-pesbar.test/gallery/photo" target="_blank">/gallery/photo</a></td>
                                            <td>19-02-2022 11:24:04</td>
                                        </tr>
                                        <tr>
                                            <td>192.85.19.21</td>
                                            <td><span class="badge badge-success">GALLERY VIDEO</span></td>
                                            <td style="max-width: 300px"><a href="https://ensiklopedia-pesbar.test/gallery/video" target="_blank">/gallery/video</a></td>
                                            <td>19-02-2022 11:24:04</td>
                                        </tr>
                                        <tr>
                                            <td>192.22.11.78</td>
                                            <td><span class="badge badge-warning">LAINNYA</span></td>
                                            <td style="max-width: 300px"><a href="https://ensiklopedia-pesbar.test/about" target="_blank">/about</a></td>
                                            <td>19-02-2022 11:24:04</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="card-footer clearfix">
                            {{-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> --}}
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Aktivitas Pengguna Sistem</h3>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead class="bg-success">
                                        <tr>
                                            <th>PENGGUNA</th>
                                            <th>AKTIFITAS</th>
                                            <th>WAKTU</th>
                                            <th>TARGET</th>
                                            <th>LEVEL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Administrtor</td>
                                            <td><a href="https://ensiklopedia-pesbar.test/backend/article?status=terbit">Konfirmasi Terbit Artikel</a></td>
                                            <td>19-02-2022 11:24:04</td>
                                            <td>Contributor</td>
                                            <td>Notif Penting</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="card-footer clearfix">
                            {{-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> --}}
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>


@endsection

@section('js')
@stop
