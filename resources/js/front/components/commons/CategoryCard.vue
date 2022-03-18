<template>
    <div class="category-card">
        <div class="name">{{ category.name }}</div>
        <div class="image">
            <img
                class="w-100"
                :src="`/storage/${category.image}`"
                :alt="category.name"
            />
        </div>
    </div>
</template>

<script>
export default {
    name: "CategoryCard",
};
</script>

<style lang="scss" scoped></style>
