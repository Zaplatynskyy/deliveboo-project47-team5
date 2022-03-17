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

            <button type="button" class="btn btn-primary" @click="beforeBuy()">
                Submit
            </button>
        </form>
        <div v-else>Loading...</div>
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

<style></style>
