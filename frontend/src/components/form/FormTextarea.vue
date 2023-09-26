<template>
    <div>
        <label :for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
            {{ label }}
        </label>

        <textarea
            required
            v-bind="$attrs"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
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
        modelValue: String,
    },
};
</script>
