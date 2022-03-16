<template>
    <div>
        <h1>Home Page</h1>

        <div class="search">
            <input
                @keypress.enter="submitSearch()"
                type="text"
                placeholder="Cerca ristorante"
                v-model="query"
            />
            <button @click="submitSearch()" type="button">Cerca</button>
        </div>

        <ul>
            <li v-for="category in categories" :key="category.id">
                <router-link
                    :to="{
                        name: 'advanced-search',
                        params: { query: category.slug, from: 'category' },
                    }"
                    >{{ category.name }}
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "Home",
    components: {},
    data() {
        return {
            categories: [],
            query: "",
        };
    },
    methods: {
        submitSearch() {
            if (this.query != "") {
                this.$router.push({
                    name: "advanced-search",
                    params: { query: this.query, from: "restaurant" },
                });
            }
        },
    },
    created() {
        axios
            .get("/api/categories")
            .then((response) => {
                this.categories = [...response.data.categories];
            })
            .catch(function (error) {
                console.log(error);
            });
    },
};
</script>

<style></style>
