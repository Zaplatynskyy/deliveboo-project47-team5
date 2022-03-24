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
                    <select name="order" id="order" v-model="dataShared.order" hidden>
                        <option
                            class="order_option"
                            v-for="(orderOption, i) in dataShared.orderOptions"
                            :key="i"
                            :value="orderOption"
                        >
                            {{ orderOption }}
                        </option>
                    </select>

                    <div class="my_select">
                        <div class="select_head">
                            <span class="name selected">ciao</span>
                            <span class="icon">$</span>
                        </div>
                        <div class="my_options_content">
                            <div class="my_option">
                                <span class="name">ciao 1</span>
                                <span class="icon">$</span>
                            </div>
                            <div class="my_option">
                                <span class="name">ciao 2</span>
                                <span class="icon">$</span>
                            </div>
                            <div class="my_option">
                                <span class="name">ciao 3</span>
                                <span class="icon">$</span>
                            </div>
                        </div>
                    </div>
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

.my_select {
    font-size: .9rem;
    text-align: right;
    text-transform: uppercase;
    width: 100px;
    background-color: var(--white);
    border-radius: 5px;

    .select_head {
        padding: 5px 2px;
        cursor: pointer;
    }

    .my_option {
        color: var(--dark-grey);
        padding: 5px 2px;
        cursor: pointer;

        &:hover {
            background-color: var(--light-grey);
        }
    }
}
</style>
