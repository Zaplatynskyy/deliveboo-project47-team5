<template>
  <div class="container">
    <form>
      <div class="form-group">
        <label for="name">Inserisci Nome</label>
        <input
          type="text"
          class="form-control"
          id="name"
          name="name"
          v-model="form.client.name"
        />
      </div>

      <div class="form-group">
        <label for="cognome">Inserisci il cognome</label>
        <input
          type="text"
          class="form-control"
          id="cognome"
          name="cognome"
          v-model="form.client.cognome"
        />
      </div>
      <div class="form-group">
        <label for="address">Indirizzo</label>
        <input
          type="text"
          class="form-control"
          id="address"
          name="address"
          v-model="form.client.address"
        />
      </div>
      <div class="form-group">
        <label for="telephone">Telefono</label>
        <input
          type="text"
          class="form-control"
          id="telephone"
          name="telephone"
          v-model="form.client.telephone"
        />
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <v-braintree
      v-if="loaded"
      :authorization="tokenGenerated"
      @success="onSuccess"
      @error="onError"
    ></v-braintree>
  </div>
</template>

<script>
export default {
  name: "Checkout",
  data() {
    return {
      tokenGenerated: "",
      loaded: false,
      foods: [],
      form: {
        tokenClient: "",
        foods: [],
        client: {
          name: "",
          cognome: "",
          address: "",
          telephone: "",
        },
      },
    };
  },
  methods: {
    onSuccess(payload) {
      let nonce = payload.nonce;
      this.form.tokenClient = nonce;
      // Do something great with the nonce...+axios
      axios
        .post("/api/orders/make/payment", this.form)
        .then((response) => {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    onError(error) {
      let message = error.message;
      // Whoops, an error has occured while trying to get the nonce
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

<style>
</style>