@extends('admin.layout.master')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
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
        {{-- <div class="container py-3">
            <div class="row">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">city</th>
                            <th scope="col">Province</th>
                            <th scope="col" class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div> --}}
        <button class="absolute bottom-4 left-4 bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-xl shadow flex items-center">
            <a href="/" >
                <span class="mr-2">Kembali ke Halaman Utama</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
        </button>
    </div>
    @endsection

    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/datatable',
                },
                columns: [
                    { 
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name',
                        width: '20%',
                        orderable: true,
                        serchable: true
                    },
                    {
                        data: 'regency.name',
                        name: 'regency.name',
                        width: '20%',
                        orderable: true,
                        serchable: true
                    },
                    {
                        data: 'regency.province.name',
                        name: 'regency.province.name',
                        width: '20%',
                        orderable: true,
                        serchable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        width: '10%',
                        orderable: false,
                        serchable: false
                    }
                ],
                columnDefs: [
                    {
                        "targets": [ 0 ],
                        "visible": false,
                        "searchable": false
                    }                     
                ],
                order: [[ 0, "desc" ]]
            });
        });
    </script>

    {{-- Sweet Alert --}}
    <script>
        $(document).on('click', '.deleteConfirm', function () {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).data('id');
                    var url = "{{ route('admin.index', ':id') }}";
                    $.ajax({
                        url: url.replace(':id', id),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (data) {
                            Swal.fire({
                                title: 'Success',
                                text: data.message,
                                icon: 'success',
                                confirmButtonText: 'OK',
                                timer: 1000,
                                timerProgressBar: true,
                            });
                            $('#dataTable').DataTable().ajax.reload();
                        },
                        error: function (data) {
                            Swal.fire({
                                title: 'Error',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'OK',
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }
                    });
                }
            });
        });
    </script>
    @endpush