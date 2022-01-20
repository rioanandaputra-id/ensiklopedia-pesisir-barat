@extends('Layouts.Frontend.master')
@section('title', 'Artikel')

@section('css')

@stop

@section('content')

<div class="row" style="margin-bottom: 100px;">
    <div class="col">
        <div class="bg-white">
            <h3><a href="{{$articles->slug}}">{{$articles->title}}</a></h3>
            <h5 style="color: black;">
                  Penulis: <a style="color: black;" href="../author/{{$articles->user->fullname}}">{{$articles->user->fullname}}</a>
                | Indeks: <a style="color: black;" href="../?index={{$articles->article_index->name}}">{{$articles->article_index->name}}</a>
                | Kategori: <a style="color: black;" href="../?category={{$articles->article_category->name}}">{{$articles->article_category->name}}</a>
                | Tanggal: {{$articles->created_at}}
                | Dilihat: {{$articles->views}}
            </h5>
            <hr>
            <p style="color: black;">{{$articles->content}}</p>
        </div>
    </div>
</div>

@endsection

@section('js')
@stop
