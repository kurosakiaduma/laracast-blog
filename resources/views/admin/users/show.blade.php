<x-layout>
    <x-setting heading="User Details">
        <div class="flex flex-col">
            <div class="bg-white p-4 shadow overflow-hidden sm:rounded-lg">
                <div class="mb-4">
                    <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
                    <p class="text-gray-500">{{ $user->email }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Roles</h3>
                    <ul>
                        @foreach ($user->roles as $role)
                            <li>{{ $role->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>
