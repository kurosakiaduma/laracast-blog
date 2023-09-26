<template>
    <!-- Loading state -->
    <div v-if="isLoading" class="max-w-6xl mx-auto mt-10 lg:mt-20 text-center">
        <p>Loading...</p>
    </div>

    <!-- Content when data is available -->
    <div v-else-if="postData" class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img :src="'/storage/' + postData.thumbnail" alt="Post Thumbnail" class="rounded-xl">
                <p class="mt-4 block text-gray-400 text-xs">
                    Published
                    <time>{{ postData.created_at }}</time>
                </p>
                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar" width="40" height="40" class="rounded-full">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">
                            <a :href="'/?author=' + postData.author.username">{{ postData.author.name }}</a>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <router-link to="/" class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z"></path>
                                <path class="fill-current" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                            </g>
                        </svg>
                        Back to Posts
                    </router-link>
                    <div class="space-x-2">
                        <CategoryButton :category="postData.category"/>
                    </div>
                </div>
                <h1 class="font-bold text-3xl lg:text-4xl mb-10">{{ postData.title }}</h1>
                <div class="space-y-4 lg:text-lg leading-loose" v-html="postData.body"></div>
            </div>
            <section class="col-span-8 col-start-5 mt-10 space-y-6">
                <AddComment @comment-submitted="addComment"></AddComment>
                <PostComment :comments="postData.comments"></PostComment>
            </section>
        </article>
    </div>
    <!-- Error state -->
    <div v-else class="max-w-6xl mx-auto mt-10 lg:mt-20 text-center">
        <p>Error fetching post data.</p>
    </div>
</template>

<script>
import axios from 'axios';
import AddComment from "@/components/comments/AddComment.vue";
import PostComment from "@/components/comments/PostComment.vue";
import CategoryButton from "@/components/common/CategoryButton.vue";

export default {
    components: {
        CategoryButton,
        AddComment,
        PostComment,
    },
    props: {
        slug: String,
        comments: [],
    },
    data() {
        return {
            postData: {
                comments: [],
            },
            isLoading: true, // Added loading state
        };
    },
    async mounted() {
        await this.fetchPost();
    },
    methods: {
        async fetchPost() {
            try {
                const response = await axios.get(`http://localhost:8000/api/posts/${this.slug}`);
                this.postData = response.data.post;
                this.isLoading = false; // Data has been fetched
            } catch (error) {
                console.error('Error fetching post:', error);
                this.isLoading = false; // Error occurred, stop loading
            }
        },
        addComment(comment) {
            this.postData.comments.push(comment);
        },
    },
};
</script>
