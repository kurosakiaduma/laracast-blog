<template>
    <div class="flex justify-between items-center">
        <div class="space-x-2">
            <CategoryButton :category="post.category" />
        </div>
        <div class="ml-2">
            <span :class="statusClass">{{ post.status }}</span>
        </div>
    </div>
</template>

<script>
import CategoryButton from './CategoryButton.vue';

export default {
    props: {
        post: Object, // Define the prop for post
    },
    components: {
        CategoryButton,
    },
    computed: {
        statusClass() {
            return {
                'inline-block px-2 py-1 bg-green-500 text-white text-xs font-semibold rounded-full': this.post.status === 'published',
                'inline-block px-2 py-1 bg-yellow-500 text-white text-xs font-semibold rounded-full': this.post.status === 'draft',
            };
        },
    },
};
</script>
