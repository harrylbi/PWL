<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - Toko</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>

  <div class="p-3 pb-md-4 mx-auto text-center">
    <h1 class="display-4 fw-normal text-body-emphasis">Dashboard - TOKO</h1>
    <p class="fs-5 text-body-secondary"><?= date("l, d-m-Y") ?> <span id="jam"></span>:<span id="menit"></span>:<span id="detik"></span></p>
  </div>
  <hr>

  <div class="table-responsive card m-5 p-5">
    <table class="table text-center">
      <thead>
        <tr>
          <th style="width: 5%;">No</th>
          <th style="width: 10%;">Username</th>
          <th style="width: 25%;">Alamat</th>
          <th style="width: 10%;">Total Harga</th>
          <th style="width: 10%;">Ongkir</th>
          <th style="width: 10%;">Status</th>
          <th style="width: 10%;">Jumlah Item</th>
          <th style="width: 20%;">Tanggal Transaksi</th>
        </tr>
      </thead>
      <tbody id="data-table">
        <!-- Data dari API akan ditambahkan di sini -->
      </tbody>
    </table>
  </div>

  <script>
    function waktu() {
      const waktu = new Date();
      document.getElementById("jam").innerHTML = waktu.getHours().toString().padStart(2, '0');
      document.getElementById("menit").innerHTML = waktu.getMinutes().toString().padStart(2, '0');
      document.getElementById("detik").innerHTML = waktu.getSeconds().toString().padStart(2, '0');
      setTimeout(waktu, 1000);
    }
    waktu();

    async function fetchData() {
      try {
        const response = await fetch('http://localhost:8080/api', {
          method: 'GET',
          headers: {
            'Key': 'random123678abcghi'
          }
        });

        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();
        console.log('API Response:', data);

        if (Array.isArray(data.results)) {
          const tableBody = document.getElementById('data-table');
          tableBody.innerHTML = ''; // Kosongkan isi tabel terlebih dahulu

          data.results.forEach((item, index) => {
            const statusText = item.status === "1" ? "Sudah Selesai" : "Belum Selesai";
            const row = `
              <tr>
                <td>${index + 1}</td>
                <td>${item.username}</td>
                <td>${item.alamat || '-'}</td>
                <td>${item.total_harga}</td>
                <td>${item.ongkir || '-'}</td>
                <td>${statusText}</td>
                <td>${item.jumlah_item || 0}</td>
                <td>${item.tanggal_transaksi || '-'}</td>
              </tr>
            `;
            tableBody.innerHTML += row;
          });

        } else {
          console.error('Expected results to be an array but received:', data.results);
        }
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    }

    fetchData(); // Ambil data dari API saat halaman dimuat
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
