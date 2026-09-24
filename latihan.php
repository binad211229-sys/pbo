<?php

class produk {
    public string $nama;
    public string $harga;

    public function __construct(string $nama, string $harga) {
        $this->nama = $nama;
        $this->harga = $harga;
        echo "Produk " . $this->nama . " dengan harga " . $this->harga . " berhasil ditambahkan.<br>";
    }
    public function getdetail() {
        return "Produk: " . $this->nama . ", Harga: " . $this->harga;
    }
    public function __destruct() {
        echo " Produk " . $this->nama . " telah dihapus.<br>";
    }

}

$laptop = new produk ("laptop ", 5000000);
echo $laptop->getdetail();