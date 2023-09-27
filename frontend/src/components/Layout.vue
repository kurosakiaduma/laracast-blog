<template>
    <section class="px-6 py-8" id="app">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <router-link to="/">
                    <img src="/public/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </router-link>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                <template v-if="authenticated">
                    <Dropdown>
                        <!-- Trigger slot -->
                        <template v-slot:trigger>
                            <!-- Use any trigger content here -->
                            <button class="text-xs font-bold uppercase">
                                Welcome, {{ authenticatedUser.name }}!
                            </button>
                        </template>

                        <!-- Links slot -->
                        <DropdownItem :active="isActive('/admin/users*')" href="/admin/users">
                            User Management
                        </DropdownItem>
                        <DropdownItem :active="isActive('/admin/posts*')" href="/admin/posts">
                            Post Management
                        </DropdownItem>
                        <DropdownItem href="#" @click="logout">
                            Log Out
                        </DropdownItem>
                        <!-- Add more dropdowns items as needed -->
                    </Dropdown>
                </template>


                <template v-else>
                    <router-link to="/posts/create" class="ml-6 text-xs font-bold uppercase">Create New Post</router-link>
                </template>

                <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        <router-view></router-view>

        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/public/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                    <form @submit.prevent="subscribe" class="lg:flex text-sm">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/public/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>
                            <div>
                                <input v-model="email" id="email" type="text" placeholder="Your email address"
                                       class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                                <span v-if="errors.email" class="text-xs text-red-500">{{ errors.email }}</span>
                            </div>
                        </div>
                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>

        <Flash ref="flash"></Flash>
    </section>
</template>

<script>
import Dropdown from '@/components/dropdowns/Dropdown.vue';
import DropdownItem from '@/components/dropdowns/DropdownItem.vue';
import Flash from '@/components/common/Flash.vue';
import axios from 'axios'; // Import Axios

export default {
    components: {
        Dropdown,
        DropdownItem,
        Flash,
    },
    props: {
        user: Object, // Ensure the user data is passed as a prop
    },
    data() {
        return {
            authenticated: false, // Set to true if the user is authenticated
            isAdmin: false, // Set to true if the user has admin privileges
            creatingPost: false, // Set to true if creating a new post
            email: "", // Email for newsletter subscription
            errors: {}, // Validation errors for the email input
        };
    },
    created() {
        // Fetch user data and set authenticated status when the component is created
        this.loadUserData();
    },
    methods: {
        isActive(route) {
            // Implement logic to determine if the route is active
            // You may need to access the current route or use Vue Router's $route
            // to check if it matches the provided route pattern.
            // Return true if active, otherwise false.
            return false; // Change this logic based on your requirements
        },
        logout() {
            // Implement the logout logic here
        },
        subscribe() {
            // Implement the newsletter subscription logic here
        },
        showFlashMessage() {
            // Emit an event to the Flash component to show the message
            this.$refs.flash.showFlash('This is a success message.'); // Replace with your message
        },
        loadUserData() {
            axios.get('http://localhost:8000/api/user', {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('authToken')
                }
            })
                .then(response => {
                    const userData = response.data;
                    if (userData) {
                        this.authenticatedUser = userData; // Set authenticatedUser instead of user
                        this.authenticated = true; // User is authenticated
                    } else {
                        this.authenticatedUser = {}; // User is not authenticated
                        this.authenticated = false;
                    }
                })
                .catch(error => {
                    console.error('Error fetching user:', error);
                });
        },
    },
};
</script>

<style scoped>
/* Add any component-specific styles here */
</style>
