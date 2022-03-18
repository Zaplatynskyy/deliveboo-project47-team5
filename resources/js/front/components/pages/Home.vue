<template>
    <div class="my_container">
        <div class="home_navbar">
            <Hero />
            <Categories :categories="categories" />
        </div>

        <div v-show="dataShared.searchOn" class="home_results">
            <h2>Lista ristorante</h2>
            <ul>
                <li v-for="restaurant in dataShared.restaurants" :key="restaurant.id">
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
        <div v-if="dataShared.noResultsFound" class="no-results">
            {{ noResultsFound }}
        </div>
    </div>
</template>

<script>
import Categories from "../sections/Categories.vue";
import Hero from "../sections/Hero.vue";
import dataShared from '../../dataShared'

export default {
    name: "Home",
    components: {
        Hero,
        Categories
    },
    data() {
        return {
            dataShared,
            // restaurants: [],
            // searchOn: false,
            categories: [],
            // noResultsFound: null,
        };
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
