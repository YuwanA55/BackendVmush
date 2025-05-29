@extends('layoutUser.body')
@section('konten')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Main Content -->
<div class="">

    <!-- Grid Section for Temperature and Humidity -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('images/suhu.png') }}" alt="Temperature Icon" class="pp mb-2">
                        <div class="text-center">
                            <p id="tempValue" class="h4 text-dark">Loading...</p>
                            <p class="text-muted">Temperature</p>
                        </div>
                    </div>
                    <span id="statusLabel" class="badge bg-success text-white position-absolute top-0 end-0 m-2">Normal</span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('images/humadity.png') }}" alt="Humidity Icon" class="pp mb-2">
                        <div class="text-center">
                            <p id="humidityValue" class="h4 text-dark">Loading...</p>
                            <p class="text-muted">Humidity</p>
                        </div>
                    </div>
                    <span class="badge bg-primary text-white position-absolute top-0 end-0 m-2">Normal</span>
                </div>
            </div>
        </div>
    </div>

    <style>
        .pp {
            width: 30px;
            height: 30px;
        }
    </style>

    <!-- Charts Section -->
    <div class="row">
        <!-- Commenting out chart section completely -->
        <div class="col-md-6" >
          {{-- id="tempChartSection" --}}
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="h6 text-dark">Temperature & Humidity Trends</h3>
                        <select class="form-select form-select-sm w-auto">
                            <option>Last 24 Hours...</option>
                        </select>
                    </div>
                    <canvas id="tempChart"></canvas>
                </div>
            </div>
        </div> 
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="h6 text-dark">Light & CO₂ Analysis</h3>
                        <select class="form-select form-select-sm w-auto">
                            <option>Last 24 Hours...</option>
                        </select>
                    </div>
                    <div class="h-100 d-flex align-items-center justify-content-center bg-light rounded">
                        <p class="text-muted">Chart Placeholder</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

async function fetchSensorData() {
    try {
        // Get the Firebase URL from Blade
        @if(count($permintaan) > 0)
            const firebaseUrl = "{{ $permintaan[0]->Link }}"; // Use the first record
            const response = await fetch(firebaseUrl);
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            const data = await response.json();

            // Check if data contains temperature and humidity
            if (!data.temperature || !data.humidity) {
                throw new Error('Invalid data format: temperature or humidity missing');
            }

            const temp = data.temperature;
            const humidity = data.humidity;
            const now = new Date().toLocaleTimeString();

            // Update real-time temperature and humidity values
            document.getElementById('tempValue').textContent = temp + '°C';
            document.getElementById('humidityValue').textContent = humidity + '%';

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
        @else
            console.error('No Firebase URL provided');
            document.getElementById('tempValue').textContent = 'Error: No data';
            document.getElementById('humidityValue').textContent = 'Error: No data';
        @endif
    } catch (error) {
        console.error('Error fetching data:', error);
        document.getElementById('tempValue').textContent = 'Error';
        document.getElementById('humidityValue').textContent = 'Error';
    }
}

// Fetch data every 2 seconds for real-time update
setInterval(fetchSensorData, 2000);
fetchSensorData();
</script>

@endsection
