<template>
    <div class="home_results my_container">
        <div v-if="dataShared.restaurants.length > 0" class="results">
            <div class="title">
                <h2
                    v-if="
                        dataShared.restaurants.length == 1 &&
                        dataShared.lastQuery == ''
                    "
                >
                    Trovato un risultato
                </h2>
                <h2 v-else-if="dataShared.lastQuery == ''">
                    Trovati {{ dataShared.restaurants.length }} risultati
                </h2>
                <h2 v-else-if="dataShared.restaurants.length == 1">
                    Trovato un risultato per "{{ dataShared.lastQuery }}"
                </h2>
                <h2 v-else>
                    Trovati {{ dataShared.restaurants.length }} risultati per
                    "{{ dataShared.lastQuery }}"
                </h2>
                <div class="order">
                    <select name="order" id="order" v-model="dataShared.order">
                        <option
                            v-for="(orderOption, i) in dataShared.orderOptions"
                            :key="i"
                            :value="orderOption"
                        >
                            {{ orderOption }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="restaurants row row-cols-1 row-cols-md-2">
                <RestaurantCard
                    v-for="restaurant in dataShared.restaurants"
                    :key="restaurant.id"
                    :restaurant="restaurant"
                />
            </div>
        </div>
        <div v-else-if="dataShared.noResultsFound" class="no-results">
            <h2 v-if="dataShared.lastQuery == ''">Nessun risultato trovato</h2>
            <h2 v-else>Nessun risultato trovato per "{{ dataShared.lastQuery }}"</h2>
        </div>
    </div>
</template>

<script>
import RestaurantCard from "../commons/RestaurantCard.vue";
import dataShared from "../../dataShared";

export default {
    name: "Results",
    components: {
        RestaurantCard,
    },
    data() {
        return {
            dataShared,
        };
    },
};
</script>

<style lang="scss" scoped>
.results {
    padding-bottom: 70px;
    .title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        h2 {
            margin-bottom: 1.35rem;
        }
    }
}

.no-results {
    h2 {
        margin-bottom: 2.5rem;
    }
}
</style>
