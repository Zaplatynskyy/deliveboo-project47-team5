<template>
    <div class="container">
        <div class="home_navbar">
            <h1>Home Page</h1>

            <div class="search">
                <input
                    @keyup.enter="nameSearch()"
                    type="text"
                    placeholder="Cerca ristorante"
                    v-model="query"
                />
                <button @click="nameSearch(query)" type="button">Cerca</button>
            </div>

            <Categories :categories="categories" />
        </div>

        <div v-show="searchOn" class="home_results">
            <h2>Lista ristorante</h2>
            <ul>
                <li v-for="restaurant in restaurants" :key="restaurant.id">
                    <h4>
                        <router-link
                            :to="{
                                name: 'restaurant-details',
                                params: { slug: restaurant.slug },
                            }"
                        >
                            Nome : {{ restaurant.name }}
                        </router-link>
                    </h4>
                    <div
                        v-for="category in restaurant.categories"
                        :key="category.slug"
                    >
                        {{ category.name }}
                    </div>
                </li>
            </ul>
        </div>
        <div v-if="noResultsFound" class="no-results">
            {{ noResultsFound }}
        </div>
    </div>
</template>

<script>
import Categories from "../sections/Categories.vue";

export default {
    name: "Home",
    components: {
        Categories,
    },
    data() {
        return {
            restaurants: [],
            categories: [],
            query: "",
            searchOn: false,
            noResultsFound: null,
        };
    },
    methods: {
        nameSearch(query) {
            if (this.query != "") {
                console.log(this.query);
                axios
                    .get(`/api/restaurants/${this.query}`)
                    .then((response) => {
                        this.restaurants = [...response.data.users];
                        this.searchOn = true;
                        this.noResultsFound = null;
                    })
                    .catch((error) => {
                        this.noResultsFound = error.response.data.message;
                        this.searchOn = false;
                        this.restaurants = [];
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

<style lang="scss" scoped>
.categories {
    width: 200px;
    text-decoration: underline;
    cursor: pointer;

    &:hover {
        text-decoration: none;
        color: #3490dc;
    }
}
</style>
