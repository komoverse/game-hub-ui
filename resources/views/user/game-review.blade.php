@extends('user.game-detail')
@section('game-content')
@if (count($reviews) == 0) 
<div class="container-fluid p-5">
    <div class="row py-5">
        <div class="col"></div>
        <div class="col-4 py-5">
            <center>
            <h2>No Review</h2>
            Be the first to review this game
            </center>
        </div>
        <div class="col"></div>
    </div>
</div>
@else
<div class="container-fluid px-5 pt-2">
    <div class="row text-center">
        <div class="row mt-3">
            <div class="col-12 col-md-3">
                <div class="bg-lightgrey p-3">
                    Overall Ratings
                    <br>
                    <b class="fs-xxxl">{{ number_format($overall->overall_rating, 1) }}</b>
                    <div class="star-review">
                        @php
                        $overall_rating = $overall->overall_rating;
                        $full_star = floor($overall_rating);
                        for ($i=0; $i < $full_star; $i++) { 
                            echo '<i class="fa-solid fa-star"></i>';
                        }
                        $half_star = 0;
                        if (floor($overall_rating) != $overall_rating) {
                            $half_star = 1;
                        }
                        for ($i=0; $i < $half_star; $i++) { 
                            echo '<i class="fa-solid fa-star-half-stroke"></i>';
                        }
                        $blank_star = 5 - $full_star - $half_star;
                        for ($i=0; $i < $blank_star; $i++) { 
                            echo '<i class="fa-regular fa-star"></i>';
                        }
                        @endphp
                    </div>
                    <p class="mt-3 mb-5">{{ number_format($overall->total_reviews, 0) }} reviews</p>

                    <b class="mt-5">Monthly Avg Rating</b>
                    <div class="chart-wrapper">
                        <canvas id="review_trend_chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9">
            @foreach ($reviews as $review)
                <div class="testi-wrapper bg-grey">
                    <img src="{{ $review->reviewer_photo_url }}"  onerror="this.onerror=null;this.src='https://via.placeholder.com/50';" alt="" class="profile-pic">
                    <div class="author">
                        {{ $review->komo_username }}
                        <br>
                        <span class="since">
                            Reviewed at {{ date('d F Y', strtotime($review->created_at)) }}
                        </span>
                    </div>

                    <div class="star-review-sm">
                        @php
                        $star_deployed = 0;
                        while ($star_deployed < 5) {
                            $star_deployed++;
                            if ($star_deployed <= $review->rating) {
                                echo '<i class="fa-solid fa-star"></i>';
                            } else {
                                echo '<i class="fa-regular fa-star"></i>';
                            }
                        }
                        @endphp
                    </div>

                    <p class="comment">{{ $review->comment }}</p>
                </div>
            @endforeach

            {!! $reviews->links() !!}
            </div>
        </div>
    </div>
</div>
@endif

{{-- IF Logged in can write review --}}
@if (Session::get('userdata'))
<div class="container-fluid p-5">
    <div class="row bg-grey p-5">
        <form action="{{ url('submit-review') }}" method="POST">
        @csrf
        <input type="hidden" name="game_id" value="{{ request()->game_id }}">    
        <div class="row">
            <div class="col-12">
                <h3>Submit Your Review</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-2">
                Writing review as <span class="limegreen">{{ Session::get('userdata')->komo_username }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                Rating
            </div>
            <div class="col-9">
                <fieldset class="star-rating">
                Your rating: <span class="star-value"></span>
                    <div>
                        <input type="radio" name="rating" value="1" id="rating1" />
                        <label for="rating1"><span>1</span></label>
                        <input type="radio" name="rating" value="2" id="rating2" />
                        <label for="rating2"><span>2</span></label>
                        <input type="radio" name="rating" value="3" id="rating3" />
                        <label for="rating3"><span>3</span></label>
                        <input type="radio" name="rating" value="4" id="rating4" />
                        <label for="rating4"><span>4</span></label>
                        <input type="radio" name="rating" value="5" id="rating5" />
                        <label for="rating5"><span>5</span></label>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                Comment
            </div>
            <div class="col-9">
                <textarea name="comment" rows="5" class="form-control my-2"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-9">
                <button class="btn btn-success"><i class="fas fa-save"></i> Submit</button>
            </div>
        </div>
        </form>
    </div>
</div>
@endif
@endsection
@section('script')
<script>
var rating = 0;
var valueField = document.querySelector('.star-value');


document.querySelectorAll('.star-rating input[name="rating"]').forEach(function(radio){
   radio.addEventListener('change', function(){
      rating = document.querySelector('.star-rating input[name="rating"]:checked').value;
      valueField.innerHTML = "" + rating;
   });
});

const ctx = document.getElementById('review_trend_chart');
    Chart.defaults.color = "rgba(200,200,200,0.6)";
    Chart.defaults.borderColor = "rgba(200,200,200,0.3)";
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [
        @foreach ($monthly_review as $row)
        '{{ $row->review_month }}',
        @endforeach
      ],
      datasets: [{
        label: '# Avg Review per Month',
        data: [
            @foreach ($monthly_review as $row)
            {{ $row->avg_rating }},
            @endforeach
        ],
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
</script>
@endsection