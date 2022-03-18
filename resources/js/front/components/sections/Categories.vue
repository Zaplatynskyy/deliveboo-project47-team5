<template>
    <div class="row row-cols-3 my-2">
        <CategoryCard
            v-for="category in categories"
            :key="category.id"
            :category="category"
        />
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

<style lang="scss" scoped></style>
