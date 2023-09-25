<!doctype html>

<style>
    /* Add this to control the modal display */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        z-index: 9999;
    }

    /* Add this to center the modal */
    .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }
</style>
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
                            <th class="text-left p-3 px-5">Roles</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b hover:bg-orange-100">
                                <td class="p-3 px-5">
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="text-blue-500 hover:underline">
                                        {{ $user->name }}
                                    </a>
                                </td>
                                <td class="p-3 px-5">{{ $user->email }}</td>
                                <td class="p-3 px-5">
                                    <span class="group cursor-pointer relative">
                                        @foreach ($user->roles as $role)
                                            <span class="text-sm bg-gray-800 text-white px-2 rounded mb-2 mr-2">
                                                {{ ucwords($role->name) }}
                                            </span>
                                        @endforeach
                                    </span>
                                </td>
                                <td class="p-3 px-5 flex justify-end">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-white-500 hover:underline">
                                        <button
                                            type="button"
                                            class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                        >
                                            Edit
                                        </button>
                                    </a>
                                    <button
                                        type="button"
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
<div id="deleteUserModal" class="fixed inset-0 z-10 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none hidden">
    <div class="relative w-auto max-w-md mx-auto my-6">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                <h3 class="text-3xl font-semibold">
                    Confirm Deletion
                </h3>
                <button class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="closeModal('deleteUserModal')">
                    <span class="bg-transparent text-black h-6 w-6 text-2xl block outline-none focus:outline-none">×</span>
                </button>
            </div>
            <!--body-->
            <div class="relative p-6 flex-auto">
                <p class="my-4 text-blueGray-500 text-lg leading-relaxed">
                    Are you sure you want to delete this user?
                </p>
                <p>User: <span id="deleteUserName"></span></p>
            </div>
            <!--footer-->
            <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                <form id="deleteUserForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    <button type="button" class="btn btn-secondary ml-4" onclick="cancelDelete()">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function openDeleteModal(userName, deleteUrl) {
        document.getElementById('deleteUserName').textContent = userName;
        document.getElementById('deleteUserForm').action = deleteUrl;
        document.getElementById('deleteUserModal').style.display = 'block';
    }

    function cancelDelete() {
        if (confirm('Are you sure you want to cancel the delete process?')) {
            // User confirmed to cancel, you can close the modal or perform any other action
            closeModal('deleteUserModal');
        }
    }

    function closeModal(id) {
        document.getElementById(id).style.display = 'none';
    }
</script>
