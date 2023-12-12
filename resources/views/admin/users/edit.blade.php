<x-admin-layout>
    <x-slot name="title">Create Menu</x-slot>

    <x-slot name="slot">
        <div class="grid">
            <div class="border border-gray-200 shadow-md w-9/12 rounded-lg py-10 px-10">
                <div class="mb-6">
                    <h1 class="font-semibold text-xl mb-1 text-slate-900">Edit User</h1>
                </div>

                <form method="post" action="{{ route('admin.user.update', $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="username"
                            class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Username</label>
                        <input type="text" id="username" name="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 "
                            placeholder="username" value="{{ $data->username }}">
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>
                    <div class="mb-6">
                        <label for="age"
                            class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Age</label>
                        <input type="text" id="age" name="age"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 "
                            placeholder="age" value="{{ $data->age }}">
                        <x-input-error :messages="$errors->get('age')" class="mt-2" />
                    </div>
                    <div class="mb-6">
                        <label for="job"
                            class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Job</label>
                        <input type="text" id="job" name="job"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 "
                            placeholder="job" value="{{ $data->job }}">
                        <x-input-error :messages="$errors->get('job')" class="mt-2" />
                    </div>
                    <div class="mb-6">
                        <label for="nickname"
                            class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Nickname</label>
                        <input type="text" id="nickname" name="nickname"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 "
                            placeholder="nickname" value="{{ $data->nickname }}">
                        <x-input-error :messages="$errors->get('nickname')" class="mt-2" />
                    </div>
                    <div class="mb-6">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Email</label>
                        <input type="email" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 "
                            placeholder="email" value="{{ $data->email }}">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mb-6">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Password</label>
                        <input type="password" id="password" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 "
                            placeholder="password" value="{{ $data->password }}">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="mb-6">
                        <label for="image"
                            class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Image</label>
                        <input
                            class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                            id="small_size" type="file" name="image">
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                    <div class="mb-6">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Is
                            Admin ?</label>

                        <div class="flex items-center mb-4">
                            <input id="default-radio-1" type="radio" value="1" name="is_admin"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-1"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">True</label>
                        </div>
                        <div class="flex items-center">
                            <input checked id="default-radio-2" type="radio" value="0" name="is_admin"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-2"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">False</label>
                        </div>

                    </div>

                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Edit
                        User</button>
                </form>

            </div>
        </div>
    </x-slot>
</x-admin-layout>
