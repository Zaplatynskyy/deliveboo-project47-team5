<template>
    <div class="col">
        <div class="category-card" @click="categorySearch(category.slug)">
            <div class="image">
                <img :src="`/storage/${category.image}`" :alt="category.name" />
            </div>
            <div class="name" :class="{ active: checked }">
                {{ category.name }}
            </div>
        </div>

        <input
            class="form-check-input checkboxCategories"
            type="checkbox"
            :id="category.slug"
            :value="category.id"
            ref="inputCategory"
            hidden
        />
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
            checked: false,
        };
    },
    methods: {
        
        searchRestaurants() {
            let categories = this.checkCheckbox("checkboxCategories");
            let tags = this.checkCheckbox("checkboxTags");

            if (dataShared.query == "" && !categories.length && !tags.length) {
                return "";
            }

            axios
                .post(`/api/restaurants/advanced`, {
                    params: {
                        categories: categories,
                        tags: tags,
                        query: dataShared.query,
                        order: dataShared.order,
                    },
                })
                .then((response) => {
                    console.log(response.data);
                    dataShared.restaurants = [...response.data.users];
                    dataShared.noResultsFound = null;
                })
                .catch((error) => {
                    console.log(error);
                    dataShared.noResultsFound = error.response.data.message;
                    dataShared.restaurants = [];
                })
                .then(function () {
                    dataShared.lastQuery = dataShared.query;
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
        categorySearch(slug) {
            this.$refs.inputCategory.click();
            this.checked = !this.checked;
            this.searchRestaurants();
            dataShared.lastQuery = "";
        },
    },
};
</script>

<style lang="scss" scoped>
.category-card {
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    margin-bottom: 1.775rem;
    transition: 0.15s;
    overflow: hidden;
    cursor: pointer;
    background-color: var(--white);

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

        &.active {
            background-color: #3eccbc;
            color: white;
        }
    }
}
</style>
