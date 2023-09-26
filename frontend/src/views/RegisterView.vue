<template>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <Panel>
                <h1 class="text-center font-bold text-xl">Register!</h1>

                <form @submit.prevent="register" class="mt-10">
                    <FormInput name="name" required v-model="name" />
                    <FormInput name="username" required v-model="username" />
                    <FormInput name="email" type="email" required v-model="email" />
                    <FormInput name="password" type="password" autocomplete="new-password" required v-model="password" />

                    <FormButton>Sign Up</FormButton>
                </form>
            </Panel>
        </main>
    </section>
</template>

<script>
import Panel from "@/components/common/Panel.vue";
import { ref } from "vue";
import axios from "axios";
import FormInput from "@/components/form/FormInput.vue";
import FormButton from "@/components/form/FormButton.vue";

export default {
    components: {
        FormButton,
        FormInput,
        Panel,
    },
    setup() {
        const name = ref("");
        const username = ref("");
        const email = ref("");
        const password = ref("");

        const register = async () => {
            try {
                const response = await axios.post("http://localhost:8000/api/register", {
                    name: name.value,
                    username: username.value,
                    email: email.value,
                    password: password.value,
                });

                // Handle successful registration, e.g., show a success message
                console.log(response.data.message);

                // Redirect to the root page after successful registration
                window.location.href = "/";
            } catch (error) {
                // Handle registration error, e.g., show an error message
                console.error("Registration error:", error);
            }
        };

        return {
            name,
            username,
            email,
            password,
            register,
        };
    },
};
</script>
