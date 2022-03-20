<template>
    <div id="hero">
        <div class="row justify-content-center">
            <div
                class="col-12 col-md-7 col-xl-6 d-flex justify-content-center align-items-center"
            >
                <div class="hero_nav">
                    <h1>Il miglior cibo, direttamente a casa tua</h1>

                    <div class="nav_bar_hero">
                        <i
                            class="fa-solid fa-magnifying-glass"
                            @click="nameSearch()"
                        ></i>
                        <input
                            type="text"
                            placeholder="Cerca ristorante"
                            @keyup.enter="nameSearch()"
                            v-model="dataShared.query"
                        />
                        <router-link
                            :to="{
                                name: 'advanced-search',
                            }"
                        >
                            <button class="advanced_search" type="button">
                                Filtri
                            </button>
                        </router-link>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-5">
                <div class="hero_img">
                    <img
                        src="/storage/uploads/hero.svg"
                        alt="hero deliveroo image"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import dataShared from "../../dataShared";

export default {
    name: "Hero",

    data() {
        return {
            dataShared,
        };
    },

    methods: {
        nameSearch(query) {
            if (dataShared.query != "") {
                axios
                    .get(`/api/restaurants/${dataShared.query}`)
                    .then((response) => {
                        this.dataShared.restaurants = [...response.data.users];
                        this.dataShared.noResultsFound = null;
                    })
                    .catch((error) => {
                        this.dataShared.restaurants = [];
                        this.dataShared.noResultsFound =
                            error.response.data.message;
                    })
                    .then(function () {
                        dataShared.lastQuery = dataShared.query;
                    });
            }
        },
    },
};
</script>

<style lang="scss" scoped>
#hero {
    // height: 550px;
    background-image: url("/storage/uploads/background.svg");
    background-size: contain;
    padding: 30px 20px;
    user-select: none;

    .hero_nav {
        h1 {
            font-size: 2rem;
            color: var(--main-color);
        }

        .nav_bar_hero {
            position: relative;

            svg {
                color: var(--dark-grey);
                position: absolute;
                left: calc(100% - 115px);
                top: 30px;
                cursor: pointer;
                transition: 0.15s;

                &:hover {
                    color: #5e5d5d;
                }

                &:active {
                    color: var(--dark-grey);
                }
            }

            input[type="text"] {
                font-size: 0.9rem;
                width: calc(100% - 85px);
                border: 1px solid var(--dark-grey);
                border-top-left-radius: 5px;
                border-bottom-left-radius: 5px;
                padding: 8px;
                margin: 20px 0;

                &:focus {
                    outline: none;
                }
            }

            button {
                font-size: 0.9rem;
                width: 80px;
                text-transform: uppercase;
                color: var(--dark-grey);
                background-color: var(--white);
                border: 1px solid var(--dark-grey);
                border-top-right-radius: 5px;
                border-bottom-right-radius: 5px;
                padding: 8px;
                position: relative;
                right: 5px;
                cursor: pointer;
                transition: 0.15s;

                &:hover {
                    color: var(--white);
                    background-color: #3eccbc;
                    border: 1px solid #3eccbc;
                }

                &:active {
                    background-color: #43b6a8;
                }
            }
        }
    }

    .hero_img {
        width: 250px;
        margin: auto;

        img {
            width: 100%;
        }
    }
}

@media screen and (min-width: 576px) {
    #hero {
        .hero_nav {
            h1 {
                font-size: 2.8rem;
            }
        }
    }
}

@media screen and (min-width: 992px) {
    #hero {
        padding: 30px 45px;

        .hero_nav {
            .nav_bar_hero {
                position: relative;

                svg {
                    left: calc(400px - 30px);
                }

                input[type="text"] {
                    width: 400px;
                }
            }
        }

        .hero_img {
            width: 350px;
        }
    }
}

@media screen and (min-width: 1200px) {
    #hero {
        padding: 30px 20px;

        .hero_nav {
            input[type="text"] {
                font-size: 1rem;
                padding: 12px;
            }

            button {
                font-size: 1rem;
                padding: 12px;
            }
        }

        .hero_nav {
            h1 {
                font-size: 3.5rem;
            }
        }
    }
}
</style>
