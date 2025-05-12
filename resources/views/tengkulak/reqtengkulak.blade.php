<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JamurMarket - Permintaan</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    
    select:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(34, 197, 94, 0.4);
      }
      
      tbody tr {
        transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
      }
      
      tbody tr:hover {
        background-color: #f0fdf4;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
         transform: translateX(5px) 
      }
      
      /* Ensuring scroll functionality */
      .bg-white.overflow-x-auto {
        overflow-x: auto;
        overflow-y: auto;
        max-height: 500px; /* Adjust as necessary */
      }
      
      table {
        width: 100%;
        table-layout: fixed;
      }
      
            
      
  </style>
</head>
<body class="bg-gray-100 font-sans">
  <div class="p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
      <div class="text-2xl font-bold text-green-700">Jamur<span class="text-black">Market</span></div>
      <a href="hh.html">
        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow-md">
          + Tambah Permintaan
        </button>
      </a>
    </div>

    <!-- Search & Filter -->
    <div class="bg-white p-4 rounded shadow mb-4 flex flex-col md:flex-row md:items-center md:justify-between gap-2">
      <input type="text" placeholder="Cari permintaan..." class="border border-gray-300 rounded px-4 py-2 w-full md:w-1/3" />
      <select class="border border-gray-300 bg-white rounded px-4 py-2 w-full md:w-auto cursor-pointer hover:border-green-500 focus:ring-2 focus:ring-green-300 transition">
        <option>Semua Status</option>
        <option>Pending</option>
        <option>Disetujui</option>
      </select>
    </div>

    <!-- Table -->
    <div class="bg-white rounded shadow overflow-x-auto">
      <table class="min-w-full table-auto">
        <thead class="bg-gray-100">
          <tr class="text-left text-gray-600 text-sm">
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Pengguna</th>
            <th class="px-4 py-2">Jumlah Stok</th>
            <th class="px-4 py-2">Alamat</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-t hover:shadow-md">
            <td class="px-4 py-3">#001</td>
            <td class="px-4 py-3 flex items-center gap-2">
              <img src="https://randomuser.me/api/portraits/women/1.jpg" class="w-8 h-8 rounded-full" alt="avatar" />
              Sarah Putri
            </td>
            <td class="px-4 py-3">50 kg</td>
            <td class="px-4 py-3">Pasar Induk, Bondowoso</td>
            <td class="px-4 py-3">
              <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded">Pending</span>
            </td>
            <td class="px-4 py-3 space-x-2 text-blue-600 text-lg">
              <button>👁️</button>
              <button>✏️</button>
              <button class="text-red-500">🗑️</button>
            </td>
          </tr>
          <tr class="border-t hover:shadow-md">
            <td class="px-4 py-3">#002</td>
            <td class="px-4 py-3 flex items-center gap-2">
              <img src="https://randomuser.me/api/portraits/women/1.jpg" class="w-8 h-8 rounded-full" alt="avatar" />
              Sarah Putri
            </td>
            <td class="px-4 py-3">50 kg</td>
            <td class="px-4 py-3">Pasar Induk, Bondowoso</td>
            <td class="px-4 py-3">
              <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded">Pending</span>
            </td>
            <td class="px-4 py-3 space-x-2 text-blue-600 text-lg">
              <button>👁️</button>
              <button>✏️</button>
              <button class="text-red-500">🗑️</button>
            </td>
          </tr>
          <tr class="border-t hover:shadow-md">
            <td class="px-4 py-3">#003</td>
            <td class="px-4 py-3 flex items-center gap-2">
              <img src="https://randomuser.me/api/portraits/women/1.jpg" class="w-8 h-8 rounded-full" alt="avatar" />
              Sarah Putri
            </td>
            <td class="px-4 py-3">30 kg</td>
            <td class="px-4 py-3">Pasar Induk, Bondowoso</td>
            <td class="px-4 py-3">
              <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded">Disetujui</span>
            </td>
            <td class="px-4 py-3 space-x-2 text-blue-600 text-lg">
              <button>👁️</button>
              <button>✏️</button>
              <button class="text-red-500">🗑️</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Footer & Pagination -->
    <div class="flex justify-between items-center mt-4 text-sm text-gray-600">
      <span>Menampilkan 1-10 dari 50 data</span>
      <div class="flex space-x-1">
        <button class="px-2 py-1 border rounded text-gray-700">&lt;</button>
        <button class="px-3 py-1 bg-green-600 text-white rounded">1</button>
        <button class="px-3 py-1 border rounded">2</button>
        <button class="px-3 py-1 border rounded">3</button>
        <button class="px-2 py-1 border rounded text-gray-700">&gt;</button>
      </div>
    </div>
  </div>
</body>
</html>
