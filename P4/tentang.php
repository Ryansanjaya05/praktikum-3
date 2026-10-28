
<?php


require_once __DIR__ . '/includes/data.php';

$judulHalaman = "Tentang Toko";
$halamanAktif = "tentang.php";

$alamatToko = "Fontaine, Teyvat";

$jamBuka = [
    "Senin–Jumat" => "09.00–21.00",
    "Sabtu" => "10.00–22.00",
    "Minggu" => "10.00–20.00",
];

$layanan = [
    "Makan di tempat",
    "Pesanan untuk dibawa pulang",
    "Pilihan pastry dan dessert",
    "Minuman hangat",
];

require __DIR__ . '/includes/header.php';
?>

<section class="bg-white rounded-2xl shadow-md
                border border-blue-100 p-6 md:p-10">

    <div class="mb-8">
        <p class="text-blue-600 font-semibold mb-2">
            Mengenal Kami
        </p>

        <h2 class="text-3xl md:text-4xl font-bold text-blue-800 mb-4">
            Tentang <?= htmlspecialchars($namaToko) ?>
        </h2>

        <p class="text-gray-600 leading-relaxed">
            <?= htmlspecialchars($namaToko) ?> adalah salah satu restoran
            terkenal di Fontaine yang menghadirkan hidangan lezat,
            pastry pilihan, dan minuman hangat dalam suasana
            yang nyaman.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div class="bg-blue-50 rounded-xl p-5">
            <h3 class="text-xl font-bold text-blue-800 mb-3">
                Informasi Toko
            </h3>

            <p class="text-gray-700 mb-2">
                <strong>Nama:</strong>
                <?= htmlspecialchars($namaToko) ?>
            </p>

            <p class="text-gray-700">
                <strong>Alamat:</strong>
                <?= htmlspecialchars($alamatToko) ?>
            </p>
        </div>

        <div class="bg-blue-50 rounded-xl p-5">
            <h3 class="text-xl font-bold text-blue-800 mb-3">
                Jam Operasional
            </h3>

            <ul class="space-y-2">
                <?php foreach ($jamBuka as $hari => $jam): ?>
                    <li class="flex justify-between gap-3 text-gray-700">
                        <span><?= htmlspecialchars($hari) ?></span>
                        <span class="font-medium">
                            <?= htmlspecialchars($jam) ?>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>

    <div class="mt-6 bg-blue-50 rounded-xl p-5">
        <h3 class="text-xl font-bold text-blue-800 mb-3">
            Layanan Kami
        </h3>

        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <?php foreach ($layanan as $item): ?>
                <li class="flex items-start gap-2 text-gray-700">
                    <span class="text-blue-600 font-bold">✓</span>
                    <span><?= htmlspecialchars($item) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
