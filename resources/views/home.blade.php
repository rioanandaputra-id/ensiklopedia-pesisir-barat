@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @can('isAdmin')
                        <h3>Anda punya akses sebagai Admin</h3>
                    @elsecan('isEditor')
                        <h3>Anda punya akses sebagai Editor</h3>
                    @else
                        <h3>Anda punya akses sebagai Author</h3>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
