<template>
    <div class="restaurant">
        <MainRestaurantCard :restaurant="restaurant" />
        <div v-if="restaurant.foods" class="menu my_container_fluid">
            <div class="types">
                <div v-for="type in getTypes" :key="type.id" class="type">
                    <h3>{{ type }}</h3>
                    <div class="foods row row-cols-2 row-cols-md-3">
                        <FoodCard
                            v-for="food in filteredFoods(type)"
                            :key="food.id"
                            style="max-width: 540px"
                            :food="food"
                        />
                    </div>
                </div>
            </div>
            <div class="cart-wrapper">
                <div v-if="restaurant.id" class="cart">
                    <div v-if="foods.length" class="cart-info">
                        <div v-if="foods[0].user_id != restaurant.id">
                            {{ cartName }}
                        </div>
                        <div v-for="food in foods" :key="food.id">
                            <span>- {{ food.name }}</span>
                            <span>- {{ food.price }}€</span>
                            <span class="ms-3">x{{ food.quantity }}</span>
                            <strong class="mx-3" @click="addToCart(food)"
                                >+</strong
                            >
                            <strong @click="removeToCart(food)">-</strong>
                        </div>
                        <div>Totale: {{ getTotal }}€</div>
                    </div>
                    <div v-else class="mb-3">Carrello vuoto</div>
                    <button @click="clearCart()" class="btn btn-light">
                        Svuota carrello
                    </button>
                    <button
                        class="btn btn-light"
                        @click="checkout()"
                        :disabled="!validatePrice"
                    >
                        Procedi al pagamento
                    </button>
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
                    localStorage.setItem("restaurant", this.restaurant.name);
                }
            } else {
                localStorage.setItem("restaurant", this.restaurant.name);
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
            this.cartName = localStorage.getItem("restaurant");
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

            if (this.restaurant.shipping) {
                total += this.restaurant.shipping;
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
    padding: 40px 0;
    .menu {
        display: flex;
        align-items: flex-start;
        .food-image {
            width: 100%;
        }

        .types {
            width: 70%;

            .type {
                margin-bottom: 20px;
                h3 {
                    margin-bottom: 15px;
                }
            }
        }

        .cart-wrapper {
            width: 30%;
            padding-left: 30px;
            .cart {
                
                padding: 20px;
                background-color: lightgray;
                border: 1px solid black;
                border-radius: 8px;
                user-select: none;

                .cart-info {
                    > div {
                        margin-bottom: 10px;
                    }
                }

                strong {
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    width: 20px;
                    height: 20px;
                    font-size: 1.1rem;
                    border-radius: 50%;
                    background-color: white;
                    cursor: pointer;
                }
            }
        }
    }
}
</style>
