<template>
    <div>
        <FormField>
        <button
            type="submit"
            class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600"
        >
            <slot></slot>
        </button>
        </FormField>
    </div>
</template>

<script>
import FormField from "@/components/form/FormField.vue";

export default {
    name: 'FormButton',
    components: {
        FormField,
    },
};
</script>
