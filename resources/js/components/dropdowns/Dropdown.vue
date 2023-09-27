<template>
    <div @click.away="show = false" class="relative">
        <!-- Trigger -->
        <div @click="show = !show">
            <slot name="trigger"></slot>
        </div>

        <!-- Links -->
        <div v-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl w-full z-50 overflow-auto max-h-52" style="display: none;">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            show: false,
        };
    },
};
</script>
