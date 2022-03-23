<template>
  <div class="success_page d-flex align-items-center">
    <div
      class="
        my_container_fluid
        d-flex
        flex-column
        justify-content-center
        align-items-center
      "
    >
      <h1>Pagamento avvenuto con successo</h1>
      <div class="row my-5">
        <div class="col-12 col-md-4 mb-3 image_deliveboo">
          <img src="/storage/uploads/order-bag.png" alt="order bag deliveroo" />
        </div>
        <div class="col-12 col-md-8 d-flex align-items-center">
          <div class="summary_card">
            <div class="info-order">
              <h3>{{ restaurant.name }}</h3>
              <ul>
                <li v-for="food in foods" :key="food.id">
                  <span>- {{ food.name }}</span>
                  <span>x{{ food.quantity }}</span>
                </li>
              </ul>
              <div class="total">Totale speso {{ getTotal() }}€</div>
            </div>
            <div class="img_restaurant">
              <img
                :src="`/storage/${restaurant.image}`"
                :alt="restaurant.name"
              />
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
export default {
  name: "Success",

  data() {
    return {
      foods: [],
      restaurant: {},
    };
  },

  methods: {
    clearCart() {
      this.foods = JSON.parse(localStorage.getItem("foods"));
      this.restaurant = JSON.parse(localStorage.getItem("restaurant"));
      localStorage.removeItem("foods");
      localStorage.removeItem("restaurant");
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

  created() {
    this.clearCart();
  },
};
</script>

<style lang="scss" scoped>
.success_page {
  // height: calc(100vh - 80px);
  background-image: url("/storage/uploads/wave.svg");
  background-repeat: no-repeat;
  padding: 40px 0;

  .image_deliveboo {
    display: flex;
    align-items: center;
    justify-content: center;

    img {
      width: 85%;
    }
  }

  .summary_card {
    width: 100%;
    background-color: var(--white);
    border: 1px solid var(--dark-grey);
    border-radius: 10px;
    padding: 20px;

    .info-order {
      text-align: center;
    }

    .img_restaurant {
      width: 200px;
      margin: 10px auto;

      img {
        width: 100%;
      }
    }

    ul {
      margin: 10px 0;

      li {
        font-size: 0.9rem;
      }
    }
  }

  a {
    color: var(--white);
  }
}

@media screen and (min-width: 576px) {
  .success_page {
    .summary_card {
      display: flex;
      justify-content: space-around;
      align-items: center;

      .img_restaurant {
        margin: 0;
      }
    }
  }
}

@media screen and (min-width: 576px) {
  .my_container_fluid {
    min-height: calc(100vh - 80px);
  }
}
</style>