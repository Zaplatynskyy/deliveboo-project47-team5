<template>
    <div>
        <div class="home_navbar">
            <h1>Home Page</h1>

            <div class="search">
                <input
                    @keypress.enter="nameSearch()"
                    type="text"
                    placeholder="Cerca ristorante"
                    v-model="query"
                />
                <button @click="nameSearch(query)" type="button">Cerca</button>
            </div>

            <ul>
                <li class="categories" v-for="category in categories" :key="category.id" @click="categorySearch(category.slug)">
                    {{ category.name }}
                </li>
            </ul>
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
                            Nome : {{restaurant.name}}
                        </router-link>
                    </h4>
                    <div v-for="category in restaurant.categories" :key="category.slug">{{category.name}}</div>
                </li>
                
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "Home",
    components: {},
    data() {
        return {
            restaurants: [],
            categories: [],
            query: "",
            searchOn : false
        };
    },
    methods: {
        nameSearch(query) {
            if (this.query != "") {
                axios
                    .get(`/api/restaurants/${query}`)
                    .then((response) => {
                        this.restaurants = [...response.data.users];
                        this.searchOn = true
                        // this.getCategoriesAndTags();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },

        categorySearch(slug) {
            axios
                .get(`/api/categories/${slug}`)
                .then((response) => {
                    this.restaurants = [...response.data.categories.users];
                    this.searchOn = true
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
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
    text-decoration: underline;
    cursor: pointer;

    &:hover {
        text-decoration: none;
        color: #3490dc;
    }
}

</style>
