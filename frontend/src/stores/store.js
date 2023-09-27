// store.js
import { createStore } from 'vuex';

const store = createStore({
    modules: {
        validation: {
            state: {
                errors: {},
            },
            getters: {
                hasError: (state) => (fieldName) => {
                    return !!state.errors[fieldName];
                },
                errorMessage: (state) => (fieldName) => {
                    return state.errors[fieldName] || null;
                },
            },
            mutations: {
                setErrors(state, errors) {
                    state.errors = errors;
                },
            },
        },
    },
});

export default store;
