<template>
    <svg :class="iconClass" :width="iconSize" :height="iconSize" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
        <g fill="none" fill-rule="evenodd">
            <path v-if="name === 'down-arrow'" stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z"></path>
            <path v-if="name === 'down-arrow'" fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
            <!-- Add more conditions for other icons -->
        </g>
    </svg>
</template>

<script>
export default {
    props: {
        name: String,
        size: {
            type: Number,
            default: 22, // Default icon size
        },
    },
    computed: {
        iconClass() {
            // Add additional classes or transformations based on the icon name
            if (this.name === 'down-arrow') {
                return 'transform -rotate-90';
            }
            return '';
        },
        iconSize() {
            return `${this.size}px`;
        },
    },
};
</script>

<style scoped>
/* Add any component-specific styles here */
</style>
