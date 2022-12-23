@php
    $publication['en'] = "Published ".date('d / m / Y', strtotime($newscontent->posting_time))." by ".$newscontent->posted_by;
    $publication['id'] = "Dipublikasikan ".date('d / m / Y', strtotime($newscontent->posting_time))." oleh ".$newscontent->posted_by;
    $publication['zh'] = "由".$newscontent->posted_by."发布于".date('d / m / Y', strtotime($newscontent->posting_time));
    $publication['ur'] = "Published ".date('d / m / Y', strtotime($newscontent->posting_time))." by ".$newscontent->posted_by;

    $sharethis['en'] = 'Share This via';
    $sharethis['id'] = 'Bagikan Melalui';
    $sharethis['zh'] = '通过以下方式分享';
    $sharethis['ur'] = 'Is ke zariye share karen .';
@endphp

@extends('user.template')

@section('pagemeta')
<title>{{ $newscontent->title }} - Komoverse</title>
<meta property="og:title" content="{{ $newscontent->title }} - Komoverse" />
<meta property="og:description" content="{{ implode(' ', array_slice(explode(' ', html_entity_decode(strip_tags($newscontent->news_content))), 0, 300)); }}" />
@if ($newscontent->featured_image)
<meta property="og:image" content="{{ $newscontent->featured_image }}" />
@endif
@endsection

@section('content')
<div class="container-fluid">
    <div class="row py-5 fade-in">
        <div class="col"></div>
        <div class="col-12 col-lg-10">
            <div class="card card-news fade-in" style="cursor: auto">
                <div class="card-body p-0">
                    @if ($newscontent->featured_image)
                    <img src="{{ $newscontent->featured_image }}" class="single-news-img" alt="">
                    @endif
                    <div class="p-3 p-lg-5">
                        <h1 class="post-title">{{ $newscontent->title }}</h1>
                        <div class="news-date">{{ $publication[$lang] }}</div>
                        {!! $newscontent->news_content !!}
                        <hr>
                        <b>{{ $sharethis[$lang] }}</b>
                        <div class="addthis_inline_share_toolbox"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61f59d01b26b3331" defer="defer"></script>
@endsection