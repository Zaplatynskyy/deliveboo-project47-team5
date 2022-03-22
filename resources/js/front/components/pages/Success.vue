<template>
    <div class="success_page">
        <h1>Pagamento avvenuto con successo</h1>
        <div class="row my-5">
            <div class="col-4">
                <img src="/storage/uploads/order-bag.png" alt="order bag deliveroo">
            </div>
            <div class="col-8 d-flex align-items-center">
                <div class="summary_card d-flex justify-content-between">
                    <div class="info_order">
                        <h3>Nome Ristorante</h3>
                        <ul>
                            <li>
                                <span>Ordine 1</span>
                                <span>x4</span>
                            </li>
                            <li>
                                <span>Ordine 2</span>
                                <span>x2</span>
                            </li>
                            <li>
                                <span>Ordine 3</span>
                                <span>x5</span>
                            </li>
                        </ul>
                        <div class="total">Totale Pagato : 40€</div>
                    </div>
                    <div class="img_restaurant">
                        <img src="/storage/uploads/indian-restaurant.jpg" alt="">
                    </div>

                    <!-- <div v-for="food in foods" :key="food.id">
                        <span>- {{ food.name }}</span>
                        <span>- {{ food.price }}€</span>
                        <span class="ms-3">x{{ food.quantity }}</span>
                    </div> -->
                    <!-- <div>Totale: {{ getTotal() }}€</div> -->
                </div>
            </div>
        </div>
        <button class="btn btn-main">
            <router-link
                    :to="{
                        name: 'home'
                    }"
                    >Home Page
                </router-link>
        </button>
    </div>
</template>

<script>
export default {
    name : 'Success',

    data() {
        return {
            foods : [],
        }
    },

    methods : {
        clearCart() {
            this.foods = JSON.parse(localStorage.getItem("foods"));
            localStorage.removeItem("foods");
        },

        // getTotal() {
        //     let total = 0;

        //     if (this.restaurant.shipping) {
        //         total += this.restaurant.shipping;
        //     }

        //     this.foods.forEach((food) => {
        //         total += food.price * food.quantity;
        //     });

        //     return total;
        // }
    },

    created() {
        this.clearCart();
    }
}
</script>

<style lang="scss" scoped>
    .success_page {
        height: calc(100vh - 80px);
        background-image: url('/storage/uploads/wave.svg');
        background-repeat: no-repeat;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        
        img {
            width: 80%;
        }

        .summary_card {
            width: 100%;
            background-color: var(--white);
            border: 1px solid var(--dark-grey);
            border-radius: 5px;
            padding: 20px 10px;

            .img_restaurant {
                width: 300px;
            }

            ul {
                margin: 10px 0;
            }
        }

        a {
            color: var(--white);
        }
    }

</style>