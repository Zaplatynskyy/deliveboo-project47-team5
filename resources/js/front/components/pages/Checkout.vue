<template>
    <div class="checkout-page">
        <div class="_my_container">
            <form v-if="!loading && loaded">
                <div class="content_info_client">
                    <div class="wrapper">
                        <div class="info">
                            <div class="form-group">
                                <label for="name">Inserisci Nome *</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    :class="{
                                        input_error_js:
                                            !validation.name.success,
                                    }"
                                    id="name"
                                    name="name"
                                    v-model="form.client.name"
                                    required
                                />
                                <div
                                    v-show="!validation.name.success"
                                    id="input_name"
                                    class="error_js"
                                >
                                    {{ validation.name.message }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cognome"
                                    >Inserisci il cognome *</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    :class="{
                                        input_error_js:
                                            !validation.cognome.success,
                                    }"
                                    id="cognome"
                                    name="cognome"
                                    v-model="form.client.cognome"
                                    required
                                />
                                <div
                                    v-show="!validation.cognome.success"
                                    id="input_surname"
                                    class="error_js"
                                >
                                    {{ validation.cognome.message }}
                                </div>
                            </div>
                        </div>

                        <div class="contacts">
                            <div class="form-group">
                                <label for="address">Indirizzo *</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    :class="{
                                        input_error_js:
                                            !validation.address.success,
                                    }"
                                    id="address"
                                    name="address"
                                    v-model="form.client.address"
                                    required
                                />
                                <div
                                    v-show="!validation.address.success"
                                    id="input_address"
                                    class="error_js"
                                >
                                    {{ validation.address.message }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telephone">Telefono *</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    :class="{
                                        input_error_js:
                                            !validation.telephone.success,
                                    }"
                                    id="telephone"
                                    name="telephone"
                                    v-model="form.client.telephone"
                                    required
                                />
                                <div
                                    v-show="!validation.telephone.success"
                                    id="input_telephone"
                                    class="error_js"
                                >
                                    {{ validation.telephone.message }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Inserisci la mail *</label>
                            <input
                                type="email"
                                class="form-control"
                                :class="{
                                    input_error_js: !validation.email.success,
                                }"
                                id="email"
                                name="email"
                                v-model="form.client.email"
                                required
                            />
                            <div
                                v-show="!validation.email.success"
                                id="input_email"
                                class="error_js"
                            >
                                {{ validation.email.message }}
                            </div>
                        </div>
                    </div>
                    <div class="cart-payment">
                        <v-braintree
                            v-if="loaded"
                            locale="it_IT"
                            :authorization="tokenGenerated"
                            @success="onSuccess"
                            @error="onError"
                        >
                            <template #button="slotProps">
                                <div
                                    ref="paymentBtnRef"
                                    @click="slotProps.submit"
                                />
                            </template>
                        </v-braintree>

                        <button type="button" class="btn" @click="beforeBuy()">
                            Procedi al pagamento
                        </button>
                    </div>
                </div>

                <div class="summary_card">

                    <div class="order_restaurant_details">
                        <div class="img_restaurant">
                            <img
                                :src="`/storage/${restaurant.image}`"
                                :alt="restaurant.name"
                            />
                        </div>

                        <div class="info_restaurant">
                            <h3>{{ restaurant.name }}</h3>
                            <div class="info telephone">
                                <div class="svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z"/></svg>
                                </div>
                                {{restaurant.telephone}}
                            </div>
                            <div class="info address">
                                <div class="svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M168.3 499.2C116.1 435 0 279.4 0 192C0 85.96 85.96 0 192 0C298 0 384 85.96 384 192C384 279.4 267 435 215.7 499.2C203.4 514.5 180.6 514.5 168.3 499.2H168.3zM192 256C227.3 256 256 227.3 256 192C256 156.7 227.3 128 192 128C156.7 128 128 156.7 128 192C128 227.3 156.7 256 192 256z"/></svg>
                                </div>
                                {{restaurant.address}}
                            </div>
                        </div>
                    </div>
                    <div class="info-order">
                        <h4>Il tuo ordine</h4>
                        <ul>
                            <li v-for="food in foods" :key="food.id" class="d-flex justify-content-between">
                                <div class="name_food">
                                    <span class="food_name">{{ food.name }}</span>
                                </div>

                                <div class="price_food">
                                    <span class="food_quantity">x {{ food.quantity }}</span>
                                    <span class="food_price">{{priceFood(food.price, food.quantity)}}€</span>
                                </div>
                            </li>
                        </ul>
                        <div class="total">
                            <div class="price sub_total">
                                <span>Subtotale</span>
                                <div>{{ subTotal() }}€</div>
                            </div>
                            <div class="price shipping">
                                <span>Costo di spedizione</span>
                                <div>{{ restaurant.shipping }}€</div>
                            </div>
                            <div class="price final">
                                <span>Totale</span>
                                <div>{{ getTotal() }}€</div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            <div v-else-if="loading" class="loading-payment">
                <h4>Pagamento in corso...</h4>
                <div class="lds-circle"><div></div></div>
            </div>
            <div v-else class="loading-page">
                <div class="lds-roller">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import dataShared from "../../dataShared";


export default {
    name: "Checkout",
    name: "Success",
    data() {
        return {
            dataShared,
            tokenGenerated: "",
            loaded: false,
            loading: null,
            foods: [],
            restaurant: {},
            form: {
                tokenClient: "",
                foods: [],
                client: {
                    name: "",
                    cognome: "",
                    email: "",
                    address: "",
                    telephone: "",
                },
            },
            validation: {
                name: {
                    success: true,
                    message: "",
                },
                cognome: {
                    success: true,
                    message: "",
                },
                email: {
                    success: true,
                    message: "",
                },
                address: {
                    success: true,
                    message: "",
                },
                telephone: {
                    success: true,
                    message: "",
                },
            },
        };
    },
    methods: {
        takeInfo() {
            this.foods = JSON.parse(localStorage.getItem("foods"));
            this.restaurant = JSON.parse(localStorage.getItem("restaurant"));
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

        subTotal() {
            return this.getTotal() - this.restaurant.shipping
        },

        redirect() {
            this.$router.push({
                name: "success",
            });
        },

        beforeBuy() {
            this.validationFormJs();

            if (this.isValidate()) {
                this.$refs.paymentBtnRef.click();
            }
        },

        onSuccess(payload) {
            let nonce = payload.nonce;
            this.form.tokenClient = nonce;
            // Do something great with the nonce...+axios
            const self = this;
            this.loading = true;
            axios
                .post("/api/orders/make/payment", this.form)
                .then((response) => {
                    console.log(this.form.client);
                    this.dataShared.client = this.form.client;
                    console.log(this.dataShared.client);
                    self.clearCart();
                    self.redirect();
                })
                .catch(function (error) {});
        },
        onError(error) {
            let message = error.message;
            // Whoops, an error has occured while trying to get the nonce
        },

        clearCart() {
            this.foods = [];
        },

        validationFormJs() {
            // validazione nome
            if (this.form.client.name == "") {
                this.validation.name.success = false;
                this.validation.name.message = "Il nome non può essere vuoto";
            } else if (this.form.client.name.length > 100) {
                this.validation.name.success = false;
                this.validation.name.message =
                    "Il nome non può superare i 100 caratteri";
            } else {
                this.validation.name.success = true;
                this.validation.name.message = "";
            }

            // validazione cognome
            if (this.form.client.cognome == "") {
                this.validation.cognome.success = false;
                this.validation.cognome.message =
                    "Il cognome non può essere vuoto";
            } else if (this.form.client.cognome.length > 100) {
                this.validation.cognome.success = false;
                this.validation.cognome.message =
                    "Il cognome non può superare i 100 caratteri";
            } else {
                this.validation.cognome.success = true;
                this.validation.cognome.message = "";
            }

            // validazione email
            if (this.form.client.email == "") {
                this.validation.email.success = false;
                this.validation.email.message = "La mail non può essere vuota";
            } else if (this.form.client.email.length > 255) {
                this.validation.email.success = false;
                this.validation.email.message =
                    "La mail non può superare i 255 caratteri";
            } else if (
                !this.form.client.email.match(
                    /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
                )
            ) {
                this.validation.email.success = false;
                this.validation.email.message = "Formato della mail non valido";
            } else {
                this.validation.email.success = true;
                this.validation.email.message = "";
            }

            //validazione indirizzo
            if (this.form.client.address == "") {
                this.validation.address.success = false;
                this.validation.address.message =
                    "L'indirizzo non può essere vuoto";
            } else if (this.form.client.address.length > 255) {
                this.validation.address.success = false;
                this.validation.address.message =
                    "L'indirizzo non può superare i 255 caratteri";
            } else {
                this.validation.address.success = true;
                this.validation.address.message = "";
            }

            // validazione telefono
            if (this.form.client.telephone == "") {
                this.validation.telephone.success = false;
                this.validation.telephone.message =
                    "Inserire il numero di telefono";
            } else if (isNaN(this.form.client.telephone)) {
                this.validation.telephone.success = false;
                this.validation.telephone.message =
                    "Il telefono deve essere composto da numeri";
            } else if (
                this.form.client.telephone.length < 8 ||
                this.form.client.telephone.length > 11
            ) {
                this.validation.telephone.success = false;
                this.validation.telephone.message =
                    "Il telefono deve essere compreso tra gli 8 e gli 11 caratteri";
            } else {
                this.validation.telephone.success = true;
                this.validation.telephone.message = "";
            }
        },

        isValidate() {
            for (const key in this.validation) {
                if (!this.validation[key].success) {
                    return false;
                }
            }

            return true;
        },

        priceFood(price, quantity) {
            return price*quantity
        }
    },

    created() {
        this.takeInfo();
        this.foods.forEach((element) => {
            this.form.foods.push({
                id: element.id,
                quantity: element.quantity,
            });
        });
        dataShared.loaded = false;
        axios
            .get("/api/orders/generate")
            .then((response) => {
                this.tokenGenerated = response.data.token;
                this.loaded = true;
                dataShared.loaded = true;
            })
            .catch(function (error) {});
    },
};
</script>

<style lang="scss" scoped>
.checkout-page {
    background-image: url("/storage/uploads/wave.svg");
    background-repeat: no-repeat;
}
._my_container {
    padding: 20px 10px;

    .loading-page {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
}

.wrapper {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
form {
    padding-top: 40px;
    align-items: flex-start;
    display: flex;
    flex-direction: column-reverse;

    .content_info_client {
        margin: auto;
    }
}
.form-group {
    display: flex;
    flex-direction: column;
    margin: 10px 0;

    @media (min-width: 768px) {
        width: 45%;
    }

    input {
        border-radius: 5px;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid var(--dark-grey);
    }
}

.btn {
    background-color: var(--main-color);
    color: white;
    cursor: pointer;

    &:hover {
        background-color: #3fb9ab;
    }
}

.info {
    justify-content: space-between;

    @media (min-width: 992) {
        display: block;
    }
}

.contacts {
    justify-content: space-between;

    @media (min-width: 992) {
        display: block;
    }
}

.cart-payment {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-bottom: 30px;
}

.loading-payment {
    min-height: calc(100vh - 80px);
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

    h4 {
        font-size: 1.5rem;
    }
}

.lds-roller {
    display: inline-block;
    position: relative;
    width: 80px;
    height: 80px;

    > div::after {
        background-color: var(--main-color) !important;
    }
}
.lds-roller div {
    animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
    transform-origin: 40px 40px;
}
.lds-roller div:after {
    content: " ";
    display: block;
    position: absolute;
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #fff;
    margin: -4px 0 0 -4px;
}
.lds-roller div:nth-child(1) {
    animation-delay: -0.036s;
}
.lds-roller div:nth-child(1):after {
    top: 63px;
    left: 63px;
}
.lds-roller div:nth-child(2) {
    animation-delay: -0.072s;
}
.lds-roller div:nth-child(2):after {
    top: 68px;
    left: 56px;
}
.lds-roller div:nth-child(3) {
    animation-delay: -0.108s;
}
.lds-roller div:nth-child(3):after {
    top: 71px;
    left: 48px;
}
.lds-roller div:nth-child(4) {
    animation-delay: -0.144s;
}
.lds-roller div:nth-child(4):after {
    top: 72px;
    left: 40px;
}
.lds-roller div:nth-child(5) {
    animation-delay: -0.18s;
}
.lds-roller div:nth-child(5):after {
    top: 71px;
    left: 32px;
}
.lds-roller div:nth-child(6) {
    animation-delay: -0.216s;
}
.lds-roller div:nth-child(6):after {
    top: 68px;
    left: 24px;
}
.lds-roller div:nth-child(7) {
    animation-delay: -0.252s;
}
.lds-roller div:nth-child(7):after {
    top: 63px;
    left: 17px;
}
.lds-roller div:nth-child(8) {
    animation-delay: -0.288s;
}
.lds-roller div:nth-child(8):after {
    top: 56px;
    left: 12px;
}
@keyframes lds-roller {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
.lds-circle {
    display: inline-block;
    transform: translateZ(1px);
}
.lds-circle > div {
    display: inline-block;
    width: 64px;
    height: 64px;
    margin: 8px;
    border-radius: 50%;
    background: #fff;
    animation: lds-circle 2.4s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}
@keyframes lds-circle {
    0%,
    100% {
        animation-timing-function: cubic-bezier(0.5, 0, 1, 0.5);
    }
    0% {
        transform: rotateY(0deg);
    }
    50% {
        transform: rotateY(1800deg);
        animation-timing-function: cubic-bezier(0, 0.5, 0.5, 1);
    }
    100% {
        transform: rotateY(3600deg);
    }
}

@media (min-width: 576px) {
    ._my_container {
        width: 80%;
        margin: auto;
    }

    .info_order {
        font-size: 1.1rem;
    }
}

@media (min-width: 768px) {
    .info,
    .contacts {
        display: flex;
    }

    form {
        .form-group {
            width: 45%;
        }
    }

    ._my_container {
        width: 90%;
        margin: auto;
    }

    .wrapper {
        margin: 0;
    }

    .cart-payment {
        margin: 0;
    }

    .summary_card {
        width: 100% !important;
        max-width: 670px;
        padding: 20px;
        margin: 20px auto;
    }
}

@media (min-width: 992px) {
    .info,
    .contacts {
        display: block;
    }

    form {
        flex-direction: row !important;

        .form-group {
            width: 100%;
        }
    }

    .wrapper {
        margin: 0 20px;
    }

    .cart-payment {
        margin: 0 20px;
    }

    .summary_card {
        width: 40% !important;
    }
}

@media (min-width: 1400px) {
    .info,
    .contacts {
        display: flex;
    }

    form {
        align-items: start;

        .form-group {
            width: 45%;
            margin: 5px 0;
        }
    }

    .wrapper {
        padding: 30px 20px;
    }

    .summary_card {
        width: 40% !important;
    }
}

.summary_card {
    width: 100%;
    background-color: var(--white);
    border: 1px solid var(--dark-grey);
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 30px;


    .order_restaurant_details {
        display: flex;
        margin-bottom: 20px;

        .img_restaurant {
            width: 100px;
            margin-right: 15px;
    
            img {
                width: 100%;
            }
        }

        .info_restaurant {
            font-size: .9rem;

            h3 {
                margin-bottom: 10px;
            }

            .info {
                display: flex;
                justify-content: flex-start;
                align-items: center;
                margin-bottom: 5px;

                &.telephone {
                    color: #3fb9ab;
                }

                &.address {
                    .svg {
                        width: 10px;
                    }
                }


                .svg {
                    width: 15px;
                    display: inline-block;
                    margin-right: 10px;
                }
            }
        }
    }

    .info-order {
        h4 {
            color: #3fb9ab;
            border-bottom: 1px solid var(--dark-grey);
        }
        ul {
            margin: 10px 0;

            li {
                margin-bottom: 5px;
                .food_name {
                    font-size: 0.8rem;
                }

                .price_food {
                    display: flex;
                    justify-content: space-between;
                    width: 70px;

                    .food_quantity {
                        font-size: 0.9rem;
                    }

                    .food_price {
                        font-size: 0.9rem;
                    }
                }
            }
        }

        .total {
            border-top: 1px solid var(--dark-grey);
            margin-top: 5px;
            .price {
                font-size: .9rem;
                display: flex;
                justify-content: space-between;
                margin-top: 5px;

                &.final {
                    font-size: 1.1rem;
                }

                .sub_total > span, .final > span {
                    text-transform: uppercase;
                }
            }
        }
    }
}

a {
    color: var(--white);
}
</style>
