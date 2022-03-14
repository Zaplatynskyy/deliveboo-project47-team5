<template>
    <section class="advanced-search">
        <div class="search">
            <input
                @keypress.enter="searchRestaurants()"
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
        <ul>
            <li v-for="restaurant in restaurants" :key="restaurant.id">
                {{ restaurant.name }}
            </li>
        </ul>
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
        };
    },
    methods: {
        searchRestaurants() {
            let categories = this.checkCheckbox("checkboxCategories")
            let tags = this.checkCheckbox("checkboxTags")
            console.log(this.query)
            axios
                .post(`/api/restaurants/advanced`,{
                    params: {
                        categories: categories,
                        tags: tags,
                        query: this.query
                    }
                })
                .then((response) => {
                    this.restaurants = [...response.data.users];
                })
                .catch(function (error) {
                    console.log(error);
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
            console.log(input);
            console.log(type);
            for (let element of input) {
                if (element.checked) checked.push(element.value);
            }
            return checked;
        },
    },
    created() {
        if (this.$route.params.from == "category") {
            axios
                .get(`/api/categories/${this.$route.params.query}`)
                .then((response) => {
                    this.restaurants = [...response.data.categories.users];
                    this.getCategoriesAndTags();
                })
                .catch(function (error) {
                    console.log(error);
                });
        } else {
            axios
                .get(`/api/restaurants/${this.$route.params.query}`)
                .then((response) => {
                    this.restaurants = [...response.data.restaurants];
                    this.getCategoriesAndTags();
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    },
};
</script>

<style lang="scss" scoped></style>
