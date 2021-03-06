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
                        <input type="text" class="form-control input-xxlarge" name="search" id="keyword"
                            value="{{ request('search') }}" placeholder="Cari disini...">
                        <button type="submit" class="btn btn-light">Cari</button>
                        {{-- <div class="input-append"> --}}
                        {{-- <input type="text" name="search" id="keyword" value="{{request('search')}}" placeholder="Kata kunci" lang="id_ID" x-webkit-speech="x-webkit-speech" class="input-xxlarge search-query"> --}}
                        {{-- <button type="submit" class="btn">Pencarian</button> --}}
                        {{-- </div> --}}
                    </form>
                </div>

                <div class="bg-grey">
                    <p style="font-size: medium; margin-left:20px; margin-top: 10px;">
                        Kategori Artikel:
                    </p>
                </div>

                <div class="bg-white">
                    @foreach ($categorys as $category)
                        <a href="?category={{ $category->categoryy }}"
                            class="btn btn-sm  {{ request('category') == $category->categoryy ? 'btn-danger' : 'btn-primary' }}">{{ $category->categoryy }}</a>
                    @endforeach
                </div>

                <div class="bg-grey">
                    <p style="text-align: center; font-size: medium; margin-top: 10px;">
                        Indeks Artikel:
                        @foreach ($indexs as $index)
                            <a href="?index={{ $index->indexx }}"
                                class="{{ request('index') == $index->indexx ? 'activered' : '' }}">{{ $index->indexx }}</a>
                        @endforeach
                    </p>
                </div>

                @if (!empty($datas))
                    <div class="bg-white" style="margin-bottom: 100px; margin-top:20px; visibility:;">
                        <div class="edunac2">
                            <center>
                                @if (request('index'))
                                    <b>Judul Artikel (Topik)</b> dengan huruf awal
                                    "<b>{{ request('index') }}</b>"<br>Ditemukan <b>{{ $countdatas }}</b> artikel dengan
                                    judul huruf awal = "<b>{{ request('index') }}</b>", di bawah
                                    ini.<br>Silakan <b>klik judul artikel</b> di bawah ini untuk melihat artikel terkait,
                                    atau
                                    <b>klik indeks di atas</b> untuk melihat indeks lainnya.
                                @endif
                                @if (request('category'))
                                    <b>Artikel (Topik)</b> dengan kategori
                                    "<b>{{ request('category') }}</b>"<br>Ditemukan <b>{{ $countdatas }}</b> artikel
                                    dengan kategori = "<b>{{ request('category') }}</b>", di bawah
                                    ini.<br>Silakan <b>klik judul artikel</b> di bawah ini untuk melihat artikel terkait,
                                    atau
                                    <b>klik kategori di atas</b> untuk melihat kategori lainnya.
                                @endif
                                @if (request('search'))
                                    <b>Artikel (Topik)</b> dengan kata kunci
                                    "<b>{{ request('search') }}</b>"<br>Ditemukan <b>{{ $countdatas }}</b> artikel
                                    dengan judul kata kunci = "<b>{{ request('search') }}</b>", di bawah
                                    ini.<br>Silakan <b>klik judul artikel</b> di bawah ini untuk melihat artikel terkait,
                                    atau
                                    <b>klik pencarian di atas</b> untuk melihat hasil pencarian kata kunci lainnya.
                                @endif
                            </center>
                        </div>
                        <hr>
                        {{ $datas->links('vendor.pagination.custom') }}
                        <hr>

                        <table style="width: 100%;">
                            <?php $i = 1; ?>
                            @foreach ($datas as $data)
                                <tr>
                                    <td style="width: 210px">
                                        <img src="{{url($data->article_image)}}" width="200px" alt="...">
                                    </td>
                                    <td>
                                        <h5 class="card-title">{{ $i }}. <a
                                                href="article/{{ $data->slug }}">{{ $data->title }}</a></h5>
                                        @php
                                            $string = strip_tags($data->body);
                                            echo Str::substr($string, 0, 400) . '[...]';
                                        @endphp
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <hr>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                        </table>
                        <hr>
                    </div>
                @endif

            </div>
        </div>

    </div>
    </div>
@endsection

@section('js')
@stop
