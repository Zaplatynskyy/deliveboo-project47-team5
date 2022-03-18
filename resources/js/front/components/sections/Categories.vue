<template>
    <div class="d-flex flex-wrap justify-content-center">
        <CategoryCard
            class="categories m-3"
            v-for="category in categories"
            :key="category.id"
            @click="categorySearch(category.slug)"
        />
    </div>
</template>

<script>
import CategoryCard from '../commons/CategoryCard.vue'

export default {
    name: "Categories",
    components: {
        CategoryCard
    }, 
    props: {
        categories: Array
    }
};
</script>

<style lang="scss" scoped></style>
