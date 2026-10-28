<?php
// ============================================
// DATA TOKO (sementara disimpan di array)
// Pada Pertemuan 7, data ini akan dipindah ke database MySQL.
// ============================================

$namaToko = "Maison de Lumière";

// Array multidimensi: kode produk => data produk (array asosiatif)
$produk = [
    "P001" => [
        "nama"     => "Croissant au Beurre",
        "kategori" => "Pastry",
        "harga"    => 35000,
        "diskon"   => 10,          // dalam persen
        "stok"     => 20,
        "ikon"     => "🥐",
    ],
    "P002" => [
        "nama"     => "Pain au Chocolat",
        "kategori" => "Pastry",
        "harga"    => 38000,
        "diskon"   => 5,
        "stok"     => 15,
        "ikon"     => "🥐",
    ],
    "P003" => [
        "nama"     => "Quiche Lorraine",
        "kategori" => "Appetizer",
        "harga"    => 65000,
        "diskon"   => 0,
        "stok"     => 40,
        "ikon"     => "🥧",
    ],
    "P004" => [
        "nama"     => "Soupe à l'Oignon",
        "kategori" => "Appetizer",
        "harga"    => 55000,
        "diskon"   => 10,
        "stok"     => 20,
        "ikon"     => "🍲",
    ],
    "P005" => [
        "nama"     => "Boeuf Bourguignon",
        "kategori" => "Main Course",
        "harga"    => 148000,
        "diskon"   => 10,
        "stok"     => 22,
        "ikon"     => "🥩",
    ],
    "P006" => [
        "nama"     => "Coq au Vin",
        "kategori" => "Main Course",
        "harga"    => 125000,
        "diskon"   => 5,
        "stok"     => 10,
        "ikon"     => "🍗",
    ],
    "P007" => [
        "nama"     => "Crème Brûlée",
        "kategori" => "Dessert",
        "harga"    => 48000,
        "diskon"   => 5,
        "stok"     => 14,
        "ikon"     => "🍮",
    ],
    "P008" => [
        "nama"     => "Macarons Français",
        "kategori" => "Dessert",
        "harga"    => 45000,
        "diskon"   => 10,
        "stok"     => 25,
        "ikon"     => "🍪",
    ],
    "P010" => [
        "nama"     => "Café au Lait",
        "kategori" => "Beverage",
        "harga"    => 35000,
        "diskon"   => 0,
        "stok"     => 20,
        "ikon"     => "☕",
    ],
       "P011" => [
        "nama"     => "Chocolat Chaud",
        "kategori" => "Beverage",
        "harga"    => 40000,
        "diskon"   => 0,
        "stok"     => 20,
        "ikon"     => "🍫",
    ],

];

// Contoh pesanan pelanggan: kode produk => jumlah yang dibeli
$pesanan = [
    "P001" => 2,
    "P003" => 3,
    "P006" => 3,
    "P010" => 2,
    "P011" => 1,
];