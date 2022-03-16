<template>
    <div class="restaurant">
        <div class="name">
            {{ restaurant.name }}
        </div>
        <div class="address">
            {{ restaurant.address }}
        </div>
        <div class="telephone">
            {{ restaurant.telephone }}
        </div>
        <div v-if="restaurant.shipping" class="shipping">
            {{ restaurant.shipping }}€
        </div>
        <div v-if="restaurant.min_price" class="min_price">
            {{ restaurant.min_price }}€
        </div>
        <div class="image my-4">
            <img
                class="w-25"
                :src="`/storage/${restaurant.image}`"
                :alt="restaurant.name"
            />
        </div>
        <div v-if="restaurant.foods" class="menu">
            <div v-for="type in getTypes" :key="type.id" class="type">
                <h3>{{ type }}</h3>
                <div
                    v-for="food in filteredFoods(type)"
                    :key="food.id"
                    class="card mb-3"
                    style="max-width: 540px"
                >
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img
                                class="w-100"
                                :src="`/storage/${food.image}`"
                                :alt="food.name"
                            />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ food.name }}</h5>
                                <p class="card-text">
                                    {{ food.ingredients }}
                                </p>
                                <p>
                                    <span
                                        v-for="tag in food.tags"
                                        :key="tag.id"
                                        class="mr-1"
                                        >{{ tag.name }}</span
                                    >
                                </p>
                                <p class="card-text">
                                    <small class="text-muted"
                                        >{{ food.price }}€
                                    </small>
                                </p>
                                <button
                                    @click="addToCart(food)"
                                    type="button"
                                    class="btn btn-info"
                                >
                                    Aggiungi al carrello
                                </button>
                                <button
                                    @click="removeToCart(food)"
                                    type="button"
                                    class="btn btn-danger"
                                >
                                    Rimuovi dal carrello
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart">
            <ul>
                <li v-for="food in foods" :key="food.id">
                    <span>- {{ food.name }}</span>
                    <span>- {{ food.price }}€</span>
                    <span class="ms-3">x{{ food.quantity }}</span>
                    <strong class="mx-3" @click="addToCart(food)">+</strong>
                    <strong @click="removeToCart(food)">-</strong>
                </li>
                <li>Totale: {{ getTotal }}€</li>
            </ul>
            <button @click="clearCart()" class="btn btn-light">
                Svuota carrello
            </button>
            <button class="btn btn-light">
                <router-link
                    :to="{
                        name: 'checkout',
                    }"
                    >Procedi al pagamento
                </router-link>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "RestaurantDetails",
    data() {
        return {
            restaurant: {},
            foods: [],
            prevRoute: null,
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
    mounted() {
      if(this.prevRoute.path != '/' && this.prevRoute.path != '/restaurant/checkout') this.clearCart();
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
            return total;
        },
    },
};
</script>

<style lang="scss" scoped>
.cart {
    padding: 20px;
    background-color: lightgray;
    border: 1px solid black;
    border-radius: 8px;
    position: fixed;
    top: 50px;
    right: 50px;

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
</style>
