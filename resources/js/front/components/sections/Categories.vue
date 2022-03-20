<template>
    <div class="my_container">
        <h2>Ordina subito il tuo cibo preferito</h2>
        <div
            class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-6 my-2"
        >
            <CategoryCard
                v-for="category in categories"
                :key="category.id"
                :category="category"
            />
        </div>
    </div>
</template>

<script>
import CategoryCard from "../commons/CategoryCard.vue";

export default {
    name: "Categories",
    components: {
        CategoryCard,
    },
    props: {
        categories: Array,
    },
};
</script>

<style lang="scss" scoped>
.my_container {
    h2 {
        color: var(--main-color);
        margin: 1.35rem 0;
        text-align: center;

        @media screen and (min-width: 576px) {
            text-align: left;
        }
    }
}
</style>
