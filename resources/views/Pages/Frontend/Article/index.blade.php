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
                  Penulis: <a style="color: black;" href="../author/{{$articles->user->name}}">{{$articles->user->name}}</a>
                | Indeks: <a style="color: black;" href="../?index={{$articles->article_index->indexx}}">{{$articles->article_index->indexx}}</a>
                | Kategori: <a style="color: black;" href="../?category={{$articles->article_category->categoryy}}">{{$articles->article_category->categoryy}}</a>
                | Tanggal: {{$articles->created_at}}
                | Dilihat: {{$articles->views}}
            </h5>
            <hr>
            @php
                echo $articles->body;
            @endphp
        </div>
    </div>
</div>

<div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://ensiklopedia-1.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

@endsection

@section('js')
@stop
