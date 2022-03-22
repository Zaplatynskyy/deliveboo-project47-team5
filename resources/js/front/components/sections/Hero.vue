<template>
    <div id="hero">
        <div class="row justify-content-center">
            <div
                class="col-12 col-md-7 col-xl-6 d-flex justify-content-center"
            >
                <div class="hero_nav">
                    <h1>Il miglior cibo, direttamente a casa tua</h1>

                    <div class="nav_bar_hero">
                        <div class="search_bar">
                            <svg @click="tagsOn = !tagsOn" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">
                                <desc>Created with Fabric.js 1.7.22</desc>
                                <defs>
                                </defs>
                                <g transform="translate(128 128) scale(0.72 0.72)" style="">
                                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(-175.05 -175.05000000000004) scale(3.89 3.89)" >
                                        <path d="M 86 77.409 H 54.645 c -2.209 0 -4 -1.791 -4 -4 s 1.791 -4 4 -4 H 86 c 2.209 0 4 1.791 4 4 S 88.209 77.409 86 77.409 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #9F9F9F; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path d="M 53.897 20.591 H 4 c -2.209 0 -4 -1.791 -4 -4 s 1.791 -4 4 -4 h 49.897 c 2.209 0 4 1.791 4 4 S 56.106 20.591 53.897 20.591 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #9F9F9F; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path d="M 86 49 H 31.428 c -2.209 0 -4 -1.791 -4 -4 s 1.791 -4 4 -4 H 86 c 2.209 0 4 1.791 4 4 S 88.209 49 86 49 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #9F9F9F; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path d="M 36.102 77.409 H 4 c -2.209 0 -4 -1.791 -4 -4 s 1.791 -4 4 -4 h 32.102 c 2.209 0 4 1.791 4 4 S 38.311 77.409 36.102 77.409 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #9F9F9F; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path d="M 13.633 49 H 4 c -2.209 0 -4 -1.791 -4 -4 s 1.791 -4 4 -4 h 9.633 c 2.209 0 4 1.791 4 4 S 15.842 49 13.633 49 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #9F9F9F; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path d="M 86 20.591 H 71.866 c -2.209 0 -4 -1.791 -4 -4 s 1.791 -4 4 -4 H 86 c 2.209 0 4 1.791 4 4 S 88.209 20.591 86 20.591 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #9F9F9F; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path d="M 50.47 82.307 H 39.53 c -1.893 0 -3.428 -1.535 -3.428 -3.428 v -10.94 c 0 -1.893 1.535 -3.428 3.428 -3.428 h 10.94 c 1.893 0 3.428 1.535 3.428 3.428 v 10.94 C 53.898 80.772 52.363 82.307 50.47 82.307 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #9F9F9F; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path d="M 28 53.898 H 17.06 c -1.893 0 -3.428 -1.535 -3.428 -3.428 V 39.53 c 0 -1.893 1.535 -3.428 3.428 -3.428 H 28 c 1.893 0 3.428 1.535 3.428 3.428 v 10.94 C 31.428 52.363 29.893 53.898 28 53.898 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #9F9F9F; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path d="M 68.266 25.488 h -10.94 c -1.893 0 -3.428 -1.535 -3.428 -3.428 v -10.94 c 0 -1.893 1.535 -3.428 3.428 -3.428 h 10.94 c 1.893 0 3.428 1.535 3.428 3.428 v 10.94 C 71.693 23.954 70.159 25.488 68.266 25.488 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #9F9F9F; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    </g>
                                </g>
                            </svg>
                            <input
                            :class="{ tag_on : tagsOn }"
                                type="text"
                                placeholder="Cerca ristorante"
                                @keyup.enter="searchRestaurants()"
                                v-model="dataShared.query"
                            />

                            <button
                                class="advanced_search"
                                :class="{ tag_on : tagsOn }"
                                type="button"
                                @click="searchRestaurants()"
                            >
                                Cerca
                            </button>
                        </div>

                        <div v-if="tagsOn" class="tags">
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
                                    hidden
                                />
                                <div class="tag">
                                    <svg :class="`cross ${tag.slug}`" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" style="fill: rgb(255, 0, 0);"/></svg>
                                    <svg :class="`check ${tag.slug} d-none`" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z" style="fill: rgb(0, 128, 0);"/></svg>
                                    <span class="form-check-label" :for="tag.slug" @click ="tagSelected(tag.slug)">
                                        {{ tag.name }}
                                    </span>
                                </div>
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
            tagsOn : false
        };
    },

    methods: {
        searchRestaurants() {
            let categories = this.checkCheckbox("checkboxCategories");
            let tags = this.checkCheckbox("checkboxTags");

            if (dataShared.query == "" && !categories.length && !tags.length) {
                return "";
            }

            axios
                .post(`/api/restaurants/advanced`, {
                    params: {
                        categories: categories,
                        tags: tags,
                        query: dataShared.query,
                        order: dataShared.order,
                    },
                })
                .then((response) => {
                    console.log(response.data);
                    dataShared.restaurants = [...response.data.users];
                    dataShared.noResultsFound = null;
                })
                .catch((error) => {
                    console.log(error);
                    dataShared.noResultsFound = error.response.data.message;
                    dataShared.restaurants = [];
                })
                .then(function () {
                    dataShared.lastQuery = dataShared.query;
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

        tagSelected(input_id) {
            const tag_input = document.getElementById(input_id);
            tag_input.click();
            
            if( tag_input.checked ) {
                document.querySelector(`.cross.${input_id}`).classList.add('d-none');
                document.querySelector(`.check.${input_id}`).classList.remove('d-none');
            } else {
                document.querySelector(`.cross.${input_id}`).classList.remove('d-none');
                document.querySelector(`.check.${input_id}`).classList.add('d-none');
            }
        }
    },
    watch: {
        "dataShared.order"(newValue) {
            this.searchRestaurants();
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
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;

    .hero_nav {
        h1 {
            font-size: 2rem;
            color: var(--main-color);
        }

        .nav_bar_hero {
            margin: 20px 0;
            position: relative;

            .search_bar {
                display: flex;
                align-items: center;

                svg {
                    width: 25px;
                    height: 18px;
                    color: var(--dark-grey);
                    cursor: pointer;
                    position: absolute;
                    left: 10px;

                    &:hover {
                        color: #5e5d5d;
                    }

                    &:active {
                        color: var(--dark-grey);
                    }
                }

                input[type="text"] {
                    font-size: 0.9rem;
                    width: 100%;
                    border: 1px solid var(--dark-grey);
                    border-top-left-radius: 15px;
                    border-bottom-left-radius: 15px;
                    padding: 8px;
                    padding-left: 40px;
                    transition: 0.15s;


                    &:focus {
                        outline: none;
                    }

                    &.tag_on {
                        border-bottom-left-radius: 0;
                    }
                }

                button {
                    font-size: 0.9rem;
                    width: 80px;
                    text-transform: uppercase;
                    color: var(--dark-grey);
                    background-color: var(--white);
                    border: 1px solid var(--dark-grey);
                    border-top-right-radius: 15px;
                    border-bottom-right-radius: 15px;
                    padding: 8px;
                    transition: 0.15s;
                    cursor: pointer;

                    &:hover {
                        color: var(--white);
                        background-color: #3eccbc;
                        border: 1px solid #3eccbc;
                    }

                    &:active {
                        background-color: #43b6a8;
                    }

                    &.tag_on {
                        border-bottom-right-radius : 0
                    }
                }
            }

            .tags {
                background-color: var(--white);
                border: 1px solid var(--light-grey);
                border-bottom-right-radius: 15px;
                border-bottom-left-radius: 15px; 
                padding: 10px 5px;
                display: flex;


                .form-check {
                    font-size: .9rem;
                    margin: 5px;

                    .tag {
                        display: flex;
                        align-items: center;
                        
                        svg {
                            margin-right: 3px;

                            &.check {
                                width: 15px;
                            }

                            &.cross {
                                width: 10px;
                            }
                        }

                        .form-check-label {
                            cursor: pointer;

                            &:hover {
                                color: #3eccbc;
                            }
                        }
                        
                    }
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
            padding-top: 40px;
            
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
            padding-top: 100px;

            .nav_bar_hero {
                .search_bar {
                    input[type="text"] {
                        width: 400px;
                    }
                }

                .tags {
                    width: 480px;
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
