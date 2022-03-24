<template>
    <div class="my_col">
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
                        "
                        v-if="!quantity"
                        class="big"
                    >
                        +
                    </div>
                    <div v-else class="littles">
                        <div
                            @click="
                                $emit('addCart');
                            "
                        >
                            +
                        </div>
                        <span v-if="quantity" class="quantity">
                            {{ quantity }}
                        </span>
                        <div
                            @click="
                                $emit('removeCart');
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
        restaurant: {
            type: Object,
            required: false
        },
        quantity: Number,
    },
    data() {
        return {
            dataShared,
        };
    },
};
</script>

<style lang="scss" scoped>
.my_col {
    width: 100%;
    margin-bottom: 1.775rem;

    @media (min-width: 620px) {
        &:nth-child(odd) {
            padding-right: 12px;
        }
        &:nth-child(even) {
            padding-left: 12px;
        }
        width: 50%;
    }
    @media (min-width: 992px) {
        padding: 0 !important;
        padding-right: 24px !important;
    }
    @media (min-width: 1400px) {
        width: calc(100% / 3);
    }
    .food-card {
        display: flex;
        padding: 15px;
        background-color: var(--white);
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        transition: 0.15s;
        background-color: var(--white);
        height: 100%;
        user-select: none;

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
                font-size: 12px;
                color: #606464;
                min-height: 40px;
                margin-bottom: 7px;
            }

            .price {
                font-size: 17px;
                color: #606464;
            }

            @media (min-width: 468px) {
                .ingredients {
                    font-size: 13px;
                }
            }
            @media (min-width: 620px) {
                .ingredients {
                    font-size: 11px;
                }
            }
            @media (min-width: 768px) {
                .ingredients {
                    font-size: 12px;
                }
            }
            @media (min-width: 1500px) {
                .ingredients {
                    font-size: 13px;
                }
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
                    object-fit: contain;
                    width: 100%;
                    height: 80%;
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
                    border: 2px solid #ebebeb;
                    border-radius: 3px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    cursor: pointer;
                    margin-left: 6px;

                    &:hover {
                        border: 2px solid #d4d4d4;
                    }

                    &:active {
                        box-shadow: 0px 0px 1px 2px #B2F0EB;
                    }
                }

                .littles {
                    height: 100%;
                    width: 30px;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    margin-left: 6px;
                    align-items: center;

                    > div {
                        cursor: pointer;
                        user-select: none;
                        width: 30px;
                        height: 30px;
                        border: 2px solid #ebebeb;
                        border-radius: 3px;
                        display: flex;
                        justify-content: center;
                        align-items: center;

                        &:hover {
                            border: 2px solid #d4d4d4;
                        }

                        &:active {
                            box-shadow: 0px 0px 1px 2px #B2F0EB;
                        }
                    }

                    .minus {
                        font-size: 22px;
                    }

                    .quantity {
                        color: var(--main-color);
                    }
                }
            }
        }
    }
}
</style>
