<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CWB Resto</title>
  @vite(['resources/css/order-detail.css'])
</head>
<body>
  <header>
    <a href="/menu"><i class="fa-solid fa-arrow-left"></i></a>
  </header>
  <main class="invoice">
    <div class="invoice__header">
      <img src="/icons/logo.svg">
    </div>
    <h2 class="font-organetto">STRUK PEMBAYARAN</h2>
    <table class="invoice__payment">
      <tr>
        <th>Pelanggan</th>
        <th>Tanggal Order</th>
      </tr>
      <tr>
        <td>Adinda</td>
        <td>25 Desember 2024</td>
      </tr>
      <tr>
        <th>Tipe Order</th>
        <th>Meja</th>
      </tr>
      <tr>
        <td>Dine in</td>
        <td>30</td>
      </tr>
      <tr>
        <th>Kode Transaksi</th>
        <th>Waktu Transaksi</th>
      </tr>
      <tr>
        <td>GSNAJEWM2681</td>
        <td>25 Desember 2024 - 21:26</td>
      </tr>
      <tr>
        <th>Pembayaran</th>
        <th>Status</th>
      </tr>
      <tr>
        <td>Cash</td>
        <td>Pending</td>
      </tr>
    </table>
    <p>Silakan tunjukkan kode transaksi ini kepada kasir untuk menyelesaikan pesanan anda</p>
    <h3>Detail Pesanan</h3>
    <table class="invoice__order-detail">
      <thead>
        <tr>
          <th>Item</th>
          <th>Qty</th>
          <th>Harga Satuan</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Sate Usus</td>
          <td>2x</td>
          <td>Rp. 25.000</td>
          <td>Rp. 50.000</td>
        </tr>
      </tbody>
    </table>
    <table class="invoice__subtotal">
      <tbody>
        <tr>
          <th>Subtotal: </th>
          <td>Rp. 50.000</td>
        </tr>
        <tr>
          <th>Pajak & Biaya: </th>
          <td>Rp. 1000</td>
        </tr>
      </tbody>
    </table>
    <div class="invoice__total">
      <p>Total: </p>
      <p>Rp. 51.000</p>
    </div>
  </main>

  <footer>
    <p>Sambil menunggu pesanan, Anda dapat membaca <a href="/">sejarah kafe kami</a>.</p>
    <button id="downloadPDF">Unduh PDF</button>
  </footer>
  @vite(['resources/js/user/order_detail.js'])
</body>
</html>
