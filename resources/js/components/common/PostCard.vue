<template>
    <article
        :class="[
      'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl',
      $attrs.class
    ]"
    >
        <div class="py-6 px-5 h-full flex flex-col">
            <div>
                <img :src="images.defaultImage" alt="Blog Post illustration" class="rounded-xl">
            </div>

            <div class="mt-6 flex flex-col justify-between flex-1">
                <header>
                    <PostMetadata :post="post"/>
                    <div class="mt-4">
                        <h1 class="text-3xl clamp one-line">
                            <router-link :to="'/posts/' + post.slug">
                                {{ post.title }}
                            </router-link>
                        </h1>
                        <span class="mt-2 block text-gray-400 text-xs">
              Published <time>{{ post.created_at }}</time>
            </span>
                    </div>
                </header>

                <div class="text-sm mt-4 space-y-4">
                    {{ post.excerpt }}
                </div>

                <footer class="flex justify-between items-center mt-8">
                    <div class="flex items-center text-sm">
                        <img :src="images.laryAvatar" alt="Lary avatar">
                        <div class="ml-3">
                            <h5 class="font-bold">
                                <router-link :to="'/?author=' + post.author.username">
                                    {{ post.author.name }}
                                </router-link>
                            </h5>
                        </div>
                    </div>

                    <div>
                        <router-link :to="'/posts/' + post.slug" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">
                            Read More
                        </router-link>
                    </div>
                </footer>
            </div>
        </div>
    </article>
</template>

<script>
import PostMetadata from "@/components/common/PostMetadata.vue";
import images from '../../assets/images.js';
export default {
    components:{
      PostMetadata,
    },
    props: ['post'],
    data(){
        return{
            images,
        }
    }
};
</script>
