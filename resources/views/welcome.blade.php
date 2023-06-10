
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <style>
            .description {
              max-height: 98px; 
              overflow: hidden;
            }
            .chart-container {
              display: flex;
              flex-direction: column;
              align-items: center;
              justify-content: center;
              width: 100%;
              max-width: 1170px;
              margin: 0 auto;
          }

          .chart {
              width: 100%;
              max-width: 100%;
              height: 360px;
              margin-bottom: 10vh;
          }

          @media only screen and (max-width: 600px) {
              .chart {
                  height: 200px;
                  width: 400px;
              }
          }

        </style>
        <html>
            <head>
              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
              <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChartVotes);
          
                function drawChartVotes() {
                  var data = google.visualization.arrayToDataTable([
                    ['Voting Name', 'Votes'],
                    @foreach ($votings as $voting)
                      ['{{ $voting->name }}', {{ $voting->votes }}],
                    @endforeach
                  ]);
          
                  var options = {
                    title: 'Persentase hasil voting'
                  };
          
                  var chart = new google.visualization.PieChart(document.getElementById('votesChart'));
          
                  chart.draw(data, options);
                }
          
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChartStatus);
          
                function drawChartStatus() {
                  var status0 = {{ $users->where('status', 0)->count() }};
                  var totalUsers = {{ $users->count() }};
                  var nonZeroStatusCount = totalUsers - status0;
          
                  var data = google.visualization.arrayToDataTable([
                    ['Status', 'Jumlah'],
                    ['Belum Memilih', status0],
                    ['Telah Memilih', nonZeroStatusCount]
                  ]);
          
                  var options = {
                    pieHole: 0.4,
                    pieSliceTextStyle: {
                      color: 'white',
                    },
                    legend: 'none',
                    title: 'Persentase Pengguna yang sudah memilih (0 / Biru = belum memilih)'
                  };
          
                  var chart = new google.visualization.PieChart(document.getElementById('statusChart'));
          
                  chart.draw(data, options);
          
                }
              </script>
             
    </head>
    <body class="antialiased">
        
        @include('layouts.mainNavbar')

        <div class="container" style="margin-bottom: 15vh; margin-top:10vh">
          {{-- <h3 class="h3 text-center mb-5 mt-5">{{ __('You are logged in!') }} {{ Auth::user()->name }}</h3> --}}
          <h4 class="h4 text-center mb-5" style="font-weight: bold; font-size:x-large; color:#145DA0;">Daftar Voting</h4>
          @if(count($votings) > 0)
              <div class="row">
                  @foreach($votings as $voting)
                      <div class="col-md-4 mb-4">
                          <div class="card">
                              <img src="{{ asset('photos/' . $voting->photo) }}" class="card-img-top" style="width: 100%; height:250px" alt="{{ $voting->name }}">
                              <div class="card-body">
                                  <h5 class="card-title">{{ $voting->name }}</h5>
                                  <div class="card-text description" id="description_{{ $voting->id }}">
                                      <p>VISI: {{ $voting->visi }}</p>
                                  </div>                       
                                  <a href="{{ route('votings.show', $voting->id) }}" class="readMoreLink" data-id="{{ $voting->id }}">Read More</a>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
              @endif
      </div>
      <div class="chart-container">
        <div id="votesChart" class="chart"></div>
        <div id="statusChart" class="chart"></div>
    </div>
          @include('layouts.footerUser')


          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>

