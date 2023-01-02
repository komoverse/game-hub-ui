@extends('user.template')
@section('content')
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-12 px-md-5">
            <h3>Showing Result for: {{ $search_query }}</h3>
        </div>
    </div>
    <div class="row px-md-5" id="search-result-wrapper">
        @foreach($game as $row)
        <a class="no-decor-link" href="{{ url($row->game_id) }}">
        <div class="col-12 mt-3 bg-grey p-md-3">
            <h4>{{ $row->game_name }}</h4>
            <div>{{ $row->genre }}</div>
            <div class="fw-light">
                @if (str_contains($row->description, $search_query))
                    @php
                        $description = strip_tags($row->description);
                        $pos = strpos($description, $search_query);
                        if ($pos > 150) {
                            $before = '...'.substr($description, ($pos - 150), 150);
                            $after = substr($description, $pos, 150).'...';
                        } else {
                            $before = '';
                            $after = substr($description, 0, 300).'...';
                        }
                    @endphp
                    {!! $before.$after !!}
                @else
                {!! substr(strip_tags($row->description), 0, 300).'...' !!}
                @endif
            </div>
        </div>
        </a>
        @endforeach
        @foreach($news as $row)
        <a class="no-decor-link" href="{{ url('news'.'/'.$row->slug) }}">
        <div class="col-12 mt-3 bg-grey p-md-3">
            <h4>{{ $row->title }}</h4>
            <div class="fw-light">
                @if (str_contains($row->news_content, $search_query))
                    @php
                        $news_content = strip_tags($row->news_content);
                        $pos = strpos($news_content, $search_query);
                        if ($pos > 150) {
                            $before = '...'.substr($news_content, ($pos - 150), 150);
                            $after = substr($news_content, $pos, 150).'...';
                        } else {
                            $before = '';
                            $after = substr($news_content, 0, 300).'...';
                        }
                    @endphp
                    {!! $before.$after !!}
                @else
                {!! substr(strip_tags($row->news_content), 0, 300).'...' !!}
                @endif
            </div>
        </div>
        </a>
        @endforeach
        @foreach($academy as $row)
        <a class="no-decor-link" href="{{ url('academy'.'/'.$row->slug) }}">
        <div class="col-12 mt-3 bg-grey p-md-3">
            <h4>{{ $row->title }}</h4>
            <div class="fw-light">
                @if (str_contains($row->news_content, $search_query))
                    @php
                        $news_content = strip_tags($row->news_content);
                        $pos = strpos($news_content, $search_query);
                        if ($pos > 150) {
                            $before = '...'.substr($news_content, ($pos - 150), 150);
                            $after = substr($news_content, $pos, 150).'...';
                        } else {
                            $before = '';
                            $after = substr($news_content, 0, 300).'...';
                        }
                    @endphp
                    {!! $before.$after !!}
                @else
                {!! substr(strip_tags($row->news_content), 0, 300).'...' !!}
                @endif
            </div>
        </div>
        </a>
        @endforeach
        @foreach($partner as $row)
        <a class="no-decor-link" href="{{ url('partner'.'/'.$row->slug) }}">
        <div class="col-12 mt-3 bg-grey p-md-3">
            <h4>{{ $row->title }}</h4>
            <div class="fw-light">
                @if (str_contains($row->news_content, $search_query))
                    @php
                        $news_content = strip_tags($row->news_content);
                        $pos = strpos($news_content, $search_query);
                        if ($pos > 150) {
                            $before = '...'.substr($news_content, ($pos - 150), 150);
                            $after = substr($news_content, $pos, 150).'...';
                        } else {
                            $before = '';
                            $after = substr($news_content, 0, 300).'...';
                        }
                    @endphp
                    {!! $before.$after !!}
                @else
                {!! substr(strip_tags($row->news_content), 0, 300).'...' !!}
                @endif
            </div>
        </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
@section('script')
<script src="{{ url('assets/js/jquery.mark.min.js') }}"></script>
<script>
    $('#search-result-wrapper').mark('{{ $search_query }}');
</script>
@endsection