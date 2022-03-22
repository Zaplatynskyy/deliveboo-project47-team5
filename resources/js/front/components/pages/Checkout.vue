<template>
  <div class="_my_container">
    <form v-if="!loading">
      <div class="container">
        <div class="wrapper">
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
            <div
              v-show="!validation.name.success"
              id="input_name"
              class="error_js"
            >
              {{ validation.name.message }}
            </div>
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
            <div
              v-show="!validation.cognome.success"
              id="input_surname"
              class="error_js"
            >
              {{ validation.cognome.message }}
            </div>
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
            <div
              v-show="!validation.email.success"
              id="input_email"
              class="error_js"
            >
              {{ validation.email.message }}
            </div>
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
              :class="{ input_error_js: !validation.telephone.success }"
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
      </div>
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
        this.validation.cognome.message = "Il cognome non può essere vuoto";
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
        this.validation.address.message = "L'indirizzo non può essere vuoto";
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
        this.validation.telephone.message = "Inserire il numero di telefono";
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
._my_container {
  background-image: url("/storage/uploads/wave.svg");
  background-repeat: no-repeat;
}

.wrapper {
  background-color: white;
  padding: 10px 20px;
  border-radius: 10px;
}
form {
  display: flex;
  padding-top: 40px;
  .form-group {
    display: flex;
    flex-direction: column;
    margin: 15px 0;

    input {
      border-radius: 5px;
      padding: 10px;
      margin: 5px 0;
      border: 1px solid var(--dark-grey);
    }
  }
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


