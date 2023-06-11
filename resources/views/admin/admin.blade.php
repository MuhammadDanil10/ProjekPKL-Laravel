@extends('layouts.appLayout')
@section('konten')
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
     <style>
      .description {
      max-height: 100px; 
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
              margin-bottom: 3vh;
          }

          @media only screen and (max-width: 600px) {
              .chart {
                  height: 200px;
                  width: 400px;
              }
          }

    </style>
  </head>
  <body>
    <div id="votesChart" class="chart"></div>
    <div id="statusChart" class="chart"></div>
    <div class="container mt-2">
          {{-- <h3 class="h3 text-center mb-5 mt-5">{{ __('You are logged in!') }} {{ Auth::user()->name }}</h3> --}}
          <h4 class="h4 text-center mb-5" style="font-weight: bold; font-size:x-large; color:#145DA0;">Data Hasil Pemilihan</h4>
          @if(count($votings) > 0)
              <div class="row">
                  @foreach($votings as $voting)
                      <div class="col-md-4 mb-4">
                          <div class="card rounded">
                              <img src="{{ asset('photos/' . $voting->photo) }}" class="card-img-top rounded" alt="{{ $voting->name }}">
                              <div class="card-body">
                                  <h3 class="h3 card-title">{{ $voting->name }}</h>
                                  <h3 class="h3 mx-auto mt-5">Jumlah Suara:  {{ $voting->votes }}</h3> 
                              </div>
                              <a href="{{ route('data.show', ['votingId' => $voting->id]) }}" class="btn btn-info">Cek Data {{ $voting->name }}</a>
                          </div>
                      </div>
                  @endforeach
              </div>
              @endif
      </div>

  </body>
</html>
@endsection
