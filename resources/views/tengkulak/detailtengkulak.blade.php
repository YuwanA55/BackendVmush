<!DOCTYPE html>
<html lang="id">
<head>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detail Permintaan - JamurMarket</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="navbar">
  <div class="logo">🍄 JamurMarket</div>
  <div class="profile-icon"></div>
</header>

<nav class="breadcrumb">
  <a href="#">Beranda</a> &gt;
  <a href="#">Permintaan Stok</a> &gt;
  <span>Detail Permintaan</span>
</nav>

<main class="container">
  <section class="request-card">
    <div class="request-header">
      <h2>Permintaan Stok Jamur Tiram</h2>
      <span class="status-badge">Aktif</span>
      <div class="request-id">ID: #JT2025001</div>
    </div>
   <div class="request-info">
 <div class="left-info">
  <div class="info-item">
    <div class="icon-circle"><i class="ph ph-scales"></i></div>
    <div>
      <div class="label">Jumlah yang Diminta</div>
      <div class="value">50 kg</div>
    </div>
  </div>
  <div class="info-item">
    <div class="icon-circle"><i class="ph ph-calendar"></i></div>
    <div>
      <div class="label">Tanggal Permintaan</div>
      <div class="value">15 Jan 2025</div>
    </div>
  </div>
  <div class="info-item">
    <div class="icon-circle"><i class="ph ph-clock"></i></div>
    <div>
      <div class="label">Batas Waktu</div>
      <div class="value">16 Jan 2025</div>
    </div>
  </div>
</div>

<div class="right-info">
  <div class="info-item">
    <div class="icon-circle"><i class="ph ph-user-circle"></i></div>
    <div>
      <div class="label">Peminta</div>
      <div class="value">Sarah Putri</div>
    </div>
  </div>
  <div class="info-item">
    <div class="icon-circle"><i class="ph ph-map-pin"></i></div>
    <div>
      <div class="label">Alamat Pengiriman</div>
      <div class="value">Jl. raya No. 123, Pasar Induk, Bondowoso</div>
    </div>
  </div>
  <div class="info-item">
    <div class="icon-circle"><i class="ph ph-phone"></i></div>
    <div>
      <div class="label">Nomor Telepon</div>
      <div class="value"><a href="tel:+6281234567890">+62 812–3456–7890</a></div>
    </div>
  </div>
</div>

</div>

  </section>

  <section class="note">
    <h3>Catatan Tambahan</h3>
    <p>Membutuhkan jamur tiram segar untuk restoran. Pengiriman diharapkan bisa dilakukan secara bertahap sesuai kesepakatan. Kualitas harus grade A untuk penggunaan restaurant.</p>
  </section>

  <div class="actions">
    <button class="chat-btn">💬 Chat untuk Mengambil Stok</button>
    <button class="save-btn">🔖 Simpan Permintaan</button>
  </div>
</main>

<footer class="footer">
  &copy; 2025 JamurMarket. Semua hak dilindungi.
</footer>


<style>
    body {
  font-family: 'Segoe UI', sans-serif;
  margin: 0;
  background-color: #f8f9fa;
  color: #333;
}

.navbar {
  background-color: #ffffff;
  padding: 1rem 2rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid #e0e0e0;
}

.logo {
  font-weight: bold;
  color: #1ca17d;
  font-size: 1.2rem;
}

.profile-icon {
  width: 32px;
  height: 32px;
  background-color: #ccc;
  border-radius: 50%;
}

.breadcrumb {
  font-size: 0.9rem;
  padding: 1rem 2rem;
  color: #888;
}

.breadcrumb a {
  color: #1ca17d;
  text-decoration: none;
}

.container {
  max-width: 1100px;
  margin: 0 auto;
  padding: 1rem 2rem;
  background-color: #fff;
  border-radius: 10px;
  margin-top: 1rem;
  margin-bottom: 3rem; /* Tambahkan ini agar ada jarak dengan footer */
}



.request-card {
  padding-bottom: 1rem;
  border-bottom: 1px solid #eee;
}

.request-header {
  display: flex;
  flex-direction: column;
  gap: 0.3rem;
  position: relative;
}

.status-badge {
  background-color: #d1f4e0;
  color: #1ca17d;
  font-size: 0.8rem;
  padding: 4px 10px;
  border-radius: 8px;
  display: inline-block;
  margin-top: 5px;
  width: fit-content;
}

.request-id {
  position: absolute;
  right: 0;
  top: 0;
  font-size: 0.85rem;
  color: #888;
}

.request-info {
  display: flex;
  justify-content: space-between;
  margin-top: 1rem;
}

.left-info, .right-info {
  width: 45%;
}

.icon {
  margin-right: 5px;
}

.note {
  margin-top: 2rem;
  background-color: #f9f9f9;
  padding: 1rem;
  border-radius: 8px;
}

.note h3 {
  margin-top: 0;
}

.actions {
  display: flex;
  gap: 1rem;
  margin-top: 2rem;
  margin-bottom: 2rem;
}

.chat-btn {
  background-color: #1ca17d;
  color: white;
  padding: 0.75rem 1.5rem;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  flex: 1;
  font-size: 1rem;
}

.save-btn {
  background-color: white;
  color: #1ca17d;
  border: 2px solid #1ca17d;
  padding: 0.75rem 1.5rem;
  border-radius: 8px;
  cursor: pointer;
  flex: 1;
  font-size: 1rem;
}

.footer {
  text-align: center;
  padding: 1.5rem;
  font-size: 0.85rem;
  color: #888;
  border-top: 1px solid #ddd;
  background-color: #fff;
  margin-top: 2rem; /* Opsional: memberi ruang tambahan dari konten atas */
}

.info-item {
  display: flex;
  align-items: flex-start;
  margin-bottom: 1.5rem;
  gap: 1rem;
}

.icon-circle {
  width: 36px;
  height: 36px;
  background-color: #D1FAE5;
  color: #1ca17d;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  font-size: 1.2rem;
  flex-shrink: 0;
}
.icon-circle i {
  font-size: 20px;
  color: #1ca17d;
}


.label {
  font-size: 0.9rem;
  color: #555;
  margin-bottom: 0.2rem;
}

.value {
  font-weight: bold;
  color: #222;
}

a {
  text-decoration: none;
  color: inherit;
}

</style>
</body>
</html>
