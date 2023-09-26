<template>
    <div>
        <label :for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
            {{ label }}
        </label>

        <textarea
            class="border border-gray-200 p-2 w-full rounded"
            :name="name"
            :id="name"
            required
            v-bind="$attrs"
            v-model="value"
        ></textarea>

        <FormError :name="name" />

    </div>
</template>

<script>
import FormError from './FormError.vue';

export default {
    name: "FormTextarea",
    components: {
        FormError,
    },
    props: {
        name: String,
        label: String,
        value: String,
    },
};
</script>
