<div class="navbar navbar-social navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <form class="navbar-form pull-right language" name="langSelect"
                action="{{url('/')}}" method="get">
                <span class="language-info">Pilih Bahasa</span>
                <select name="select_lang" id="select_lang" onchange="document.langSelect.submit();"
                    class="input-medium">
                    <option value="ar_AR">Arabic</option>
                    <option value="bn_BD">Bengali</option>
                    <option value="pt_BR">Brazilian Portuguese</option>
                    <option value="cn_PRC">Cina</option>
                    <option value="kr_KR">Korea</option>
                    <option value="en_US">English</option>
                    <option value="es_ES">Espanol</option>
                    <option value="de_DE">German</option>
                    <option value="id_ID" selected="">Indonesia</option>
                    <option value="th_TH">Thai</option>
                    <option value="my_MY">Melayu</option>
                    <option value="fa_IR">Persia</option>
                </select>
            </form>
        </div>
    </div>
</div>
