<template>
    <div class="restaurant">

        <div class="modal-overlay d-lg-none" :class="{ display_none : cartOff }"></div>

        <MainRestaurantCard :restaurant="restaurant" />
        <div v-if="restaurant.foods" class="menu my_container_fluid">
            <div class="types">
                <div v-for="type in getTypes" :key="type.id" class="type">
                    <h3>{{ type }}</h3>
                    <div class="foods">
                        <FoodCard
                            @addCart="confirmAddToCart(food)"
                            @removeCart="removeToCart(food)"
                            v-for="food in filteredFoods(type)"
                            :key="food.id"
                            :food="food"
                            :restaurant="cartName"
                        />
                    </div>
                </div>
            </div>
            <div class="cart-wrapper d-lg-block" :class="{ display_none : cartOff }">
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
                            <div class="trash" @click="toggleModalClear()">
                                <i class="fa-solid fa-trash-can"></i>
                            </div>
                        </div>
                    </div>

                    <div v-else class="empty_trash">

                        <div class="shopping_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M171.7 191.1H404.3L322.7 35.07C316.6 23.31 321.2 8.821 332.9 2.706C344.7-3.409 359.2 1.167 365.3 12.93L458.4 191.1H544C561.7 191.1 576 206.3 576 223.1C576 241.7 561.7 255.1 544 255.1L492.1 463.5C484.1 492 459.4 512 430 512H145.1C116.6 512 91 492 83.88 463.5L32 255.1C14.33 255.1 0 241.7 0 223.1C0 206.3 14.33 191.1 32 191.1H117.6L210.7 12.93C216.8 1.167 231.3-3.409 243.1 2.706C254.8 8.821 259.4 23.31 253.3 35.07L171.7 191.1zM191.1 303.1C191.1 295.1 184.8 287.1 175.1 287.1C167.2 287.1 159.1 295.1 159.1 303.1V399.1C159.1 408.8 167.2 415.1 175.1 415.1C184.8 415.1 191.1 408.8 191.1 399.1V303.1zM271.1 303.1V399.1C271.1 408.8 279.2 415.1 287.1 415.1C296.8 415.1 304 408.8 304 399.1V303.1C304 295.1 296.8 287.1 287.1 287.1C279.2 287.1 271.1 295.1 271.1 303.1zM416 303.1C416 295.1 408.8 287.1 400 287.1C391.2 287.1 384 295.1 384 303.1V399.1C384 408.8 391.2 415.1 400 415.1C408.8 415.1 416 408.8 416 399.1V303.1z" style="fill: #c2c4c4;"/></svg>
                        </div>

                        <div class="message">
                            Il carrello è vuoto
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <ClearCartModal
            v-if="modalClear"
            @clearCart="clearCart(); toggleModalClear();"
            @closeModal="toggleModalClear()"
        />
        <NewCartModal
            v-if="modalNew"
            @clearCart="doModal(selectedFood)"
            @closeModal="toggleModalNew()"
            :restaurant="restaurant"
            :cartName="cartName"
        />

        <div class="btn_cart" @click="cartOff = !cartOff">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M171.7 191.1H404.3L322.7 35.07C316.6 23.31 321.2 8.821 332.9 2.706C344.7-3.409 359.2 1.167 365.3 12.93L458.4 191.1H544C561.7 191.1 576 206.3 576 223.1C576 241.7 561.7 255.1 544 255.1L492.1 463.5C484.1 492 459.4 512 430 512H145.1C116.6 512 91 492 83.88 463.5L32 255.1C14.33 255.1 0 241.7 0 223.1C0 206.3 14.33 191.1 32 191.1H117.6L210.7 12.93C216.8 1.167 231.3-3.409 243.1 2.706C254.8 8.821 259.4 23.31 253.3 35.07L171.7 191.1zM191.1 303.1C191.1 295.1 184.8 287.1 175.1 287.1C167.2 287.1 159.1 295.1 159.1 303.1V399.1C159.1 408.8 167.2 415.1 175.1 415.1C184.8 415.1 191.1 408.8 191.1 399.1V303.1zM271.1 303.1V399.1C271.1 408.8 279.2 415.1 287.1 415.1C296.8 415.1 304 408.8 304 399.1V303.1C304 295.1 296.8 287.1 287.1 287.1C279.2 287.1 271.1 295.1 271.1 303.1zM416 303.1C416 295.1 408.8 287.1 400 287.1C391.2 287.1 384 295.1 384 303.1V399.1C384 408.8 391.2 415.1 400 415.1C408.8 415.1 416 408.8 416 399.1V303.1z" style="fill: #3ECCBC;"/></svg>
        </div>
    </div>
</template>

<script>
import MainRestaurantCard from "../commons/MainRestaurantCard.vue";
import FoodCard from "../commons/FoodCard.vue";
import ClearCartModal from "../commons/ClearCartModal.vue";
import NewCartModal from "../commons/NewCartModal.vue";

export default {
    name: "RestaurantDetails",
    components: {
        MainRestaurantCard,
        FoodCard,
        ClearCartModal,
        NewCartModal,
    },
    data() {
        return {
            restaurant: {},
            foods: [],
            prevRoute: null,
            validatePrice: null,
            cartName: 'c',
            modalClear: false,
            modalNew: false,
            selectedFood: {},
            cartOff : true
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
        toggleModalClear() {
            this.modalClear = !this.modalClear;
        },
        toggleModalNew() {
            this.modalNew = !this.modalNew;
        },
        doModal() {
            this.clearCart();
            localStorage.setItem("restaurant", JSON.stringify(this.restaurant));
            this.cartName = this.restaurant;
            this.selectedFood.quantity = 1;
            this.foods.push(this.selectedFood);
            localStorage.setItem("foods", JSON.stringify(this.foods));
            this.toggleModalNew();
        },
        confirmAddToCart(food) {
            if (this.foods.length) {
                if (food.user_id != this.foods[0].user_id) {
                    this.toggleModalNew();
                    this.selectedFood = food;
                } else {
                    this.addToCart(food);
                }
            } else {
                this.addToCart(food);
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

.modal-overlay {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 100;
    background-color: #0000007c;

    &.display_none {
        display: none;
    }
}

.restaurant {
    position: relative;
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
            // width: 30%;
            // padding-left: 30px;
            // position: sticky;
            // top: 100px;
            // margin-top: 20px;

            position: fixed;
            right: 20px;
            left: 20px;
            bottom: 80px;
            z-index: 999;

            &.display_none {
                display: none;
            }

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

                            &:active {
                                transform: scale(0.97);                                    
                            }

                            &.not_validated {
                                cursor: no-drop;
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

                    .trash {

                        &:hover {
                            transform: scale(1.5);
                        }

                        &:active {
                            transform: none
                        }

                        svg {
                            color: red;
                            cursor: pointer;
                        }

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

                .empty_trash {

                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                    padding: 60px;
                    
                    .shopping_icon {
                        width: 15%;
                        margin-bottom: 10px;
                    }
    
                    .message {
                        color : #c2c4c4;
                    }
                }
            }
        }
    }

    .btn_cart {
        width: 50px;
        background-color: white;
        border: 1px solid var(--main-color);
        border-radius: 10px;
        padding: 10px;
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 999;
        cursor: pointer;

        &:hover {
            box-shadow: 0px 0px 1px 2px #B2F0EB;
        }

        &:active {
            transform: scale(.95);
        }
    }
}

@media screen and (min-width: 992px) {
    .restaurant {

        .menu {
            .cart-wrapper {
                width: 30%;
                padding-left: 30px;
                position: sticky;
                top: 100px;
                margin-top: 20px;
                z-index: 90;
            }
        }

        .btn_cart {
            display: none !important;
        }
    }
}

</style>
