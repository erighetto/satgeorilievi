<template>
    <div>
        <div class="columns medium-3" v-for="result in results">
            <div class="card">
                <div class="card-divider">
                    {{ result.title }}
                </div>
                <div class="card-section">
                    <p>{{ result.data }}.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "News",
        data() {
            return {
                results: []
            }
        },
        mounted() {
            axios.get("http://localhost:8000/public/news")
                .then(response => {
                    this.results = response.data.items
                })
        }
    }
</script>

<style scoped>

</style>