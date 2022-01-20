@extends('Layouts.Frontend.master')
@section('title', 'Beranda')

@section('css')

@stop

@section('content')
<div class="row">
    <div class="col">

        <div class="span12">

            <div class="tagline">
                Akses Ensiklopedia Daring - Gunakan fasilitas pencarian untuk mempercepat penemuan data
            </div>

            <div class="simply">
                <form name="advSearchForm" id="simplySearchForm" action="" method="get" class="form-search">
                    <div class="input-append">
                        <input type="text" name="search" id="keyword" value="{{request('search')}}" placeholder="Kata kunci" lang="id_ID" x-webkit-speech="x-webkit-speech" class="input-xxlarge search-query">
                        <button type="submit" class="btn">Pencarian</button>
                    </div>
                </form>
            </div>

            <div class="bg-grey">
                <p style="font-size: medium; margin-left:20px; margin-top: 10px;">
                    Kategori Artikel:
                </p>
            </div>

            <div class="bg-white">
                @foreach ($categorys as $category)
                <a href="?category={{ $category->name }}" class="btn btn-sm  {{ (request('category') == $category->name) ? 'btn-danger' : 'btn-primary' }}">{{ $category->name
                    }}</a>
                @endforeach
            </div>

            <div class="bg-grey">
                <p style="text-align: center; font-size: medium; margin-top: 10px;">
                    Indeks Artikel:
                    @foreach ($indexs as $index)
                    <a href="?index={{ $index->name }}" class="{{ (request('index') == $index->name) ? 'activered' : '' }}">{{ $index->name }}</a>
                    @endforeach
                </p>
            </div>

            @if (!empty($datas))
            <div class="bg-white" style="margin-bottom: 100px; margin-top:20px; visibility:;">
                <div class="edunac2">
                    <center>
                        @if (request('index'))
                            <b>Judul Artikel (Topik)</b> dengan huruf awal
                            "<b>{{request('index')}}</b>"<br>Ditemukan <b>{{$countdatas}}</b> artikel dengan judul huruf awal = "<b>{{request('index')}}</b>", di bawah
                            ini.<br>Silakan <b>klik judul artikel</b> di bawah ini untuk melihat artikel terkait, atau
                            <b>klik indeks di atas</b> untuk melihat indeks lainnya.
                        @endif
                        @if (request('category'))
                            <b>Artikel (Topik)</b> dengan kategori
                            "<b>{{request('category')}}</b>"<br>Ditemukan <b>{{$countdatas}}</b> artikel dengan kategori = "<b>{{request('category')}}</b>", di bawah
                            ini.<br>Silakan <b>klik judul artikel</b> di bawah ini untuk melihat artikel terkait, atau
                            <b>klik kategori di atas</b> untuk melihat kategori lainnya.
                        @endif
                        @if (request('search'))
                            <b>Artikel (Topik)</b> dengan kata kunci
                            "<b>{{request('search')}}</b>"<br>Ditemukan <b>{{$countdatas}}</b> artikel dengan judul kata kunci = "<b>{{request('search')}}</b>", di bawah
                            ini.<br>Silakan <b>klik judul artikel</b> di bawah ini untuk melihat artikel terkait, atau
                            <b>klik pencarian di atas</b> untuk melihat hasil pencarian kata kunci lainnya.
                        @endif
                    </center>
                </div>
                <hr>

                <table style="width: 100%;">
                    <tbody>
                        <tr>
                            <td >
                                <ol type="1" start="1">
                                    @foreach ($datas as $data)
                                        <li><a href="article/{{ $data->slug }}">{{ $data->title }}</a></li>
                                    @endforeach
                                </ol>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <hr>

                <table>
                    <tbody>
                        <tr valign="top">
                            <td class="edunac8"> Halaman :&nbsp;<span class="edunac9"><b> 1</b></span>&nbsp; <a href="https://wiki.edunitas.com/indeks_b/114-10/+.-_50_51_2__eduNitas.html" class="edung3a">2</a>&nbsp; <a href="https://wiki.edunitas.com/indeks_b/114-10/+.-_50_101_3__eduNitas.html" class="edung3a" rel="nofollow">3</a>&nbsp; <a href="https://wiki.edunitas.com/indeks_b/114-10/+.-_50_151_4__eduNitas.html" class="edung3a" rel="nofollow">4</a>&nbsp; <a href="https://wiki.edunitas.com/indeks_b/114-10/+.-_50_201_5__eduNitas.html" class="edung3a">5</a>&nbsp; <a href="https://wiki.edunitas.com/indeks_b/114-10/+.-_50_251_6__eduNitas.html" class="edung3a" rel="nofollow">6</a>&nbsp; <a href="https://wiki.edunitas.com/indeks_b/114-10/+.-_50_301_7__eduNitas.html" class="edung3a" rel="nofollow">7</a>&nbsp; </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endif

        </div>
    </div>

</div>
</div>
@endsection

@section('js')
@stop
