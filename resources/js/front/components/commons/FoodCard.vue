<template>
    <div class="col">
        <div @click="$emit('addCart')" class="food-card">
            <div class="left">
                <div class="name">
                    {{ food.name }}
                </div>
                <div class="ingredients">
                    {{ food.ingredients }}
                </div>
                <div class="price">{{ food.price }}€</div>
            </div>
            <div class="right">
                <div class="image">
                    <img :src="`/storage/${food.image}`" :alt="food.name" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "FoodCard",
    props: {
        food: Object,
    },
};
</script>

<style lang="scss" scoped>
.food-card {
    display: flex;
    padding: 15px;
    background-color: var(--white);
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    margin-bottom: 1.775rem;
    transition: 0.15s;
    cursor: pointer;
    background-color: var(--white);
    height: 120px;

    .left {
        width: 70%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-right: 10px;

        .name {
            font-weight: 600;
        }

        .ingredients {
            font-size: 13px;
            margin: 5px 0;
            color: #606464;
        }

        .price {
            font-size: 17px;
            color: #606464;
        }
    }

    .right {
        width: 30%;
        height: 100%;

        .image {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            img {
                object-fit: cover;
                width: 100%;
                height: 80%;
            }
        }
    }
}
</style>
