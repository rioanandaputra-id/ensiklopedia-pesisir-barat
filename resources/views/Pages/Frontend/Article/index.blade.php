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
                | Indeks: <a style="color: black;" href="../?index={{$articles->article_index->indexx}}">{{$articles->article_index->indexx}}</a>
                | Kategori: <a style="color: black;" href="../?category={{$articles->article_category->categoryy}}">{{$articles->article_category->categoryy}}</a>
                | Tanggal: {{$articles->created_at}}
                | Dilihat: {{$articles->views}}
            </h5>
            <hr>
            @php
                echo $articles->content;
            @endphp
        </div>
    </div>
</div>

@endsection

@section('js')
@stop
