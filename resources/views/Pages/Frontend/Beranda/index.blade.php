@extends('Layouts.Frontend.master')
@section('title', 'Beranda')

@section('css')
@stop

@section('content')
<div class="row">

    <div class="span12">
        <div class="search">
            <div class="tagline">Akses Ensiklopedia Daring - Gunakan fasilitas pencarian untuk mempercepat penemuan
                data</div>
            <div id="simply-search">
                <div class="simply">
                    <form name="advSearchForm" id="simplySearchForm" action="" method="get" class="form-search">
                        <div class="input-append">
                            <input type="hidden" name="search" value="search">
                            <input type="text" name="keywords" id="keyword" placeholder="Kata kunci" lang="id_ID"
                                x-webkit-speech="x-webkit-speech" class="input-xxlarge search-query">
                            <button type="submit" class="btn">Pencarian</button>
                        </div>
                    </form>
                </div>
            </div>

            <div style="background-color: #e5e5e5; height: 30px;">
                <p style="padding: 5px; text-align: center; font-size: medium;">
                    Indeks Artikel: A B C D E F G H I J K L M N O P Q R S T U V W X Y Z 0 1 2 3 4 5 6 7 8 9 -+
                </p>
            </div>

            <!-- <div style="background-color: #fff; min-height: 100px;">

            </div> -->
        </div>
    </div>
</div>
@endsection

@section('js')
@stop
