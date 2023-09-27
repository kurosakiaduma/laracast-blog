<template>
    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
            {{ heading }}
        </h1>

        <div class="flex">
            <aside class="w-48 flex-shrink-0">
                <h4 class="font-semibold mb-4">Links</h4>

                <ul>
                    <li><router-link :to="{ name: 'posts.create' }">New Post</router-link></li>
                </ul>
            </aside>

            <main class="flex-1">
                <!-- Use a slot for the main content -->
                <slot></slot>
            </main>
        </div>
    </section>
</template>

<script>
export default {
    props: ['heading'],
};
</script>
