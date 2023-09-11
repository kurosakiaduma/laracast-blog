<x-layout>
    <x-setting heading="User Management">
        <div class="flex flex-col">
            <div class="text-gray-900 bg-gray-200">
                <div class="p-4 flex">
                    <h1 class="text-3xl">Users</h1>
                </div>
                <div class="px-3 py-4 flex justify-center">
                    <table class="w-full text-md bg-white shadow-md rounded mb-4">
                        <thead>
                        <tr class="border-b">
                            <th class="text-left p-3 px-5">Name</th>
                            <th class="text-left p-3 px-5">Email</th>
                            <th class="text-left p-3 px-5">Role</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b hover:bg-orange-100">
                                <td class="p-3 px-5">
                                    <a href="{{ route('admin.users.show', $user->id) }}"
                                       class="text-blue-500 hover:underline"
                                    >
                                        {{ $user->name }}
                                    </a>
                                </td>
                                <td class="p-3 px-5">{{ $user->email }}</td>
                                <td class="p-3 px-5 relative group">
                                    @if (count($user->roles) > 1)
                                        <span class="group cursor-pointer">
                                                {{ $user->roles[0]->name }}
                                                <span class="absolute -top-8 hidden group-hover:block bg-gray-800 text-white text-xs p-1 rounded shadow-md">
                                                    @foreach ($user->roles as $role)
                                                        @if (!$loop->first)
                                                            {{ $role->name }}
                                                        @endif
                                                    @endforeach
                                                </span>
                                            </span>
                                        <span class="text-xs text-gray-500"> (and more)</span>
                                    @else
                                        {{ $user->getRoles() }}
                                    @endif
                                </td>
                                <td class="p-3 px-5 flex justify-end">
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                       class="text-white-500 hover:underline"
                                    >
                                        <button type="button"
                                                class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                        >
                                            Edit
                                        </button>
                                    </a>
                                    <button type="button"
                                            class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                            onclick="openDeleteModal('{{ $user->name }}', '{{ route('admin.users.delete', $user->id) }}')"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>

<!-- Delete User Confirmation Modal -->
<div id="deleteUserModal" class="modal">
    <div class="modal-content">
        <h2>Confirm Deletion</h2>
        <p>Are you sure you want to delete this user?</p>
        <p>User: <span id="deleteUserName"></span></p>
        <form id="deleteUserForm" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <button type="button" class="btn btn-secondary" onclick="closeModal('deleteUserModal')">Cancel</button>
        </form>
    </div>
</div>

<script>
    function openDeleteModal(userName, deleteUrl) {
        document.getElementById('deleteUserName').textContent = userName;
        document.getElementById('deleteUserForm').action = deleteUrl;
        document.getElementById('deleteUserModal').style.display = 'block';
    }

    function closeModal(id) {
        document.getElementById(id).style.display = 'none';
    }
</script>
