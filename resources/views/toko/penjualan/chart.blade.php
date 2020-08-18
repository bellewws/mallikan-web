@extends('toko.default')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
<script>
    var data_transaksi = <?php echo $value; ?>

    var barChartData = {
        labels: <?php echo $label; ?>,
        datasets: [{
            label: 'Total Pendapatan',
            backgroundColor: "rgba(220,220,220,0.5)",
            data: data_transaksi
        }]
    };
    
    var data_total = <?php echo $jml; ?>

    var barChartData2 = {
        labels: <?php echo $month; ?>,
        datasets: [{
            label: 'Total Produk Terjual (Kg)',
            backgroundColor: "rgba(220,220,220,0.5)",
            data: data_total
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'line',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'rgb(0, 0, 255)',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Transaksi Berhasil'
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
                
            }
        });

        var footerLine1 = <?php echo $sum; ?>

        var ptx = document.getElementById("canvas2").getContext("2d");
        window.myBar = new Chart(ptx, {
            type: 'bar',
            data: barChartData2,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'rgb(0, 255, 0)',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Total Produk Terjual'
                },
                tooltips: {
                    enabled: true,
                    mode: 'single',
                    callbacks: {
                        beforeFooter: function(tooltipItems, data) { 
                          return 'Total Harga Produk: ' + footerLine1[tooltipItems[0].index];
                        },
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            stepSize: 1,
                            beginAtZero: true,
                        }
                    }]
                }
            }
        });
    };


</script>


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <canvas id="canvas" height="280" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <canvas id="canvas2" height="280" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div> <a href="{{route('show_chart_table')}}" class="btn btn-primary">lihat detail produk terjual</a href="{{route('show_chart_table')}}"> </div>
</div>
@endsection