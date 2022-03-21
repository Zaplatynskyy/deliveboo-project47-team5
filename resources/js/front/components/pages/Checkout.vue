<template>
    <div class="container">
        <form v-if="!loading">
            <div class="form-group">
                <label for="name">Inserisci Nome *</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    v-model="form.client.name"
                    required
                />
            </div>

            <div class="form-group">
                <label for="cognome">Inserisci il cognome *</label>
                <input
                    type="text"
                    class="form-control"
                    id="cognome"
                    name="cognome"
                    v-model="form.client.cognome"
                    required
                />
            </div>

            <div class="form-group">
                <label for="email">Inserisci la mail *</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    v-model="form.client.email"
                    required
                />
            </div>

            <div class="form-group">
                <label for="address">Indirizzo *</label>
                <input
                    type="text"
                    class="form-control"
                    id="address"
                    name="address"
                    v-model="form.client.address"
                    required
                />
            </div>
            <div class="form-group">
                <label for="telephone">Telefono *</label>
                <input
                    type="text"
                    class="form-control"
                    id="telephone"
                    name="telephone"
                    v-model="form.client.telephone"
                    required
                />
            </div>

            <v-braintree
                v-if="loaded"
                locale="it_IT"
                :authorization="tokenGenerated"
                @success="onSuccess"
                @error="onError"
            >
                <template #button="slotProps">
                    <div ref="paymentBtnRef" @click="slotProps.submit" />
                </template>
            </v-braintree>
            <div v-else>
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

            <button type="button" class="btn btn-primary" @click="beforeBuy()">
                Submit
            </button>
        </form>
        <div v-else class="loading-payment">
            <h4>Pagamento in corso...</h4>
            <div class="lds-circle"><div></div></div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Checkout",
    data() {
        return {
            tokenGenerated: "",
            loaded: false,
            loading: null,
            foods: [],
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
        };
    },
    methods: {
        redirect() {
            this.$router.push({
                name: "success",
            });
        },

        beforeBuy() {
            this.$refs.paymentBtnRef.click();
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
                    console.log(response);
                    self.clearCart();
                    self.redirect();
                })
                .catch(function (error) {
                    console.log(error); // <------------- errori validazione
                });
        },
        onError(error) {
            let message = error.message;
            // Whoops, an error has occured while trying to get the nonce
        },

        clearCart() {
            this.foods = [];
            localStorage.removeItem("foods");
        },
    },

    created() {
        this.foods = JSON.parse(localStorage.getItem("foods"));
        this.foods.forEach((element) => {
            this.form.foods.push({
                id: element.id,
                quantity: element.quantity,
            });
        });
        axios
            .get("/api/orders/generate")
            .then((response) => {
                console.log(response);
                this.tokenGenerated = response.data.token;
                this.loaded = true;
            })
            .catch(function (error) {
                console.log(error);
            });
    },
};
</script>

<style lang="scss" scoped>

.loading-payment {
    display: flex;
    align-items: center;
}


.lds-roller {
    display: inline-block;
    position: relative;
    width: 80px;
    height: 80px;
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
</style>
