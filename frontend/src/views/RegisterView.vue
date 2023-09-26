<template>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <Panel>
                <h1 class="text-center font-bold text-xl">Register!</h1>

                <form @submit.prevent="register" class="mt-10">
                    <FormInput name="name" required v-model="form.name" />
                    <FormInput name="username" required v-model="form.username" />
                    <FormInput name="email" type="email" required v-model="form.email" />
                    <FormInput name="password" type="password" autocomplete="new-password" required v-model="form.password" />

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
        const form = ref({
            name: "",
            username: "",
            email: "",
            password: "",
    });

        const register = async () => {
            try {
                const response = await axios.post("http://localhost:8000/api/register", form.value);

                // Handle successful registration, e.g., show a success message
                console.log(response.data.message);

                // Store user's information in your application state here
                localStorage.setItem('authToken', response.data.token);

                // Redirect to the root page after successful registration
                window.location.href = "/";
            } catch (error) {
                // Handle registration error, e.g., show an error message
                console.error("Registration error:", error);
            }
        };

        return {
            form,
            register,
        };
    },
};
</script>
