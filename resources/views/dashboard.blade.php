<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Katalog List</h1>
                    </div>
                    <hr />

                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Produk</th>
                                <th>Jenis Produk</th>
                                <th>Tahun</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($retros as $retro)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $retro->nama }}</td>
                                <td class="align-middle">{{ $retro->jenis }}</td>
                                <td class="align-middle">{{ $retro->tahun }}</td>
                                <td class="align-middle">{{ $retro->harga }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">Produk tidak ditemukan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
