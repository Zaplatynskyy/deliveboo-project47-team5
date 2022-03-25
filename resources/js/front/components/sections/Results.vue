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
                    <div class="my_select">

                        <div class="select_head" @click="dropSelect()">

                            <span class="icon">
                                <span class="down" :class="{ d_none : dropDown }">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z"/></svg>
                                </span>
                                <span class="up" :class="{ d_none : !dropDown }">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M416 352c-8.188 0-16.38-3.125-22.62-9.375L224 173.3l-169.4 169.4c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25C432.4 348.9 424.2 352 416 352z"/></svg>
                                </span>
                            </span>
                            <span class="name">{{dataShared.order}}</span>

                        </div>
                        <div class="my_options_content" :class="{ display_none : !dropDown }">

                            <div class="my_option" :class="{ selected : orderOption == dataShared.order}" v-for="(orderOption, i) in dataShared.orderOptions"  :key="i" @click="changeSelect(orderOption)">
                                <span class="icon" :class="{ display_none : orderOption !== dataShared.order}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z" style="fill : #3ECCBC"/></svg>
                                </span>
                                <span class="name">{{ orderOption }}</span>
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
            dropDown: false
        };
    },

    methods : {
        dropSelect() {
            this.dropDown =! this.dropDown
        },

        changeSelect(orderOption) {
            dataShared.order = orderOption;

            this.dropSelect();
        }
    }
};
</script>

<style lang="scss" scoped>
.results {
    padding-bottom: 70px;
    .title {
        display: flex;
        justify-content: space-between;

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
    font-size: .75rem;
    text-align: right;
    text-transform: uppercase;
    min-width: 160px;
    max-width: 300px;
    margin-top: 3px;
    position: relative;
    z-index: 9;

    .select_head {
        background-color: var(--white);
        border: 1px solid var(--dark-grey);
        border-radius: 5px;
        padding: 5px 10px;
        display: flex;
        flex-direction: row-reverse;
        cursor: pointer;

        .icon {
            margin-left: 5px;

            .down, .up {
                width: 10px;
                display: inline-block;

                &.d_none {
                    display: none;
                }
            }
        }
    }

    .my_options_content {
        width: 100%;
        background-color: var(--white);
        border-left: 1px solid var(--dark-grey);
        border-right: 1px solid var(--dark-grey);
        border-bottom: 1px solid var(--dark-grey);
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
        transition: .2s;
        overflow: hidden;
        position: absolute;

        &.display_none {
            opacity: 0;
            visibility: hidden;
            height: 0;
        }

        .my_option {
            color: var(--dark-grey);
            padding: 5px 2px;
            display: flex;
            flex-direction: row-reverse;
            cursor: pointer;

            &:hover {
                background-color: var(--light-grey);
            }

            &.selected {
                background-color: var(--light-grey);
            }

            .icon{
                width: 10%;
                max-width: 10px;
                display: inline-block;
                margin-left: 5px;

                &.display_none {
                    opacity: 0;
                }
            }

            .name {
                width: 90%;
            }

        }
    }
}
</style>
