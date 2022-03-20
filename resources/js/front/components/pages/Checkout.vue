<template>
    <div class="container">
        <form v-if="!loading">
            <div class="form-group">
                <label for="name">Inserisci Nome *</label>
                <input
                    type="text"
                    class="form-control"
                    :class="{ input_error_js: !validation.name.success }"
                    id="name"
                    name="name"
                    v-model="form.client.name"
                    required
                />
                <div v-show="!validation.name.success" id="input_name" class="error_js">{{validation.name.message}}</div>
            </div>

            <div class="form-group">
                <label for="cognome">Inserisci il cognome *</label>
                <input
                    type="text"
                    class="form-control"
                    :class="{ input_error_js: !validation.cognome.success }"
                    id="cognome"
                    name="cognome"
                    v-model="form.client.cognome"
                    required
                />
                <div v-show="!validation.cognome.success" id="input_surname" class="error_js">{{validation.cognome.message}}</div>
            </div>

            <div class="form-group">
                <label for="email">Inserisci la mail *</label>
                <input
                    type="email"
                    class="form-control"
                    :class="{ input_error_js: !validation.email.success }"
                    id="email"
                    name="email"
                    v-model="form.client.email"
                    required
                />
                <div v-show="!validation.email.success" id="input_email" class="error_js">{{validation.email.message}}</div>
            </div>

            <div class="form-group">
                <label for="address">Indirizzo *</label>
                <input
                    type="text"
                    class="form-control"
                    :class="{ input_error_js: !validation.address.success }"
                    id="address"
                    name="address"
                    v-model="form.client.address"
                    required
                />
                <div v-show="!validation.address.success" id="input_address" class="error_js">{{validation.address.message}}</div>
            </div>
            <div class="form-group">
                <label for="telephone">Telefono *</label>
                <input
                    type="text"
                    class="form-control"
                    :class="{ input_error_js: !validation.telephone.success }"
                    id="telephone"
                    name="telephone"
                    v-model="form.client.telephone"
                    required
                />
                <div v-show="!validation.telephone.success" id="input_telephone" class="error_js">{{validation.telephone.message}}</div>
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
            validation: {
                name : {
                    success : true,
                    message : ''
                },
                cognome : {
                    success : true,
                    message : ''
                },
                email : {
                    success : true,
                    message : ''
                },
                address : {
                    success : true,
                    message : ''
                },
                telephone : {
                    success : true,
                    message : ''
                }
            }
        };
    },
    methods: {
        
        redirect() {
            this.$router.push({
                name: "success",
            });
        },

        beforeBuy() {
            this.validationFormJs();

            if(this.isValidate()) {
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

        validationFormJs() {
            // validazione nome
            if( this.form.client.name == '') {
                this.validation.name.success = false;
                this.validation.name.message = 'Il nome non può essere vuoto'

            } else if( this.form.client.name.length > 100 ) {
                this.validation.name.success = false;
                this.validation.name.message = 'Il nome non può superare i 100 caratteri'

            } else {
                this.validation.name.success = true;
                this.validation.name.message = ''

            }

            // validazione cognome
            if( this.form.client.cognome == '') {

                this.validation.cognome.success = false;
                this.validation.cognome.message = 'Il cognome non può essere vuoto'
            } else if( this.form.client.cognome.length > 100 ) {
                this.validation.cognome.success = false;
                this.validation.cognome.message = 'Il cognome non può superare i 100 caratteri'

            } else {
                this.validation.cognome.success = true;
                this.validation.cognome.message = ''
            }

            // validazione email
            if( this.form.client.email == '' ) {
                this.validation.email.success = false;
                this.validation.email.message = 'La mail non può essere vuota'

            } else if( this.form.client.email.length > 255 ) {
                this.validation.email.success = false;
                this.validation.email.message = 'La mail non può superare i 255 caratteri'

            } else if (!this.form.client.email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
                this.validation.email.success = false;
                this.validation.email.message = 'Formato della mail non valido'

            } else {
                this.validation.email.success = true;
                this.validation.email.message = ''
            }

            //validazione indirizzo
            if( this.form.client.address == '') {
                this.validation.address.success = false;
                this.validation.address.message = 'L\'indirizzo non può essere vuoto'

            } else if( this.form.client.address.length > 255 ) {
                this.validation.address.success = false;
                this.validation.address.message = 'L\'indirizzo non può superare i 255 caratteri'

            } else {
                this.validation.address.success = true;
                this.validation.address.message = ''
            }

            // validazione telefono
            if( this.form.client.telephone == '' ) {
                this.validation.telephone.success = false;
                this.validation.telephone.message = 'Inserire il numero di telefono'

            } else if( isNaN(this.form.client.telephone) ) {
                this.validation.telephone.success = false;
                this.validation.telephone.message = 'Il telefono deve essere composto da numeri'

            } else if( this.form.client.telephone.length < 8 || this.form.client.telephone.length > 11) {
                this.validation.telephone.success = false;
                this.validation.telephone.message = 'Il telefono deve essere compreso tra gli 8 e gli 11 caratteri'

            } else {
                this.validation.telephone.success = true;
                this.validation.telephone.message = ''
            }

        },

        isValidate() {
            for (const key in this.validation) {
                if (!this.validation[key].success) {
                    return false
                } 
            } 

            return true
        }
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

form {
    .form-group {
        display: flex;
        flex-direction: column;
        margin: 10px 0;

        input {
            border-radius: 5px;
            padding: 10px;
            margin: 5px 0;
        }
    }
}

</style>
