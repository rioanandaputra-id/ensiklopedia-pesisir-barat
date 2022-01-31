@extends('Layouts.Frontend.master')
@section('title', 'Galleri Foto')

@section('css')

@stop

@section('content')

<div class="row" style="margin-bottom: 100px;">
    <div class="col">
        <div class="bg-white">
            <h3>Galleri Foto</h3>

            @foreach ($photos as $photo)
                <img src="{{ $photo->path }}" alt="" width="220px" style="padding: 4px;">
            @endforeach

            {{ $photos->links('vendor.pagination.custom') }}
        </div>
    </div>
</div>

@endsection

@section('js')
@stop
