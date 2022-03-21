<template>
    <div>
        <div class="home_navbar">
            <Hero />
            <Categories :categories="dataShared.categories" />
        </div>

        <Results />
    </div>
</template>

<script>
import Categories from "../sections/Categories.vue";
import Hero from "../sections/Hero.vue";
import Results from "../sections/Results.vue";
import dataShared from "../../dataShared";

export default {
    name: "Home",
    components: {
        Hero,
        Categories,
        Results,
    },
    data() {
        return {
            dataShared,
            // categories: [],
            query: "",
        };
    },
    methods: {
        getCategoriesAndTags() {
            axios
                .get("/api/categories")
                .then((response) => {
                    dataShared.categories = [...response.data.categories];
                    axios
                        .get("/api/tags")
                        .then((response) => {
                            dataShared.tags = [...response.data.tags];
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        saveQuery(value) {
            this.query = value;
        },
    },
    created() {
        this.getCategoriesAndTags();
    },
    watch: {
        "dataShared.restaurants"(newValue) {
            if (
                dataShared.restaurants.length > 0 ||
                dataShared.noResultsFound
            ) {
                setTimeout(() => {
                    // const restaurant = document.querySelectorAll(".restaurant")
                    // console.log(restaurant[restaurant.length - 1]);
                    // restaurant[restaurant.length - 1].scrollIntoView({
                    //     behavior: "smooth",
                    // });
                    window.scrollTo({
                        top: document.body.scrollHeight,
                        behavior: "smooth",
                    });
                }, 10);
            }
        },
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
