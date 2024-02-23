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
            <h1 class="text-3xl font-bold my-8 text-center">Cek Harga Ongkir</h1>
            <div class="bg-white rounded-xl p-4 shadow-lg justify-items-center mx-auto w-full sm:w-2/3">
        
                <form action="/pricelist" method="POST">
                    @csrf
                    <div class="flex flex-col my-3">
        
                        {{-- ORIGIN --}}
                        <div class="mb-2 p-3">
                            <h3 for="origin" class="block font-bold text-xl text-gray-700">Kota Asal</h3>
                        </div>
                        <div class="flex flex-wrap mx-3 gap-10">
                            <div class="mb-4">
                                <label for="province_origin" class="block text-sm font-medium text-gray-700">Provinsi</label>
                                <select id="province_origin" name="province_origin" class="block mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label for="regency_origin" class="mb-2 block text-sm font-medium text-gray-700">Kota/Kabupaten</label>
                                <select id="regency_origin" name="regency_origin" class="block mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    <option value="">Pilih Kota/Kabupaten</option>
                                </select>
                            </div>
                
                            <div class="mb-4">
                                <label for="district_origin" class="mb-2 block text-sm font-medium text-gray-700">Kecamatan</label>
                                <select id="district_origin" name="district_origin" class="block mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                            </div>
                
                            <div class="mb-4">
                                <label for="village_origin" class="mb-2 block text-sm font-medium text-gray-700">Kelurahan/Desa</label>
                                <select id="village_origin" name="village_origin" class="block mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    <option value="">Pilih Kelurahan/Desa</option>
                                </select>
                            </div>
                        </div>
        
                        {{-- DESTINATION --}}
                        <div class="my-2 p-3">
                            <h3 for="destination" class="block font-bold text-xl text-gray-700">Kota Tujuan</h3>
                        </div>
                        <div class="flex flex-wrap mx-3 gap-10">
                            <div class="mb-4">
                                <label for="province_destination" class="mb-2 block text-sm font-medium text-gray-700">Provinsi</label>
                                <select id="province_destination" name="province_destination" class="block mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label for="regency_destination" class="mb-2 block text-sm font-medium text-gray-700">Kota/Kabupaten</label>
                                <select id="regency_destination" name="regency_destination" class="block mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    <option value="">Pilih Kota/Kabupaten</option>
                                </select>
                            </div>
                
                            <div class="mb-4">
                                <label for="district_destination" class="mb-2 block text-sm font-medium text-gray-700">Kecamatan</label>
                                <select id="district_destination" name="district_destination" class="block mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                            </div>
                
                            <div class="mb-4">
                                <label for="village_destination" class="mb-2 block text-sm font-medium text-gray-700">Kelurahan/Desa</label>
                                <select id="village_destination" name="village_destination" class="block mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    <option value="">Pilih Kelurahan/Desa</option>
                                </select>
                            </div>
                        </div>
        
                        <div class="p-3 mb-2">
                            <label for="weight" class="mb-2 block text-xl font-bold text-gray-700">Berat (Gram)</label>
                            <input type="text" name="weight" id="weight" value="1000"class="block mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="flex bg-gradient-to-r from-blue-500 to-green-500 hover:from-blue-700 hover:to-green-700 text-white font-semibold mt-4 py-2 px-4 rounded-xl mx-auto w-40 items-center justify-center">
                        Cek Tarif
                    </button>                                       
                </form>
        
            </div>
        
        </div>        


        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <script>
            // ORIGIN
            $(document).ready(function() {
                $('#province_origin').on('change', function() {
                    var province = $(this).val();
                    if (province) {
                        $.ajax({
                            url: '/regency/' + province,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                console.log(data);
                                $('#regency_origin').empty();
                                $('#regency_origin').append('<option value="">-Pilih Kota/Kabupaten-</option>');
                                $.each(data, function(key, regency) {
                                    $('#regency_origin').append('<option value="' + regency.id + '">' + regency.name + '</option>');
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    } else {
                        $('#regency_origin').empty();
                    }
                });

                $('#regency_origin').on('change', function() {
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
                            $('#district_origin').empty();
                            $('#district_origin').append('<option value="">-Pilih Kecamatan-</option>');
                            $.each(data, function(key, district) {
                                $('#district_origin').append('<option value="' + district.id + '">' + district.name + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $('#district_origin').empty();
                }
            });

            $('#district_origin').on('change', function() {
                var district = $(this).val();
                if (district) {
                    $.ajax({
                        url: '/village/' + district,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            $('#village_origin').empty();
                            $('#village_origin').append('<option value="">-Pilih Kelurahan/Desa-</option>');
                            $.each(data, function(key, village) {
                                $('#village_origin').append('<option value="' + village.id + '">' + village.name + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $('#village_origin').empty();
                }
            });
        });

        // DESTINATION
        $(document).ready(function() {
                $('#province_destination').on('change', function() {
                    var province = $(this).val();
                    if (province) {
                        $.ajax({
                            url: '/regency/' + province,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                console.log(data);
                                $('#regency_destination').empty();
                                $('#regency_destination').append('<option value="">-Pilih Kota/Kabupaten-</option>');
                                $.each(data, function(key, regency) {
                                    $('#regency_destination').append('<option value="' + regency.id + '">' + regency.name + '</option>');
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    } else {
                        $('#regency_destination').empty();
                    }
                });

                $('#regency_destination').on('change', function() {
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
                            $('#district_destination').empty();
                            $('#district_destination').append('<option value="">-Pilih Kecamatan-</option>');
                            $.each(data, function(key, district) {
                                $('#district_destination').append('<option value="' + district.id + '">' + district.name + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $('#district_destination').empty();
                }
            });

            $('#district_destination').on('change', function() {
                var district = $(this).val();
                if (district) {
                    $.ajax({
                        url: '/village/' + district,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            $('#village_destination').empty();
                            $('#village_destination').append('<option value="">-Pilih Kelurahan/Desa-</option>');
                            $.each(data, function(key, village) {
                                $('#village_destination').append('<option value="' + village.id + '">' + village.name + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $('#village_destination').empty();
                }
            });
        });
        </script>

    </body>
    
</html>