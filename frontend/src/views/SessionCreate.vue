<template>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <Panel>
                <h1 class="text-center font-bold text-xl">Log In!</h1>

                <form @submit.prevent="login" class="mt-10">
                    <FormInput name="email" type="email" autocomplete="username" required v-model="form.email" />
                    <FormInput name="password" type="password" autocomplete="current-password" required v-model="form.password" />


                    <!-- Echo out the form values -->
<!--                    <p>Email: {{ form.email }}</p>-->
<!--                    <p>Password: {{ form.password }}</p>-->

                    <FormButton>Log In</FormButton>
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
            email: "",
            password: "",
        });

        const login = async () => {
            try {
                console.log("PROPS",form.value);
                const response = await axios.post("http://localhost:8000/api/login?email=", form.value);

                // Handle successful login
                console.log(response.data.message);

                // Store user's information in your application state here

                // Redirect to the root page after successful login
                window.location.href = "/";
            } catch (error) {
                // Handle login error
                if (error.response && error.response.status === 422) {
                    console.error("Login error:", error.response.data.message);
                } else {
                    console.error("Login error:", error);
                }
            }
        };

        return {
            form,
            login,
        };
    },
};
</script>
