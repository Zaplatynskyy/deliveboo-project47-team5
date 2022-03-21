<template>
    <div id="hero">
        <div class="row justify-content-center">
            <div
                class="col-12 col-md-7 col-xl-6 d-flex justify-content-center align-items-center"
            >
                <div class="hero_nav">
                    <h1>Il miglior cibo, direttamente a casa tua</h1>

                    <div class="nav_bar_hero">
                        <div class="search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <input
                            type="text"
                            placeholder="Cerca ristorante"
                            @keyup.enter="searchRestaurants()"
                            v-model="dataShared.query"
                        />
                        
                        <button class="advanced_search" type="button" @click="searchRestaurants()">
                            Cerca
                        </button>

                        <div class="tags">
                            <div
                                v-for="tag in dataShared.tags"
                                :key="tag.id"
                                class="form-check form-check-inline"
                            >
                                <input
                                    class="form-check-input checkboxTags"
                                    type="checkbox"
                                    :id="tag.slug"
                                    :value="tag.id"
                                />
                                <label class="form-check-label" :for="tag.slug">
                                    {{ tag.name }}
                                </label>
                            </div>
                        </div>
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
        

        searchRestaurants() {
            
            let categories = this.checkCheckbox("checkboxCategories");
            let tags = this.checkCheckbox("checkboxTags");

            if(dataShared.query == '' && !categories.length && !tags.length) {
                return ''
            }

            axios
                .post(`/api/restaurants/advanced`, {
                    params: {
                        categories: categories,
                        tags: tags,
                        query: dataShared.query,
                    },
                })
                .then((response) => {
                    dataShared.restaurants = [...response.data.users];
                    dataShared.noResultsFound = null;
                    dataShared.lastQuery = dataShared.query;
                })
                .catch((error) => {
                    console.log(error);
                    dataShared.noResultsFound = error.response.data.message;
                    dataShared.restaurants = [];
                });
        },

        checkCheckbox(type) {
            let checked = [];
            const input = document.getElementsByClassName(type);

            for (let element of input) {
                if (element.checked) checked.push(element.value);
            }
            return checked;
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
