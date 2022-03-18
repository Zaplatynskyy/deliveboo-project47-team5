<template>
    <div id="hero">
        <div class="row justify-content-center">
            <div class="col-12 col-md-7 col-xl-5 d-flex justify-content-center align-items-center">
                <div class="hero_nav">
                    <h1>Il miglior cibo, direttamente a casa tua</h1>
                    <input type="text" placeholder="Cerca ristorante" @keyup.enter="nameSearch()" v-model="query"/>
                    <router-link
                            :to="{
                                name: 'advanced-search'
                            }"
                        >
                            <button type="button">Cerca</button>
                        </router-link>
                    
                </div>
            </div>

            <div class="col-12 col-md-5">
                <div class="hero_img">
                    <img src="/storage/uploads/hero.svg" alt="hero deliveroo image">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import dataShared from '../../dataShared'

export default {
    name : 'Hero',

    data() {
        return {
            dataShared,
            query: ""
        }
    },

    methods : {
        nameSearch(query) {
            if (this.query != "") {
                axios
                    .get(`/api/restaurants/${this.query}`)
                    .then((response) => {
                        this.dataShared.restaurants = [...response.data.users];
                        this.dataShared.searchOn = true;
                        this.dataShared.noResultsFound = null;
                    })
                    .catch((error) => {
                        this.dataShared.restaurants = [];
                        this.dataShared.searchOn = false;
                        this.dataShared.noResultsFound = error.response.data.message;
                    });
            }
        },
    }
}
</script>

<style lang="scss" scoped>

#hero {
    // height: 550px;
    background-image: url('/storage/uploads/background.svg');
    background-size: contain;
    padding: 30px 20px;

    .hero_nav {
        h1 {
            font-size: 2.0rem;
            color: var(--main-color);
        }

        input[type="text"]{
            font-size: .9rem;
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
        
        button{
            font-size: .9rem;
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

            &:hover {
                background-color: var(--light-grey);
            }
        }
    }

    .hero_img{
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
            input[type="text"] {
                max-width: 400px;
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

    button{
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