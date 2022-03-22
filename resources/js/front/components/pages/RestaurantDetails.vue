<template>
    <div class="restaurant">
        <MainRestaurantCard :restaurant="restaurant" />
        <div v-if="restaurant.foods" class="menu my_container_fluid">
            <div class="types">
                <div v-for="type in getTypes" :key="type.id" class="type">
                    <h3>{{ type }}</h3>
                    <div class="foods">
                        <FoodCard
                            @addCart="addToCart(food)"
                            @removeCart="removeToCart(food)"
                            v-for="food in filteredFoods(type)"
                            :key="food.id"
                            :food="food"
                        />
                    </div>
                </div>
            </div>
            <div class="cart-wrapper d-none d-lg-block">
                <div v-if="restaurant.id" class="cart">
                    <div v-if="foods.length" class="cart-info">
                        <div class="info-top">
                            <h4>Il tuo ordine</h4>
                            <div
                                v-if="foods[0].user_id != restaurant.id"
                                class="restaurant-name"
                            >
                                <div>
                                    Stai ordinando da "{{ cartName.name }}"
                                </div>
                            </div>
                            <div
                                v-for="food in foods"
                                :key="food.id"
                                class="food-info"
                            >
                                <div class="left">
                                    <span> {{ food.name }}</span>
                                </div>
                                <div class="right">
                                    <span
                                        @click="removeToCart(food)"
                                        class="button"
                                        >-</span
                                    >
                                    <span>{{ food.quantity }}</span>
                                    <span
                                        @click="addToCart(food)"
                                        class="button"
                                        >+</span
                                    >
                                    <span class="price">
                                        {{ food.price }}€</span
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="info-bottom">
                            <div>
                                <div>Spese di consegna</div>
                                <div class="shipping" v-if="cartName.shipping">
                                    {{ cartName.shipping }}€
                                </div>
                                <div class="shipping" v-else>
                                    Consegna gratuita
                                </div>
                            </div>
                            <div class="total">
                                <div>Totale</div>
                                <div>{{ getTotal }}€</div>
                            </div>
                        </div>
                        <div class="cart-buttons">
                            <button
                                :class="{ not_validated: !validatePrice }"
                                class="checkout btn btn-light"
                                @click="checkout()"
                                :disabled="!validatePrice"
                            >
                                Procedi al pagamento
                            </button>
                            <div @click="clearCart()">
                                <i class="fa-solid fa-trash-can"></i>
                            </div>
                        </div>
                    </div>

                    <div v-else>Carrello vuoto</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import MainRestaurantCard from "../commons/MainRestaurantCard.vue";
import FoodCard from "../commons/FoodCard.vue";

export default {
    name: "RestaurantDetails",
    components: {
        MainRestaurantCard,
        FoodCard,
    },
    data() {
        return {
            restaurant: {},
            foods: [],
            prevRoute: null,
            validatePrice: null,
            cartName: null,
        };
    },
    methods: {
        filteredFoods(type) {
            let filteredFoods = this.restaurant.foods.filter((element) => {
                return element.type.name == type;
            });
            return filteredFoods;
        },
        sortAndMap(arr) {
            const copy = arr.slice();
            const sorter = (a, b) => {
                return a["id"] - b["id"];
            };
            copy.sort(sorter);
            const res = copy.map(({ name, id }) => {
                return name;
            });
            return res;
        },
        addToCart(food) {
            if (this.foods.length) {
                if (food.user_id != this.foods[0].user_id) {
                    this.clearCart();
                    localStorage.setItem(
                        "restaurant",
                        JSON.stringify(this.restaurant)
                    );
                    this.cartName = this.restaurant;
                }
            } else {
                localStorage.setItem(
                    "restaurant",
                    JSON.stringify(this.restaurant)
                );
                this.cartName = this.restaurant;
            }
            let index = this.foods.findIndex((element) => {
                return element.id == food.id;
            });
            if (index == -1) {
                food.quantity = 1;
                this.foods.push(food);
            } else {
                this.foods[index].quantity++;
            }
            localStorage.setItem("foods", JSON.stringify(this.foods));
        },
        removeToCart(food) {
            let index = this.foods.findIndex((element) => {
                return element.id == food.id;
            });
            if (this.foods[index].quantity == 1) {
                if (index >= 0) this.foods.splice(index, 1);
            } else if (this.foods[index].quantity > 1) {
                this.foods[index].quantity--;
            }
            localStorage.setItem("foods", JSON.stringify(this.foods));
        },
        clearCart() {
            this.foods = [];
            localStorage.removeItem("foods");
            localStorage.removeItem("restaurant");
        },
        checkout() {
            if (this.validatePrice) {
                this.$router.push({
                    name: "checkout",
                });
            }
        },
    },
    beforeRouteEnter(to, from, next) {
        next((app) => {
            app.prevRoute = from;
        });
    },
    created() {
        if (localStorage.getItem("foods")) {
            this.foods = JSON.parse(localStorage.getItem("foods"));
            this.cartName = JSON.parse(localStorage.getItem("restaurant"));
        }
        axios
            .get(`/api/restaurants/details/${this.$route.params.slug}`)
            .then((response) => {
                response.data.user.foods.forEach((element) => {
                    element.quantity = 0;
                });
                this.restaurant = response.data.user;
            })
            .catch(function (error) {
                console.log(error);
            });
    },
    computed: {
        getTypes() {
            let typeNames = [];
            let types = [];
            const self = this;
            self.restaurant.foods.forEach((element) => {
                if (!typeNames.includes(element.type.name)) {
                    typeNames.push(element.type.name);
                    types.push({
                        name: element.type.name,
                        id: element.type.id,
                    });
                }
            });
            return this.sortAndMap(types);
        },
        getTotal() {
            let total = 0;

            if (this.cartName.shipping) {
                total += this.cartName.shipping;
            }

            this.foods.forEach((food) => {
                total += food.price * food.quantity;
            });
            total >= this.restaurant.min_price
                ? (this.validatePrice = true)
                : (this.validatePrice = false);
            return total;
        },
    },
};
</script>

<style lang="scss" scoped>
.restaurant {
    .menu {
        display: flex;
        align-items: flex-start;
        padding: 60px 0;
        .food-image {
            width: 100%;
        }

        .types {
            width: 100%;

            @media (min-width: 992px) {
                width: 70%;
            }

            .type {
                margin-bottom: 20px;
                h3 {
                    font-size: 40px;
                    margin-bottom: 15px;
                }
            }

            .foods {
                display: flex;
                flex-wrap: wrap;
            }
        }

        .cart-wrapper {
            width: 30%;
            padding-left: 30px;
            position: sticky;
            top: 100px;
            margin-top: 20px;
            .cart {
                padding: 20px;
                background-color: var(--white);
                border-radius: 10px;
                box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
                user-select: none;
                font-size: 15px;

                @media (min-width: 1200px) {
                    font-size: 16px;
                }

                .cart-buttons {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;

                    button {
                        padding: 8px 10px;
                        font-size: 15px;
                        background: white;
                        &.checkout {
                            background-color: var(--main-color);
                            color: var(--white);

                            &.not_validated {
                                cursor: initial;
                                background-color: #c3c3c3;
                            }

                            &:not(.not_validated):hover {
                                background-color: #43b6a8;
                            }
                        }

                        @media (min-width: 1200px) {
                            padding: 12px 16px;
                            font-size: 16px;
                        }
                    }
                    svg {
                        color: red;
                        cursor: pointer;
                    }
                }

                .cart-info {
                    h4 {
                        font-size: 20px;
                        margin-bottom: 20px;
                    }

                    .info-top {
                        padding-bottom: 15px;
                        border-bottom: 1px solid #ebebeb;

                        .restaurant-name {
                            margin-bottom: 20px;
                        }
                    }

                    .info-bottom {
                        padding-top: 20px;

                        > div {
                            display: flex;
                            justify-content: space-between;
                            margin-bottom: 15px;
                        }

                        .total {
                            font-weight: 600;
                            margin-bottom: 20px;
                        }

                        .shipping {
                            text-align: right;
                            padding-left: 20px;
                        }
                    }

                    .food-info {
                        display: flex;
                        justify-content: space-between;
                        margin-bottom: 10px;

                        .right {
                            display: flex;

                            > * {
                                margin-left: 7px;
                            }

                            .price {
                                min-width: 30px;
                                text-align: right;
                            }
                        }
                    }
                }

                .button {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 16px;
                    height: 16px;
                    font-size: 16px;
                    border-radius: 50%;
                    color: var(--main-color);
                    border: 1px solid var(--main-color);
                    cursor: pointer;
                }
            }
        }
    }
}
</style>
