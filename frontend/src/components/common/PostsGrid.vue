<template>
    <div>
        <PostFeaturedCard :post="featuredPost" />

        <div class="lg:grid lg:grid-cols-6" v-if="posts.length > 1">
            <template v-for="(post, index) in posts.slice(1)">
                <PostCard :post="post" :class="index < 2 ? 'col-span-3' : 'col-span-2'" />
            </template>
        </div>
    </div>
</template>

<script>
import PostFeaturedCard from '@/components/common/PostFeaturedCard.vue';
import PostCard from '@/components/common/PostCard.vue';

export default {
    props: {
        posts: Array,
    },
    components: {
        PostFeaturedCard,
        PostCard,
    },
    computed: {
        featuredPost() {
            return this.posts.length > 0 ? this.posts[0] : null;
        },
    },
    methods: {
        // Empty for now
    },
};
</script>
