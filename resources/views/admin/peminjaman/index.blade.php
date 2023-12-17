<x-admin-layout>
    <x-slot name="title">Peminjaman</x-slot>

    <form class="flex items-center mb-5" method="GET" action="{{ route('admin.pengajuan.index') }}">
        <div class="relative w-full">
            <input type="text" id="voice-search"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search username" name="query">
        </div>
        <button type="submit"
            class="inline-flex items-center py-2.5 px-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>Search
        </button>
    </form>


    <div class="relative overflow-x-auto border rounded">
        <table class="w-full text-s text-left">
            <thead class="text-xs lg:text-sm font-semibold text-dark-grey lg:text-center bg-gray-100 uppercase">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Weapon Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pinjam
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pengembalian
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Durasi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $data)
                    <tr class="bg-white lg:text-center text-darker-black text-xs lg:text-sm">
                        <th scope="row" class="px-6 py-4 font-semibold text-darker-black whitespace-nowrap">
                            {{ $data->users->username }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-semibold text-darker-black whitespace-nowrap">
                            {{ $data->weapons->name }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-semibold text-darker-black whitespace-nowrap">
                            {{ $data->tanggal_peminjaman }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-semibold text-darker-black whitespace-nowrap">
                            {{ $data->tanggal_dikembalikan ?? '-' }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-semibold text-darker-black whitespace-nowrap">
                            @if ($data->tanggal_dikembalikan)
                                {{ \Carbon\Carbon::parse($data->tanggal_peminjaman)->diffInDays($data->tanggal_dikembalikan) + 1 }}
                                Days
                            @else
                                {{ '-' }}
                            @endif
                        </th>
                        <th scope="row" class="px-6 py-4 font-semibold text-darker-black whitespace-nowrap">
                            @if ($data->tanggal_dikembalikan)
                                Rp.{{ $data->total_price }}
                            @else
                                {{ '-' }}
                            @endif
                        </th>
                        <td class="py-4 px-6">
                            <div class="flex gap-4 justify-center items-center">
                                @if (!$data->tanggal_dikembalikan)
                                    <form action="{{ route('admin.pengajuan.update', $data->id) }}" method="post"
                                        onsubmit="return confirm('Pengembalian ?')">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="font-medium text-blue-600">Dikembalikan</button>
                                    </form>
                                @endif
                                <form action="{{ route('admin.pengajuan.destroy', $data->id) }}" method="post"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600">Delete</button>
                                </form>
                                @if ($data->tanggal_dikembalikan)
                                    <a class="font-medium text-orange-600"
                                        href="{{ route('admin.export', $data->id) }}">Cetak</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>



    </div>
    <div class="mt-10">
        {{ $peminjaman->links() }}
    </div>
</x-admin-layout>
