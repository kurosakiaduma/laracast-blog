<!-- resources/views/admin/users/edit.blade.php -->
<x-layout>
    <x-setting heading="Edit User Roles">
        <div class="flex flex-col">
            <div class="bg-white p-4 shadow overflow-hidden sm:rounded-lg">
                <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
                        <p class="text-gray-500">{{ $user->email }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">Roles</h3>
                        <ul>
                            @foreach ($roles as $role)
                                <div class="mb-2">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                               @if ($user->roles->contains($role->id)) checked @endif
                                        >
                                        <span class="ml-2">{{ $role->name }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </ul>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Roles</button>
                    </div>
                </form>
            </div>
        </div>
    </x-setting>
</x-layout>
