@extends('user.game-detail')
@section('game-content')
<div class="container-fluid p-5">
    <div class="row text-center">
        <div class="row mt-3">
            <div class="col">
                @if ($game_data->discord_url)
                <div class="bg-grey">
                    <div class="row">
                        <div class="col p-5 text-start">
                            Discord Member
                            <br>
                            <span class="fs-1">{{ $insight->discord_member ?? '0' }}</span>
                            <br><br>
                            Active Member
                            <br>
                            <span class="fs-1">{{ $insight->discord_active ?? '0' }}</span>
                            <br>
                            <br>
                            <a class="btn btn-success" href="{{ $game_data->discord_url }}" target="_blank">
                                <i class="fa-brands fa-discord"></i> Join Discord
                            </a>
                        </div>
                        <div class="col p-5">
                            <div class="chart-wrapper-square">
                                <canvas id="discord_chart"></canvas>
                                <div class="percentage-active">{{ number_format((float) (($insight->discord_active / $insight->discord_member) * 100)) }}%<br>Active</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if ($game_data->telegram_url)
                <div class="bg-grey mt-5">
                    <div class="row">
                        <div class="col p-5 text-start">
                            Telegram Member
                            <br>
                            <span class="fs-1">{{ $insight->telegram_member ?? '0' }}</span>
                            <br><br>
                            Active Member
                            <br>
                            <span class="fs-1">{{ $insight->telegram_active ?? '0' }}</span>
                            <br>
                            <br>
                            <a class="btn btn-success" href="{{ $game_data->telegram_url }}" target="_blank">
                                <i class="fa-brands fa-telegram"></i> Join Telegram
                            </a>
                        </div>
                        <div class="col p-5">
                            <div class="chart-wrapper-square">
                                <canvas id="tele_chart"></canvas>
                                <div class="percentage-active">{{ number_format((float) (($insight->telegram_active / $insight->telegram_member) * 100)) }}%<br>Active</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <div class="col">
                <a class="twitter-timeline" data-height="900" data-theme="dark" href="{{ $game_data->twitter_url }}?ref_src=twsrc%5Etfw">Tweets by {{ $game_data->game_name }}</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    
  const discord_chart = document.getElementById('discord_chart');
  new Chart(discord_chart, {
    type: 'doughnut',
    data: {
      labels: ['Active Users', 'Total Users'],
      datasets: [{
        label: '# Users',
        data: [{{ $insight->discord_active }}, {{ $insight->discord_member - $insight->discord_active }}],
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
        data: [{{ $insight->telegram_active }}, {{ $insight->telegram_member - $insight->telegram_active }}],
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
@endsection