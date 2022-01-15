@extends('Layouts.Frontend.master')
@section('title', 'Beranda')

@section('css')
<style>
    .bg-white {
        background-color: #fff;
        padding: 20px;
    }

    .bg-grey {
        background-color: #e5e5e5;
        padding: 1px;
    }
</style>
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
                        <input type="text" name="cari" id="keyword" placeholder="Kata kunci" lang="id_ID" x-webkit-speech="x-webkit-speech" class="input-xxlarge search-query">
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
                @foreach ($ArticleCategory as $category)
                <a href="?kategori={{ $category->name }}" class="btn btn-sm btn-primary">{{ $category->name
                    }}</a>
                @endforeach
            </div>

            <div class="bg-grey">
                <p style="text-align: center; font-size: medium; margin-top: 10px;">
                    Indeks Artikel:
                    @foreach ($ArticleIndex as $index)
                    <a href="?index={{ $index->name }}">{{ $index->name }}</a>
                    @endforeach
                </p>
            </div>

            <div class="bg-white" style="margin-bottom: 100px; margin-top:20px; visibility:;">
                <div class="edunac2">
                    <center>
                        <b>Judul Artikel (Topik)</b> dengan huruf awal
                        "<b>+.-</b>"<br>Ditemukan <b>301</b> artikel dengan judul huruf awal = "<b>+.-</b>", di bawah
                        ini.<br>Silakan <b>klik judul artikel</b> di bawah ini untuk melihat artikel terkait, atau
                        <b>klik indeks di atas</b> untuk melihat indeks lainnya.
                    </center>
                </div>
                <hr>
                <table>
                    <tbody>
                        <tr valign="top">
                            <td width="50%">
                                <ol type="1" start="1">
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/03-Bonnie-Clyde_128826__eduNitas.html" class="edung5" rel="nofollow">'03 Bonnie &amp; Clyde</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Abd-Al-Manaf-Bin-Qushay_30496__eduNitas.html" class="edung5" rel="nofollow">'Abd al-Manaf bin Qushay</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Abd-Al-Muththalib_30490__eduNitas.html" class="edung5" rel="nofollow">'Abd al-Muththalib</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Abdul-Kuri_155803__eduNitas.html" class="edung5" rel="nofollow">'Abdul Kuri</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Aisyiyah_40240__eduNitas.html" class="edung5" rel="nofollow">'Aisyiyah</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Ali-Nashir-Muhammad-Al-Husaini_190325__eduNitas.html" class="edung5">'Ali Nashir Muhammad al-Husaini</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Mems_26839__eduNitas.html" class="edung5" rel="nofollow">'MEMS</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Ulumul-Quran_54810__eduNitas.html" class="edung5" rel="nofollow">'Ulumul Qur'an</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Umar-Bin-Abdul-Aziz_31271__eduNitas.html" class="edung5" rel="nofollow">'Umar bin 'Abdul 'Aziz</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Umar-Bin-Abdul-Aziz_31271__eduNitas.html" class="edung5" rel="nofollow">'Umar bin 'Abdul Aziz</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Abd-Al-Muththalib_30490__eduNitas.html" class="edung5" rel="nofollow">'Abd al-Muththalib</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Ali-Nashir-Muhammad_190325__eduNitas.html" class="edung5">'Ali Nashir Muhammad</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Amman_12182__eduNitas.html" class="edung5" rel="nofollow">'Amman</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Arsy_31509__eduNitas.html" class="edung5" rel="nofollow">'Arsy</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Asir_52454__eduNitas.html" class="edung5">'Asir</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/C_22454__eduNitas.html" class="edung5" rel="nofollow">°C</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Awas_155819__eduNitas.html" class="edung5" rel="nofollow">"Awas"</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Indahnya-Cinta-Pertama_147207__eduNitas.html" class="edung5">"Indahnya Cinta Pertama"</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Pacarku-Superstar_198036__eduNitas.html" class="edung5" rel="nofollow">"Pacarku SuperStar"</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Weird-Al-Yankovic_52687__eduNitas.html" class="edung5" rel="nofollow">"Weird Al" Yankovic</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Weird-Al-Yankovic-Album_56193__eduNitas.html" class="edung5">"Weird Al" Yankovic (album)</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Www_178415__eduNitas.html" class="edung5" rel="nofollow">+</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/7_100384__eduNitas.html" class="edung5" rel="nofollow">+7</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Anima_30492__eduNitas.html" class="edung5">+Anima</a></li>
                                    <li class="edunbc3"><a href="https://wiki.edunitas.com/ind/114-10/Ektomi_105257__eduNitas.html" class="edung5" rel="nofollow">-ektomi</a></li>
                                </ol>
                            </td>
                            <td>
                                <ol type="1" start="26">
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Grafi_155805__eduNitas.html" class="edung5" rel="nofollow">-grafi</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Itis_155806__eduNitas.html" class="edung5">-itis</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Land_28791__eduNitas.html" class="edung5" rel="nofollow">-land</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Logi_91991__eduNitas.html" class="edung5" rel="nofollow">-logi</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Oskopi_130713__eduNitas.html" class="edung5">-oskopi</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Otomi_105258__eduNitas.html" class="edung5" rel="nofollow">-otomi</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Stan_29818__eduNitas.html" class="edung5" rel="nofollow">-stan</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Wikipedia-Bahasa-Indonesia-Ensiklopedia-Bebas_168904__eduNitas.html" class="edung5">.- Wikipedia bahasa Indonesia, ensiklopedia bebas</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/And-You-Will-Know-Us-By-The-Trail-Of-Dead-Album_236525__eduNitas.html" class="edung5" rel="nofollow">...And You Will Know Us by the Trail of Dead
                                            (album)</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Ac_101734__eduNitas.html" class="edung5" rel="nofollow">.ac</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Ac-Id_101760__eduNitas.html" class="edung5">.ac.id</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Ad_101735__eduNitas.html" class="edung5" rel="nofollow">.ad</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Ae_101736__eduNitas.html" class="edung5" rel="nofollow">.ae</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Af_101737__eduNitas.html" class="edung5">.af</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Ag_101738__eduNitas.html" class="edung5" rel="nofollow">.ag</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Ai_101739__eduNitas.html" class="edung5" rel="nofollow">.ai</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Al_101740__eduNitas.html" class="edung5">.al</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Am_101785__eduNitas.html" class="edung5" rel="nofollow">.am</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/An_101786__eduNitas.html" class="edung5" rel="nofollow">.an</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Ao_101787__eduNitas.html" class="edung5">.ao</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Aq_101788__eduNitas.html" class="edung5" rel="nofollow">.aq</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Ar_101789__eduNitas.html" class="edung5" rel="nofollow">.ar</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/As_101790__eduNitas.html" class="edung5">.as</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/At_101791__eduNitas.html" class="edung5" rel="nofollow">.at</a></li>
                                    <li class="edunbc4"><a href="https://wiki.edunitas.com/ind/114-10/Au_101792__eduNitas.html" class="edung5" rel="nofollow">.au</a></li>
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

        </div>
    </div>

</div>
</div>
@endsection

@section('js')
@stop
