<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Overview - VMUSH</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md">
            <div class="p-4">
                <h1 class="text-2xl font-bold text-gray-800">VMUSH</h1>
                <p class="text-sm text-gray-500">Console System</p>
            </div>
            <nav class="mt-4">
                <ul>
                    <li class="px-4 py-2 bg-green-100 text-green-600 font-semibold">Home</li>
                    <li class="px-4 py-2 text-gray-600 hover:bg-gray-100">Upgrade</li>
                </ul>
            </nav>
            <div class="absolute bottom-0 p-4">
                <p class="text-sm text-gray-500">Admin User</p>
                <p class="text-xs text-gray-400">admin@vmush.com</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Dashboard Overview</h2>
                <div class="flex items-center space-x-2">
                    <span>Mushroom Cultivation Environment</span>
                    <button class="text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Temperature and Humidity Cards -->
            <!-- Temperature and Humidity Cards -->
<!-- Temperature and Humidity Cards -->
<!-- Temperature and Humidity Cards -->
<div class="grid grid-cols-2 gap-6 mb-6">
    <div class="bg-white p-4 rounded-lg shadow-md flex items-center justify-between relative">
        <div class="flex flex-col items-center space-y-2">
            <img src="{{ asset('images/suhu.png') }}" alt="Temperature Icon" class="pp">
            <div class="text-center">
                <p class="text-2xl font-bold text-gray-800">{{ $temperature }}°C</p>
                <p class="text-sm text-gray-500">Temperature</p>
            </div>
        </div>
        <span class="absolute top-2 right-2 text-green-500 font-semibold">Normal</span>
    </div>
    <div class="bg-white p-4 rounded-lg shadow-md flex items-center justify-between relative">
        <div class="flex flex-col items-center space-y-2">
            <img src="{{ asset('images/humadity.png') }}" alt="Humidity Icon" class="pp">
            <div class="text-center">
                <p class="text-2xl font-bold text-gray-800">{{ $humidity }}%</p>
                <p class="text-sm text-gray-500">Humidity</p>
            </div>
        </div>
        <span class="absolute top-2 right-2 text-blue-500 font-semibold">Normal</span>
    </div>
</div>

            <style>
                .pp{
                    width: 30px;
                    height: 30px;
                }
            </style>

            <!-- Charts Section -->
            <div class="grid grid-cols-2 gap-6">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Temperature & Humidity Trends</h3>
                        <select class="text-sm text-gray-500 border rounded p-1">
                            <option>Last 24 Hou...</option>
                        </select>
                    </div>
                    <div class="h-80 bg-gray-100 rounded flex items-center justify-center">
                        <p class="text-gray-500">Chart Placeholder</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Light & CO₂ Analysis</h3>
                        <select class="text-sm text-gray-500 border rounded p-1">
                            <option>Last 24 Hou...</option>
                        </select>
                    </div>
                    <div class="h-80 bg-gray-100 rounded flex items-center justify-center">
                        <p class="text-gray-500">Chart Placeholder</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>