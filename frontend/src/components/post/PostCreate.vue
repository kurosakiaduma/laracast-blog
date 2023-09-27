<template>
    <Setting :heading="'Publish New Post'">
        <form @submit.prevent="submitForm" enctype="multipart/form-data" class="border border-gray rounded px-5 bg-sky-500/50">
            <FormInput name="Title" v-model="form.title" required />
            <FormInput name="Slug" v-model="form.slug" required />
            <div class="border border-gray rounded px-5 mt-5 mb-5">
                <label for="Thumbnail">Thumbnail</label>
                <input type="file" id="thumbnail" name="thumbnail" @change="onFileChange" required />
            </div>
            <div>
                <label for="Excerpt">Excerpt</label>
                <FormTextarea
                    class="border border-gray-300 p-2 w-full rounded-lg text-gray-800"
                    name="Excerpt"
                    v-model="form.excerpt"
                    required
                />
            </div>
            <div>
                <label for="Body">Body</label>
                <FormTextarea
                    class="border border-gray-300 p-2 w-full rounded-lg text-gray-800"
                    name="Body"
                    v-model="form.body"
                    required
                />
            </div>
            <div class="mt-5">
                <label for="Category">Category</label>
                <select v-model="form.category_id" required class="mx-8 border border-gray w-20 rounded-lg text-gray-800">
                    <option v-for="category in categories" :key="category.id" :value="category.id">
                        {{ capitalizeFirstLetter(category.name) }}
                    </option>
                </select>
            </div>
            <div class="mx-5 mb-5">
                <FormButton>Publish</FormButton>
            </div>
        </form>
    </Setting>
</template>

<script>
import Setting from '@/components/common/Setting.vue';
import FormInput from '@/components/form/FormInput.vue';
import FormTextarea from '@/components/form/FormTextarea.vue';
import FormField from '@/components/form/FormField.vue';
import FormButton from '@/components/form/FormButton.vue';
import axios from 'axios';

export default {
    components: {
        Setting,
        FormInput,
        FormTextarea,
        FormField,
        FormButton,
    },
    data() {
        return {
            form: {
                title: '',
                slug: '',
                thumbnail: null,
                excerpt: '',
                body: '',
                category_id: null,
            },
            categories: [],
        };
    },
    methods: {
        submitForm() {
            try {
                const formData = new FormData();
                formData.append('title', this.form.title);
                formData.append('slug', this.form.slug);
                formData.append('thumbnail', this.form.thumbnail);
                formData.append('excerpt', this.form.excerpt);
                formData.append('body', this.form.body);
                formData.append('category_id', this.form.category_id);

                axios.post('http://localhost:8000/api/create-post', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                }).then((response) => {
                    console.log('Post created:', response.data);
                    // Redirect to the root page or another page after successful post creation
                    window.location.href = '/';
                }).catch((error) => {
                    console.error('Post creation error:', error);
                });
            } catch (error) {
                console.error('Error:', error);
            }
        },
        onFileChange(event) {
            const selectedFile = event.target.files[0];
            this.form.thumbnail = selectedFile;
        },
        async fetchCategories() {
            try {
                const response = await axios.get('http://localhost:8000/api/categories');
                this.categories = response.data;
            } catch (error) {
                console.error('Error fetching categories:', error);
            }
        },
        capitalizeFirstLetter(text) {
            return text.charAt(0).toUpperCase() + text.slice(1);
        },
    },
    mounted() {
        this.fetchCategories();
    },
};
</script>
