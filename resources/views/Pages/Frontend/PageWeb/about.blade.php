@extends('Layouts.Frontend.master')
@section('title', 'Tentang')

@section('css')

@stop

@section('content')

    <div class="row" style="margin-bottom: 100px;">
        <div class="col">
            <div class="bg-white">
                <h3>Tentang</h3>
                @php
                    if (!empty($pageWeb)) {
                        echo $pageWeb->body;
                    }
                @endphp
            </div>
        </div>
    </div>

@endsection

@section('js')
@stop
