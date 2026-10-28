
<?php
// ============================================
// HALAMAN KATALOG PRODUK
// ============================================
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/fungsi.php';

$judulHalaman = "Katalog";
$halamanAktif = "index.php";

// Ringkasan toko
$jumlahProduk = count($produk);
$jumlahDiskon = hitungProdukDiskon($produk);
$nilaiStok = hitungNilaiStok($produk);

$daftarHarga = array_column($produk, "harga");
$rataRataHarga = count($daftarHarga) > 0
    ? array_sum($daftarHarga) / count($daftarHarga)
    : 0;

$produkTermurah = cariProdukTermurah($produk);

$kategoriDipilih = "";

$jumlahPerKategori = [];
foreach ($produk as $item) {
    $kategori = $item["kategori"];
    $jumlahPerKategori[$kategori] =
        ($jumlahPerKategori[$kategori] ?? 0) + 1;
}

require __DIR__ . '/includes/header.php';
?>

<!-- BANNER KATALOG -->
<section class="rounded-2xl bg-blue-700 text-white p-7 md:p-10 mb-8 shadow-sm">
    <p class="text-xs uppercase tracking-[0.25em] text-blue-200 mb-3">
        L'art de la gastronomie fontaine
    </p>

    <h1 class="text-3xl md:text-4xl font-bold mb-3">
        Katalog Produk
    </h1>

    <p class="text-blue-100 max-w-2xl leading-relaxed">
        Selamat datang di <?= htmlspecialchars($namaToko) ?>,
        tempat menikmati pilihan pastry, hidangan, dessert,
        dan minuman dengan cita rasa khas Fontaine.
    </p>
</section>

<!-- RATA-RATA HARGA -->
<div class="bg-white border border-slate-200 rounded-xl p-4 mb-6 shadow-sm">
    <p class="text-sm text-slate-500">
        Rata-rata harga produk (harga normal)
    </p>

    <p class="text-2xl font-bold text-blue-700">
        <?= formatRupiah((int) round($rataRataHarga)) ?>
    </p>
</div>

<!-- RINGKASAN PRODUK -->
<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

    <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-4">
        <p class="text-sm text-slate-500">Jumlah produk</p>
        <p class="text-2xl font-bold text-slate-800 mt-1">
            <?= $jumlahProduk ?>
        </p>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-4">
        <p class="text-sm text-slate-500">Sedang diskon</p>
        <p class="text-2xl font-bold text-red-600 mt-1">
            <?= $jumlahDiskon ?> produk
        </p>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-4">
        <p class="text-sm text-slate-500">Total nilai stok</p>
        <p class="text-xl font-bold text-slate-800 mt-1">
            <?= formatRupiah($nilaiStok) ?>
        </p>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-4">
        <p class="text-sm text-slate-500">Produk termurah</p>

        <?php if ($produkTermurah !== []): ?>
            <p class="font-bold text-slate-800 mt-1">
                <?= htmlspecialchars($produkTermurah["nama"]) ?>
            </p>

            <p class="text-sm text-blue-700 font-semibold">
                <?= formatRupiah($produkTermurah["hargaAkhir"]) ?>
            </p>
        <?php else: ?>
            <p class="mt-1 text-slate-500">Belum ada produk</p>
        <?php endif; ?>
    </div>

</div>

<!-- PRODUK PER KATEGORI -->
<section class="bg-white border border-slate-200 rounded-xl p-5 mb-8 shadow-sm">

    <h2 class="font-bold text-lg text-slate-800 mb-3">
        Produk per Kategori
    </h2>

    <div class="flex flex-wrap gap-2">
        <?php foreach ($jumlahPerKategori as $kategori => $jumlahKategori): ?>
            <span class="bg-blue-50 text-blue-700 text-sm font-medium px-3 py-2 rounded-full">
                <?= htmlspecialchars($kategori) ?>
                (<?= $jumlahKategori ?>)
            </span>
        <?php endforeach; ?>
    </div>

</section>

<!-- JUDUL DAFTAR PRODUK -->
<div id="katalog" class="mb-4">

    <h2 class="text-2xl font-bold text-slate-800">
        Pilihan Kami
    </h2>

    <p class="text-slate-500 text-sm mt-1">
        <?php if ($kategoriDipilih !== ""): ?>
            Menampilkan kategori:
            <?= htmlspecialchars($kategoriDipilih) ?>
        <?php else: ?>
            Menampilkan semua kategori produk.
        <?php endif; ?>
    </p>

</div>

<!-- DAFTAR PRODUK -->
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

    <?php
    $adaProdukDitampilkan = false;

    foreach ($produk as $kode => $item):
        if (
            $kategoriDipilih !== "" &&
            $item["kategori"] !== $kategoriDipilih
        ) {
            continue;
        }

        $adaProdukDitampilkan = true;
        $hargaAkhir = hargaSetelahDiskon(
            $item["harga"],
            $item["diskon"]
        );
    ?>

        <article class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden flex flex-col transition duration-200 hover:-translate-y-1 hover:shadow-lg">

            <!-- IKON PRODUK -->
            <div class="bg-slate-100 text-6xl text-center py-8 relative">

                <?= $item["ikon"] ?>

                <?php if ($item["diskon"] > 0): ?>
                    <span class="absolute top-3 left-3 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                        -<?= $item["diskon"] ?>%
                    </span>
                <?php endif; ?>

            </div>

            <!-- INFORMASI PRODUK -->
            <div class="p-5 flex flex-col flex-1">

                <p class="text-xs text-slate-500">
                    <?= htmlspecialchars($kode) ?>
                    &middot;
                    <?= htmlspecialchars($item["kategori"]) ?>
                </p>

                <h3 class="font-bold text-lg text-slate-800 mt-1 mb-3">
                    <?= htmlspecialchars($item["nama"]) ?>
                </h3>

                <?php if ($item["diskon"] > 0): ?>
                    <p class="text-sm text-slate-400 line-through">
                        <?= formatRupiah($item["harga"]) ?>
                    </p>
                <?php endif; ?>

                <p class="text-xl font-bold text-blue-700 mb-4">
                    <?= formatRupiah($hargaAkhir) ?>
                </p>

                <!-- LABEL STOK -->
                <span class="mt-auto self-start text-xs font-semibold px-3 py-1.5 rounded-full <?= warnaStok($item["stok"]) ?>">
                    <?= labelStok($item["stok"]) ?>
                </span>

            </div>

        </article>

    <?php endforeach; ?>

    <!-- JIKA PRODUK KOSONG -->
    <?php if (!$adaProdukDitampilkan): ?>
        <p class="col-span-full bg-amber-50 text-amber-800 border border-amber-200 rounded-xl p-4">
            Tidak ada produk dalam kategori
            "<?= htmlspecialchars($kategoriDipilih) ?>".

            Periksa nama kategori atau kosongkan variabel
            $kategoriDipilih untuk menampilkan semua produk.
        </p>
    <?php endif; ?>

</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
