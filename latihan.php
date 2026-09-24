<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      padding: 20px;
    }
    .container {
      max-width: 400px;
      margin: 0 auto;
      background: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .form-group {
      margin-bottom: 15px;
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    input[type="text"], input[type="number"] {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-weight: bold;
    }
    button:hover {
      background-color: #45a049;
    }
    .hasil {
      margin-bottom: 15px;
      padding: 10px;
      background-color: #e7f3fe;
      border-left: 4px solid #2196F3;
      border-radius: 4px;
    }
  </style>
</head>
<body>

<div class="container">

  <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
    <div class="hasil">
      <?php
      class produk {
          public string $nama;
          public string $harga;

          public function __construct(string $nama, string $harga) {
              $this->nama = $nama;
              $this->harga = $harga;
              // echo dihapus dari sini agar tidak ada tulisan ganda
          }
          
          public function getdetail() {
              return "Produk: " . $this->nama . ", Harga: " . $this->harga;
          }
          
          public function __destruct(){
              echo "<br>produk untuk " . $this->nama ." selesai";
          }
      }

      $nama_input = $_POST['nama'] ?? '';
      $harga_input = $_POST['harga'] ?? '';

      $laptop = new produk($nama_input, $harga_input);
      echo $laptop->getdetail();

      // Hapus variabel agar __destruct() dipanggil di sini (di dalam .hasil)
      unset($laptop);
      ?>
    </div>
  <?php endif; ?>

  <form method="post" action="">
    <div class="form-group">
      <label for="nama">Nama Produk :</label>
      <input type="text" id="nama" name="nama" placeholder="contoh:VGA" required>
    </div>

    <div class="form-group">
      <label for="harga">Harga Produk :</label>
      <input type="number" id="harga" name="harga" placeholder="contoh:5000000" required>
    </div>

    <button type="submit">Tambah Produk</button>
  </form>

</div>

</body>
</html>