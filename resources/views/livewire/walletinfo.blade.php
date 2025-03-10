<script>
// wallet info chart
var ctx2 = document.getElementById("chart-bar").getContext("2d");


var myChart1 = new Chart(ctx2, {
  type: 'doughnut',
  data: {
    labels: [
      @foreach($analytics_tiker as $key => $value)
    "{{ $value }}",
    @endforeach],
    datasets: [
      {
        data: [
          @foreach($analytics_sum as $key => $value)
          {{$value}},
    @endforeach
        ],
        backgroundColor: [ 'rgb(52, 229, 235)', 'rgb(52, 235, 128)', 'rgb(235, 155, 52)', 'rgb(75, 192, 192)', 'rgb(54, 162, 235)', ],
        offset:-10,
        weight: 40,
        borderWidth: 1,
        borderRadius: 10,
      },
    ],
  },
  options: {
    cutoutPercentage: 85,
    elements: {
      arc: {
      spacing: 8
      },
      responsive: true,
      maintainAspectRatio: true,
      },
     
    plugins: {
      legend: {
        display: true,
        position: 'bottom',
      },
      datalabels: {
        display: false,
        formatter: (val, ctx) => {
          // Grab the label for this value
          const label = ctx.chart.data.labels[ctx.dataIndex];

          // Format the number with 2 decimal places
          const formattedVal = Intl.NumberFormat('en-US', {
            minimumFractionDigits: 2,
          }).format(val);

          // Put them together
          return `${label}: ${formattedVal}`;
        },
        color: '#fff',
        backgroundColor: '#404040',
      },
    },
  },
});
// myChart1.update();
// wallet info chart
</script>