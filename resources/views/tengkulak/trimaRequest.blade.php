<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JamurMarket - Permintaan Stok</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        select:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(34, 197, 94, 0.4);
        }

        /* Hover effect for the card */
        .request-card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .request-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">
    <!-- Header -->
    <header class="p-6 bg-white shadow-md">
        <div class="flex justify-between items-center">
            <div class="text-2xl font-bold text-green-700">Jamur<span class="text-black">Market</span></div>
            <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow-md">+ Tambah
                Permintaan</button>
        </div>
    </header>

    <!-- Main content -->
    <div class="p-6">
        <div class="mb-4 flex items-center justify-between">
            <div class="flex items-center">
                <span class="text-lg font-semibold">Beranda &gt; Permintaan Stok</span>
            </div>
            <div class="flex gap-4">
                <input type="text" placeholder="Cari permintaan stok..." class="border border-gray-300 rounded px-4 py-2">
                <select class="border border-gray-300 bg-white rounded px-4 py-2 cursor-pointer hover:border-green-500">
                    <option>Semua Lokasi</option>
                    <option>Bondowoso</option>
                    <option>Jember</option>
                </select>
                <select class="border border-gray-300 bg-white rounded px-4 py-2 cursor-pointer hover:border-green-500">
                    <option>Urutkan</option>
                    <option>Terbaru</option>
                    <option>Jumlah Stok</option>
                </select>
            </div>
        </div>

        <!-- Request Cards -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Request 1 -->
           <div class="request-card bg-white p-4 rounded shadow-lg h-[350px] flex flex-col justify-between">

                <div class="flex items-center gap-4 mb-5">
                    <img src="https://randomuser.me/api/portraits/women/1.jpg" alt="avatar" class="w-12 h-12 rounded-full">
                    <div>
                        <p class="text-lg font-semibold">Sarah Putri</p>
                        <p class="text-sm text-gray-500">5 menit yang lalu</p>
                    </div>
                </div>
                <div class="mb-6">
                    <p><span class="font-semibold">Permintaan:</span> 50 kg</p>
                    <p><span class="font-semibold">Alamat:</span> Pasar Induk, Bondowoso</p>
                    <p><span class="font-semibold">Dibutuhkan:</span> Besok</p>
                </div>
                <button class="w-full bg-green-600 text-white py-2 rounded">Ambil Stok</button>
            </div>

            <!-- Request 2 -->
           <div class="request-card bg-white p-4 rounded shadow-lg h-[350px] flex flex-col justify-between">

                <div class="flex items-center gap-4 mb-5">
                    <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="avatar" class="w-12 h-12 rounded-full">
                    <div>
                        <p class="text-lg font-semibold">Budi Santoso</p>
                        <p class="text-sm text-gray-500">15 menit yang lalu</p>
                    </div>
                </div>
                <div class="mb-6">
                    <p><span class="font-semibold">Permintaan:</span> 30 kg</p>
                    <p><span class="font-semibold">Alamat:</span> Jl. Kalimantan, Jember</p>
                    <p><span class="font-semibold">Dibutuhkan:</span> Hari Ini</p>
                </div>
                <button class="w-full bg-green-600 text-white py-2 rounded">Ambil Stok</button>
            </div>

            <!-- Request 3 -->
           <div class="request-card bg-white p-4 rounded shadow-lg h-[350px] flex flex-col justify-between">

                <div class="flex items-center gap-4 mb-5">
                    <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="avatar" class="w-12 h-12 rounded-full">
                    <div>
                        <p class="text-lg font-semibold">Linda Wijaya</p>
                        <p class="text-sm text-gray-500">30 menit yang lalu</p>
                    </div>
                </div>
                <div class="mb-6">
                    <p><span class="font-semibold">Permintaan:</span> 75 kg</p>
                    <p><span class="font-semibold">Alamat:</span> Kademangan, Bondowoso</p>
                    <p><span class="font-semibold">Dibutuhkan:</span> 2 Hari</p>
                </div>
                <button class="w-full bg-green-600 text-white py-2 rounded">Ambil Stok</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white p-4 text-center text-gray-500 text-sm">
        <p>© 2025 JamurMarket. Semua hak dilindungi.</p>
    </footer>
</body>

</html>
