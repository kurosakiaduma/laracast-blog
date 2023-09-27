<template>
    <article class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
        <div class="py-6 px-5 lg:flex">
            <div class="flex-1 lg:mr-8">
                <img :src="images.defaultImage" alt="Blog Post illustration" class="rounded-xl" />
            </div>

            <div class="flex-1 flex flex-col justify-between">
                <header class="mt-8 lg:mt-0">
                    <PostMetadata :post="post" />
                    <div class="mt-4">
                        <h1 class="text-3xl">
                            <router-link :to="'/posts/' + post.slug">
                                {{ post.title }}
                            </router-link>
                        </h1>
                        <span class="mt-2 block text-gray-400 text-xs">
                 Published <time>{{ post.created_at }}</time>
               </span>
                    </div>
                </header>

                <div class="text-sm mt-2 space-y-4" v-html="post.excerpt"></div>

                <footer class="flex justify-between items-center mt-8">
                    <div class="flex items-center text-sm">
                        <img :src="images.laryAvatar" alt="Lary avatar" />
                        <div class="ml-3">
                            <h5 class="font-bold">
                                <router-link :to="'/?author=' + post.author.username">
                                    {{ post.author.name }}
                                </router-link>
                            </h5>
                        </div>
                    </div>

                    <div class="hidden lg:block">
                        <router-link :to="'/posts/' + post.slug" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Read More</router-link>
                    </div>
                </footer>
            </div>
        </div>
    </article>
</template>

<script>
import PostMetadata from '@/components/common/PostMetadata.vue';
import images from '../../assets/images.js';

export default {
    props: {
        post: Object, // Define the prop for post
    },
    components: {
        PostMetadata,
    },
    computed: {
        thumbnail() {
            return `/storage/${this.post.thumbnail}`;
        },
    },
    data(){
      return{
          images,
      }
    },
};
</script>
