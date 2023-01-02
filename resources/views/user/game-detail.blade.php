@extends('user.template')
@section('content')
<div class="hero-banner">
    <img src="{{ $game_data->hero_banner_url }}" alt="" class="hero-img">
    <div class="hero-content p-2 p-md-5">
        <img src="{{ $game_data->logo_image_url }}" alt="" class="logo">
        
        <h1>{{ $game_data->game_name }}</h1>
        <div class="my-3">
            <button class="btn px-4 btn-success">
            <i class="fa-solid fa-gamepad me-2"></i> PLAY NOW
            </button>
            @if ($game_data->trailer_url)
            <a href="{{ $game_data->trailer_url }}" target="_blank" class="btn px-4 btn-outline-success">
            <i class="fa-solid fa-play me-2"></i> WATCH TRAILER
            </a>
            @endif
        </div>
        {{-- <div class="description">
            by <b>{{ $game_data->developer_name  }}</b>
            <br>
            {{ $game_data->description }}
        </div> --}}
    </div>
</div>
<div class="container-fluid bg-black position-relative">
    <div class="row">
        <div class="col-12 p-0">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a href="{{ url(request()->game_id.'/overview') }}" class="nav-link {{ (last(request()->segments()) == 'overview') ? 'active' : ''; }}">OVERVIEW</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ url(request()->game_id.'/items') }}" class="nav-link {{ (last(request()->segments()) == 'items') ? 'active' : ''; }}">ITEMS</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ url(request()->game_id.'/activity') }}" class="nav-link {{ (last(request()->segments()) == 'activity') ? 'active' : ''; }}">ACTIVITY</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ url(request()->game_id.'/mints') }}" class="nav-link {{ (last(request()->segments()) == 'mints') ? 'active' : ''; }}">MINTS</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ url(request()->game_id.'/tournament') }}" class="nav-link {{ (last(request()->segments()) == 'tournament') ? 'active' : ''; }}">TOURNAMENTS</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ url(request()->game_id.'/play-now') }}" class="nav-link {{ (last(request()->segments()) == 'play-now') ? 'active' : ''; }}">PLAY NOW</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ url(request()->game_id.'/review') }}" class="nav-link {{ (last(request()->segments()) == 'review') ? 'active' : ''; }}">REVIEW</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ url(request()->game_id.'/insight') }}" class="nav-link {{ (last(request()->segments()) == 'insight') ? 'active' : ''; }}">INSIGHT</a>
                </li>
            </ul>
            @yield('game-content')
        </div>
    </div>
</div>
@endsection

@section ('script')
<script>
var rating = 8.2;
var progress = (10 - rating) / 10;
$('.rating').text(rating);
$('#progress').find('#green').animate({'stroke-dashoffset': 198 * progress}, 1000);
</script>


<script>
  const ctx = document.getElementById('review_trend_chart');
    Chart.defaults.color = "rgba(200,200,200,0.6)";
    Chart.defaults.borderColor = "rgba(200,200,200,0.3)";
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
      datasets: [{
        label: '# Avg Review per Month',
        data: [3.4, 2.8, 4.2, 4.1, 3.8, 3.9, 3.4],
        borderWidth: 1,
        backgroundColor: ['rgba(0,200,0,0.5)'],
        borderColor: ['rgba(0,200,0,1)'],
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins: {
          legend: {
            display: false
          }
      }
    }
  });

    
  const discord_chart = document.getElementById('discord_chart');
  new Chart(discord_chart, {
    type: 'doughnut',
    data: {
      labels: ['Active Users', 'Total Users'],
      datasets: [{
        label: '# Users',
        data: [3300, 200000],
        borderColor: ['rgba(0,0,0,0.2)'],
        backgroundColor: ['#00FF00', 'grey'],
        borderWidth: 0,
      }]
    },
    options: {
      plugins: {
          legend: {
            display: false
          }
      }
    }
  });

  const tele_chart = document.getElementById('tele_chart');
  new Chart(tele_chart, {
    type: 'doughnut',
    data: {
      labels: ['Active Users', 'Total Users'],
      datasets: [{
        label: '# Users',
        data: [3300, 200000],
        borderColor: ['rgba(0,0,0,0.2)'],
        backgroundColor: ['#00FF00', 'grey'],
        borderWidth: 0,
      }]
    },
    options: {
      plugins: {
          legend: {
            display: false
          }
      }
    }
  });

</script>

<script>
$('#nft-wrapper div').on('click', function(){
    window.location.href = 'komochess/items/117';
})
</script>
@endsection