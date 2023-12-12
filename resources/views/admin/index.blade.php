<x-admin-layout>
    <x-slot name="title">Dashboard</x-slot>

    <div class="grid xl:grid-cols-1 lg:gap-x-10">
        <div class="grid gap-3 mb-8 md:grid-cols-2 xl:grid-cols-2 xl:h-full">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-md bg-slate-100">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-darker-black">
                        Users
                    </p>
                    <p class="text-lg font-semibold text-darker-black">
                        {{ $users->where('is_admin', 0)->count() }}
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-md bg-slate-100">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-darker-black ">
                        Admin
                    </p>
                    <p class="text-lg font-semibold text-darker-black">
                        {{ $users->where('is_admin', 1)->count() }}
                    </p>
                </div>
            </div>

            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-md bg-slate-100">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full ">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-darker-black">
                        Weapons
                    </p>
                    <p class="text-lg font-semibold text-darker-black ">
                        {{ count($weapons) }}
                    </p>
                </div>
            </div>
            <div class="flex items-center p-4 bg-white rounded-lg shadow-md bg-slate-100">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full ">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-darker-black">
                        Peminjaman
                    </p>
                    <p class="text-lg font-semibold text-darker-black ">
                        {{ count($peminjaman) }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full overflow-hidden rounded-lg lg:mt-10 my-26 border-line-stroke ">
        <div class="bg-white w-full py-3 lg:py-4 xl:text-lg">
            <h1 class="font-semibold text-darker-black">History Peminjaman Senjata</h1>
        </div>

        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs lg:text-sm font-semibold tracking-wide text-left text-dark-grey uppercase border-b bg-gray-100 lg:text-center">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Weapon</th>
                        <th class="px-4 py-3">Tanggal Peminjaman</th>
                        <th class="px-4 py-3">Tanggal Dikembalikan</th>
                        <th class="px-4 py-3">Total Harga</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @foreach ($history as $data)
                        <tr class="text-darker-black lg:text-center text-xs lg:text-sm">
                            <td class="px-4 py-3 text-xs lg:text-sm">{{ $data->users->username }}</td>
                            <td class="px-4 py-3 text-xs lg:text-sm">{{ $data->weapons->name }}</td>
                            <td class="px-4 py-3 text-xs lg:text-sm">{{ $data->tanggal_peminjaman }}</td>
                            <td class="px-4 py-3 text-xs lg:text-sm">{{ $data->tanggal_dikembalikan }}</td>
                            <td class="px-4 py-3 text-xs lg:text-sm">Rp.{{ $data->total_price }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



</x-admin-layout>
