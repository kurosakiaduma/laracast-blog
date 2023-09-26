<template>
        <Header/>

        <main class="max-w-6xl mx-autoclassName lg:mt-20 space-y-6">
            <div v-if="posts.length > 0">
                <PostsGrid :posts="posts" />
                <Pagination :pagination="pagination" @page-change="fetchPosts" />
            </div>
            <p v-else class="text-center">No posts yet ☹️. Please check back later.</p>
        </main>
</template>

<script>
import axios from 'axios';
import PostsGrid from "@/components/common/PostsGrid.vue";
import Header from "@/components/common/Header.vue";
import Pagination from "@/components/pagination/Pagination.vue";
export default {
    components: {Header, PostsGrid, Pagination},
    data() {
        return {
            posts: [],
            pagination: {},
        };
    },
    mounted() {
        // Make an API request to fetch posts from your Laravel backend
        this.fetchPosts();
    },
    methods: {
        async fetchPosts(page = 1) {
            try {
                const response = await axios.get(`http://localhost:8000/api/posts?page=${page}`); // Adjust the API endpoint as needed
                this.posts = response.data.posts.data;
                this.pagination = response.data.posts;
                console.log("PAGINATION=>", this.pagination);
            } catch (error) {
                console.error('Error fetching posts:', error);
            }
        },
    },
};
</script>
