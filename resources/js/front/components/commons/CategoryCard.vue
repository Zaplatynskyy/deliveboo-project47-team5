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
import dataShared from "../../dataShared";

export default {
    name: "CategoryCard",
    props: {
        category: Object,
    },
    data() {
        return {
            dataShared,
        };
    },
    methods: {
        categorySearch(slug) {
            axios
                .get(`/api/categories/${slug}`)
                .then((response) => {
                    dataShared.restaurants = [
                        ...response.data.categories.users,
                    ];
                    dataShared.noResultsFound = null;
                    dataShared.query = '';
                })
                .catch(function (error) {
                    console.log(error);
                })
            dataShared.lastQuery = "";
        },
    },
};
</script>

<style lang="scss" scoped>
.category-card {
    border-radius: 10px;
    border: 1px solid #686868;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    padding: 0;
    margin-bottom: 1.775rem;
    transition: 0.15s;
    cursor: pointer;

    &:hover {
        box-shadow: rgba(0, 0, 0, 0.24) 0px 10px 10px;
        transform: scale(1.01);
    }

    &:active {
        transform: scale(1);
    }

    .image {
        height: 6.875rem;
        img {
            width: 100%;
            height: 100%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            object-fit: cover;
        }
    }
    .name {
        color: var(--dark-grey);
        padding: 10px 7px;
    }
}
</style>
