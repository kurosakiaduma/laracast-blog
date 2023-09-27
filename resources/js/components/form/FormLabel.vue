<template>
    <label
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
        :for="htmlFor"
    >
        {{ labelText }}
    </label>
</template>

<script>
export default {
    name: "FormLabel",
    props: {
        name: String,
    },
    computed: {
        htmlFor() {
            return this.name.toLowerCase();
        },
        labelText() {
            return this.name.charAt(0).toUpperCase() + this.name.slice(1);
        },
    },
};
</script>
