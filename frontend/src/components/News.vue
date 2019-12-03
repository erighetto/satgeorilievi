<template>
    <div>
        <div class="columns medium-3" v-for="result in results" v-bind:key="result">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ result.title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ result.posted }}</h6>
                    <p class="card-text">{{ result.data }}</p>
                    <a :href="result.link" class="btn btn-primary">Leggi</a>
                </div>
            </div>
        </div>

        <b-pagination
                v-model="currentPage"
                :total-rows="totalPages"
                :per-page="perPage"
                aria-controls="my-table"
        ></b-pagination>

        <p class="mt-3">Current Page: {{ $route.params.id }}</p>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "News",
        data() {
            return {
                results: [],
                perPage: 30,
                currentPage: [],
                totalPages: [],
            }
        },
        mounted() {
            axios.get("http://localhost:8000/public/news")
                .then(response => {
                    this.results = response.data.items;
                    this.currentPage = response.data.current_page;
                    this.totalPages = response.data.total_pages;
                })
        }
    }
</script>

<style scoped>

</style>