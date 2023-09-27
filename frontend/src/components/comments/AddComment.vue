<template>
    <div class="bg-gray-100 p-6 rounded-xl">
        <form @submit.prevent="submitComment">
            <header class="flex items-center">
                <img
                    :src="'https://i.pravatar.cc/60?u=' + userId"
                    alt="User Avatar"
                    width="40"
                    height="40"
                    class="rounded-full"
                />
                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6">
        <textarea
            v-model="commentBody"
            class="w-full text-sm focus:outline-none focus:ring"
            rows="5"
            placeholder="Quick, think of something to say!"
            required
        ></textarea>

                <span v-if="errors.body" class="text-xs text-red-500">{{ errors.body }}</span>
            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-300">
                    Submit
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import { ref } from 'vue';
import { useStore } from 'vuex'; // If using Vuex for managing state

export default {
    data() {
        return {
            commentBody: '',
            errors: {},
        };
    },
    computed: {
        userId() {
            // Replace with your logic to get the user's ID
            return 1; // Replace with actual user ID retrieval logic
        },
    },
    methods: {
        async submitComment() {
            // Reset previous errors
            this.errors = {};

            const response = await fetch(`/api/posts/${this.$route.params.slug}/comments`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ body: this.commentBody }),
            });

            if (response.ok) {
                // Clear the comment input field
                this.commentBody = '';

                // Emit an event to notify the parent component (PostView) of the new comment
                this.$emit('comment-submitted', { body: this.commentBody });

                // You can also dispatch an action if you're using Vuex
                // const store = useStore();
                // store.dispatch('addComment', { body: this.commentBody });
            } else {
                const data = await response.json();
                this.errors = data.errors;
            }
        },
    },
};
</script>
