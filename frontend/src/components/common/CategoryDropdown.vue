<template>
    <Dropdown>
        <template v-slot:trigger>
            <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
                {{ currentCategory ? currentCategory.name : 'Categories' }}
                <Icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
            </button>
        </template>

        <DropdownItem :href="clearCategoryQuery()" :active="!currentCategory && !searchQuery">
            All
        </DropdownItem>

        <DropdownItem
            v-for="category in categories"
            :key="category.id"
            :href="filterByCategory(category.slug)"
            :active="isCategoryActive(category.slug)"
        >
            {{ category.name }}
        </DropdownItem>
    </Dropdown>
</template>

<script>
import Dropdown from '@/components/dropdowns/Dropdown.vue'; // Adjust the path as needed
import DropdownItem from '@/components/dropdowns/DropdownItem.vue'; // Adjust the path as needed
import Icon from '@/components/common/Icon.vue'; // Adjust the path as needed

export default {
    props: {
        categories: Array, // Pass the categories array from the parent component
    },
    computed: {
        currentCategory() {
            // Determine the currently selected category based on your logic
            // For example, you can use the `searchQuery` and route query parameters
        },
        searchQuery() {
            // Determine the search query based on your logic
        },
    },
    methods: {
        clearCategoryQuery() {
            // Define a method to clear the category query parameter
            // You can use this method in the template
        },
        filterByCategory(slug) {
            // Define a method to filter posts by category
            // You can use this method in the template
        },
        isCategoryActive(slug) {
            // Determine if a category is currently active
        },
    },
    components: {
        Dropdown,
        DropdownItem,
        Icon,
    },
};
</script>
