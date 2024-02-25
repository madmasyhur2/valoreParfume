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

    <div class="w-full max-w-7xl mx-auto p-8">
        <h1 class="text-2xl font-bold text-center mb-8">Shipping Information</h1>
        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif    
        <table class="w-full bg-white border border-gray-200 shadow-md">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-blue-400 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 bg-blue-400 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider">Distance</th>
                    <th class="px-6 py-3 bg-blue-400 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider">Delivery Time (Economy)</th>
                    <th class="px-6 py-3 bg-blue-400 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider">Delivery Time (Regular)</th>
                    <th class="px-6 py-3 bg-blue-400 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider">Delivery Time (Express)</th>
                    <th class="px-6 py-3 bg-blue-400 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider">Fee (Economy)</th>
                    <th class="px-6 py-3 bg-blue-400 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider">Fee (Regular)</th>
                    <th class="px-6 py-3 bg-blue-400 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider">Fee (Express)</th>
                    <th colspan="2" class="px-6 py-3 bg-blue-400 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($shippings as $index => $shipping)
                    <tr>
                        <td class="px-6 py-4 bg-white text-center text-base text-gray-800 whitespace-no-wrap">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 bg-white text-center text-base text-gray-800 whitespace-no-wrap">{{ $shipping->distance }} km</td>
                        <td class="px-6 py-4 bg-white text-center text-base text-gray-800 whitespace-no-wrap">{{ $shipping->delivery_time_economy }} hari</td>
                        <td class="px-6 py-4 bg-white text-center text-base text-gray-800 whitespace-no-wrap">{{ $shipping->delivery_time_regular }} hari</td>
                        <td class="px-6 py-4 bg-white text-center text-base text-gray-800 whitespace-no-wrap">{{ $shipping->delivery_time_express }} hari</td>
                        <td class="px-6 py-4 bg-white text-center text-base text-gray-800 whitespace-no-wrap">Rp {{ number_format($shipping->fee_economy, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 bg-white text-center text-base text-gray-800 whitespace-no-wrap">Rp {{ number_format($shipping->fee_regular, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 bg-white text-center text-base text-gray-800 whitespace-no-wrap">Rp {{ number_format($shipping->fee_express, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 bg-white text-center text-base text-gray-800 whitespace-no-wrap">
                            <a href="{{ route('admin.edit', $shipping->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                                Edit
                            </a>
                        </td>
                        <td class="px-6 py-4 bg-white text-center text-base text-gray-800 whitespace-no-wrap">
                            <form action="{{ route('admin.destroy', $shipping->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/" class="absolute bottom-4 left-4 bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded shadow flex items-center">
            <span class="mr-2">Kembali ke Halaman Utama</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
        </a>
    </div>
</body>
</html>