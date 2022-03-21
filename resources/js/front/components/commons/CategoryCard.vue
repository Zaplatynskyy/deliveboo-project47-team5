<template>
    <div class="col">
        <div class="category-card" @click="categorySearch(category.slug)">
            <div class="image">
                <img :src="`/storage/${category.image}`" :alt="category.name" />
            </div>
            <div class="name" :class = "{active : checked}">{{ category.name }}</div>
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
            checked : false
        };
    },
    methods: {
        categorySearch(slug) {
            this.$refs.inputCategory.click();
            this.checked = !this.checked;

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
    overflow: hidden;
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
        
        &.active {
            background-color: #3eccbc;
            color: white;
        }
    }
}
</style>
