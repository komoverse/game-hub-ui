@php

    $beginner['en'] = 'Beginner';
    $beginner['id'] = 'Pemula';
    $beginner['zh'] = '初学者';
    $beginner['ur'] = 'Shuru';

    $inter['en'] = 'Intermediate';
    $inter['id'] = 'Menengah';
    $inter['zh'] = '中级';
    $inter['ur'] = 'Intermediate';

    $expert['en'] = 'Expert';
    $expert['id'] = 'Ahli';
    $expert['zh'] = '专家';
    $expert['ur'] = 'Maahir';

    $publication['en'] = "Published ".date('d / m / Y', strtotime($academycontent->posting_time))." by ".$academycontent->posted_by;
    $publication['id'] = "Dipublikasikan ".date('d / m / Y', strtotime($academycontent->posting_time))." oleh ".$academycontent->posted_by;
    $publication['zh'] = "由".$academycontent->posted_by."发布于".date('d / m / Y', strtotime($academycontent->posting_time));
    $publication['ur'] = "Published ".date('d / m / Y', strtotime($academycontent->posting_time))." by ".$academycontent->posted_by;

    $sharethis['en'] = 'Share This via';
    $sharethis['id'] = 'Bagikan Melalui';
    $sharethis['zh'] = '通过以下方式分享';
    $sharethis['ur'] = 'Is ke zariye share karen .';
@endphp
@extends('user.template')

@section('pagemeta')
<title>{{ $academycontent->title }} - Komoverse</title>
<meta property="og:title" content="{{ $academycontent->title }} - Komoverse" />
<meta property="og:description" content="{{ implode(' ', array_slice(explode(' ', html_entity_decode(strip_tags($academycontent->news_content))), 0, 300)); }}" />
@if ($academycontent->featured_image)
<meta property="og:image" content="{{ $academycontent->featured_image }}" />
@endif
@endsection

@section('content')
<div class="container-fluid">
    <div class="row py-5 fade-in">
        <div class="col"></div>
        <div class="col-12 col-lg-10">
            <div class="card card-news fade-in" style="cursor: auto">
                <div class="card-body p-0">
                    @if ($academycontent->featured_image)
                    <img src="{{ $academycontent->featured_image }}" class="single-news-img" alt="Komoverse (Komodo Metaverse) Featured Image">
                    @endif
                    <div class="p-3 p-lg-5">
                        <h1 class="post-title">{{ $academycontent->title }}</h1>

                        <div class="d-block">
                        <div class="news-date d-inline">{{ $publication[$lang] }}</div>
                            @if ($academycontent->level == 'Beginner')
                            <span class="badge bg-success">{{ $beginner[$lang] }}</span>
                            @elseif ($academycontent->level == 'Intermediate')
                            <span class="badge bg-warning">{{ $inter[$lang] }}</span>
                            @else 
                            <span class="badge bg-danger">{{ $expert[$lang] }}</span>
                            @endif
                        </div>
                        {!! $academycontent->news_content !!}
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