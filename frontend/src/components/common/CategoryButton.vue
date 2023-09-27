<template>
    <a :href="'/?category=' + category.slug" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold" :style="{ fontSize: '10px' }">
        {{ category.name }}
    </a>
</template>

<script>
export default {
    props: {
        category: Object, // Define the prop for category
    },
};
</script>
