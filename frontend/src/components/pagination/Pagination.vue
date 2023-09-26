<script>
export default {
    props: {
        pagination: Object,
    },
    methods: {
        changePage(page) {
            this.$emit('page-change', page);
        },
    },
};
</script>

<template>
    <nav>
        <ul class="pagination">
            <li class="page-item" v-if="pagination.prev_page_url">
                <a class="page-link" @click="changePage(pagination.current_page - 1)" href="#">
                    Previous
                </a>
            </li>
            <li class="page-item" v-for="page in pagination.last_page" :key="page">
                <a class="page-link" @click="changePage(page)" href="#" :class="{ 'active': page === pagination.current_page }">
                    {{ page }}
                </a>
            </li>
            <li class="page-item" v-if="pagination.next_page_url">
                <a class="page-link" @click="changePage(pagination.current_page + 1)" href="#">
                    Next
                </a>
            </li>
        </ul>
    </nav>
</template>

<style scoped>
.pagination {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
}

.page-item {
    margin: 0 5px;
}

.page-link {
    display: inline-block;
    padding: 8px 12px;
    text-align: center;
    text-decoration: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    color: #333;
    cursor: pointer;
}

.active {
    background-color: #007bff;
    color: #fff;
    border: 1px solid #007bff;
}

.page-link.active {
    cursor: not-allowed;
    background-color: #007bff;
    color: #fff;
    border: 1px solid #007bff;
}

.page-link:hover {
    background-color: #ccc;
}

.page-link[disabled] {
    cursor: not-allowed;
    pointer-events: none;
    background-color: #eee;
    color: #999;
    border: 1px solid #ccc;
}
</style>
