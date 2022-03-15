<template>
    <div class="restaurant">
        <div class="name">
            {{ restaurant.name }}
        </div>
        <div class="address">
            {{ restaurant.address }}
        </div>
        <div class="telephone">
            {{ restaurant.telephone }}
        </div>
        <div v-if="restaurant.shipping" class="shipping">
            {{ restaurant.shipping }}€
        </div>
        <div v-if="restaurant.min_price" class="min_price">
            {{ restaurant.min_price }}€
        </div>
        <div class="image my-4">
            <img
                class="w-25"
                :src="`/storage/${restaurant.image}`"
                :alt="restaurant.name"
            />
        </div>
        <div v-if="restaurant.foods" class="menu">
            <div v-for="type in getTypes" :key="type.id" class="type">
                <h3>{{ type }}</h3>
                <div
                    v-for="food in filteredFoods(type)"
                    :key="food.id"
                    class="card mb-3"
                    style="max-width: 540px"
                >
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img
                                class="w-100"
                                :src="`/storage/${food.image}`"
                                :alt="food.name"
                            />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ food.name }}</h5>
                                <p class="card-text">
                                    {{ food.ingredients }}
                                </p>
                                <p>
                                    <span
                                        v-for="tag in food.tags"
                                        :key="tag.id"
                                        class="mr-1"
                                        >{{ tag.name }}</span
                                    >
                                </p>
                                <p class="card-text">
                                    <small class="text-muted"
                                        >{{ food.price }}€
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "RestaurantDetails",
    data() {
        return {
            restaurant: {},
        };
    },
    methods: {
        filteredFoods(type) {
            let filteredFoods = this.restaurant.foods.filter((element) => {
                return element.type.name == type;
            });
            console.log(filteredFoods);
            return filteredFoods;
        },
        checkTypes(type) {
            console.log(type);
            // return !typesNames.includes(type.name);
        },
        sortAndMap(arr) {
            const copy = arr.slice();
            const sorter = (a, b) => {
                return a["id"] - b["id"];
            };
            copy.sort(sorter);
            const res = copy.map(({ name, id }) => {
                return name;
            });
            return res;
        },
    },
    created() {
        axios
            .get(`/api/restaurants/details/${this.$route.params.slug}`)
            .then((response) => {
                this.restaurant = response.data.user;
            })
            .catch(function (error) {
                console.log(error);
            });
    },
    computed: {
        getTypes() {
            let types = [];
            let typesNames = [];
            const self = this;
            self.restaurant.foods.forEach((element) => {
                if (!typesNames.includes(element.type.name)) {
                    types.push(element.type);
                    typesNames.push({
                        name: element.type.name,
                        id: element.type.id,
                    });
                }
            });
            return this.sortAndMap(typesNames);
        },
    },
};
</script>

<style lang="scss" scoped></style>
