<template>
    <FormField :name="name">
        <FormLabel :name="name" />
        <input
            class="border border-gray-200 p-2 w-full rounded"
            :name="name"
            :id="name"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
        />        <FormError :name="name" />
    </FormField>
</template>

<script>
import FormField from '@/components/form/FormField.vue';
import FormLabel from '@/components/form/FormLabel.vue';
import FormError from '@/components/form/FormError.vue';

export default {
    name: "FormInput",
    components: {
        FormField,
        FormLabel,
        FormError,
    },
    props: {
        name: String,
        modelValue: String,
    },
};
</script>
