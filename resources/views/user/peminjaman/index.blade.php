<x-app-layout>
    <x-slot name="title">Pengajuan</x-slot>

    <div class="grid lg:grid-cols-[3fr_1fr] text-darker-black gap-x-4">
        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-2 h-fit ">
            @foreach ($peminjamans as $peminjaman)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow " id="target">
                    <div class="relative">
                        <div>
                            <a href="#">
                                <img class="rounded-t-lg h-52 w-full object-cover"
                                    src="{{ asset('storage/' . $peminjaman->weapons->image) }}" alt="card-img" />
                            </a>
                        </div>
                        <div class="absolute inset-0 p-2">
                            @foreach ($peminjaman->weapons->categories as $category)
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="text-sm font-semibold"></div>
                        <div class="flex lg:flex-col justify-between items-center lg:items-start w-full">
                            <div class="flex justify-between w-full items-center">
                                <h5 class="mb-2 text-xl font-bold tracking-tight" id="nama_barang">
                                    {{ $peminjaman->weapons->name }}
                                </h5>
                                <h5 class="mb-2 text-sm font-bold tracking-tight" id="nama_barang">
                                    {{ date('Y-m-d', strtotime($peminjaman->tanggal_peminjaman)) }}
                                </h5>
                            </div>
                            @if ($peminjaman->tanggal_dikembalikan !== null)
                                <span
                                    class="bg-green-100 text-green-800 text-sm font-medium px-2.5 py-0.5 rounded">Tersedia</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-sm font-medium px-2.5 py-0.5 rounded">Belum
                                    Dikembalikan</span>
                            @endif
                        </div>
                        @if ($peminjaman->weapons->available == 1)
                            <button data-modal-target="peminjaman-{{ $peminjaman->weapons->id }}"
                                data-modal-toggle="peminjaman-{{ $peminjaman->weapons->id }}"
                                data-aset="{{ $peminjaman->weapons->id }}"
                                class="pinjamBtn block text-white mt-6 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center w-full"
                                type="button">
                                Pinjam
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

    </div>


</x-app-layout>
