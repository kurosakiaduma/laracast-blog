<template>
    <div v-if="show" className="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
        <p>{{ message }}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            show: false,
            message: '',
        };
    },
    methods: {
        showFlash(message) {
            this.message = message;
            this.show = true;
            this.hideAfterDelay(3);
        },
        hideAfterDelay() {
            setTimeout(() => {
                this.show = false;
            }, 4000);
        },
    },
};
</script>

<style scoped>
/* Add any component-specific styles here */
</style>
