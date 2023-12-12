<x-admin-layout>
    <x-slot name="title">Users</x-slot>

    <div class="mb-6">
        <a href="{{ route('admin.user.create') }}" type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-sm text-sm px-5 
          py-2 mr-2 mb-2">Tambah
            User
        </a>
    </div>

    <div class="relative overflow-x-auto border rounded">
        <table class="w-full text-s text-left">
            <thead class="text-xs lg:text-sm font-semibold text-dark-grey lg:text-center bg-gray-100 uppercase">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Age
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nickname
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Employee
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allUsers as $user)
                    <tr class="bg-white lg:text-center text-darker-black text-xs lg:text-sm">
                        <th scope="row" class="px-6 py-4 font-semibold text-darker-black whitespace-nowrap">
                            {{ $user->username }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->age }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->nickname }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->employee == 1 ? 'Employee' : 'Member' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-admin-layout>
