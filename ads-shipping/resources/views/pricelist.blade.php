<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cek Tarif ADS</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>
<body>
    <div class="p-4">
        <div class="">
            <h1 class="text-2xl font-bold mb-4">Hasil Cek Tarif</h1>
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Detail Pengiriman</h2>
                <p><strong>Asal:</strong> Jakarta</p>
                <p><strong>Tujuan:</strong> Surabaya</p>
                <p><strong>Berat (Gram):</strong> 2000</p>
            </div>
        </div>
        <div class="">
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Daftar Jasa Pengiriman</h2>
                <table class="table-auto border-collapse border border-gray-300">
                    <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Jasa Pengiriman</th>
                        <th class="border border-gray-300 px-4 py-2">Estimasi</th>
                        <th class="border border-gray-300 px-4 py-2">Tarif</th>
                        <th class="border border-gray-300 px-4 py-2">Keterangan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">Reguler</td>
                        <td class="border border-gray-300 px-4 py-2">3 Hari</td>
                        <td class="border border-gray-300 px-4 py-2">Rp. 20.000</td>
                        <td class="border border-gray-300 px-4 py-2">Pengiriman reguler dengan estimasi waktu 3 hari.</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">Express</td>
                        <td class="border border-gray-300 px-4 py-2">1 Hari</td>
                        <td class="border border-gray-300 px-4 py-2">Rp. 50.000</td>
                        <td class="border border-gray-300 px-4 py-2">Pengiriman ekspres dengan estimasi waktu 1 hari.</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
