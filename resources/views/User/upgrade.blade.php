<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upgrade IoT System - VMUSH</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar (sama seperti sebelumnya, disertakan untuk konteks) -->
        <div class="w-64 bg-white shadow-md">
            <div class="p-4">
                <h1 class="text-2xl font-bold text-gray-800">VMUSH</h1>
                <p class="text-sm text-gray-500">Console System</p>
            </div>
            <nav class="mt-4">
                <ul>
                    <li class="px-4 py-2 text-gray-600 hover:bg-gray-100">Home</li>
                    <li class="px-4 py-2 bg-green-100 text-green-600 font-semibold">Upgrade</li>
                </ul>
            </nav>
            <div class="absolute bottom-0 p-4">
                <p class="text-sm text-gray-500">Admin User</p>
                <p class="text-xs text-gray-400">admin@vmush.com</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Upgrade IoT System</h2>
            </div>

            <!-- Product Cards -->
            <div class="grid grid-cols-3 gap-6">
                <!-- Card 1: Temperature Sensor -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('temperature.jpg') }}" alt="Temperature Sensor" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Temperature Sensor</h3>
                        <p class="text-sm text-gray-500 mt-1">High-precision temperature monitoring for optimal mushroom growth conditions.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-lg font-bold text-gray-800">$149.89</span>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Fan Control System -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('images/temperature.jpg') }}" alt="Fan Control System" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Fan Control System</h3>
                        <p class="text-sm text-gray-500 mt-1">Automated ventilation control system for maintaining air circulation.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-lg font-bold text-gray-800">$199.89</span>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Automatic Sprinkler -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('images/temperature.jpg') }}" alt="Automatic Sprinkler" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Automatic Sprinkler</h3>
                        <p class="text-sm text-gray-500 mt-1">Smart irrigation system with precise moisture control and scheduling.</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-lg font-bold text-gray-800">$249.89</span>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>