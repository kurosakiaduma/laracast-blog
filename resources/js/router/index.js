import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue';
import RegisterView from "@/views/RegisterView.vue";
import SessionCreate from "@/views/SessionCreate.vue";
import PostCreate from "@/components/post/PostCreate.vue";
import { defineAsyncComponent } from 'vue'

const PostView = ()=> import('@/views/PostView.vue')



const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeView
        },
        {
            path: '/posts/:slug', //  dynamic route parameter ":slug"
            name: 'post',
            component: PostView, // PostView component for the "/posts/:slug" route
            props: true // Enable passing route params as props to the component
        },
        {
            path: '/register',
            name: 'register',
            component: RegisterView
        },
        {
            path: '/login',
            name: 'login',
            component: SessionCreate
        },
        {
            path: '/posts/create',
            name: 'posts.create',
            component: PostCreate,
        }

    ]
})

export default router
