<div>
   <div class="bg-white p-6 rounded-xl shadow-md border border-green-500">

    <div>
        <h2 class="text-lg font-bold text-green-500">Sales Report</h2>
      <i class="ri-bar-chart-2-fill text-green-500 text-2xl"></i>
    </div>

    <div>
        <canvas id="salesChart" height="140"></canvas>
    </div>

    <div class="mt-4 grid grid-cols-3 text-center">
        <div>
            <p class="text-sm text-gray-500">Today</p>
            <p class="text-xl font-bold text-green-500">
            P {{ number_format($todaySales, 2)}}
            </p>

        </div>
        <div >
            <p class="text-sm text-gray-500">This Week</p>
            <p class="text-xl font-bold text-green-500">
            P {{ number_format($weekSales, 2)}}
            </p>

        </div>
        <div >
            <p class="text-sm text-gray-500">This Month</p>
            <p class="text-xl font-bold text-green-500">
            P {{ number_format($monthSales, 2)}}
            </p>

        </div>
    </div>

   </div>

 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('salesChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Today', 'This Week', 'This Month'],
      datasets: [{
        label: 'Sales',
        data: [
          {{$todaySales}},
          {{$weekSales}},
          {{$monthSales}},

        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

</div>