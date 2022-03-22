<template>
    <div class="col">
        <div class="food-card">
            <div class="left">
                <div class="top">
                    <div class="name">
                        {{ food.name }}
                    </div>
                    <div class="ingredients">
                        {{ food.ingredients }}
                    </div>
                </div>
                <div class="bottom">
                    <div class="price">{{ food.price }}€</div>
                </div>
            </div>
            <div class="right">
                <div class="image">
                    <img :src="`/storage/${food.image}`" :alt="food.name" />
                </div>
                <div class="buttons">
                    <div
                        @click="
                            $emit('addCart');
                            checkFood();
                        "
                        v-if="!exist"
                        class="big"
                    >
                        +
                    </div>
                    <div v-else class="littles">
                        <div
                            @click="
                                $emit('addCart');
                                checkFood();
                            "
                        >
                            +
                        </div>
                        <div
                            @click="
                                $emit('removeCart');
                                checkFood();
                            "
                        >
                            -
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import dataShared from "../../dataShared";

export default {
    name: "FoodCard",
    props: {
        food: Object,
    },
    data() {
        return {
            dataShared,
            exist: null,
        };
    },
    methods: {
        checkFood() {
            let foods = JSON.parse(localStorage.getItem("foods"));
            if(!foods) return
            let check = foods.some((element) => {
                return element.id == this.food.id;
            });
            console.log(check);
            this.exist = check;
        },
    },
    mounted() {
        this.checkFood();
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
    background-color: var(--white);
    height: 120px;

    .left {
        width: 60%;
        padding-right: 10px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        .name {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .ingredients {
            font-size: 13px;
            color: #606464;
            height: 40px;
            margin-bottom: 7px;
        }

        .price {
            font-size: 17px;
            color: #606464;
        }
    }

    .right {
        width: 40%;
        height: 100%;
        display: flex;

        .image {
            width: 70%;
            display: flex;
            justify-content: center;
            align-items: center;
            img {
                object-fit: cover;
                width: 100%;
                height: 100%;
            }
        }

        .buttons {
            width: 30%;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            color: var(--main-color);

            .big {
                user-select: none;
                height: 100%;
                width: 30px;
                border: 1px solid #ebebeb;
                border-radius: 3px;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
            }

            .littles {
                height: 100%;
                width: 30px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;

                > div {
                    cursor: pointer;
                    user-select: none;
                    height: 30px;
                    border: 1px solid #ebebeb;
                    border-radius: 3px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
            }
        }
    }
}
</style>
