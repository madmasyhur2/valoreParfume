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
            <h1 class="text-2xl font-bold mb-4">Cek Harga Ongkir</h1>
            <div class="bg-white rounded-lg p-4 shadow">
    
                <div class="mb-4">
                    <label for="province" class="block text-sm font-medium text-gray-700">Provinsi</label>
                    <select id="province" name="province" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Pilih Provinsi</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="regency" class="block text-sm font-medium text-gray-700">Kota/Kabupaten</label>
                    <select id="regency" name="regency" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Pilih Kota/Kabupaten</option>
                    </select>
                </div>
    
                <div class="mb-4">
                    <label for="district" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                    <select id="district" name="district" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Pilih Kecamatan</option>
                    </select>
                </div>
    
                <div class="mb-4">
                    <label for="village" class="block text-sm font-medium text-gray-700">Kelurahan/Desa</label>
                    <select id="village" name="village" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Pilih Kelurahan/Desa</option>
                    </select>
                </div>
    
            </div>
        </div>

        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#province').on('change', function() {
                    var province = $(this).val();
                    if (province) {
                        $.ajax({
                            url: '/regency/' + province,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                console.log(data);
                                $('#regency').empty();
                                $('#regency').append('<option value="">-Pilih-</option>');
                                $.each(data, function(key, regency) {
                                    $('#regency').append('<option value="' + regency.id + '">' + regency.name + '</option>');
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    } else {
                        $('#regency').empty();
                    }
                });

                $('#regency').on('change', function() {
                var regency = $(this).val();
                var search = $('#search').val();
                if (regency) {
                    $.ajax({
                        url: '/district/' + regency,
                        type: 'GET',
                        data: { search: search },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            $('#district').empty();
                            $('#district').append('<option value="">-Pilih-</option>');
                            $.each(data, function(key, district) {
                                $('#district').append('<option value="' + district.id + '">' + district.name + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $('#district').empty();
                }
            });

            $('#district').on('change', function() {
                var district = $(this).val();
                if (district) {
                    $.ajax({
                        url: '/village/' + district,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            $('#village').empty();
                            $('#village').append('<option value="">-Pilih-</option>');
                            $.each(data, function(key, village) {
                                $('#village').append('<option value="' + village.id + '">' + village.name + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $('#village').empty();
                }
            });
        });
        </script>

    </body>
    
</html>