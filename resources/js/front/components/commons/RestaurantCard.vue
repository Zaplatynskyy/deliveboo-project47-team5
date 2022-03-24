<template>
  <div class="col">
    <router-link
      :to="{
        name: 'restaurant-details',
        params: {
          slug: restaurant.slug,
        },
      }"
    >
      <div class="restaurant">
        <div class="left">
          <img :src="`/storage/${restaurant.image}`" :alt="restaurant.name" />
        </div>
        <div class="right">
          <div class="top">
            <div class="name">
              {{ restaurant.name }}
            </div>
          </div>
          <div class="bottom">
            <div class="tags-wrapper">
              <i class="fa-solid fa-tags"></i>
              <div class="tags">
                <div class="tag" v-for="(tag, i) in tags" :key="i">
                  {{ tag.name }}
                </div>
              </div>
            </div>
            <div class="info-wrapper">
              <i class="fa-solid fa-truck-fast"></i>
              <div class="price-info">
                <div v-if="restaurant.shipping" class="shipping">
                  Consegna {{ restaurant.shipping }}€
                </div>
                <div v-else class="shipping">Consegna gratuita</div>
              </div>
            </div>
            <div v-if="restaurant.min_price" class="min_price">
              <i class="fa-solid fa-coins"></i>

              Ordine minimo {{ restaurant.min_price }}€
            </div>
          </div>
        </div>
      </div>
    </router-link>
  </div>
</template>

<script>
export default {
  name: "RestaurantCard",
  props: {
    restaurant: Object,
  },
  computed: {
    tags() {
      const foods = this.restaurant.foods;
      let foodTags = [];
      foods.forEach((food) => {
        food.tags.forEach((tag) => {
          if (!foodTags.includes(tag)) foodTags.push(tag);
        });
      });
      return this.restaurant.categories.concat(foodTags);
    },
  },
};
</script>

<style lang="scss" scoped>
.col {
  margin: 10px 0;
}
.restaurant {
  display: flex;
  border-radius: 10px;
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  height: 100%;
  margin-bottom: 1.775rem;
  transition: 0.15s;
  cursor: pointer;
  background-color: var(--white);

  &:hover {
    box-shadow: rgba(0, 0, 0, 0.24) 0px 10px 10px;
    transform: scale(1.01);
  }

  &:active {
    transform: scale(1);
  }

  .left {
    width: 35%;
    img {
      width: 100%;
      height: 100%;
      border-top-left-radius: 10px;
      border-bottom-left-radius: 10px;
      object-fit: cover;
    }
  }

  .right {
    width: 75%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 10px;

    @media (min-width: 460px) {
      padding: 10px;
    }
    @media (min-width: 768px) {
      padding: 10px;
    }
    @media (min-width: 992px) {
      padding: 10px;
    }

    .top {
      .name {
        font-size: 18px;
        font-weight: 600;
        margin-top: 5px;

        @media (min-width: 460px) {
          font-size: 22px;
        }
        @media (min-width: 576px) {
          font-size: 19px;
        }
        @media (min-width: 768px) {
          font-size: 16px;
        }
        @media (min-width: 992px) {
          font-size: 20px;
        }
        @media (min-width: 1200px) {
          font-size: 20px;
        }
      }
    }

    .bottom {
      color: var(--dark-grey);

      font-size: 14px;

      @media (min-width: 460px) {
        font-size: 14px;
      }
      @media (min-width: 576px) {
        font-size: 14px;
      }
      @media (min-width: 768px) {
        font-size: 14px;
      }
      @media (min-width: 992px) {
        font-size: 15px;
      }
      @media (min-width: 1200px) {
        font-size: 15px;
      }

      > * {
        display: flex;
        margin-bottom: 8px;
      }

      svg {
        color: var(--main-color);
        width: 20px;
        margin-right: 6px;
      }

      .tags-wrapper {
        .tags {
          display: flex;
          flex-wrap: wrap;

          .tag:not(:last-child)::after {
            content: "\2022";
            margin-right: 4px;
          }
        }
      }

      .info-wrapper {
        .price-info {
          display: flex;
          flex-wrap: wrap;
          justify-content: space-between;
          width: calc(100% - 26px);

          .shipping {
            margin-right: 3px;
          }
        }
      }
    }

    .min_price {
      svg {
        color: var(--main-color);
      }
    }
  }
}
</style>
