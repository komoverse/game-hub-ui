@php
    $pagetitle['en'] = 'News - Komoverse';
    $pagetitle['id'] = 'Berita - Komoverse';
    $pagetitle['zh'] = '新闻 - Komoverse';
    $pagetitle['ur'] = 'News - Komoverse';

    $title['en'] = 'NEWS';
    $title['id'] = 'BERITA';
    $title['zh'] = '新闻';
    $title['ur'] = 'KHABRAIN';

    $subtitle['en'] = 'Keep track of the latest news on Komodo Metaverse ecosystem development, partnership and beyond.';
    $subtitle['id'] = 'Pantau terus berita terbaru tentang pengembangan ekosistem Komodo Metaverse, kemitraan, dan lainnya.';
    $subtitle['zh'] = '追踪有关KOMODO METAVERSE生态系统发展、合作伙伴关系及其他方面的最新消息。';
    $subtitle['ur'] = 'Komodo metaverse maholiyati nizaam ki taraqqi, shiraakat daari aur is se agay ki taaza tareen khabron se bakhabar rahen.';

    $readmore['en'] = 'Read More >>';
    $readmore['id'] = 'Baca Selengkapnya >>';
    $readmore['zh'] = '了解更多 >>';
    $readmore['ur'] = 'Read More >>';

@endphp
@extends('user.template')
@section('pagemeta')
<title>{{ $pagetitle[$lang] }}</title>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row py-5 fade-in">
        <div class="col"></div>
        <div class="col-12 col-lg-6">
            <center>
            <h1>{{ $title[$lang] }}</h1>
            <h2 class="no-style fs-5">{{ $subtitle[$lang] }}</h2>
            </center>
        </div>
        <div class="col"></div>
    </div>
    <div class="row mb-5">
    @foreach($newscontent as $row)
        <?php $news_content_sliced = implode(' ', array_slice(explode(' ', html_entity_decode(strip_tags($row->news_content))), 0, 30)); ?>
        @if ($row->is_pinned == 1)
        <div class="col-12 col-lg-6 pe-3 mb-4">
            @php
            if ($lang != 'en') {
                $ft_link = url($lang.'/news'.'/'.$row->slug);
            } else { 
                $ft_link = url('news'.'/'.$row->slug);
            }
            @endphp
            <div class="card h-100 card-news fade-in" onclick="location.href='{{ $ft_link }}'">
                <div class="card-body p-0">
                    @if ($row->featured_image)
                    <div class="col-12">
                        <img src="{{ $row->featured_image }}" alt="Komoverse (Komodo Metaverse) Featured Image" class="academy-headline-img">
                    </div>
                    <div class="col-12 p-3 px-lg-5 py-lg-3 pt-2">
                        <h2>{{ $row->title }}</h2>
                        <div class="news-date">{{ date('d / m / Y', strtotime($row->posting_time)) }}</div>
                        {{-- <span>{{ $news_content_sliced }}</span> --}}
                        {{-- <br><br>{{ $readmore[$lang] }} --}}
                    </div>
                    @else
                    <div class="col-12 p-3 px-lg-5 py-lg-3">
                        <h2>{{ $row->title }}</h2>
                        <div class="news-date">{{ date('d / m / Y', strtotime($row->posting_time)) }}</div>
                        <span>{{ $news_content_sliced }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endif
        @if ($row->right_pinned == 1)
        <div class="col-12 col-lg-6 ps-3 mb-4">                    
            @php
            if ($lang != 'en') {
                $ft_link = url($lang.'/news'.'/'.$row->slug);
            } else { 
                $ft_link = url('news'.'/'.$row->slug);
            }
            @endphp
            <div class="card h-100 card-news fade-in" onclick="location.href='{{ $ft_link }}'">
                <div class="card-body p-0">
                    @if ($row->featured_image)
                    <div class="col-12">
                        <img src="{{ $row->featured_image }}" alt="Komoverse (Komodo Metaverse) Featured Image" class="academy-headline-img">
                    </div>
                    <div class="col-12 p-3 px-lg-5 py-lg-3 pt-2">
                        <h2>{{ $row->title }}</h2>
                        <div class="news-date">{{ date('d / m / Y', strtotime($row->posting_time)) }}</div>
                        {{-- <span>{{ $news_content_sliced }}</span> --}}
                        {{-- <br><br>{{ $readmore[$lang] }} --}}
                    </div>
                    @else
                    <div class="col-12 p-3 px-lg-5 py-lg-3">
                        <h2>{{ $row->title }}</h2>
                        <div class="news-date">{{ date('d / m / Y', strtotime($row->posting_time)) }}</div>
                     <span-img>{{ $news_content_sliced }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endif

        @if (($row->is_pinned == 0) && ($row->right_pinned == 0))
            @if ($lang != 'en')
        <div class="col-12 col-lg-4 mb-4" onclick='window.location.href="{{ url($lang.'/news'.'/'.$row->slug) }}"'>
            @else
        <div class="col-12 col-lg-4 mb-4" onclick='window.location.href="{{ url('/news'.'/'.$row->slug) }}"'>
            @endif
                <div class="card card-news fade-in h-100">
                    <div class="card-body p-0">
                        @if ($row->featured_image)
                            <div class="col-12">
                                <img src="{{ $row->featured_image }}" alt="Komoverse (Komodo Metaverse) Featured Image" class="academy-ft-img">
                            </div>
                            <div class="col-12 p-3">
                                <h3>{{ $row->title }}</h3>
                                <div class="news-date">{{ date('d / m / Y', strtotime($row->posting_time)) }}</div>
                                {{-- <span>{{ $news_content_sliced }}</span>
                                <br><br>{{ $readmore[$lang] }} --}}
                            </div>
                        @else
                        <div class="col-12 p-3">
                            <h3 style="font-size: 2.5rem">{{ $row->title }}</h3>
                            <div class="news-date">{{ date('d / m / Y', strtotime($row->posting_time)) }}</div>
                            {{-- <span>{{ $news_content_sliced }}</span>
                                <br><br>{{ $readmore[$lang] }} --}}
                        </div>
                        @endif
                    </div>
                </div>
        </div>
        @endif
    @endforeach
    <div class="row">
        <div class="col-12 justify-content-center">
            {{ $newscontent->links() }}
        </div>
    </div>
</div>

@endsection