<template>
    <div class="success_page d-flex align-items-center">
        <div
            class="my_container_fluid d-flex flex-column justify-content-center align-items-center"
        >
            <div class="summary_card row">

                <div class="col-12 col-lg-6">
                    <div class="order_client_details">
                        <h3>Pagamento avvenuto con successo</h3>
                        <div class="header_order">
                            <div>Grazie per aver ordinato su <span class="main_color">Deliveboo</span></div>
                            <p>Manderemo una email di conferma a <strong><span class="main_color">{{client.email}}</span></strong> con il riepilogo dell'ordine</p>
                        </div>

                        <ul>
                            <li>
                                <div class="svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM371.8 211.8C382.7 200.9 382.7 183.1 371.8 172.2C360.9 161.3 343.1 161.3 332.2 172.2L224 280.4L179.8 236.2C168.9 225.3 151.1 225.3 140.2 236.2C129.3 247.1 129.3 264.9 140.2 275.8L204.2 339.8C215.1 350.7 232.9 350.7 243.8 339.8L371.8 211.8z" style="fill : #3fb9ab"/></svg>
                                </div>
                                <div class="text"><strong>Ordine inviato</strong></div>
                            </li>
                            <li>
                                <div class="svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512zM232 256C232 264 236 271.5 242.7 275.1L338.7 339.1C349.7 347.3 364.6 344.3 371.1 333.3C379.3 322.3 376.3 307.4 365.3 300L280 243.2V120C280 106.7 269.3 96 255.1 96C242.7 96 231.1 106.7 231.1 120L232 256z"/></svg>
                                </div>
                                <div class="text">richiesta alle <span class="main_color">{{orderTime}}</span> il <span class="main_color">{{orderDate}}</span></div>
                            </li>
                            <li>
                                <div class="svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M352 48C352 21.49 373.5 0 400 0C426.5 0 448 21.49 448 48C448 74.51 426.5 96 400 96C373.5 96 352 74.51 352 48zM480 159.1C497.7 159.1 512 174.3 512 191.1C512 209.7 497.7 223.1 480 223.1H416C408.7 223.1 401.7 221.5 396 216.1L355.3 184.4L295 232.9L337.8 261.4C346.7 267.3 352 277.3 352 288V416C352 433.7 337.7 448 320 448C302.3 448 288 433.7 288 416V305.1L227.5 266.8C194.7 245.1 192.5 198.9 223.2 175.2L306.3 110.9C323.8 97.45 348.1 97.58 365.4 111.2L427.2 159.1H480zM256 384C256 454.7 198.7 512 128 512C57.31 512 0 454.7 0 384C0 313.3 57.31 256 128 256C198.7 256 256 313.3 256 384zM128 312C88.24 312 56 344.2 56 384C56 423.8 88.24 456 128 456C167.8 456 200 423.8 200 384C200 344.2 167.8 312 128 312zM640 384C640 454.7 582.7 512 512 512C441.3 512 384 454.7 384 384C384 313.3 441.3 256 512 256C582.7 256 640 313.3 640 384zM512 312C472.2 312 440 344.2 440 384C440 423.8 472.2 456 512 456C551.8 456 584 423.8 584 384C584 344.2 551.8 312 512 312z"/></svg>
                                </div>
                                <div class="text"><strong>Domicilio</strong></div>
                            </li>
                            <li>
                                <div class="svg"></div>
                                <div class="to_address">{{client.address}}</div>
                            </li>
                            <li class="justify-content-end">
                                <div class="to_address">Roma, 00176</div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="info-order col-12 offset-lg-1 col-lg-5">

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
            <button class="btn btn-main">
                <router-link
                    :to="{
                        name: 'home',
                    }"
                    >Home Page
                </router-link>
            </button>
        </div>
    </div>
</template>

<script>
import dataShared from "../../dataShared";

export default {
    name: "Success",

    data() {
        return {
            dataShared,
            foods: [],
            restaurant: {},
            client : {},
            orderTime : '',
            orderDate : ''
        };
    },

    methods: {
        clearCart() {
            const d = new Date;
            const months = ["Gen", "Feb", "Mar", "Apr", "Mag", "Giu", "Lug", "Ago", "Sett", "Ott", "Nov", "Dic"];
            this.orderTime = d.getHours()+":"+d.getMinutes();
            this.orderDate = d.getDate()+"-"+months[d.getMonth()]+"-"+d.getFullYear();

            this.foods = JSON.parse(localStorage.getItem("foods"));
            this.restaurant = JSON.parse(localStorage.getItem("restaurant"));
            this.client = dataShared.client;
            localStorageNaNpxoveItem("foods");
            localStorageNaNpxoveItem("restaurant");
            dataShared.client = {}
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

        priceFood(price, quantity) {
            return price*quantity
        }
    },

    created() {
        this.clearCart();
        dataShared.loaded = true;
    },
};
</script>

<style lang="scss" scoped>
.success_page {
    background-image: url("/storage/uploads/wave.svg");
    background-repeat: no-repeat;
    padding: 2.5rem 0;

    .image_deliveboo {
        display: flex;
        align-items: center;
        justify-content: center;

        img {
            width: 85%;
        }
    }

    .svg {
        width: .9375rem;
        display: inline-block;
        margin-right: .625rem;
    }

    .main_color {
        font-size: .9;
        color: #3fb9ab;
    }

    .summary_card {
        width: 100%;
        background-color: var(--white);
        border: .0625rem solid var(--dark-grey);
        border-radius: .625rem;
        padding: 1.25rem;
        margin-bottom: 1.875rem;

        .order_client_details {
            
            h3 {
                color: #3fb9ab;
                border-bottom: .0625rem solid var(--dark-grey);
                padding-bottom: 10px;
            }
            
            .header_order {
                border-bottom: .0625rem solid var(--dark-grey);
                padding: 15px 0;

                div {
                    font-size: .95rem;
                    font-weight: 600;
                    padding-bottom: 5px;
                }

                p {
                    font-size: .95rem;
                }
            }

            ul {
                padding: 15px 0;

                li {
                    font-size: .9rem;
                    margin: 5px 0;
                    display: flex;
                    align-items: center;
                }
            }
            
        }


        .order_restaurant_details {
            display: flex;
            margin: 1.25rem 0;


            .img_restaurant {
                width: 6.25rem;
                margin-right: .9375rem;
        
                img {
                    width: 100%;
                }
            }

            .info_restaurant {
                font-size: 14.4px;

                h3 {
                    margin-bottom: .625rem;
                }

                .info {
                    display: flex;
                    justify-content: flex-start;
                    align-items: center;
                    margin-bottom: .3125rem;

                    &.telephone {
                        color: #3fb9ab;
                    }

                    &.address {
                        .svg {
                            width: .625rem;
                        }
                    }
                }
            }
        }

        .info-order {
            h4 {
                color: #3fb9ab;
                border-bottom: .0625rem solid var(--dark-grey);
            }
            ul {
                margin: .625rem 0;

                li {
                    margin-bottom: .3125rem;
                    .food_name {
                        font-size: 12.8px;
                    }

                    .price_food {
                        display: flex;
                        justify-content: space-between;
                        width: 4.375rem;

                        .food_quantity {
                            font-size: 14.4px;
                        }

                        .food_price {
                            font-size: 14.4px;
                        }
                    }
                }
            }

            .total {
                border-top: .0625rem solid var(--dark-grey);
                margin-top: .3125rem;
                .price {
                    font-size: 14.4px;
                    display: flex;
                    justify-content: space-between;
                    margin-top: .3125rem;

                    &.final {
                        font-size: 17.6px;
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
}

@media screen and (min-width: 36rem) {
    .my_container_fluid {
        min-height: calc(100vh - 5rem);
    }
}

@media screen and (min-width: 768px) {
    .my_container_fluid {
        width: 80%;
    }
}

@media screen and (min-width: 992px) {
    .success_page {
        .summary_card {
            padding: 60px 20px;
        }
    }
}

@media screen and (min-width: 1400px) {
    .my_container_fluid {
        width: 70%;
    }
}

@media screen and (min-width: 1700px) {
    .my_container_fluid {
        width: 60%;
    }
}
</style>
