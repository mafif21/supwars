<x-admin-layout>
    <x-slot name="title">Weapon</x-slot>

    <div class="mb-6">
        <a href="{{ route('admin.weapon.create') }}" type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-sm text-sm px-5 
        py-2 mr-2 mb-2">Add
            Weapon
        </a>
    </div>

    <form class="flex items-center mb-5" method="GET" action="{{ route('admin.weapon.index') }}">
        <div class="relative w-full">
            <input type="text" id="voice-search"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search weapon name" name="query">
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
                        Kode Weapon
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Categories
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Photo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($weapons as $weapon)
                    <tr class="bg-white lg:text-center text-darker-black text-xs lg:text-sm">
                        <th scope="row" class="px-6 py-4 font-semibold text-darker-black whitespace-nowrap">
                            {{ $weapon->kode }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-semibold text-darker-black whitespace-nowrap">
                            {{ $weapon->name }}
                        </th>
                        <td class="px-6 py-4">
                            <div class="flex justify-center bg-red-100 flex-wrap w-[100px]">
                                @foreach ($weapon->categories as $item)
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-3 py-2 rounded dark:text-blue-300">{{ $item->name }}</span>
                                @endforeach
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $weapon->photo) }}" alt="category img" class="w-60 rounded">
                        </td>
                        <td class="px-6 py-4">
                            {{ Str::limit($weapon->description, 50, '...') }}
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex gap-4 justify-center items-center">
                                <a href="{{ route('admin.weapon.edit', $weapon->id) }}"
                                    class="font-medium text-blue-600">Edit</a>
                                <form action="{{ route('admin.weapon.destroy', $weapon->id) }}" method="post"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>



    </div>
    <div class="mt-10">
        {{ $weapons->links() }}
    </div>
</x-admin-layout>
