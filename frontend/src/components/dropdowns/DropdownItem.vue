<template>
    <a :class="classes" v-bind="$attrs">
        <slot></slot>
    </a>
</template>

<script>
export default {
    props: {
        active: {
            type: Boolean,
            default: false,
        },
    },
    computed: {
        classes() {
            return {
                'block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white': true,
                'bg-blue-500 text-white': this.active,
            };
        },
    },
};
</script>
