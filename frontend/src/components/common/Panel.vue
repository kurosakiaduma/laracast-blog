<template>
    <div :class="$attrs.class + ' border border-gray-200 p-6 rounded-xl'">
        <slot></slot>
    </div>
</template>

<script>
export default {
    inheritAttrs: false,
};
</script>

<style scoped>
/* Empty styles */
</style>
