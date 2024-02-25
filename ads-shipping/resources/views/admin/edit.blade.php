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

    <form action="{{ route('admin.update', $shipping->id) }}" method="post" class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 m-16">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="distance" class="block text-gray-700 text-sm font-bold mb-2">Distance (km):</label>
            <input type="text" name="distance" id="distance" value="{{ $shipping->distance }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        
        <div class="mb-4">
            <label for="delivery_time_economy" class="block text-gray-700 text-sm font-bold mb-2">Delivery Time Economy (hari):</label>
            <input type="text" name="delivery_time_economy" id="delivery_time_economy" value="{{ $shipping->delivery_time_economy }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        
        <div class="mb-4">
            <label for="delivery_time_regular" class="block text-gray-700 text-sm font-bold mb-2">Delivery Time Regular (hari):</label>
            <input type="text" name="delivery_time_regular" id="delivery_time_regular" value="{{ $shipping->delivery_time_regular }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        
        <div class="mb-4">
            <label for="delivery_time_express" class="block text-gray-700 text-sm font-bold mb-2">Delivery Time Express (hari):</label>
            <input type="text" name="delivery_time_express" id="delivery_time_express" value="{{ $shipping->delivery_time_express }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        
        <div class="mb-4">
            <label for="fee_economy" class="block text-gray-700 text-sm font-bold mb-2">Fee Economy:</label>
            <input type="text" name="fee_economy" id="fee_economy" value="{{ $shipping->fee_economy }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        
        <div class="mb-4">
            <label for="fee_regular" class="block text-gray-700 text-sm font-bold mb-2">Fee Regular:</label>
            <input type="text" name="fee_regular" id="fee_regular" value="{{ $shipping->fee_regular }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        
        <div class="mb-4">
            <label for="fee_express" class="block text-gray-700 text-sm font-bold mb-2">Fee Express:</label>
            <input type="text" name="fee_express" id="fee_express" value="{{ $shipping->fee_express }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
        </div>
    </form>
    

</body>
</html>