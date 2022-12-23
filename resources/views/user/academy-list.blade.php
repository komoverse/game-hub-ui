@php
    $pagetitle['en'] = 'Academy - Komoverse';
    $pagetitle['id'] = 'Akademi - Komoverse';
    $pagetitle['zh'] = '学院 - Komoverse';
    $pagetitle['ur'] = 'Academy - Komoverse';

    $title['en'] = 'ACADEMY';
    $title['id'] = 'AKADEMI';
    $title['zh'] = '学院';
    $title['ur'] = 'ACADEMY';

    $subtitle['en'] = "Your perfect guidance to all things in Crypto. Whether you're a beginner trying to understand mining or a veteran looking to invest in Web3 marketplace, we've got you covered.";
    $subtitle['id'] = 'Panduan sempurna Anda untuk semua hal di kripto. Baik Anda seorang pemula yang mencoba memahami penambangan atau veteran yang ingin berinvestasi di pasar Web3, kami siap membantu Anda.';
    $subtitle['zh'] = "您对所有关于加密货币的最佳指导。无论您是试图了解采矿的初学者，或是希望投资Web3市场的资深人士，我们都能满足您的需求。";
    $subtitle['ur'] = "Crypto mein tamam cheezon ke liye aap ki behtareen rahnumai. Chahay aap kaan kinny ko samajhney ki koshish karne walay ibtidayi hon ya web3 market place mein sarmaya kaari karne walay tajurbah car hon, hum ne aap ko cover kar liya hai .";

    $readmore['en'] = 'Read More >>';
    $readmore['id'] = 'Baca Selengkapnya >>';
    $readmore['zh'] = '了解更多 >>';
    $readmore['ur'] = 'Read More >>';

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
    @foreach($academycontent as $row)
        <?php $news_content_sliced = implode(' ', array_slice(explode(' ', html_entity_decode(strip_tags($row->news_content))), 0, 30)); ?>
        @if ($row->is_pinned == 1)
            <div class="col"></div>
                @if ($lang != 'en')
            <div class="col-12 mb-4" onclick='location.href="{{ url($lang.'/academy'.'/'.$row->slug) }}"'>
                @else
            <div class="col-12 mb-4" onclick='location.href="{{ url('/academy'.'/'.$row->slug) }}"'>
                @endif
                    <div class="card card-news fade-in">
                        <div class="card-body p-0">
                            @if ($row->featured_image)
                            <div class="row">
                                <div class="col-12 d-flex d-lg-none">
                                    <img src="{{ $row->featured_image }}"  alt="Komoverse (Komodo Metaverse) Featured Image" class="academy-headline-img">
                                </div>
                                <div class="col-12 col-lg-5 px-4 py-3 p-lg-5">
                                    <h2>{{ $row->title }}</h2>
                                    <div class="d-flex mb-4">
                                        {{-- <div class="news-date d-inline">{{ date('d / m / Y', strtotime($row->posting_time)) }}</div> --}}
                                        @if ($row->level == 'Beginner')
                                        <span class="badge bg-success">{{ $beginner[$lang] }}</span>
                                        @elseif ($row->level == 'Intermediate')
                                        <span class="badge bg-warning">{{ $inter[$lang] }}</span>
                                        @else 
                                        <span class="badge bg-danger">{{ $expert[$lang] }}</span>
                                        @endif
                                    </div>
                                    <div class="d-none d-lg-flex">
                                        
                                <span>{{ $news_content_sliced }}</span>
                                    <span class="readmore">{{ $readmore[$lang] }}</span>
                                    </div>
                                </div>
                                <div class="d-none d-lg-flex col-lg-7">
                                    <img src="{{ $row->featured_image }}"  alt="Komoverse (Komodo Metaverse) Featured Image" class="academy-headline-img">
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-12 p-3">
                                    <h2>{{ $row->title }}</h2>
                                        <div class="d-flex mb-4">
                                            {{-- <div class="news-date d-inline">{{ date('d / m / Y', strtotime($row->posting_time)) }}</div> --}}
                                            @if ($row->level == 'Beginner')
                                            <span class="badge bg-success">{{ $beginner[$lang] }}</span>
                                            @elseif ($row->level == 'Intermediate')
                                            <span class="badge bg-warning">{{ $inter[$lang] }}</span>
                                            @else 
                                            <span class="badge bg-danger">{{ $expert[$lang] }}</span>
                                            @endif
                                        </div>
                                    <span>{{ $news_content_sliced }}</span>
                                        <span class="readmore">{{ $readmore[$lang] }}</span>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
            </div>
        @else
                @if ($lang != 'en')
            <div class="col-12 col-md-6 col-lg-4 mb-4" onclick='location.href="{{ url($lang.'/academy'.'/'.$row->slug) }}"'>
                @else
            <div class="col-12 col-md-6 col-lg-4 mb-4" onclick='location.href="{{ url('/academy'.'/'.$row->slug) }}"'>
                @endif
                    <div class="card card-news fade-in h-100">
                        <div class="card-body p-0">
                            <div class="row">
                                @if ($row->featured_image)
                                <div class="text-center">
                                    <img src="{{ $row->featured_image }}" alt="Komoverse (Komodo Metaverse) Featured Image" class="academy-ft-img">
                                </div>
                                @endif
                                <div class="col-12 px-4 py-3">
                                    @if ($row->featured_image)
                                    <h3>{{ $row->title }}</h3>
                                    @else
                                    <h3 style="font-size: 2.5rem">{{ $row->title }}</h3>
                                    @endif
                                        <div class="d-block">
                                            {{-- <div class="news-date d-inline">{{ date('d / m / Y', strtotime($row->posting_time)) }}</div> --}}
                                            @if ($row->level == 'Beginner')
                                            <span class="badge bg-success">{{ $beginner[$lang] }}</span>
                                            @elseif ($row->level == 'Intermediate')
                                            <span class="badge bg-warning">{{ $inter[$lang] }}</span>
                                            @else 
                                            <span class="badge bg-danger">{{ $expert[$lang] }}</span>
                                            @endif
                                        </div>
                                    {{-- <span>{{ $news_content_sliced }}</span> --}}
                                        {{-- <br><br>{{ $readmore[$lang] }} --}}
                                </div> 
                            </div>
                       </div>
                    </div>
                </a>
            </div>
        @endif
    @endforeach
    <div class="row">
        <div class="col-12 justify-content-center">
            {{ $academycontent->links() }}
        </div>
    </div>
</div>

@endsection