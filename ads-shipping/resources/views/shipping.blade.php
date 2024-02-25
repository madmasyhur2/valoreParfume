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
<body class="bg-gray-100">
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold my-8 text-center">Hasil Cek Tarif</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="md:col-span-1 bg-white rounded-xl p-4 shadow-lg">
                <div>
                    <h2 class="text-xl font-semibold mx-4 my-6">Detail Pengiriman</h2>
                </div>
                <div>
                    <h5 class="text-lg font-semibold mx-4 my-6 text-gray-900">ASAL</h5>
                </div>
                <div class="bg-blue-100 p-4 rounded-md shadow-md mb-4 mx-4">
                    <p class="text-sm font-medium text-blue-800">Kel. {{ $data['village_origin'] }} Kec. {{ $data['district_origin'] }}, {{ $data['regency_origin'] }}, {{ $data['zipcode_origin'] }} </p>
                </div>
                <div>
                    <h5 class="text-lg font-semibold mx-4 my-6 text-gray-900">TUJUAN</h5>
                </div>
                <div class="bg-green-100 p-4 rounded-md shadow-md mb-4 mx-4">
                    <p class="text-sm font-medium text-green-800">Kel. {{ $data['village_destination'] }} Kec. {{ $data['district_destination'] }}, {{ $data['regency_destination'] }}, {{ $data['zipcode_destination'] }} </p>
                </div>
                <div>
                    <h5 class="text-lg font-semibold mx-4 my-6 text-gray-900">BERAT</h5>
                </div>
                <div class="bg-yellow-100 p-4 rounded-md shadow-md mb-4 mx-4">
                    <p class="text-sm font-medium text-yellow-800">{{ $data['weight'] }} kg</p>
                </div>
            </div>            
            <div class="md:col-span-2 bg-white rounded-xl p-4 shadow-lg">
                <h2 class="text-center text-xl font-semibold mx-4 my-6">Daftar Jasa Pengiriman</h2>
                <table class="table-auto border-collapse border border-gray-300 w-full">
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
                            <td class="border border-gray-300 px-4 py-2">Ekonomi</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $deliveryTime['economy'] }} Hari</td>
                            <td class="border border-gray-300 px-4 py-2">Rp. {{ number_format($fee['economy'], 0, ',', '.') }}</td>
                            <td class="border border-gray-300 px-4 py-2">Pengiriman reguler dengan estimasi waktu {{ $deliveryTime['economy'] }} hari.</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">Reguler</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $deliveryTime['regular'] }} Hari</td>
                            <td class="border border-gray-300 px-4 py-2">Rp. {{ number_format($fee['regular'], 0, ',', '.') }}</td>
                            <td class="border border-gray-300 px-4 py-2">Pengiriman reguler dengan estimasi waktu {{ $deliveryTime['regular'] }} hari.</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">Express</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $deliveryTime['express'] }} Hari</td>
                            <td class="border border-gray-300 px-4 py-2">Rp. {{ number_format($fee['express'], 0, ',', '.') }}</td>
                            <td class="border border-gray-300 px-4 py-2">Pengiriman ekspres dengan estimasi waktu {{ $deliveryTime['express'] }} hari.</td>
                        </tr>
                    </tbody>
                </table>
                <a href="shippings/admin" class="absolute bottom-4 right-4 bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded shadow flex items-center">
                    <span class="mr-2">Admin Page</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
