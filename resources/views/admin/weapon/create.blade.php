<x-admin-layout>
    <x-slot name="title">Add Weapon</x-slot>

    <div class="bg-white p-8 mb-5 rounded w-1/2 text-darker-black">
        <h1 class="font-semibold mb-5">Add New Weapon</h1>
        <form action="{{ route('admin.weapon.store') }}" method="POST" class="flex flex-col gap-4"
            enctype="multipart/form-data">
            @csrf
            <div>
                <label for="kode" class="block mb-2 text-sm font-semibold">Kode Senjata *</label>
                <input type="text" id="kode" class="border border-line-stroke text-sm rounded block w-full p-2"
                    placeholder="Weapon kode" name="kode" value="{{ old('kode') }}">
                <x-input-error :messages="$errors->get('kode')" class="mt-2" />
            </div>
            <div>
                <label for="name" class="block mb-2 text-sm font-semibold">Nama Senjata *</label>
                <input type="text" id="name" class="border border-line-stroke text-sm rounded block w-full p-2"
                    placeholder="Weapon name" name="name" value="{{ old('name') }}">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <label for="name" class="block mb-2 text-sm font-semibold">Categories *</label>
                <ul
                    class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @foreach ($categories as $category)
                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="vue-checkbox" type="checkbox" value="{{ $category->id }}"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                    name="category[]">
                                <label for="vue-checkbox"
                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $category->name }}</label>
                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>
            <div>
                <label for="name" class="block mb-2 text-sm font-semibold">Photo *</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="file_input" type="file" name="image">
            </div>
            <div>
                <label for="name" class="block mb-2 text-sm font-semibold">Decsription *</label>
                <textarea id="message" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..." name="description">{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 
        py-3 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah
                Weapon</button>
        </form>
    </div>
</x-admin-layout>
