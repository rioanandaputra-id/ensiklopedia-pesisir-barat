@extends('Layouts.Frontend.master')
@section('title', 'Galleri Video')

@section('css')

@stop

@section('content')

<div class="row" style="margin-bottom: 100px;">
    <div class="col">
        <div class="bg-white">
            <h3>Galleri Video</h3>

            @foreach ($videos as $video)
            <iframe width="280" height="157" src="{{ $video->path }}"
                title="{{ $video->name }}" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            @endforeach

            {{ $videos->links('vendor.pagination.custom') }}
        </div>
    </div>
</div>

@endsection

@section('js')
@stop
