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
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">Cek Harga Ongkir</h1>
        <form action="#" method="GET">
            <div class="mb-4">
                <label for="origin" class="block text-sm font-medium text-gray-700">Asal</label>
                <input type="text" id="origin" name="origin" placeholder="Kota Asal" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div class="mb-4">
                <label for="destination" class="block text-sm font-medium text-gray-700">Tujuan</label>
                <input type="text" id="destination" name="destination" placeholder="Kota Tujuan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div class="mb-4">
                <label for="weight" class="block text-sm font-medium text-gray-700">Berat (Gram)</label>
                <input type="text" id="weight" name="weight" value="1000" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div class="mb-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Cek Harga</button>
            </div>
        </form>
    </div>
    
    </body>
</html>