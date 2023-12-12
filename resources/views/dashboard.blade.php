<x-app-layout>
    <x-slot name="title">Pengajuan</x-slot>

    <div class="grid lg:grid-cols-[3fr_1fr] text-darker-black gap-x-4">
        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-2 h-fit ">
            @foreach ($weapons as $weapon)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow " id="target">
                    <div class="relative">
                        <div>
                            <a href="#">
                                <img class="rounded-t-lg h-52 w-full object-cover"
                                    src="{{ asset('storage/' . $weapon->image) }}" alt="card-img" />
                            </a>
                        </div>
                        <div class="absolute inset-0 p-2">
                            @foreach ($weapon->categories as $category)
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="text-sm font-semibold"></div>
                        <div class="flex lg:flex-col justify-between items-center lg:items-start w-full">
                            <h5 class="mb-2 text-xl font-bold tracking-tight" id="nama_barang">{{ $weapon->name }}</h5>
                            @if ($weapon->available == 1)
                                <span
                                    class="bg-green-100 text-green-800 text-sm font-medium px-2.5 py-0.5 rounded">Tersedia</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-sm font-medium px-2.5 py-0.5 rounded">Tidak
                                    Tersedia</span>
                            @endif
                        </div>
                        <button data-modal-target="peminjaman-{{ $weapon->id }}"
                            data-modal-toggle="peminjaman-{{ $weapon->id }}" data-aset="{{ $weapon->id }}"
                            class="pinjamBtn block text-white mt-6 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center w-full"
                            type="button">
                            Pinjam
                        </button>

                        <div id="peminjaman-{{ $weapon->id }}" tabindex="-1" aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                                        data-modal-hide="peminjaman-{{ $weapon->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-4 text-xl font-semibold ">Peminjaman
                                            Senjata
                                        </h3>
                                        <form class="space-y-6" action="{{ route('loan.store') }}" method="post">
                                            @csrf
                                            <div>
                                                <label for="date"
                                                    class="block mb-2 text-sm font-semibold text-left">Tanggal
                                                    Peminjaman</label>
                                                <input type="date" id="date"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-4 p-2.5 date_picker awal"
                                                    min="current_date" placeholder="Pilih tanggal Pengajuan" required
                                                    name="tanggal_peminjaman">
                                            </div>
                                            <input type="hidden" name="weapon_id" value="{{ $weapon->id }}">
                                            <button type="submit"
                                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                Peminjaman</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Grid 2 -->
        <div class="flex flex-col h-fit order-first lg:order-last mb-3 shadow-md border rounded">

            <div id="authentication-modal-scanner" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                            data-modal-hide="authentication-modal-scanner">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-semibold ">Peminjaman
                                Aset
                            </h3>
                            <div class="w-full" id="reader"></div>
                            <div id="readerResult" class="hidden">
                                <div id="namaBarangFromScanner" class="text-2xl font-bold">Nama Barang</div>
                                <div id="kodeBarangFromScanner" class="text-sm font-semibold">Kode Barang</div>
                                <form class="space-y-6" action="" method="post">
                                    @csrf
                                    <div>
                                        <label for="date" class="block mb-2 text-sm font-semibold text-left">Tanggal
                                            Pengajuan</label>
                                        <input type="date" id="date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-4 p-2.5 date_picker awal"
                                            min="current_date" placeholder="Pilih tanggal Pengajuan" required
                                            name="tanggal_pengajuan">
                                    </div>
                                    <input id="idBarangByQr" type="hidden" name="idBarang">

                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox" type="checkbox" required
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                        <label for="default-checkbox" class="ml-2 text-xs font-medium">Saya
                                            bertanggung jawab
                                            terhadap peminjaman yang dilakukan.</label>
                                    </div>

                                    <button type="submit"
                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ajukan
                                        Peminjaman</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters -->
            <div id="accordion-collapse" data-accordion="collapse" class=" mb-3 rounded-md">
                <h6 id="accordion-collapse-heading-1">
                    <button type="button"
                        class="flex items-center justify-between bg-white w-full py-3 px-4 text-left rounded-t-md"
                        data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                        aria-controls="accordion-collapse-body-1">
                        <span class="font-semibold text-darker-black text-sm">Filters</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h6>
                <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                    <div class="relative px-4 bg-white">
                        <div class="absolute inset-y-0 left-5 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="pencarian"
                            class="block w-full p-2 pl-10 text-sm  border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Cari aset..." required>
                    </div>
                    <div class="rounded-b-md pb-3 px-4 bg-white">
                        <form action="" method="GET">
                            @csrf
                            <div class="border-b py-4">
                                <h4 class="font-semibold text-xs mb-2.5">Status</h4>

                                <div class="flex flex-col gap-y-3">
                                    <div class="flex items-center">
                                        <input id="default-checkbox" type="checkbox" value="Tersedia"
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded" name="check">
                                        <label for="default-checkbox"
                                            class="ml-2 text-xs font-medium">Tersedia</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="default-checkbox" type="checkbox" value="Tidak Tersedia"
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded" name="check">
                                        <label for="default-checkbox" class="ml-2 text-xs font-medium">Tidak
                                            Tersedia</label>
                                    </div>
                                </div>
                            </div>
                            <div class="border-b py-4">
                                <h4 class="font-semibold text-xs mb-2.5">Kategori</h4>

                                <div class="flex flex-col gap-y-3">
                                    @foreach ($categories as $category)
                                        <div class="flex items-center">
                                            <input id="default-checkbox" type="checkbox" value=""
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded"
                                                name="kategoriquery">
                                            <label for="default-checkbox"
                                                class="ml-2 text-xs font-medium">{{ $category->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded text-xs px-5 w-full py-2 my-3 font-semibold">Cari</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>





</x-app-layout>
