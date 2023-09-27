<template>
    <div>
        <p v-if="hasError" class="text-red-500 text-xs mt-2">{{ errorMessage }}</p>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
    name: "FormError",
    props: {
        name: String,
    },
    computed: {
        ...mapGetters({
            hasError: 'validation/hasError',
            errorMessage: 'validation/errorMessage',
        }),
    },
};
</script>
