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
    
        <table class="w-full bg-white border border-gray-200 shadow-md">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-blue-400 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider">Distance</th>
                    <th class="px-6 py-3 bg-blue-400 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider">Delivery Time (Economy)</th>
                    <th class="px-6 py-3 bg-blue-400 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider">Delivery Time (Regular)</th>
                    <th class="px-6 py-3 bg-blue-400 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider">Delivery Time (Express)</th>
                    <th class="px-6 py-3 bg-blue-400 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider">Fee (Economy)</th>
                    <th class="px-6 py-3 bg-blue-400 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider">Fee (Regular)</th>
                    <th class="px-6 py-3 bg-blue-400 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider">Fee (Express)</th>
                    <th class="px-6 py-3 bg-blue-400 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($shippings as $shipping)
                    <tr>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>