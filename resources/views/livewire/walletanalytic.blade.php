<script>
// chart analytic
var ctx = document.getElementById("chart-line").getContext("2d");

var myChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: [
      @foreach($this->dayarr as $key => $value)
      "{{$value}}",
      @endforeach
    ],
    datasets: [
      {
        label: "Transfered",
        tension: 0.4,
        borderWidth: 0,
        borderRadius: 4,
        borderSkipped: false,
        backgroundColor: "#000",
        data: [
      @foreach($this->sumarr as $key => $value)
      {{$value}},
      @endforeach
        ],
        maxBarThickness: 20,
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: false,
      },
    },
    interaction: {
      intersect: false,
      mode: "index",
    },
    scales: {
      y: {
        grid: {
          drawBorder: false,
          display: false,
          drawOnChartArea: false,
          drawTicks: false,
        },
        ticks: {
          suggestedMin: 0,
          suggestedMax: 800,
          beginAtZero: true,
          padding: 0,
          font: {
            size: 14,
            family: "Open Sans",
            style: "normal",
            lineHeight: 2,
          },
          color: "#fff",
        },
      },
      x: {
        grid: {
          drawBorder: false,
          display: false,
          drawOnChartArea: false,
          drawTicks: true,
        },
        ticks: {
          display: true,
        },
      },
    },
  },
});

// myChart.destroy();
// end chart anal..:)

</script>
