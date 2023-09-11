@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Links</h4>

            <ul>
                @if ($heading === 'Manage Posts')
                    <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">
                        All Posts
                        <br>
                    </a>
                    <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">
                        New Post
                    </a>
                @endif

                @if ($heading === 'User Management' || $heading === 'User Details')
                    <a href="/admin/users" class="{{ request()->is('admin/users') ? 'text-blue-500' : '' }}">
                        All Users
                    </a>
                    <br>
                    <a href="#" class="{{ request()->is('admin/users/create') ? 'text-blue-500' : '' }}">
                        New User
                    </a>
                @endif
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
