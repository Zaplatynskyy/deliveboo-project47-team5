<template>
    <section class="advanced-search">
        <div class="search">
            <input
                @keyup.enter="searchRestaurants()"
                type="text"
                placeholder="Cerca ristorante"
                v-model="query"
            />
            <button @click="searchRestaurants()" type="button">Cerca</button>
        </div>
        <div class="filters">
            <div class="categories">
                <div
                    v-for="category in categories"
                    :key="category.id"
                    class="form-check form-check-inline"
                >
                    <input
                        class="form-check-input checkboxCategories"
                        type="checkbox"
                        :id="category.slug"
                        :value="category.id"
                    />
                    <label class="form-check-label" :for="category.slug">
                        {{ category.name }}
                    </label>
                </div>
            </div>
            <div class="tags">
                <div
                    v-for="tag in tags"
                    :key="tag.id"
                    class="form-check form-check-inline"
                >
                    <input
                        class="form-check-input checkboxTags"
                        type="checkbox"
                        :id="tag.slug"
                        :value="tag.id"
                    />
                    <label class="form-check-label" :for="tag.slug">
                        {{ tag.name }}
                    </label>
                </div>
            </div>
        </div>
        <ul v-if="!noResultsFound">
            <li v-for="restaurant in restaurants" :key="restaurant.id">
                <router-link
                    :to="{
                        name: 'restaurant-details',
                        params: { slug: restaurant.slug },
                    }"
                    >{{ restaurant.name }}
                </router-link>
            </li>
        </ul>
        <div v-if="noResultsFound" class="no-results">
            {{ noResultsFound }}
        </div>
    </section>
</template>

<script>
export default {
    name: "AdvancedSearch",
    data() {
        return {
            restaurants: [],
            categories: [],
            tags: [],
            query: "",
            noResultsFound: null,
        };
    },
    methods: {
        searchRestaurants() {
            let categories = this.checkCheckbox("checkboxCategories");
            let tags = this.checkCheckbox("checkboxTags");

            axios
                .post(`/api/restaurants/advanced`, {
                    params: {
                        categories: categories,
                        tags: tags,
                        query: this.query,
                    },
                })
                .then((response) => {
                    this.restaurants = [...response.data.users];
                    this.noResultsFound = null;
                })
                .catch((error) => {
                    console.log(error);
                    this.noResultsFound = error.response.data.message;
                    this.restaurants = [];
                });
        },
        getCategoriesAndTags() {
            axios
                .get("/api/categories")
                .then((response) => {
                    self = this;
                    self.categories = [...response.data.categories];
                    axios
                        .get("/api/tags")
                        .then((response) => {
                            self.tags = [...response.data.tags];
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        checkCheckbox(type) {
            let checked = [];
            const input = document.getElementsByClassName(type);

            for (let element of input) {
                if (element.checked) checked.push(element.value);
            }
            return checked;
        },
    },
    created() {
        this.getCategoriesAndTags();
    },
};
</script>

<style lang="scss" scoped></style>
