@php
    $publication['en'] = "Published ".date('d / m / Y', strtotime($partnercontent->posting_time))." by ".$partnercontent->posted_by;
    $publication['id'] = "Dipublikasikan ".date('d / m / Y', strtotime($partnercontent->posting_time))." oleh ".$partnercontent->posted_by;
    $publication['zh'] = "由".$partnercontent->posted_by."发布于".date('d / m / Y', strtotime($partnercontent->posting_time));
    $publication['ur'] = "Published ".date('d / m / Y', strtotime($partnercontent->posting_time))." by ".$partnercontent->posted_by;

    $sharethis['en'] = 'Share This via';
    $sharethis['id'] = 'Bagikan Melalui';
    $sharethis['zh'] = '通过以下方式分享';
    $sharethis['ur'] = 'Is ke zariye share karen .';
@endphp

@extends('user.template')

@section('pagemeta')
<title>{{ $partnercontent->title }} - Komoverse</title>
<meta property="og:title" content="{{ $partnercontent->title }} - Komoverse" />
<meta property="og:description" content="{{ implode(' ', array_slice(explode(' ', html_entity_decode(strip_tags($partnercontent->news_content))), 0, 300)); }}" />
@if ($partnercontent->featured_image)
<meta property="og:image" content="{{ $partnercontent->featured_image }}" />
@endif
@endsection

@section('content')
<div class="container-fluid">
    <div class="row py-5 fade-in">
        <div class="col"></div>
        <div class="col-12 col-lg-10">
            <div class="card card-news fade-in" style="cursor: auto">
                <div class="card-body p-0">
                    @if ($partnercontent->featured_image)
                    <img src="{{ $partnercontent->featured_image }}" class="single-news-img" alt="">
                    @endif
                    <div class="p-3 p-md-3 p-lg-5">
                        <h1 class="post-title">{{ $partnercontent->title }}</h1>
                        <div class="news-date">{{ $publication[$lang] }}</div>
                        {!! $partnercontent->news_content !!}
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