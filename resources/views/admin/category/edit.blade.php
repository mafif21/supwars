<x-admin-layout>
    <x-slot name="title">Tambah Kategori</x-slot>

    <div class="bg-white p-8 mb-5 rounded w-1/2 text-darker-black">
        <h1 class="font-semibold mb-5">Edit Kategori</h1>
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="flex flex-col gap-4">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block mb-2 text-sm font-semibold">Name</label>
                <input type="text" id="name" class="border border-line-stroke text-sm rounded block w-full p-2"
                    placeholder="Category Name" name="name" value="{{ $category->name }}" required>
                <x-input-error :messages="$errors->get('nama_kategori')" class="mt-2" />
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 
          py-3 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ubah
                Kategori</button>
        </form>
    </div>

</x-admin-layout>
