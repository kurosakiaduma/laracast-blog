<template>
    <header class="max-w-xl mx-auto mt-20 text-center">
        <h1 class="text-4xl">
            Latest <span class="text-blue-500">Laravel From Scratch</span> News
        </h1>

        <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
            <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
                <CategoryDropdown :categories="categories" />
            </div>

            <!-- Search -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                <form @submit.prevent="search">
                    <input
                        v-model="searchQuery"
                        type="text"
                        placeholder="Find something"
                        class="bg-transparent placeholder-black font-semibold text-sm"
                    />
                </form>
            </div>
        </div>
    </header>
</template>

<script>
import CategoryDropdown from '@/components/common/CategoryDropdown.vue'; // Adjust the path as needed

export default {
    components: {
        CategoryDropdown,
    },
    data() {
        return {
            searchQuery: '',
            categories: [], // Fetch categories from an API endpoint
        };
    },
    methods: {
        search() {
            // Handle search logic, you can perform the search operation here
            // Use `this.searchQuery` for the search query
        },
    },
};
</script>
