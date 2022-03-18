<template>
    <div class="col">
        <div class="category-card" @click="categorySearch(category.slug)">
            <div class="image">
                <img :src="`/storage/${category.image}`" :alt="category.name" />
            </div>
            <div class="name">{{ category.name }}</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CategoryCard",
    props: {
        category: Object,
    },
    methods: {
        categorySearch(slug) {
            console.log(slug);
            axios
                .get(`/api/categories/${slug}`)
                .then((response) => {
                    this.restaurants = [...response.data.categories.users];
                    this.searchOn = true;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
};
</script>

<style lang="scss" scoped>
.category-card {
    border-radius: 10px;
    border: 1px solid black;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    padding: 0;
    .image {
        img {
            width: 100%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
    }
}
</style>
