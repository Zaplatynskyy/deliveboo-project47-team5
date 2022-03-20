<template>
    <div class="home_results my_container">
        <div v-if="dataShared.restaurants.length > 0" class="results">
            <h2 v-if="dataShared.restaurants.length == 1 && dataShared.lastQuery == ''">Trovato un risultato</h2>
            <h2 v-else-if="dataShared.lastQuery == ''">Trovati {{dataShared.restaurants.length}} risultati</h2>
            <h2 v-else-if="dataShared.restaurants.length == 1">Trovato un risultato per "{{dataShared.lastQuery}}"</h2>
            <h2 v-else>Trovati {{dataShared.restaurants.length}} risultati per "{{dataShared.lastQuery}}"</h2>
            <div class="restaurants row row-cols-1 row-cols-md-2">
                <RestaurantCard
                    v-for="restaurant in dataShared.restaurants"
                    :key="restaurant.id"
                    :restaurant="restaurant"
                />
            </div>
        </div>
        <div v-else-if="dataShared.noResultsFound" class="no-results">
            <h2>Nessun risultato trovato per "{{dataShared.lastQuery}}"</h2>
        </div>
    </div>
</template>

<script>
import RestaurantCard from '../commons/RestaurantCard.vue'
import dataShared from "../../dataShared";

export default {
    name: "Results",
    components: {
        RestaurantCard
    },
    data() {
        return {
            dataShared,
        };
    },
};
</script>

<style lang="scss" scoped>

.home_results {
    h2 {
        margin-bottom: 1.35rem;
    }
}

</style>
