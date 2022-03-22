<template>
    <div class="wrapper-card">
        <div class="main-card">
            <div class="info">
                <div>
                    <div class="top">
                        <div class="name">
                            {{ restaurant.name }}
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="tags-wrapper">
                            <i class="fa-solid fa-tags"></i>
                            <div class="tags">
                                <div
                                    class="tag"
                                    v-for="(tag, i) in tags"
                                    :key="i"
                                >
                                    {{ tag.name }}
                                </div>
                            </div>
                        </div>
                        <div class="info-wrapper">
                            <i class="fa-solid fa-truck-fast"></i>
                            <div class="price-info">
                                <div
                                    v-if="restaurant.shipping"
                                    class="shipping"
                                >
                                    Consegna {{ restaurant.shipping }}€
                                </div>
                                <div v-else class="shipping">
                                    Consegna gratuita
                                </div>
                            </div>
                        </div>
                        <div class="min_price-wrapper">
                            <i class="fa-solid fa-coins"></i>
                            <div v-if="restaurant.min_price" class="min_price">
                                Ordine minimo {{ restaurant.min_price }}€
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="image">
                <img
                    :src="`/storage/${restaurant.image}`"
                    :alt="restaurant.name"
                />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "MainRestaurantCard",
    props: {
        restaurant: Object,
    },
    computed: {
        tags() {
            if (this.restaurant.foods) {
                const foods = this.restaurant.foods;
                let foodTags = [];
                foods.forEach((food) => {
                    food.tags.forEach((tag) => {
                        if (!foodTags.includes(tag)) foodTags.push(tag);
                    });
                });
                return this.restaurant.categories.concat(foodTags);
            }
        },
    },
};
</script>

<style lang="scss" scoped>
.wrapper-card {
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    background-color: var(--white);
    .main-card {
        margin-bottom: 70px;
        padding: 0;
        transition: 0.15s;
        overflow: hidden;
        max-width: 1600px;
        margin: 0 auto;
        display: flex;
        flex-direction: column-reverse;

        @media (min-width: 768px) {
            flex-direction: row;
            justify-content: space-between;
            height: 400px;
        }

        .image {
            width: 100%;

            // @media (min-width: 992px) {
            //     width: 60%;
            // }

            img {
                width: 100%;
                height: 100%;
                object-fit: cover;

                @media (min-width: 1100px) {
                    object-fit: contain;
                }
            }
        }

        .info {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;

            @media (min-width: 768px) {
                width: 50%;
            }

            .top {
                margin: 12px 0;
                .name {
                    font-size: 30px;
                    font-weight: 600;
                    margin-top: 5px;
                    margin-bottom: 20px;

                    @media (min-width: 460px) {
                        // font-size: 28px;
                    }
                    @media (min-width: 576px) {
                        font-size: 35px;
                    }
                    @media (min-width: 768px) {
                        font-size: 40px;
                    }
                    @media (min-width: 992px) {
                        font-size: 50px;
                    }
                    @media (min-width: 1200px) {
                        font-size: 70px;
                    }
                }
            }

            .bottom {
                margin: 12px 0;
                color: var(--dark-grey);

                font-size: 14px;

                @media (min-width: 576px) {
                    font-size: 16px;
                }
                @media (min-width: 992px) {
                    font-size: 17px;
                }
                @media (min-width: 1200px) {
                    font-size: 18px;
                }

                svg {
                    color: var(--main-color);
                    width: 20px;
                    margin-right: 6px;
                }

                > * {
                    display: flex;
                    margin-bottom: 10px;
                }

                .tags-wrapper {
                    .tags {
                        display: flex;
                        flex-wrap: wrap;

                        .tag:not(:last-child)::after {
                            content: "\2022";
                            margin-right: 4px;
                        }
                    }
                }

                .info-wrapper {
                    .price-info {
                        width: calc(100% - 26px);

                        .shipping {
                            margin-right: 3px;
                        }
                    }
                }
            }
        }
    }
}
</style>
