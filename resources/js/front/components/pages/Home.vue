<template>
    <div>
        <div class="home_navbar">
            <Hero />
            <Categories :categories="dataShared.categories" />
        </div>

        <Results />
        <Banner />
    </div>
</template>

<script>
import Categories from "../sections/Categories.vue";
import Hero from "../sections/Hero.vue";
import Results from "../sections/Results.vue";
import Banner from "../sections/Banner.vue";
import dataShared from "../../dataShared";

export default {
    name: "Home",
    components: {
        Hero,
        Categories,
        Results,
        Banner,
    },
    data() {
        return {
            dataShared,
            categories: [],
            query: "",
        };
    },
    methods: {
        getCategoriesAndTags() {
            dataShared.loaded = false;
            axios
                .get("/api/categories")
                .then((response) => {
                    dataShared.categories = [...response.data.categories];
                    axios
                        .get("/api/tags")
                        .then((response) => {
                            dataShared.tags = [...response.data.tags];
                            dataShared.loaded = true;
                        })
                        .catch(function (error) {});
                })
                .catch(function (error) {});
        },
        saveQuery(value) {
            this.query = value;
        },
    },
    created() {
        this.getCategoriesAndTags();
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
