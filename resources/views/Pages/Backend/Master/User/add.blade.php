@extends('Layouts.Backend.master')
@section('title', 'Tambah Pengguna Sistem' . Str::ucfirst(request()->status))

@section('css')
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
                <form method="POST" action="{{ url('backend/master/user/create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fullname">Nama Lengkap: <i class="text-danger">*</i></label></label>
                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="username">Username: <i class="text-danger">*</i></label></label>
                            <input type="username" class="form-control" id="username" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email: <i class="text-danger">*</i></label></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password: <i class="text-danger">*</i></label></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="password">
                        </div>
                        <div class="form-group">
                            <label for="username">Status: <i class="text-danger">*</i></label></label>
                            <select class="form-control" id="active" name="active">
                                <option value="">Pilih Status</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username">Role Pengguna: <i class="text-danger">*</i></label></label>
                            <select class="form-control" id="role_id" name="role_id">
                                <option value="">Pilih Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file">Foto Pengguna</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type='file' id="fotofile" class="btn btn-success mr-2" name="fotofile">
                                    <input type="text" name="fotourl" id="fotourl" hidden>
                                    <button class="btn btn-warning" id="btnurl" type="button"> <i
                                            class="fa fa-link"></i> Via URL</button>
                                </div>
                                <div class="input-group-append">
                                    <img src="{{ asset('assets/Backend/dist/img/user2-160x160.jpg') }}"
                                        alt="Foto Pengguna" class="img-thumbnail" id="imgPreview">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Tambah Pengguna</button>
                        <i class="float-right">*) Harus diisi, unggah Foto maksimal (1MB) dan format yang didukung: jpg |
                            jpeg | png | gif | bmp | svg | tiff </i>
                    </div>
                </form>
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
                                    `Request failed: ${error}`
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
@stop
