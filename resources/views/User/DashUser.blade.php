@extends('layoutUser.body')
@section('konten')

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="row">
  <div class="col-lg-6">
    <div class="card shadow-sm border-0">
      <div class="card-body position-relative">
        <!-- Label status -->
        <span id="statusLabel" class="badge bg-success position-absolute top-0 end-0 m-3">Normal</span>

        <!-- Icon dan teks -->
        <div class="d-flex align-items-center mb-3">
          <i class="bi bi-thermometer-half fs-1 text-danger me-3"></i>
          <div>
            <h5 class="card-title mb-0">Temperature</h5>
            <small class="text-muted">Sensor DHT22</small>
          </div>
        </div>

        <!-- Nilai dan Chart -->
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h2 class="fw-bold" id="tempValue">-- °C</h2>
            <p class="mb-0 text-muted" id="lastUpdate">Last updated: --</p>
          </div>
          <div style="width: 200px; height: 100px;">
            <canvas id="tempChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>




</div>

<script>
  const ctx = document.getElementById('tempChart').getContext('2d');
  const maxDataPoints = 20;
  const tempData = {
    labels: [],
    datasets: [{
      label: 'Temperature',
      data: [],
      borderColor: 'rgba(75, 192, 192, 1)',       // default hijau
      backgroundColor: 'rgba(75, 192, 192, 0.2)', // default hijau transparan
      fill: true,
      tension: 0.4,
      pointRadius: 0
    }]
  };

  const tempChart = new Chart(ctx, {
    type: 'line',
    data: tempData,
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: false }
      },
      scales: {
        x: { display: false },
        y: { display: true, min: 20, max: 50 }
      }
    }
  });

  async function fetchSensorData() {
    try {
      const response = await fetch('https://testsuhu-845a0-default-rtdb.firebaseio.com/sensorData.json');
      const data = await response.json();

      const temp = data.temperature;
      const now = new Date().toLocaleTimeString();

      // Update chart data
      tempData.labels.push(now);
      tempData.datasets[0].data.push(temp);
      if (tempData.labels.length > maxDataPoints) {
        tempData.labels.shift();
        tempData.datasets[0].data.shift();
      }

      // Ganti warna chart berdasarkan suhu
      if (temp > 30) {
        tempData.datasets[0].borderColor = 'rgba(255, 99, 132, 1)';      // merah
        tempData.datasets[0].backgroundColor = 'rgba(255, 99, 132, 0.2)';
      } else {
        tempData.datasets[0].borderColor = 'rgba(75, 192, 192, 1)';      // hijau
        tempData.datasets[0].backgroundColor = 'rgba(75, 192, 192, 0.2)';
      }

      tempChart.update();

      // Update value text
      document.getElementById('tempValue').textContent = temp + '°C';
      document.getElementById('lastUpdate').textContent = 'Last updated: ' + now;

      // Update status label
      const label = document.getElementById('statusLabel');
      if (temp > 30) {
        label.textContent = 'Panas';
        label.classList.remove('bg-success');
        label.classList.add('bg-danger');
      } else {
        label.textContent = 'Normal';
        label.classList.remove('bg-danger');
        label.classList.add('bg-success');
      }

    } catch (error) {
      console.error('Error fetching data:', error);
    }
  }

  // Ambil data setiap 2 detik
  setInterval(fetchSensorData, 2000);
  fetchSensorData();
</script>

@endsection
