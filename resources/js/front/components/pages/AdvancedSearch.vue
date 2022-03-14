<template>
    <section class="advanced-search">
        <ul>
            <li v-for="restaurant in restaurants" :key="restaurant.id">{{restaurant.name}}</li>
        </ul>
    </section>
</template>

<script>
export default {
    name: "AdvancedSearch",
    data() {
        return {
            restaurants: [],
        };
    },
    created() {
        if (this.$route.params.from == "category") {
            axios
                .get(`/api/categories/${this.$route.params.query}`)
                .then((response) => {
                    this.restaurants = [...response.data.categories.users];
                })
                .catch(function (error) {
                    console.log(error);
                });
        } else {
            axios
                .get(`/api/restaurants/${this.$route.params.query}`)
                .then((response) => {
                    this.restaurants = [...response.data.restaurants];
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    },
};
</script>

<style lang="scss" scoped></style>
